<x-app-layout>


    @if(Route::currentRouteName()=='index')

        <h2 class ="font-semibold text-xl text-gray-800 leading-tight">
                <label for="producttype" class="m-4">Product Type:</label>
                <select id="producttype" name="producttype" class="select-box">
                    <option value="0">All</option>
                    @foreach($producttypes as $producttype)
                        <option value="{{$producttype['id']}}">{{$producttype['type']}}</option>
                    @endforeach


                </select>

        </h2>
    @else
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Sample Products
        </h2>
    @endif
    <div id="productlist" class="p-2 grid grid-cols-5">
        @foreach($products as $product)
            <x-product-card :product="$product" />
        @endforeach
    </div>

</x-app-layout>



