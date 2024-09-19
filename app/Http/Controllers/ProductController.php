<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product){
        return view('product.show', compact('product'));
    }

    public function list(){
        $categories = Category::where("status", 1)->get();
        $title = __("Collections des produits");
        return view('product.list', compact('categories'));
    }


    public function search(){
        return view('product.search');
    }
}
