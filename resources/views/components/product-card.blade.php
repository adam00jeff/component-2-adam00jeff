<!--Background card colour -->
@if(Route::currentRouteName()=='index')
    <div id="productlist" class="container mx-auto p-2 bg-blue-100">
@else
    <div id="productlist" class="container mx-auto p-8 max-w-xl bg-green-100">
@endif
<!-- Card colour, per item type -->
@if($product->productType['id']==1)
    <div class ="bg-green-600 p-1 rounded-lg shadow-lg">
@elseif($product->productType['id']==2)
    <div class ="bg-purple-300 p-1 rounded-lg shadow-lg">
@elseif($product->productType['id']==3)
    <div class ="bg-yellow-200 p-1 rounded-lg shadow-lg">
@endif
        <!-- product card -->
            <h3 class = "text-blue-700 mb-4 text-lg font-bold">{{$product['artist']}}</h3>
            <h3 class = "font-bold mb-2 text-gray-800">{{ $product['title'] }}</h3>
        <img src="{{asset('storage/images/'.$product->imagename)}}" alt="product"   class = "m-5 w-20 max-w-xs">
            <h3 class="text-yellow text-sm py-2 px-2">{{$product->productType['type']}}</h3>
            <div class = "flex justify-between">
                <p class = "text-gray-700">£{{$product['price']/100}}</p>
                @if(Route::currentRouteName()=='index')
                    <button value="{{$product['id']}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full select-product">Select</button>
                @elseif(Route::currentRouteName()=='show')
                        @can('purchase-product')
                            <button value="{{$product['id']}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full select-product">Select</button>
                        @endcan
                        @can('edit-product')

                            <button value="{{$product['id']}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full update-product">Edit</button>

                        @endcan
                    @endif
            </div>
        <!-- ifs to avoid errors of unclosed divs being reported -->
@if($product->productType['id']==1)
    </div>
@elseif($product->productType['id']==2)
    </div>
@elseif($product->productType['id']==3)
    </div>
@endif
@if(Route::currentRouteName()=='index')
    </div>
@else
    </div>
@endif

