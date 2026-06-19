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
        if ($request->search != '') {
            $articles = Product::with(['images'])->whereNot("status", ProductStatusEnum::HIDE)
                ->where(function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search . '%')
                        ->orWhere('description', 'like', '%' . $request->search . '%')
                        ->orWhere('code', strtoupper($request->search))
                        ->orWhereHas('dimensions', fn($query) => $query->where('code', strtoupper($request->search)))
                        ->orWhere('tags', 'like', '%' . $request->search . '%');
                })
                ->orderByRaw("
                CASE
                    WHEN name LIKE ? THEN 1
                    WHEN description LIKE ? THEN 2
                    ELSE 3
                END
            ", ['%' . $request->search . '%', '%' . $request->search . '%'])
                ->select(['id', 'name', 'price', 'slug', 'type_id']) // 👈 select only needed columns
                ->take(15)
                ->get();
        } else {
            $articles = [];
        }

        return $articles;
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
