<?php



use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductAPIController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ViewColorController;
use Illuminate\Support\Facades\Route;

Route::post('orders/confirm', [OrderController::class, 'confirm']);


Route::get('product/{product:slug}', [ProductController::class, 'show_product']);


Route::post('add-to-cart', [ProductController::class, 'AddToCart']);

Route::apiResource('products', ProductAPIController::class);

Route::get('/view-colors', [ViewColorController::class, 'index']);