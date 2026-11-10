<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Auth\FacebookAuthController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CoverController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductSyncController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewColorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('api.key')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Authentication (public)
    |--------------------------------------------------------------------------
    */
    Route::post('register', [AuthController::class, 'register'])->middleware('throttle:10,1');
    Route::post('login', [AuthController::class, 'login'])->middleware('throttle:10,1');

    Route::prefix('auth')->name('auth.')->group(function () {
        Route::prefix('facebook')->name('facebook.')->group(function () {
            Route::get('/', [FacebookAuthController::class, 'redirect'])->name('redirect');
            Route::post('callback', [FacebookAuthController::class, 'callback'])->name('callback');
        });

        Route::prefix('google')->name('google.')->group(function () {
            Route::get('/', [GoogleAuthController::class, 'redirect'])->name('redirect');
            Route::post('callback', [GoogleAuthController::class, 'callback'])->name('callback');
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Catalogue (public, read-only)
    |--------------------------------------------------------------------------
    */
    // Specific routes first, slug-bound routes last.
    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index');
        Route::get('dimensions/{slug}', 'dimensions');
        Route::get('reviews/{slug}', 'reviews');
        Route::get('search', 'search');
        Route::get('{product:slug}/related', 'relatedProducts');
        Route::get('{product:slug}', 'show');
        Route::get('images/{code}', 'imagesByCode');
        Route::get('{product}/color-image/{color}', 'colorImage');
    });

    Route::controller(CollectionController::class)->prefix('collections')->group(function () {
        Route::get('/', 'index');
        Route::get('{collection:slug}', 'show');
    });

    Route::get('posts/home', [PostController::class, 'list']);
    Route::get('view-colors', [ViewColorController::class, 'index']);
    
    Route::prefix('pages')->controller(PageController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('{page:slug}', 'show');
    });

    $readOnly = ['index', 'show'];

    Route::apiResource('categories', CategoryController::class)->only($readOnly);
    Route::apiResource('types', TypeController::class)->only($readOnly);
    Route::apiResource('posts', PostController::class)->only($readOnly);
    Route::apiResource('covers', CoverController::class)->only($readOnly);
    Route::apiResource('brands', BrandController::class)->only($readOnly);
    Route::apiResource('events', EventController::class)->only($readOnly);
    Route::apiResource('groups', GroupController::class)->only($readOnly);
    Route::apiResource('cities', CityController::class)->only($readOnly);
    Route::apiResource('faqs', FaqController::class)->only($readOnly);

    Route::get('color/{id}', [ColorController::class, 'show']);

    /*
    |--------------------------------------------------------------------------
    | Public forms
    |--------------------------------------------------------------------------
    */
    Route::apiResource('reviews', ReviewController::class)->only(['index', 'show', 'store']);
    Route::apiResource('contacts', ContactController::class)->only(['store']);
    Route::apiResource('subscribers', SubscriberController::class)->only(['store']);
    Route::post('reclamations', [ReclamationController::class, 'store']);



    Route::prefix('orders')->controller(OrderController::class)->group(function () {
        Route::get('list', 'list');
        Route::patch('{order:code}/status', 'updateStatus');
        Route::get('count', 'count');
    });

    // WARNING: public GET endpoints that run a sync. Consider POST + auth.
    Route::get('sync/products', [ProductSyncController::class, 'syncAll']);
    Route::get('sync/product/{code}', [ProductSyncController::class, 'syncByCode']);

    /*
    |--------------------------------------------------------------------------
    | Authenticated (Sanctum Bearer token)
    |--------------------------------------------------------------------------
    */
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('logout-all', [AuthController::class, 'logoutAll']);

        Route::get('user', fn (Request $request) => $request->user());

        Route::apiResource('address', AddressController::class)->only(['index', 'store', 'destroy']);

        Route::post('orders/store', [OrderController::class, 'store']);
        Route::get('orders-list', [OrderController::class, 'index']);
        Route::get('discounts', [DiscountController::class, 'discounts']);

        Route::prefix('users')->controller(UserController::class)->group(function () {
            Route::put('update', 'update');
            Route::put('onboarding', 'onboarding');
            Route::put('update-password', 'updatePassword');
        });
    });
});