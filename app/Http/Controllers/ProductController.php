<?php

namespace App\Http\Controllers;

use App\Models\Product;
use http\QueryString;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\ProductType;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Displays products from the database
     * can apply varying filters via route name
     * if multiple results are displayed the results are paginated
     *
     * @return Application|Factory|View 'products'
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

    /**
     * Displays all the users in the Db
     * paginates the results
     *
     * @return Application|Factory|View 'users'
     */
    public function users()
    {
        $users = User::paginate(20);
        return view('user-form', ['users' => $users]);
    }

    /**
     * Displays the shopping cart view
     * @return Application|Factory|View 'cart'
     */
    public function cart()
    {
        return view('cart');
    }

    /**
     * Removes an item from the cart session:
     * Sets the current session to $cart
     * checks if the requested item is in the cart
     * removes if it is found
     * puts $cart as the current session
     * @param Request $request the item to be removed
     * @return \Illuminate\Http\RedirectResponse|void redirects back with feedback
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
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

    /**
     * Clears the current cart
     * forgets the related session
     * @return \Illuminate\Http\RedirectResponse redirects back with feedback
     */
    public function clearcart()
    {

        session()->forget('cart');
        return redirect()->back()->with('success', 'Your Cart was emptied successfully!');
    }

    /**
     * Adds the current item to the cart session:
     * creates the session if it does not exist
     * finds the item by the id
     * if the cart already has the item, it increases the count
     * if it does not it adds the item to the session array
     *
     * @param $id product to be added
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
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

    /**
     * Sorts the products in the table by their product type
     * @param Request $request the requested product type
     * @return Application|Factory|View
     */
    public function filter(Request $request)
    {
        if (Route::currentRouteName() == "filter" && $request->producttype == 0) $products = Product::all()->sortBy('artist');
        else $products = ProductType::find($request->producttype)->product;
        return view('products-filter', ['products' => $products]);
    }

    /**
     * Searches the Product table for matches from $request
     *
     * @param Request $request the search query
     * @return Application|Factory|View returns the product view with results
     */
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

    /**Displays the form to create a product, populates the drop-down to select product type
     * @return Application|Factory|View
     */
    public function create()
    {
        $producttypes = ProductType::all()->sortBy('type');
        return view('product-form', ['producttypes' => $producttypes]);
    }

    /**
     * Saves a new product to the database
     * @param Request $request the new product to be stored
     * @return \Illuminate\Http\RedirectResponse redirects back to the product-added view
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

    /**
     * removes the specified user from the table
     * @param User $user the user to be removed
     * @return \Illuminate\Http\JsonResponse reports back the successful removal
     */
    public function destroyuser(User $user)
    {
        $user->delete();
        return response()->json(["msg" => "success"]);

    }
}
