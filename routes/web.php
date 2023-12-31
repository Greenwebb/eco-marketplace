<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware(['web'])->group(function () {
    Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
    Route::resource('product', ProductController::class);
    Route::resource('checkout', CheckoutController::class);
    
    Auth::routes(['register' => false]);
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

