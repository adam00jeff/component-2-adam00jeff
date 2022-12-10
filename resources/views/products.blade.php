<x-app-layout>

    <x-slot name="header">
        @if(Route::currentRouteName()=='index')
            <h2 class ="font-semibold text-xl text-gray-800 leading-tight">
                Full list of products</h2>
        @else
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Sample Products
            </h2>
        @endif
    </x-slot>

    <div class="productlist p-2 grid grid-cols-5">
        @foreach($products as $product)
            <x-product-card :product="$product" />
        @endforeach
    </div>

</x-app-layout>



