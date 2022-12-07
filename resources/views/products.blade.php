<x-app-layout>


    <x-slot name="header">
        <h2 class ="font-semibold text-xl text-gray-800 leading-tight">
            Full list of products</h2>

    </x-slot>
    <div class="productlist p-2 grid grid-cols-5">
    @foreach($products as $product)
            <x-product-card :product="$product" />
    @endforeach
        </div>

</x-app-layout>



