<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Address;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'products' => Product::all()
    ]);
})->name("home");


Route::get("profile", function(){
    return view('profile');
})->name('profile');


Route::get("aprops", function(){
    return view('about');
})->name('about');


Route::get("product/{product:slug}", [ProductController::class, 'show'])->name('product.show');


Route::get('category/{category:slug}', [CategoryController::class, 'show'])->name('category.show');

Route::get("panier", function(){
    return view('cart');
})->name('cart');


Route::get("checkout", function(){
    return view('checkout');
})->name('checkout');

Route::get("merci", function(){
    return view('thanks');
})->name('thanks');