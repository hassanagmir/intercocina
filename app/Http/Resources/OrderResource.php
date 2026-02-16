<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

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
        
        $reference = $mostDuplicated->count() > 1 ? $mostDuplicated->first() : $mostDuplicated->first();

        return [
            'id' => $this->id,
            'code' => $this->code,
            'reference' => $reference,
            'total_amount' => intval($this->getTotalWithoutTva()),
            'status' => $this->status,
            'created_at' => $this->created_at,
            'payment' => $this->payment,
            'customer' => $this->user->name,
            'customer_code' => $this->user->code,
            'shipping_id' => $this->shipping_id,
            'souche' => 0,
            'products' => $this->items->map(function ($item) {
                $product_name = str_replace("Façade ", "", $item->product->name);
                $special = isset($item->special_height);

                // if($item->dimension?->height && $item->dimension?->width){
                //     if($special){
                //         $dimension = $item->dimension->special_height . " * " . $item->special_width;
                //     }else{
                //         $dimension = $item->dimension?->height . " * " . $item->dimension?->width;
                //     }
                // }else{
                //     if($special){
                //         $dimension = $item?->dimension->special_height . "" . $item?->dimension->special_width;
                //     }else{
                //         $dimension = $item->dimension?->height . "" . $item->dimension?->width;
                //     }
                // }

                $dimension = ($special ? $item->special_height . " * " . $item->special_width :  ($item->dimension ? $item->dimension->dimension : null));

      
                // $dimension = $special ? $item->special_height : ($item->dimension ? $item->dimension->height : null)
                
                $item->dimension ? $item->dimension->dimension : '';
                $attribute = $item?->dimension?->attribute?->name . " ";
                $color = $item?->dimension?->color?->name;

                $discount = 0;
                $category = $item->dimension ? $item->dimension?->product->type->category : $item->product?->type?->category;
                foreach ($this->user->discounts as $discountItem) {
                    if ($discountItem->category == $category) {
                        $discount = $discountItem->percentage;
                        break;
                    }
                }


                return [
                    'id' => $item->id,
                    'code' => $item->dimension ? $item->dimension->code : $item->product->code,
                    'discount' => $discount,
                    'depth' => $item->dimension?->dipth,
                    'height' => $special ? $item->special_height : ($item->dimension ? $item->dimension->height : null),
                    'width' => $special ? $item->special_width : ($item->dimension ? $item->dimension->width : null),
                    'dimensions' => $dimension,
                    'designation' => $this->rm_space($attribute ."$product_name  $dimension $color"),
                    'special' => $special,
                    'color' => $color,
                    'quantity' => $item->quantity,
                    'total' => intval($item->dimension ? $item->dimension->price :  $item->product->price),
                    'full_dimension' => $item->dimension ? $item->dimension : null,
                ];
            }),
        ];
    }
    
}
