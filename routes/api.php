<?php

use App\Http\Controllers\Api\AutoAuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('auto-login', [AutoAuthController::class, 'index']);

// Product
Route::get('products', [ProductController::class, 'index']);
Route::get('products/{id}', [ProductController::class, 'show']);


// Cart
Route::middleware(['auth'])->post('add-cart', [CartController::class, 'addToCart']);
Route::delete('remove/{id}', [CartController::class, 'removeCartItem']);
Route::put('update/{id}', [CartController::class, 'updateCartItem']);
Route::delete('clear-cart', [CartController::class, 'clearCart']);
Route::get('view/{id}', [CartController::class, 'viewCart']);