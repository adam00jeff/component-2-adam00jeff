<?php

namespace App\Http\Controllers;

use App\Models\Product;
use http\QueryString;
use Illuminate\Http\Request;

/*use Illuminate\Routing\Route;*/
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\ProductType;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $producttypes = ProductType::all()->sortBy('type');

        if (Route::currentRouteName() == "home") $products = Product::limit(5)->get();
        elseif (Route::currentRouteName() == "product-added") $products = Product::limit(1)->latest('created_at')->get();
        else $products = Product::paginate(15);
        return view('products', ['products' => $products,
            'producttypes' => $producttypes]);

    }
    public function users()
    {
        $users = User::paginate(20);
        return view('user-form', ['users' => $users]);
    }
    public function cart()
    {
        return view('cart');
    }

    public function clearitem(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Product removed successfully');
        }
    }

    public function clearcart()
    {

        session()->forget('cart');
        return redirect()->back()->with('success', 'Your Cart was emptied successfully!');
    }


    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "artist" => $product->artist,
                "quantity" => 1,
                "title" => $product->title,
                "price" => $product->price,
                "imagename" => $product->imagename
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function filter(Request $request)
    {
        if (Route::currentRouteName() == "filter" && $request->producttype == 0) $products = Product::all()->sortBy('artist');
        else $products = ProductType::find($request->producttype)->product;
        return view('products-filter', ['products' => $products]);
    }

    public function search(Request $request)
    {

        //get the search value from the request
        $producttypes = ProductType::all()->sortBy('type');
        $search = $request->input('search');

        //search in the products table for matches
        $products = Product::query()->where('artist', 'LIKE', "%" . $search . "%")
            ->orWhere('title', 'LIKE', "%" . $search . "%")
            ->orWhere('price', 'LIKE', "%" . $search . "%")
            ->get();

        return view('products', ['products' => $products,
            'producttypes' => $producttypes]);
    }

    public function create()
    {
        $producttypes = ProductType::all()->sortBy('type');
        return view('product-form', ['producttypes' => $producttypes]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'artist' => 'required|max:255',
            'price' => 'required|numeric',
            'producttype' => 'required|Integer',
        ]);

        $product = new Product;

        $product->artist = $request->artist;
        $product->title = $request->title;
        $product->price = $request->price * 100;
        $product->product_type_id = $request->producttype;
        if ($request->file('file') != null) {
            $imagename = $request->file('file')->store('public/images');
            $product->imagename = str_replace("public/images/", "", $imagename);
        }

        $product->save();

        return Redirect::route('product-added');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        return view('product', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $producttypes = ProductType::all()->sortBy('type');
        return view('products-edit', ['product' => $product, 'producttypes' => $producttypes]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'artist' => 'required|max:255',
            'price' => 'required|numeric',
            'producttype' => 'required|Integer',
        ]);


        $product->artist = $request->artist;
        $product->title = $request->title;
        $product->price = $request->price * 100;
        $product->product_type_id = $request->producttype;

        $product->save();

        return Redirect::route('index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(["msg" => "success"]);

    }
    public function destroyuser(User $user)
    {
        $user->delete();
        return response()->json(["msg" => "success"]);

    }
}
