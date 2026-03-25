<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\BrandAPIController;
use App\Http\Controllers\CategoryAPIController;
use App\Http\Controllers\ContactAPIController;
use App\Http\Controllers\CoverAPIController;
use App\Http\Controllers\EventAPIController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostAPIController;
use App\Http\Controllers\ProductAPIController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewAPIController;
use App\Http\Controllers\TypeAPIController;
use App\Http\Controllers\ViewColorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\UserController;

Route::post('orders/confirm', [OrderController::class, 'confirm']);

Route::apiResource('products', ProductController::class);
Route::get("products/{product:slug}/related", [ProductController::class, 'relatedProducts'])->name('product.related');
Route::get('products/{product:slug}', [ProductController::class, 'show_product']);


Route::post('add-to-cart', [ProductController::class, 'AddToCart']);


Route::apiResource('categories', CategoryAPIController::class);

Route::get('search', [ProductAPIController::class, 'search']);

Route::get('collections/{collection:slug}', [CollectionController::class, 'show']);


Route::get('products/dimensions/{product:slug}', [ProductAPIController::class, 'dimensions']);
Route::get('products/reviews/{product:slug}', [ProductAPIController::class, 'reviews']);

Route::get('posts/home', [PostAPIController::class, 'list']);
Route::apiResource('reviews', ReviewAPIController::class);
Route::apiResource('types', TypeAPIController::class);
Route::apiResource('posts', PostAPIController::class);
Route::apiResource('covers', CoverAPIController::class);
Route::apiResource('contacts', ContactAPIController::class);
Route::apiResource('brands', BrandAPIController::class);
Route::apiResource('events', EventAPIController::class);
Route::apiResource('groups', GroupController::class);
Route::apiResource('cities', CityController::class);
Route::apiResource('subscribers', SubscriberController::class);
Route::apiResource('faqs', FaqController::class);


Route::get('/view-colors', [ViewColorController::class, 'index']);


Route::get('/view-colors', [ViewColorController::class, 'index']);

Route::get('/pages/{page:slug}', [PageController::class, 'show']);



Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('address', AddressController::class);
    Route::apiResource('orders', OrderController::class);
    Route::get('orders-list', [OrderController::class, 'list']);
    Route::get('discounts', [DiscountController::class, 'discounts']);
    Route::prefix('users')->group(function () {
        Route::put('update', [UserController::class, 'update']);
        Route::put('update-password', [UserController::class, 'updatePassword']);
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


