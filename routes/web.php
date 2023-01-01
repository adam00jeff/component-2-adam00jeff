<?php
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;

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
/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('cart', [\App\Http\Controllers\ProductController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [\App\Http\Controllers\ProductController::class, 'addToCart'])->name('add.to.cart');
Route::get('/clearcart', [\App\Http\Controllers\ProductController::class, 'clearcart'])->name('clear.cart');
Route::get('clear-item/{id}', [\App\Http\Controllers\ProductController::class, 'clearitem'])->name('clear.item');

Route::get('/', [\App\Http\Controllers\ProductController::class, 'index'])->name('home');
Route::get('/products', [\App\Http\Controllers\ProductController::class,'index'])->name('index');
Route::get('/product-added', [\App\Http\Controllers\ProductController::class,'index'])->name('product-added');

Route::get('/products/create', [\App\Http\Controllers\ProductController::class, 'create'])->middleware('auth','checkrole:admin')->name('create');

Route::get('/products/{product}',[\App\Http\Controllers\ProductController::class,'show'])->name('show');

Route::post('/products',[\App\Http\Controllers\ProductController::class,'store'])->name('store');

Route::get('/filter', [\App\Http\Controllers\ProductController::class, 'filter'])->name('filter');

Route::get('/search', [\App\Http\Controllers\ProductController::class, 'search'])->name('search');

Route::get('/products/{product}/edit', [\App\Http\Controllers\ProductController::class, 'edit'])->middleware('auth','checkrole:admin')->name('edit');

Route::put('/products/{product}', [\App\Http\Controllers\ProductController::class, 'update'])->name('update');

Route::delete('/products/{product}', [\App\Http\Controllers\ProductController::class, 'destroy'])->middleware('auth','checkrole:admin')->name('destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::any('/search',function(){
//     $q = Request::input ( 'q' );
//     $product = Product::where('artist','LIKE','%'.$q.'%')->orWhere('title','LIKE','%'.$q.'%')->get();
//     if(count($product) > 0)
//         return view('product-search')->withDetails($product)->withQuery ( $q );
//     else
//     return view ('product-search')->withMessage('No Details found. Try to search again !');
// });


