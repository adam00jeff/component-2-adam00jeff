@extends('layouts.app')

@section('content')
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


{{--            </tr>--}}
{{--    </table>--}}
@include('product-template',['product'=>$product])

@endsection
