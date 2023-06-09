<?php

use App\Http\Controllers\ProductContoller;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductContoller::class, 'product_list'])->name('products');

Route::post('/products/cart/add', [CartController::class, 'add_cart'])->name('add_cart');

Route::get('/products/cart/view', [CartController::class, 'view_cart'])->name('view_cart');

Route::post('/products/cart/update', [CartController::class, 'update_cart'])->name('update-cart');

Route::get('/products/cart/{id}/remove', [CartController::class, 'remove_item'])->name('remove-item');

Route::get('/products/cart/clear', [CartController::class, 'clear_item'])->name('clear-item');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
