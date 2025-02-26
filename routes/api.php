<?php



use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductAPIController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::post('orders/confirm', [OrderController::class, 'confirm']);


Route::get('product/{product:slug}', [ProductController::class, 'show_product']);


Route::post('add-to-cart', [ProductController::class, 'AddToCart']);

Route::prefix('product', function(){
    Route::get('list', [ProductAPIController::class, 'index']);
    Route::post('store', [ProductAPIController::class, 'store']);
    Route::get('show/{product:slug}', [ProductAPIController::class, 'show']);   
});