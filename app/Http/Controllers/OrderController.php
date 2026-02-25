<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatusEnum;
use App\Http\Resources\OrderResource;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\Browsershot\Browsershot;
// use Barryvdh\DomPDF\Facade\Pdf;
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
        // 1. Validation
        $validator = Validator::make($request->all(), [
            'address_id'                       => 'required|exists:addresses,id',
            'payment'                          => 'required|string|max:50',
            'shipping_id'                      => 'required|exists:shippings,id',
            'cart'                             => 'required|array|min:1',

            // cart items
            'cart.*.quantity'                  => 'required|integer|min:1',
            'cart.*.price'                     => 'required',
            'cart.*.attributes.product_id'     => 'required|integer',
            'cart.*.attributes.dimension_id'   => 'nullable',
            'cart.*.attributes.color'          => 'nullable',
        ])->setAttributeNames([
            'address_id'                       => 'Adresse',
            'payment'                          => 'Paiement',
            'shipping_id'                      => 'Livraison',
            'cart'                             => 'Panier',

            // cart items
            'cart.*.quantity'                  => 'Quantité',
            'cart.*.price'                     => 'Prix',
            'cart.*.attributes.product_id'     => 'Produit',
            'cart.*.attributes.dimension_id'   => 'Dimension',
            'cart.*.attributes.color'          => 'Couleur',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "error",
                "message" => $validator->errors()->first(),
                "errors" => $validator->errors()
            ], 422);
        }

  
        if (auth()->user()->status->value == 2) {
            return response()->json([
                "status" => "error",
                "message" => __("Désolé, votre compte est actuellement inactif. Veuillez contacter le support au +212 661-547900.")
            ], 403);
        }

   
        $address = Address::find($request->address_id);

        if (!$address || $address->user_id != auth()->id()) {
            return response()->json([
                "status" => "error",
                "message" => __("Cette adresse n'est pas pour vous")
            ], 404);
        }


        $order = Order::create([
            'user_id' => auth()->id(),
            'total_amount' => 0,
            'status' => OrderStatusEnum::ON_HOLD,
            'address_id' => $request->address_id,
            'payment' => $request->payment,
            'shipping_id' => $request->shipping_id,
        ]);

        $totalAmount = 0;

        foreach ($request->cart as $product) {

            $quantity = intval($product['quantity']);
            $price = floatval($product['price']);
            $lineTotal = $price * $quantity;
            $totalAmount += $lineTotal;

            $attributes = $product['attributes'];

            $item = OrderItem::create([
                'order_id'     => $order->id,
                'code'         => $order->code,
                'total'        => $lineTotal,
                'quantity'     => $quantity,
                'color_id'     => $attributes['color'] ?: null,
                'product_id'   => $attributes['product_id'],
                'dimension_id' => $attributes['dimension_id'] ?: null,
            ]);

            if (!empty($attributes['special']) && !empty($attributes['dimension'])) {
                [$h, $w] = array_map('trim', explode("*", $attributes['dimension']));

                $item->update([
                    'special_height' => $h,
                    'special_width'  => $w,
                ]);
            }
        }

        // 6. Update order total
        $order->update([
            'total_amount' => $totalAmount
        ]);

        // 7. Return API response
        return response()->json([
            "status" => "success",
            "message" => __("Votre commande a été envoyée avec succès!"),
            "order" => $order->load("items")
        ]);
    }





    public function api_list(Request $request)
    {
        $apiKey = $request->header('INTER-API-KEY');
        if ($apiKey !== env('API_KEY')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return \App\Http\Resources\OrderResource::collection(Order::where('status', 2)->get());
    }


    public function confirm(Request $request)
    {
        $apiKey = $request->header('INTER-API-KEY');
        if ($apiKey !== env('API_KEY')) {
            return response()->json(['error' => 'Unauthorized'], 401);
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
