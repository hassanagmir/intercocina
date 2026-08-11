<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    function rm_space(string $input): string {
        $trimmed = trim($input);
        $cleaned = preg_replace('/\s+/', ' ', $trimmed);
        return $cleaned;
    }

    public function toArray(Request $request): array
    {
        $counts = collect($this->items)
            ->map(fn($item) => strtok(str_replace("Façade ", "", $item->product->name), " "))
            ->countBy();

        $maxCount = $counts->max();
        $mostDuplicated = $counts->filter(fn($count) => $count === $maxCount)->keys();
        $reference = $mostDuplicated->first();

        // Order-level totals
        $rawTotal      = floatval($this->raw_total ?? $this->total_amount);
        $discountAmount = floatval($this->discount_amount ?? 0);
        $totalHT       = floatval($this->total_ht ?? ($rawTotal - $discountAmount));
        $tvaRate       = floatval($this->tva_rate ?? 0.02);
        $tvaAmount     = floatval($this->tva_amount ?? round($totalHT * $tvaRate, 2));
        $totalTTC      = floatval($this->total_amount ?? round($totalHT + $tvaAmount, 2));

        return [
            'id'             => $this->id,
            'code'           => $this->code,
            'reference'      => $reference,
            'status'         => $this->status,
            'created_at'     => $this->created_at,
            'payment'        => $this->payment,
            'shipping_id'    => $this->shipping_id,
            'phone'          => $this->user->phone,
            'address'        => $this->address,
            'city'           => $this->user->city->name,
            'shipping'       => $this->shipping->name,
            'email'          => $this->email,
            'full_name'      => $this?->user?->first_name . ' ' . $this?->user?->last_name,
            'souche'         => 0,

            // Customer
            'customer'       => $this->user->name,
            'customer_code'  => $this->user->code,

            // Totals
            'raw_total'      => round($rawTotal, 2),
            'discount_amount'=> round($discountAmount, 2),
            'total_ht'       => round($totalHT, 2),
            'tva_rate'       => $tvaRate,
            'tva_percent'    => round($tvaRate * 100, 0) . '%',
            'tva_amount'     => round($tvaAmount, 2),
            'total_amount'   => round($totalTTC, 2), // TTC

            'products' => $this->items->map(function ($item) {
                $product_name = str_replace("Façade ", "", $item->product->name);
                $special      = isset($item->special_height);
                $dimension    = $special
                    ? $item->special_height . " * " . $item->special_width
                    : ($item->dimension ? $item->dimension->dimension : null);
                $attribute    = $item?->dimension?->attribute?->name . " ";
                $color        = $item?->dimension?->color?->name;

                // Use stored discount if available, otherwise fall back to live lookup
                $discount = floatval($item->discount_percent ?? 0);
                if ($discount === 0.0) {
                    $family = $item->dimension
                        ? $item->dimension?->product->family
                        : $item->product?->family;
                    foreach ($this->user->discounts as $discountItem) {
                        if ($discountItem->family == $family) {
                            $discount = floatval($discountItem->percentage);
                            break;
                        }
                    }
                }

                $unitPrice      = floatval($item->unit_price ?? ($item->dimension ? $item->dimension->price : $item->product->price));
                $discountedPrice = floatval($item->discounted_price ?? ($unitPrice * (1 - $discount / 100)));
                $lineTotal       = floatval($item->total ?? round($discountedPrice * $item->quantity, 2));

                return [
                    'id'              => $item->id,
                    'code'            => $item->dimension ? $item->dimension->code : $item->product->code,
                    'designation'     => $this->rm_space($attribute . "$product_name  $dimension $color"),
                    'special'         => $special,
                    'color'           => $color,
                    'depth'           => $item->dimension?->dipth,
                    'height'          => $special ? $item->special_height : ($item->dimension ? $item->dimension->height : null),
                    'width'           => $special ? $item->special_width  : ($item->dimension ? $item->dimension->width  : null),
                    'dimensions'      => $dimension,
                    'quantity'        => $item->quantity,

                    // Pricing
                    'unit_price'      => round($unitPrice, 2),
                    'discount'        => $discount,
                    'discounted_price' => round($discountedPrice, 2),
                    'total'           => round($lineTotal, 2),

                    'full_dimension'  => $item->dimension ? [
                        'id'           => $item->dimension->id,
                        'width'        => $item->dimension->width,
                        'height'       => $item->dimension->height,
                        'price'        => $item->dimension->price,
                        'code'         => $item->dimension->code,
                        'product_id'   => $item->dimension->product_id,
                        'dimension'    => $item->dimension->dimension,
                        'color_id'     => $item->dimension->color_id,
                        'attribute_id' => $item->dimension->attribute_id,
                        'thicknesse'   => $item->dimension->thicknesse,
                        'depth'        => $item->dimension->dipth,
                        'attribute'    => $item->dimension->attribute
                            ? ['name' => $item->dimension->attribute->name]
                            : null,
                        'color'        => $item->dimension->color
                            ? ['name' => $item->dimension->color->name]
                            : null,
                        'product'      => $item->dimension->product ? [
                            'id'        => $item->dimension->product->id,
                            'price'     => $item->dimension->product->price,
                            'code'      => $item->dimension->product->code,
                            'slug'      => $item->dimension->product->slug,
                            'family_id' => $item->dimension->product->family_id,
                            'family'    => $item->dimension->product->family ? [
                                'id'   => $item->dimension->product->family->id,
                                'name' => $item->dimension->product->family->name,
                                'code' => $item->dimension->product->family->code,
                            ] : null,
                        ] : null,
                    ] : null,
                ];
            }),
        ];
    }
}