<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            
            'price' => $this->price(),
            'status' => $this->status->getLabel(),
            'type_id' => $this->type_id,
            'type' => $this->type?->name,
            'slug' => $this->slug,
            'unit' => $this->unit,
            'category_id' => $this->type?->category_id,
            'category' => $this->type?->category?->name,
            'description' => $this->description ?? $this->type?->description,
            'content' => $this->content,
            'tags' => $this->tags,
            'options' => $this->options,
            'images' => $this->images->map(function ($image) {
                return $image->image;
            }),
        ];
    }
}
