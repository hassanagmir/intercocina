<?php

namespace App\Http\Controllers;

use App\Enums\ProductStatusEnum;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function show(Product $product){
        
        $products = Product::where('type_id', $product->type_id)
            ->whereNot("status", ProductStatusEnum::HIDE)
            ->paginate(4);


        $title = $product->name;
        $image = $product->images?->first()?->image;
        $description = $product->description;
        return view('product.show', compact('product', 'products', 'title', 'description', 'image'));
    }

    public function list(){
        $categories = Category::with('types')->orderBy('order')->get();
        $title = __("Collections des produits");
        return view('product.list', compact('categories', 'title'));
    }


    public function search(){ 
        return view('product.search');
    }

    public function show_product(Product $product){
        return new \App\Http\Resources\ProductResource($product);
    }
}
