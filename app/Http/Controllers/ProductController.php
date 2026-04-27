<?php

namespace App\Http\Controllers;

use App\Enums\ProductStatusEnum;
use App\Models\Category;
use App\Models\Dimension;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $filters = $request->query('filters');
        $filters = $filters ? explode(',', $filters) : [];

        $query = Product::query()
            ->select(['id', 'name', 'slug', 'code', 'price', 'type_id'])
            ->with([
                'images:id,product_id,image',
                'type:id,name,slug,status',
            ])
            ->where('status', '!=', ProductStatusEnum::HIDE)
            ->whereHas('type', function ($q) use ($filters) {
                $q->where('status', true);

                if (!empty($filters)) {
                    $q->whereIn('slug', $filters);
                }
            });

        return $query->paginate(100);
    }



    public function show(Product $product)
    {
        $product->load([
            'images' => fn($query) => $query->orderBy('order'),
            'related:id,slug,name,description,price',
            'related.images' => fn($query) => $query->orderBy('order'),
            'type'
        ]);

        $products = Product::where('type_id', $product->type_id)
            ->whereNot("status", ProductStatusEnum::HIDE)
            ->paginate(4);

        $title = $product->name;
        $image = $product->images?->first()?->image;
        $description = $product->description;

        return view('product.show', compact('product', 'products', 'title', 'description', 'image'));
    }

    public function list()
    {
        $categories = Category::with('types')->orderBy('order')->get();
        $title = __("Collections des produits");
        return view('product.list', compact('categories', 'title'));
    }


    public function search()
    {
        return view('product.search');
    }


    public function show_product(Product $product)
    {
        $product->load([
            'related:id,slug,name,description,price',
            'related.images' => fn($q) => $q->select('image', 'id', 'product_id')->orderBy('order'),
            'images' => fn($q) => $q->select('image', 'id', 'product_id', 'color_id')->orderBy('order'),
            'type',
            'color'
        ]);

        return $product;
    }



    public function relatedProducts(Product $product)
    {
        return $product->related()
            ->with([
                'products:id,type_id,name,slug,status,order,price',
                'products.images:id,product_id,image,order'
            ])
            ->whereHas('products', function ($query) {
                $query->whereIn('status', [1, 5]);
            })
            ->get();
    }



    public function addToCart(Request $request)
    {

        try {
            $item = $request->input('cart');
            if (isset($item['attributes']['dimension_id'])) {
                $product = Product::find($item['attributes']['product_id']);

                $dimension = Dimension::find($item['attributes']['dimension_id']);
                $discount = Discount::where("category_id", $dimension?->product?->type->category->id)->where('user_id', auth()->id())->first()->percentage ?? 0;
            } else {
                $product = Product::find($item['attributes']['product_id']);
                $discount = Discount::where("category_id", $product?->type?->category->id)->where('user_id', auth()->id())->first()->percentage ?? 0;
            }

            $price = (float) number_format(intval($item['price']), 2, '.', '');

            \Cart::add([
                'id' => $item['id'],
                'name' => $item['name'],
                'price' => $price - (($discount / 100) * $price),
                'quantity' => $item['quantity'],
                'attributes' => [
                    'color' => $item['attributes']['color'] ?? null,
                    'color_name' => $item['attributes']['color_name'] ?? null,
                    'image' => $item['attributes']['image'] ?? null,
                    'dimension' => $item['attributes']['dimension'] ?? null,
                    'height' => $item['attributes']['height'] ?? null,
                    'width' => $item['attributes']['width'] ?? null,
                    'length' => $item['attributes']['length'] ?? null,
                    'unit' => $product->unit ?? null,
                    'slug' => $item['attributes']['slug'],
                    'attribute' => $item['attributes']['attribute'] ? $item['attributes']['attribute']['name'] : null,
                    'product_id' => $item['attributes']['product_id'],
                    'dimension_id' => $item['attributes']['dimension_id'] ?? null,
                    'special' => $item['attributes']['special']
                ]
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Product added successfully',
                'cart_count' => \Cart::getContent()->count()
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add product to cart',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
