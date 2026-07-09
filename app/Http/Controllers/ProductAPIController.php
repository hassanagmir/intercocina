<?php

namespace App\Http\Controllers;

use App\Enums\ProductStatusEnum;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductAPIController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index()
    {
        return ['message' => 'index'];
    }



    public function store(Request $request)
    {
        return ['message' => 'store'];
    }

    /**
     * Display the specified product.
     */
    public function show(Product $product)
    {
        $product->load([
            'related:id,slug,name,description,price',
            'related.images' => fn($query) => $query->orderBy('order'),
            'type',
            'piece',
            'color',
        ])->loadCount('reviews');

        return new ProductResource($product);
    }



    public function reviews($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $reviews = $product->reviews()
            ->where('status', 1)
            ->select("full_name", 'comment', 'stars')
            ->latest()
            ->get();

        return response()->json($reviews);
    }

    // [{"id":1,"full_name":"Rachid","email":"admin@admin.com","stars":5,"product_id":163,"status":1,"comment":"Intercocina, c\u2019est bien plus qu\u2019une entreprise de fabrication de meubles. C\u2019est une v\u00e9ritable r\u00e9f\u00e9rence dans l\u2019art de concevoir des espaces de vie qui allient \u00e9l\u00e9gance, fonctionnalit\u00e9 et durabilit\u00e9.","created_at":"2024-10-04T15:25:11.000000Z","updated_at":"2024-10-09T07:05:33.000000Z"}]

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product)
    {
        return ['message' => 'update'];
    }

    public function dimensions($slug)
    {
        $product = Product::where('slug', $slug)->first();

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $dimensions = $product->dimensions()
            ->select('id', 'product_id', 'width', 'height', 'price', 'code', 'color_id', 'attribute_id')
            ->with([
                'color:id,name,code',
            ])
            ->get();


        $colors = $product->colors()
            ->select('colors.id', 'colors.name', 'colors.image', 'colors.code') 
            ->get()
            ->map(function ($color) {
                return [
                    'id' => $color->id,
                    'name' => $color->name,
                    'code' => $color->code,
                    'image' => $color->image
                ];
            });

        $attributes = $product->attributes()
            ->select('attributes.id', 'attributes.name')
            ->get();


        return response()->json([
            'attributes' => $attributes,
            'colors' => $colors,
            'dimensions' => $dimensions,

        ]);
    }

    public function search(Request $request)
    {
        $search = trim((string) $request->input('search'));

        if ($search === '') {
            return response()->json([]);
        }

        $escaped = addcslashes($search, '%_\\');
        $like    = '%' . $escaped . '%';
        $upper   = mb_strtoupper($search);

        $articles = Product::query()
            ->with(['images'])
            ->where('status', '!=', ProductStatusEnum::HIDE)
            ->whereHas('type', fn($query) => $query->where('status', true)) // exclude products whose type is inactive
            ->where(function ($query) use ($like, $upper) {
                $query->whereRaw('LOWER(name) LIKE LOWER(?)', [$like])
                    ->orWhereRaw('LOWER(description) LIKE LOWER(?)', [$like])
                    ->orWhere('code', 'like', $like)
                    ->orWhereHas('dimensions', fn($q) => $q->where('code', 'like', $like))
                    ->orWhereRaw('LOWER(tags) LIKE LOWER(?)', [$like]);
            })
            ->orderByRaw("
            CASE
                WHEN LOWER(name) LIKE LOWER(?) THEN 1
                WHEN LOWER(description) LIKE LOWER(?) THEN 2
                ELSE 3
            END
        ", [$like, $like])
            ->select(['id', 'name', 'price', 'slug', 'type_id'])
            ->take(15)
            ->get();

        return response()->json($articles);
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully'], 200);
    }
}
