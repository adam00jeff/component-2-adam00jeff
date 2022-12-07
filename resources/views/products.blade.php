<x-app-layout>
{{--

    <x-slot name="header">
        <h2 class ="font-semibold text-xl text-gray-800 leading-tight">
            Full list of products</h2>
    </x-slot>
--}}

        <div class="productlist p-2">
    @foreach($products as $product)
            <x-product-card :product=$product" />
    @endforeach
        </div>

</x-app-layout>

{{--    <table>--}}
{{--        <tr>--}}
{{--            <th>Name</th>--}}
{{--            <th>Title</th>--}}
{{--            <th>Price</th>--}}
{{--        </tr>--}}
{{--        @foreach ($products as $product)--}}
{{--            <tr>--}}
{{--                <td>{{$product['artist']}}</td>--}}
{{--                <td>{{$product['title']}}</td>--}}
{{--                <td>{{$product['price']/100}}</td>--}}
{{--                <td> <button value="{{$product['id']}}" class="select-product">Select</button></td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--    </table>--}}

