<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ViewColorResource extends JsonResource
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
            'product_id' => $this->product_id,
            'product_slug' => $this->product->slug,
            'name' => $this->name,
            'code' => $this->code,
            'image' => $this->image,
            'images' => $this->images->map(function ($image) {
                return [
                    'id' => $image->id,
                    'path' => $image->path,
                ];
            }),

        ];
    }
}
