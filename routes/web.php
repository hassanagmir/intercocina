<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductExportController;
use App\Http\Controllers\UserController;
use App\Models\City;
use App\Models\Collection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

Route::get('/livewire/update', function () {
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
    Route::get('placards/{slug}', 'placards')->name('placards');
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
    Route::get('shop', [ProductController::class, 'list'])->name("products");
});


Route::get("product/{product:slug}", [ProductController::class, 'show'])->name('product.show');
Route::get('category/{category:slug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('address/list', [AddressController::class, 'list'])->name('address.list');
Route::get('address/delete/{address}', [AddressController::class, 'delete'])->name('address.delete');

Route::prefix('order')->group(function () {
    Route::get('list', [OrderController::class, 'list'])->name('order.list');
    Route::get('{order:code}', [OrderController::class, 'show'])->name('order.show');
    Route::get('invoice/{order:code}', [OrderController::class, 'invoice'])->name('order.invoice');
    Route::get('{order}/export', [OrderController::class, 'exportOrder'])->name('order.export');
    Route::get('{order}/export-text', [OrderController::class, 'exportOrderText'])->name('order.export-text');
});


Route::get("search", [ProductController::class, 'search'])->name('search');


Route::prefix('event')->group(function () {
    Route::get('list', [EventController::class, 'list'])->name('event.list');
    Route::get('{event:slug}', [EventController::class, 'show'])->name('event.show');
});



Route::controller(CollectionController::class)->prefix('collections')->group(function () {
    Route::get('{collection:slug}', 'show')->name('collection.show');
});


Route::prefix('blogs')->group(function () {
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


Route::get('/placard', function () {
    return view('placard');
});

Route::get('wardrobe', function () {
    return view('wardrobe');
})->name('wardrobe');

Route::get('/scan', function () {
    return view('scan');
})->name('scanner');




Route::post('json', [ProductExportController::class, 'export'])->name('json');


// In routes/web.php
Route::get('/reset-password/{token}', function (string $token) {
    return view('user.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');


Route::get('import', function () {
    return view('export-clients');
})->name('import');


Route::get('api/orders', [OrderController::class, 'index'])->name('order.index');


Route::post('export-client', function (Request $request) {
    ini_set('max_execution_time', 3600);
    set_time_limit(3600);
    $request->validate([
        'jsonFile' => ['required', 'file', 'max:9048'],
    ]);

    $jsonData = json_decode($request->file('jsonFile')->getContent(), true);

    if (!is_array($jsonData)) {
        return response()->json(['message' => 'Invalid JSON format'], 400);
    }

    $processedData = collect($jsonData)->map(function ($item) {
        return DB::transaction(function () use ($item) {

            if (isset($item['city'])) {
                $city = City::firstOrCreate(['name' => $item['city']], ['country_id' => 1]);
            }

            if (isset($item['email'])) {
                $email = strtolower($item['email']);
            } else {
                $email =  strtolower($item['code'] . "@client.com");
            }
            if (User::where("email", $email)->count() < 1) {
                User::firstOrCreate(['code' => $item['code']], [
                    'first_name' => isset($item['first_name']) ? $item['first_name'] : null,
                    'last_name' => isset($item['last_name']) ? $item['last_name'] : null,
                    'name' => ucfirst(strtolower($item['name'])),
                    'email' => $email,
                    'zip' => isset($item['zip']) ? $item['zip'] : null,
                    'phone' => isset($item['phone']) ? $item['phone'] : null,
                    'address' => isset($item['adresse']) ? $item['adresse'] : '',
                    'password' => Hash::make($item['code']),
                    'city_id' => isset($city) ? $city->id : null
                ]);
            }
        });
    });
    return response()->json(['data' => $processedData]);
})->name('export-client');



Route::get('/migrations', function () {
    try {
        Artisan::call('migrate', ['--force' => true]);
        return response()->json(['message' => 'Migrations executed successfully.'], 200);
    } catch (Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});


Route::get('/run-npm/{command}', function ($command) {
    if (!in_array($command, ['build', 'dev'])) {
        return response()->json(['error' => 'Invalid command'], 400);
    }

    try {
        $output = shell_exec('cd ' . base_path() . ' && npm run ' . escapeshellarg($command));
        return response()->json([
            'status' => 'success',
            'message' => "npm run $command executed successfully.",
            'output' => $output
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Error executing the command',
            'error' => $e->getMessage()
        ], 500);
    }
});
