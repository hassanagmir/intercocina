<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;




Route::controller(PageController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('aprops', 'about')->name('about');
    Route::get('settings', 'settings')->name('settings');
    Route::get('panier', 'cart')->name('cart');
    Route::get('checkout', 'checkout')->name('checkout');
    Route::get('merci', 'thanks')->name('thanks');
    Route::get('profile', 'profile')->name('profile');
});

Route::prefix('user')->group(function(){
    Route::get('password', [UserController::class, 'password'])->name('password');
    Route::get('edit', [UserController::class, 'edit'])->name('user.edit');
});

Route::prefix('')->group(function(){
    Route::get('produits', [ProductController::class, 'list'])->name("products");
});

Route::get("product/{product:slug}", [ProductController::class, 'show'])->name('product.show');
Route::get('category/{category:slug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('address/list', [AddressController::class, 'list'])->name('address.list');

Route::prefix('order')->group(function(){
    Route::get('list', [OrderController::class, 'list'])->name('order.list');
    Route::get('{order:code}', [OrderController::class, 'show'])->name('order.show');
});


Route::prefix('event')->group(function(){
    Route::get('list', [EventController::class, 'list'])->name('event.list');
    Route::get('{event:slug}', [EventController::class, 'show'])->name('event.show');
});




Route::get('logout', function(){
    auth()->logout();
    return redirect()->route('home');
})->name('logout');