<x-app-layout>
    @if(Route::currentRouteName()=='index')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <label for="producttype" class="m-4">Product Type:</label>
            <select id="producttype" name="producttype" class="select-box">
                <option value="0">All</option>
                @foreach($producttypes as $producttype)
                    <option value="{{$producttype['id']}}">{{$producttype['type']}}</option>
                @endforeach
            </select>
        </h2>
    @elseif(Route::currentRouteName()=='home')
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight max-w-xl">
                Sample Products
            </h2>
        </x-slot>
    @elseif(Route::currentRouteName()=='product-added')
        <x-slot name="header">
            <h2 class="justify-center font-semibold text-xl text-gray-800 leading-tight max-w-xl">
                Product Added
            </h2>
        </x-slot>
    @elseif(Route::currentRouteName()=='search')
        @if($products->isNotEmpty())
            <x-slot name="header">
                <h2 class="justify-center font-semibold text-xl text-gray-800 leading-tight max-w-xl">
                    Search Results
                </h2>
            </x-slot>
        @else
            <div class="flex justify-center">
                <h2 class="justify-center font-semibold text-xl text-gray-800 leading-tight max-w-xl">
                    Sorry No Matching Products Found</h2>
            </div>
        @endif
    @endif
    @if(Route::currentRouteName()=='product-added')
        <div id="productlist" class="block p-2 m-2 rounded-lg shadow-lg bg-gray-50 border-2 border-blue-900 max-w-xl">
            @else
                <div id="productlist" class="p-2 grid grid-cols-5">
                    @endif
                    @foreach($products as $product)
                        <x-product-card :product="$product"/>
                    @endforeach
                </div>
                @if(Route::currentRouteName()=='index')
                    <div id="pagination">
                        {{ $products->links() }}
                    </div>
    @endif
</x-app-layout>




