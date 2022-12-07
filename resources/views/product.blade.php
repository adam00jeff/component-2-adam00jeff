<x-app-layout>

<x-slot>
{{--    <h2>Product {{$product['id']}}</h2>--}}
{{--    <table>--}}
{{--        <tr>--}}
{{--            <th>Artist</th>--}}
{{--            <th>Title</th>--}}
{{--            <th>Price</th>--}}
{{--        </tr>--}}
{{--            <tr>--}}
{{--                <td>{{$product['artist']}}</td>--}}
{{--                <td>{{$product['title']}}</td>--}}
{{--                <td>{{$product['price']/100}}</td>--}}
@include('product-template',['product'=>$product])
</x-slot>
{{--            </tr>--}}
{{--    </table>--}}


</x-app-layout>
