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

        return [
            'id'            => $this->id,
            'code'          => $this->code,
            'reference'     => $reference,
            'total_amount'  => intval($this->getTotalWithoutTva()),
            'status'        => $this->status,
            'created_at'    => $this->created_at,
            'payment'       => $this->payment,
            'customer'      => $this->user->name,
            'customer_code' => $this->user->code,
            'shipping_id'   => $this->shipping_id,
            'souche'        => 0,
            'products'      => $this->items->map(function ($item) {
                $product_name = str_replace("Façade ", "", $item->product->name);
                $special      = isset($item->special_height);
                $dimension    = $special
                    ? $item->special_height . " * " . $item->special_width
                    : ($item->dimension ? $item->dimension->dimension : null);
                $attribute    = $item?->dimension?->attribute?->name . " ";
                $color        = $item?->dimension?->color?->name;

                $discount = 0;
                $family   = $item->dimension ? $item->dimension?->product->family : $item->product?->family;
                foreach ($this->user->discounts as $discountItem) {
                    if ($discountItem->family == $family) {
                        $discount = $discountItem->percentage;
                        break;
                    }
                }

                return [
                    'id'           => $item->id,
                    'code'         => $item->dimension ? $item->dimension->code : $item->product->code,
                    'discount'     => $discount,
                    'depth'        => $item->dimension?->dipth,
                    'height'       => $special ? $item->special_height : ($item->dimension ? $item->dimension->height : null),
                    'width'        => $special ? $item->special_width : ($item->dimension ? $item->dimension->width : null),
                    'dimensions'   => $dimension,
                    'designation'  => $this->rm_space($attribute . "$product_name  $dimension $color"),
                    'special'      => $special,
                    'color'        => $color,
                    'quantity'     => $item->quantity,
                    'total'        => intval($item->dimension ? $item->dimension->price : $item->product->price),
                    'full_dimension' => $item->dimension ? [
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