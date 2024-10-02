<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Color;
use App\Models\Dimension;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/livewire/update', function(){
    return redirect()->back();
});

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('aprops', 'about')->name('about');
    Route::get('settings', 'settings')->name('settings');
    Route::get('panier', 'cart')->name('cart');
    Route::get('checkout', 'checkout')->name('checkout');
    Route::get('merci', 'thanks')->name('thanks');
    Route::get('profile', 'profile')->name('profile');
    Route::get('faqs', 'faqs')->name('faqs');
    Route::get('contact', 'contact')->name('contact');
    Route::get('page/{page:slug}', 'show')->name('page.show');
});


Route::prefix('user')->group(function () {
    Route::get('password', [UserController::class, 'password'])->name('password');
    Route::get('forgot-password', [UserController::class, 'forgot'])->name('forgot');
    // Route::get('reset-password', [UserController::class, 'reset'])->name('reset');
    Route::get('edit', [UserController::class, 'edit'])->name('user.edit');
    Route::get('login', [UserController::class, 'login'])->name('user.login');
    Route::get('register', [UserController::class, 'register'])->name('user.register');
});

// Route::get('/forgot-password', \App\Http\Livewire\ForgotPassword::class)->name('password.request');

Route::prefix('')->group(function () {
    Route::get('produits', [ProductController::class, 'list'])->name("products");
});

Route::get("product/{product:slug}", [ProductController::class, 'show'])->name('product.show');
Route::get('category/{category:slug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('address/list', [AddressController::class, 'list'])->name('address.list');
Route::get('address/delete/{address}', [AddressController::class, 'delete'])->name('address.delete');

Route::prefix('order')->group(function () {
    Route::get('list', [OrderController::class, 'list'])->name('order.list');
    Route::get('{order:code}', [OrderController::class, 'show'])->name('order.show');
});


Route::get("search", [ProductController::class, 'search'])->name('search');


Route::prefix('event')->group(function () {
    Route::get('list', [EventController::class, 'list'])->name('event.list');
    Route::get('{event:slug}', [EventController::class, 'show'])->name('event.show');
});


Route::prefix('blogs')->group(function(){
    Route::get('', [PostController::class, 'index'])->name('post.index');
    Route::get('{post:slug}', [PostController::class, 'show'])->name('post.show');
});


Route::get('reclamation', [ClaimController::class, 'create'])->name('claim.create');



Route::get('logout', function () {
    auth()->logout();
    return redirect()->route('home');
})->name('logout');


Route::get('upload', function () {
    return view('upload');
})->name('upload');


Route::post('json', function (Request $request) {
    $request->validate([
        'jsonFile' => ['required', 'file', 'mimes:json', 'max:2048'],
    ]);

    $jsonData = json_decode($request->file('jsonFile')->getContent(), true);

    if (!is_array($jsonData)) {
        return response()->json(['message' => 'Invalid JSON format'], 400);
    }

    $processedData = collect($jsonData)->map(function ($item) {

        return DB::transaction(function () use ($item) {
            $category = Category::firstOrCreate(['name' => $item['category']]);

            $type = Type::firstOrCreate([
                'name' => "{$item['category']} {$item['type']}",
                'category_id' => $category->id,
            ]);


            if(isset($item['color'])){
                $color = Color::firstOrCreate([
                    'name' => ucfirst($item['color']),
                ]);
            }

            if(isset($item['attribute'])){
                $attribute = Attribute::firstOrCreate(
                    ['name' => ucfirst($item['attribute'])],
                    ['category_id' => $category->id]
                );
            }


            $product = Product::firstOrCreate([
                'name' => "{$item['category']} {$item['type']} {$item['name']}",
                'type_id' => $type->id,
            ]);

            if(isset($item['color'])){
                $product->colors()->syncWithoutDetaching([$color->id]);
            }

            if(isset($item['attribute'])){
                $product->attributes()->syncWithoutDetaching([$attribute->id]);
            }

            $dimensions = explode('*', $item['dimensions']);

            return Dimension::firstOrCreate(
                ['code' => $item['code']],
                [
                    'price' => $item['price'],
                    'height' => $dimensions[0],
                    'width' => $dimensions[1],
                    'product_id' => $product->id,
                    'color_id' => isset($item['color']) ? $color->id : null,
                    'attribute_id' => isset($item['attribute']) ? $attribute->id : null,
                ]
            );
        });
    });

    return response()->json(['data' => $processedData]);
})->name('json');



// In routes/web.php
Route::get('/reset-password/{token}', function (string $token) {
    return view('user.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');