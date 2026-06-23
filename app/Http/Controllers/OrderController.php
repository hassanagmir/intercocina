<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatusEnum;
use App\Models\Address;
use App\Models\Discount;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf;
use Illuminate\Support\Facades\Validator;


class OrderController extends Controller
{
    public function list()
    {
        $orders = Order::withCount(['items'])->where("user_id", auth()->id())->latest()->paginate(20);
        return $orders;
    }


    public function show(Order $order)
    {
        if (!($order->user_id == auth()->id())) {
            return abort(404);
        }
        $title = $order->code;
        return view('order.show', compact('order', 'title'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address_id'                       => 'required|exists:addresses,id',
            'payment'                          => 'required|string|max:50',
            'shipping_id'                      => 'required|exists:shippings,id',
            'cart'                             => 'required|array|min:1',
            'cart.*.quantity'                  => 'required|integer|min:1',
            'cart.*.price'                     => 'required',
            'cart.*.attributes.product_id'     => 'required|integer',
            'cart.*.attributes.dimension_id'   => 'nullable',
            'cart.*.attributes.color'          => 'nullable',
            'cart.*.attributes.family_id'      => 'nullable|integer',
        ])->setAttributeNames([
            'address_id'                       => 'Adresse',
            'payment'                          => 'Paiement',
            'shipping_id'                      => 'Livraison',
            'cart'                             => 'Panier',
            'cart.*.quantity'                  => 'Quantité',
            'cart.*.price'                     => 'Prix',
            'cart.*.attributes.product_id'     => 'Produit',
            'cart.*.attributes.dimension_id'   => 'Dimension',
            'cart.*.attributes.color'          => 'Couleur',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status"  => "error",
                "message" => $validator->errors()->first(),
                "errors"  => $validator->errors()
            ], 422);
        }

        if (auth()->user()->status->value == 2) {
            return response()->json([
                "status"  => "error",
                "message" => __("Désolé, votre compte est actuellement inactif. Veuillez contacter le support au +212 661-547900.")
            ], 403);
        }

        $address = Address::find($request->address_id);
        if (!$address || $address->user_id != auth()->id()) {
            return response()->json([
                "status"  => "error",
                "message" => __("Cette adresse n'est pas pour vous")
            ], 404);
        }

        // Load this user's discounts keyed by family_id for fast lookup
        $discounts = Discount::where('user_id', auth()->id())
            ->get()
            ->keyBy('family_id');

        $TVA_RATE = 0.20; // 2%

        $order = Order::create([
            'user_id'    => auth()->id(),
            'total_amount' => 0,
            'status'     => OrderStatusEnum::ON_HOLD,
            'address_id' => $request->address_id,
            'payment'    => $request->payment,
            'shipping_id' => $request->shipping_id,
        ]);

        $rawTotal      = 0; // before discount
        $totalHT       = 0; // after discount, before TVA
        $totalDiscount = 0;

        foreach ($request->cart as $product) {
            $quantity  = intval($product['quantity']);
            $price     = floatval($product['price']);
            $familyId  = $product['attributes']['family_id'] ?? null;
            $attributes = $product['attributes'];

            // Find discount for this item's family
            $discountPct = 0;
            if ($familyId && isset($discounts[$familyId])) {
                $discountPct = floatval($discounts[$familyId]->percentage);
            }

            $discountedPrice = $price * (1 - $discountPct / 100);
            $lineRaw         = $price * $quantity;
            $lineTotal       = round($discountedPrice * $quantity, 2);
            $lineDiscount    = $lineRaw - $lineTotal;

            $rawTotal      += $lineRaw;
            $totalHT       += $lineTotal;
            $totalDiscount += $lineDiscount;

            $item = OrderItem::create([
                'order_id'          => $order->id,
                'code'              => $order->code,
                'quantity'          => $quantity,
                'unit_price'        => $price,
                'discount_percent'  => $discountPct,
                'discounted_price'  => $discountedPrice,
                'total'             => $lineTotal,
                'color_id'          => $attributes['color'] ?: null,
                'product_id'        => $attributes['product_id'],
                'dimension_id'      => $attributes['dimension_id'] ?: null,
            ]);

            if (!empty($attributes['special']) && !empty($attributes['dimension'])) {
                [$h, $w] = array_map('trim', explode("*", $attributes['dimension']));
                $item->update([
                    'special_height' => $h,
                    'special_width'  => $w,
                ]);
            }
        }

        $tvaAmount = round($totalHT * $TVA_RATE, 2);
        $totalTTC  = round($totalHT + $tvaAmount, 2);

        $order->update([
            'raw_total'       => round($rawTotal, 2),
            'discount_amount' => round($totalDiscount, 2),
            'total_ht'        => round($totalHT, 2),
            'tva_rate'        => $TVA_RATE,
            'tva_amount'      => $tvaAmount,
            'total_amount'    => $totalTTC, // final TTC stored as the order total
        ]);

        return response()->json([
            "status"  => "success",
            "message" => __("Votre commande a été envoyée avec succès!"),
            "order"   => $order->load("items"),
            "summary" => [
                "raw_total"       => round($rawTotal, 2),
                "discount_amount" => round($totalDiscount, 2),
                "total_ht"        => round($totalHT, 2),
                "tva_rate"        => $TVA_RATE * 100 . "%",
                "tva_amount"      => $tvaAmount,
                "total_ttc"       => $totalTTC,
            ]
        ]);
    }




    public function api_list(Request $request)
    {
        $status = $request->input('status', 1);

        return \App\Http\Resources\OrderResource::collection(
            Order::where('status', $status)->latest()->get()
        );
    }



    public function count(Request $request)
    {
        $status = $request->input('status', 1);

        return [
            'count' => Order::where('status', $status)->count()
        ];
    }


    public function confirm(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'status' => 'required|in:1,2,3,4,5|numeric',
            'code' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
                'errors'  => $validator->errors()
            ], 402);
        }

        $order = Order::where('code', $request->code)->first();

        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        $order->status = 3;
        $order->save();

        return new \App\Http\Resources\OrderResource($order);
    }



    public function invoice(Order $order)
    {
        return Pdf::view('invoice', ['order' => $order])
            ->format('A4')
            ->name("{$order->code}.pdf");
    }


    public function exportOrder(Order $order)
    {
        $filename = $order->exportToTextFile();

        return response()->download(
            storage_path('app/exports/' . $filename),
            $filename,
            ['Content-Type' => 'text/plain']
        );
    }

    public function exportOrderText(Order $order)
    {
        $filename = $order->exportText();

        return response()->download(
            storage_path('app/exports/' . $filename),
            $filename,
            ['Content-Type' => 'text/plain']
        );
    }
}
