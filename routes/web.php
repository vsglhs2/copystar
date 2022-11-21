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
        Route::get('/products/create', App\Http\Controllers\Admin\Product\CreateController::class)->name('admin.product.create');        
        Route::get('/products/{product}', App\Http\Controllers\Admin\Product\ShowController::class)->name('admin.product.show');
        Route::post('/products', App\Http\Controllers\Admin\Product\StoreController::class)->name('admin.product.store');
        Route::get('/products/{product}/edit', App\Http\Controllers\Admin\Product\EditController::class)->name('admin.product.edit');
        Route::patch('/products/{product}', App\Http\Controllers\Admin\Product\UpdateController::class)->name('admin.product.update');
        Route::delete('/products/{product}', App\Http\Controllers\Admin\Product\DestroyController::class)->name('admin.product.destroy');
        Route::get('/categories', App\Http\Controllers\Admin\Category\IndexController::class)->name('admin.category.index');
        Route::delete('/categories/{category}', App\Http\Controllers\Admin\Category\DestroyController::class)->name('admin.category.destroy');
        Route::post('/categories', App\Http\Controllers\Admin\Category\StoreController::class)->name('admin.category.store');
        Route::get('/orders', App\Http\Controllers\Admin\Order\IndexController::class)->name('admin.order.index');
        Route::patch('/orders/accept', App\Http\Controllers\Admin\Order\AcceptController::class)->name('admin.order.accept');
        Route::patch('/orders/deny', App\Http\Controllers\Admin\Order\DenyController::class)->name('admin.order.deny');
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


