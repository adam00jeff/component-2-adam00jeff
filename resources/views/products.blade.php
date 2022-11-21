@extends('layouts.app')

@section('content')
    <h2>Full list of products</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Price</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{$product['artist']}}</td>
                <td>{{$product['title']}}</td>
                <td>{{$product['price']}}</td>
                <td> <button value="{{$product['id']}}" class="select-product">Select</button></td>
            </tr>
        @endforeach
    </table>

@endsection
