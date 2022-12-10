<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
/*use Illuminate\Routing\Route;*/
use Illuminate\Support\Facades\Route;
use App\Models\ProductType;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producttypes = ProductType::all()->sortBy('type');

        if(Route::currentRouteName()=="home") $products=Product::limit(5)->get();
        elseif(Route::currentRouteName()=="product-added") $products=Product::limit(5)->get();
        else $products = Product::all()->sortBy('artist');
        return view('products',['products'=>$products,
            'producttypes'=>$producttypes]);

    }
    public function search(Request $request)
    {
        if($request->producttype==0) $products = Product::all()->sortBy('artist');
        else $products = ProductType::find($request->producttype)->product;
        return view('products-filter',['products'=>$products]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producttypes = ProductType::all()->sortBy('type');
        return view('product-form', ['producttypes'=>$producttypes]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'artist' => 'required|max:255',
            'price' => 'required|numeric',
            'producttype' => 'required|Integer',
        ]);

        $product = new Product;

        $product->artist=$request->artist;
        $product->title=$request->title;
        $product->price=$request->price*100;
        $product->product_type_id=$request->producttype;

        $product->save();

        return Redirect::route('product-added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        return view('product', ['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
