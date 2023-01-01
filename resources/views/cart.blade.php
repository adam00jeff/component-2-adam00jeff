<x-app-layout>

        <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
            </thead>
            <tbody>
            @php $total = 0 @endphp
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
{{--         <?php ddd(session('cart')); ?>--}}
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    @php $prodid = $details['id']; @endphp
                    <tr data-id="{{ $id }}">
                        <td data-th="Product">
                            <div class="row">
                                {{--<div class="col-sm-3 hidden-xs"><img src="{{ $details['imagename'] }}" width="100" height="100" class="img-responsive"/></div>--}}
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['title'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">${{ number_format($details['price']/100,2, '.', '.') }}</td>
                        <td data-th="Quantity">
                            <input type="number" value="{{ $details['quantity'] }}" id="quantitybox" name="quantitybox" class="quantity-box" />
                        </td>
                        <td data-th="Subtotal" class="text-center">${{ number_format($details['price'] * $details['quantity']/100,2, '.', '.') }}</td>
                        <td class="actions" data-th="">
                            {{--{{ route('add.to.cart', $product->id) }}"--}}
                            <a href="{{ route('clear.item', $details['id'])}}" class="btn btn-warning btn-block text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full " role="button">Remove Item</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
            <tfoot>
            <tr>
                <td colspan="5" class="text-right"><h3><strong>Total ${{  number_format($total/100,2, '.', '.') }}</strong></h3></td>
            </tr>
            <tr>
                <td colspan="5" class="text-right">
                    <a href="{{ url('/') }}" class="btn btn-warning bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"></i> Continue Shopping</a>
                    <a href="{{ route('clear.cart')}}" class="btn btn-warning btn-block text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full " role="button">Clear Cart</a>
                    <button class="btn btn-success bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Checkout</button>
                </td>
            </tr>
            </tfoot>
        </table>

</x-app-layout>
