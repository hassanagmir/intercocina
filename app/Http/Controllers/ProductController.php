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
        return view('product.show', compact('product', 'products', 'title'));
    }

    public function list(){
        $categories = Category::where("status", 1)->get();
        $title = __("Collections des produits");
        return view('product.list', compact('categories', 'title'));
    }


    public function search(){
        return view('product.search');
    }
}
