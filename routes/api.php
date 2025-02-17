<?php



use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::post('orders/confirm', [OrderController::class, 'confirm']);


Route::get('product/{product:slug}', [ProductController::class, 'show_product']);