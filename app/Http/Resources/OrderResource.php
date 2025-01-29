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
        return [
            'id' => $this->id,
            'code' => $this->code,
            'total_amount' => $this->total_amount,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'payment' => $this->payment,
            'customer' => $this->user->name,
            'customer_code' => $this->user->code,
            'products' => $this->items->map(function ($item) {
                $product_name = str_replace("Façade ", "", $item->product->name);
                $dimension = $item->dimension ? $item->dimension->dimension : '';
                $attribute = $item?->dimension?->attribute?->name . " ";
                $special = isset($item->special_height);
                $color = $item?->dimension?->color?->name;
                return [
                    'id' => $item->id,
                    'code' => $item->dimension ? $item->dimension->code : $item->product->code,
                    'dimensions' => ($special ? $item->special_height . " * " . $item->special_width :  ($item->dimension ? $item->dimension->dimension : null)),
                    'designation' => $this->rm_space($attribute ."$product_name  $dimension $color"),
                    'special' => $special,
                    'color' => $color,
                    'quantity' => $item->quantity,
                    'total' => floatval($item->total),
                    'full_dimension' => $item->dimension ? $item->dimension : null,
                ];
            }),
        ];
    }
    
}
