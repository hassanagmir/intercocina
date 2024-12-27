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
                return [
                    'id' => $item->id,
                    'code' => $item->dimension ? $item->dimension->code : $item->product->code,
                    'dimensions' => $item->dimension ? $item->dimension->dimension : null,
                    'designation' => $item->product->name . " " . ($item->dimension ? $item->dimension->dimension : ''),
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'total' => $item->total,
                    'full_dimension' => $item->dimension ? $item->dimension : null,
                ];
            }),
        ];
    }
    
}
