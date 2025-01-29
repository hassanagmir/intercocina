<?php



use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::post('orders/confirm', [OrderController::class, 'confirm']);
