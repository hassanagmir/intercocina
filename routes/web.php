<?php
use App\Http\Controllers\ImportController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductExportController;
use Illuminate\Support\Facades\Route;

Route::get('products/export', [ProductController::class, 'exportProducts']);


Route::prefix('order')->group(function () {
    Route::get('{order}/export', [OrderController::class, 'exportOrder'])->name('order.export');
    Route::get('{order}/export-text', [OrderController::class, 'exportOrderText'])->name('order.export-text');
});


Route::get('laca/import', function(){
    return view('import.laca');
})->name('laca_import');

Route::post('json', [ProductExportController::class, 'export'])->name('json');


Route::prefix('import')->group(function(){
    Route::get('caisson', [ImportController::class, 'caisson'])->name('import.caisson');
    Route::post('caisson/store', [ImportController::class, 'caisson_store'])->name('import.caisson.store');

    Route::get('laca', [ImportController::class, 'laca'])->name('import.laca');
    Route::post('laca/store', [ImportController::class, 'laca_store'])->name('import.laca.store');
});




Route::get('import', function () {
    return view('export-clients');
})->name('import');


Route::get('/', function () {
    return redirect('https://intercocina.com');
})->name('home');