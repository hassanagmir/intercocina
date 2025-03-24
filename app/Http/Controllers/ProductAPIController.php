<?php

namespace App\Http\Controllers;

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
    public function show($slug)
    {
        $product = Product::where('slug', $slug)
            ->firstOrFail();
        return new ProductResource($product);
    }

    public function reviews($slug)
    {
        $reviews = Product::where('slug', $slug)
            ->firstOrFail()
            ->reviews()->where('status', 1)->paginate(10);
        return response()->json($reviews);
    }

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
                'color:id,name',
            ])
            ->get();


        $colors = $product->colors()
            ->select('colors.id', 'colors.name', 'colors.image')  // Prefix columns with table name
            ->get()
            ->map(function ($color) {
                return [
                    'id' => $color->id,
                    'name' => $color->name,
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
    
    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully'], 200);
    }
}
