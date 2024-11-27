<?php

namespace App\Http\Controllers;

use App\Enums\ProductStatusEnum;
use App\Models\Category;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product){
        $products = Product::where('type_id', $product->type_id)
            ->whereNot("status", ProductStatusEnum::HIDE)
            ->paginate(4);
        $title = $product->name;
        $description = $product->description;
        return view('product.show', compact('product', 'products', 'title', 'description'));
    }

    public function list(){
        $categories = Category::orderBy('order')->get();
        $title = __("Collections des produits");
        return view('product.list', compact('categories', 'title'));
    }


    public function search(){
        return view('product.search');
    }
}
