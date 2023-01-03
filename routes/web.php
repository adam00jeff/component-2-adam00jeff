<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
/*
 * Product management, views protected for creation and editing
 */
Route::get('/', [\App\Http\Controllers\ProductController::class, 'index'])->name('home');
Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index'])->name('index');
Route::get('/product-added', [\App\Http\Controllers\ProductController::class, 'index'])->name('product-added');
Route::get('/products/create', [\App\Http\Controllers\ProductController::class, 'create'])->middleware('auth', 'checkrole:admin')->name('create');
Route::get('/products/{product}', [\App\Http\Controllers\ProductController::class, 'show'])->name('show');
Route::get('/filter', [\App\Http\Controllers\ProductController::class, 'filter'])->name('filter');
Route::get('/search', [\App\Http\Controllers\ProductController::class, 'search'])->name('search');
Route::post('/products', [\App\Http\Controllers\ProductController::class, 'store'])->middleware('auth', 'checkrole:admin')->name('store');
Route::get('/products/{product}/edit', [\App\Http\Controllers\ProductController::class, 'edit'])->middleware('auth', 'checkrole:admin')->name('edit');
Route::put('/products/{product}', [\App\Http\Controllers\ProductController::class, 'update'])->middleware('auth', 'checkrole:admin')->name('update');
Route::delete('/products/{product}', [\App\Http\Controllers\ProductController::class, 'destroy'])->middleware('auth', 'checkrole:admin')->name('destroy');
/*
 * User management, views all protected, users created by register view
 */
Route::delete('/users/{user}', [\App\Http\Controllers\ProductController::class, 'destroyuser'])->middleware('auth', 'checkrole:admin')->name('destroyuser');
Route::get('/users', [\App\Http\Controllers\ProductController::class, 'users'])->middleware('auth', 'checkrole:admin')->name('users');
/*
 * Cart management, all protected as group by logged-in user check
 */
Route::group(['middleware' => 'auth'], function () {
    Route::get('cart', [\App\Http\Controllers\ProductController::class, 'cart'])->name('cart');
    Route::get('add-to-cart/{id}', [\App\Http\Controllers\ProductController::class, 'addToCart'])->name('add.to.cart');
    Route::get('/clearcart', [\App\Http\Controllers\ProductController::class, 'clearcart'])->name('clear.cart');
    Route::get('clear-item/{id}', [\App\Http\Controllers\ProductController::class, 'clearitem'])->name('clear.item');
});

require __DIR__ . '/auth.php';

