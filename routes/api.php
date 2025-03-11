<?php

use App\Http\Controllers\BrandAPIController;
use App\Http\Controllers\CategoryAPIController;
use App\Http\Controllers\ContactAPIController;
use App\Http\Controllers\CoverAPIController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostAPIController;
use App\Http\Controllers\ProductAPIController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TypeAPIController;
use App\Http\Controllers\ViewColorController;
use Illuminate\Support\Facades\Route;

Route::post('orders/confirm', [OrderController::class, 'confirm']);


Route::get('product/{product:slug}', [ProductController::class, 'show_product']);


Route::post('add-to-cart', [ProductController::class, 'AddToCart']);

Route::apiResource('products', ProductAPIController::class);
Route::apiResource('categories', CategoryAPIController::class);


Route::get('products/dimensions/{product:slug}', [ProductAPIController::class, 'dimensions']);

Route::get('posts/home', [PostAPIController::class, 'list']);

Route::apiResource('types', TypeAPIController::class);
Route::apiResource('posts', PostAPIController::class);
Route::apiResource('covers', CoverAPIController::class);
Route::apiResource('contacts', ContactAPIController::class);
Route::apiResource('brands', BrandAPIController::class);

Route::get('/view-colors', [ViewColorController::class, 'index']);
