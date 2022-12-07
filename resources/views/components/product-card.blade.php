<div class ="bg-blue p-2 rounded-lg shadow-lg">
        <h3 class = "text-blue-700 mb-4 text-lg font-bold">{{$product['artist']}}</h3>
    <h3 class="bg-green-200 text-yellow text-sm py-2 px-2">{{$product->productType['type']}}</h3>


<h3 class = "font-bold mb-2 text-gray-800">{{ $product['title'] }}</h3>
        <div class = "flex justify-between">
            <p class = "text-gray-700">£{{$product['price']/100}}</p>
            @if(Route::currentRouteName()=='home')
                <button value="{{$product['id']}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full select-product">Select</button>
            @else
                <button value="{{$product['id']}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full select-product">Buy</button>
            @endif
        </div>
    </div>

