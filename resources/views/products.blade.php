<x-app-layout>


    <x-slot name="header">
        <h2 class ="font-semibold text-xl text-gray-800 leading-tight">
            Full list of products</h2>
    </x-slot>
{{--    @if(Route::currentRouteName()=='index')
        <div class="flex justify-end mr-4">
            <label for="producttype" class="m-4">Product Type:</label>
            <select id="producttype" name="producttype" class="select-box">
                <option value="0">All</option>
                @foreach($producttypes as $producttype)
                    <option value="{{$producttype['id']}}">{{$producttype['type']}}</option>
                @endforeach
            </select>
        </div>
    @endif--}}


    <div class="productlist p-2 grid grid-cols-4">
    @foreach($products as $product)
            <x-product-card :product="$product" />
    @endforeach
        </div>

</x-app-layout>



