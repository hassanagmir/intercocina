<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Livewire\Auth;
use App\Models\Address;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'products' => Product::all()
    ]);
})->name("home");


Route::get("profile", function(){
    $orders = Order::where('user_id', auth()->id())->paginate(6);
    return view('profile', compact('orders'));
})->name('profile');


Route::get("aprops", function(){
    return view('about');
})->name('about');


Route::get("product/{product:slug}", [ProductController::class, 'show'])->name('product.show');


Route::get('category/{category:slug}', [CategoryController::class, 'show'])->name('category.show');



Route::get('order/list', [OrderController::class, 'list'])->name('order.list');
Route::get('order/{order:code}', [OrderController::class, 'show'])->name('order.show');


Route::get('address/list', [AddressController::class, 'list'])->name('address.list');


Route::get("settings", function(){
    return view('settings');
})->name('settings');


Route::get("panier", function(){
    return view('cart');
})->name('cart');


Route::get("checkout", function(){
    return view('checkout');
})->name('checkout');

Route::get("merci", function(){
    return view('thanks');
})->name('thanks');


Route::get('logout', function(){
    auth()->logout();
    return redirect()->route('home');
})->name('logout');