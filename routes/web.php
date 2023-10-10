<?php

use App\Http\Controllers\CartController;
use App\Models\Product;
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

Route::get('/', function () {
    $products = Product::all();
    return view('welcome', compact('products'));
});

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'store'])->name('cart.store');
Route::put('/cart/update/{itemId}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{itemId}', [CartController::class, 'destroy'])->name('cart.remove');
