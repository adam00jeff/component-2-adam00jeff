<?php

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
/*
Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [\App\Http\Controllers\ProductController::class, 'index'])->name('home');
Route::get('/products', [\App\Http\Controllers\ProductController::class,'index'])->name('index');
Route::get('/product-added', [\App\Http\Controllers\ProductController::class,'index'])->name('product-added');

Route::get('products/create', [\App\Http\Controllers\ProductController::class,'create'])->name('create');

Route::get('/products/{product}',[\App\Http\Controllers\ProductController::class,'show'])->name('show');

Route::post('/products',[\App\Http\Controllers\ProductController::class,'store'])->name('store');

Route::get('/search', [\App\Http\Controllers\ProductController::class, 'search'])->name('search');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//Route::get('product/{id}', function ($id) {
//    $product = getProduct($id);
//    return view('product', ['product'=>$product]);
//});

//function getProduct($id){
//    if($id==1) return array("id"=>1,"name"=>"The Jam","price"=>5.99);
//    if($id==2) return array("id"=>2,"name"=>"Amy Winehouse","price"=>0.99);
//}

//function getProducts() {
//    $products = [];
//    $products[] = array("id"=>1,"name"=>"The Jam","price"=>5.99);
//    $products[] = array("id"=>2,"name"=>"Amy Winehouse","price"=>0.99);
//    return $products;
//}

