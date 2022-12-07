<x-app-layout>
    <x-slot name="header">
        <h2 class ="font-semibold text-xl text-gray-800 leading-tight">
            Product</h2>
    </x-slot>

<x-product-card :product="$product" />

</x-app-layout>
