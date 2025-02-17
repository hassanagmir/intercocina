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
            'description' => $this->description ? $this->description : $this->type->description,
            'price' => $this->price(),
            'status' => $this->status,
            'type_id' => $this->type_id,
            'type' => $this?->type?->name,
            'category_id' => $this->type->category_id,
            'category' => $this->type->category->name,
            'images' => $this->images->map(function ($image) {
                return $image->image;
            }),
           'dimensions' => $this->dimensions ? $this->dimensions->map(function ($dimension) {
                return [
                    'id' => $dimension->id,
                    'dimension' => $dimension->dimension,
                    'color' => $dimension?->color?->name,
                    'width' => $dimension->width,
                    'height' => $dimension->height,
                    'thickness' => $dimension->thickness,
                    'attribute' => $dimension?->attribute?->name,
                    'attribute_id' => $dimension?->attribute?->id,
                    'price' => $dimension->price,
                    'code' => $dimension->code,
                ];
            }) : [],

            'colors' => $this->colors->map(function ($color) {
                return [
                    'id' => $color->id,
                    'name' => $color->name,
                    'image' => $color->image,
                ];
            }),
            'attributes' => $this->attributes->map(function ($attribute) {
                return [
                    'id' => $attribute->id,
                    'name' => $attribute->name,
                ];
            }),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
