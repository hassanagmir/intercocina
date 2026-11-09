<?php

namespace App\Http\Controllers;

use App\Models\Type;

class TypeController extends Controller
{
    public function index()
    {
        return response()->json(
            Type::where('status', 1)->with(['category' => function ($query) {
                $query->select('id', 'name', 'slug');
            }])
                ->select('name', 'slug', 'image', 'status', 'order', 'category_id')
                ->orderBy('order')
                ->where('status', 1)
                ->get()
        );
    }


    public function show($slug)
    {
        $type = Type::where('slug', $slug)
            ->with([
                'products' => fn($q) => $q
                    ->select('id', 'type_id', 'name', 'slug', 'status', 'order', 'price', 'is_new', 'family_id')
                    ->whereIn('status', [1, 5])
                    ->orderBy('order'),
                'products.firstImage' => fn($q) => $q->select('images.id', 'images.product_id', 'images.image'),
            ])
            ->first();

        return $type
            ? response()->json($type)
            : response()->json(['message' => 'Type introuvable'], 404);
    }
}
