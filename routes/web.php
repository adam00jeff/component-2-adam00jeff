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

Route::get('/', function () {
    return view('welcome');
});

Route::get('product/{id}', function ($id) {
    $product = getProduct($id);
    return view('product', ['product'=>$product]);
});

Route::get('/products', [\App\Http\Controllers\ProductController::class,'index']);


function getProduct($id){
    if($id==1) return array("id"=>1,"name"=>"The Jam","price"=>5.99);
    if($id==2) return array("id"=>2,"name"=>"Amy Winehouse","price"=>0.99);
}

//function getProducts() {
//    $products = [];
//    $products[] = array("id"=>1,"name"=>"The Jam","price"=>5.99);
//    $products[] = array("id"=>2,"name"=>"Amy Winehouse","price"=>0.99);
//    return $products;
//}
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';*/
