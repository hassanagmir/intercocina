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
        $product->load('related:id,slug,name,description,price', 'related.images', 'type');
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
