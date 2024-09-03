<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'products' => Product::all()
    ]);
});


Route::get("product/{product:slug}", [ProductController::class, 'show'])->name('product.show');