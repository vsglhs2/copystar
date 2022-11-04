<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', App\Http\Controllers\Catalog\IndexController::class);
Route::get('/catalog', App\Http\Controllers\Catalog\IndexController::class)->name('catalog.index');
Route::get('/catalog/{product}', App\Http\Controllers\Catalog\ShowController::class)->name('catalog.show');

Route::get('/about', App\Http\Controllers\AboutController::class)->name('about');
Route::get('/location', App\Http\Controllers\LocationController::class)->name('location');

Route::prefix('admin')->group(function() {
    Route::middleware('admin')->group(function () {
        Route::get('/', App\Http\Controllers\Admin\Product\IndexController::class);
        Route::get('/products', App\Http\Controllers\Admin\Product\IndexController::class)->name('admin.product.index');
        Route::get('/categories', App\Http\Controllers\Admin\Category\IndexController::class)->name('admin.category.index');
        Route::get('/orders', App\Http\Controllers\Admin\Order\IndexController::class)->name('admin.order.index');
    });
});

Route::middleware('user')->group(function() {
    Route::get('/basket', App\Http\Controllers\Basket\IndexController::class)->name('basket.index');
    Route::patch('/basket/update', App\Http\Controllers\Basket\UpdateController::class)->name('basket.update');
    Route::delete('/orders', App\Http\Controllers\Order\DestroyController::class)->name('order.destroy');
    Route::get('/orders', App\Http\Controllers\Order\IndexController::class)->name('order.index');
    Route::patch('/orders/update', App\Http\Controllers\Order\UpdateController::class)->name('order.update');
    Route::get('/orders/{order}', App\Http\Controllers\Order\ShowController::class)->name('order.show');
});


