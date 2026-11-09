<?php

use App\Http\Controllers\ImportController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductExportController;
use Illuminate\Support\Facades\Route;


Route::get('/', fn() => redirect('https://intercocina.com'))->name('home');

Route::middleware('auth')->group(function () {

    Route::get('products/export', [ProductController::class, 'exportProducts']);
    Route::post('json', [ProductExportController::class, 'export'])->name('json');

    Route::prefix('order')->group(function () {
        Route::get('{order}/export', [OrderController::class, 'exportOrder'])->name('order.export');
        Route::get('{order}/export-text', [OrderController::class, 'exportOrderText'])->name('order.export-text');
    });

    Route::prefix('import')->name('import.')->group(function () {
        Route::get('caisson', [ImportController::class, 'caisson'])->name('caisson');
        Route::post('caisson/store', [ImportController::class, 'caisson_store'])->name('caisson.store');

        Route::get('laca', [ImportController::class, 'laca'])->name('laca');
        Route::post('laca/store', [ImportController::class, 'laca_store'])->name('laca.store');
    });

    Route::get('import', fn() => view('export-clients'))->name('import');
});

Route::get('login', fn() => redirect('https://intercocina.com'))->name('login');
