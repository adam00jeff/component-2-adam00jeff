<x-app-layout>
    <!--Checks there is a session active for the cart -->
    @if(session('cart'))
        <div class="grid justify-items-center">
            <!--Cart table setup -->
            <table id="cart" class="table table-hover table-condensed table-auto">
                <thead>
                <tr class="bg-yellow-300 border-2">
                    <th style="width:40%">Product</th>
                    <th style="width:8%" class="text-center">Price</th>
                    <th style="width:8%" class="text-center">Quantity</th>
                    <th style="width:20%" class="text-center">Subtotal</th>
                    <th style="width:10%"></th>
                </tr>
                </thead>
                <tbody>
                <!--Calculations for cart values -->
                @php $total = 0 @endphp
                @foreach(session('cart') as $id => $product)
                    @php $total += $product['price'] * $product['quantity'] @endphp
                    @php $prodid = $product['id']; @endphp
                    <tr data-id="{{ $id }}">
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $product['title'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price" class="text-center">
                            £{{ number_format($product['price']/100,2, '.', '.') }}</td>
                        <td data-th="Quantity" class="text-center">{{ $product['quantity'] }}
                        </td>
                        <td data-th="Subtotal" class="text-center">
                            £{{ number_format($product['price'] * $product['quantity']/100,2, '.', '.') }}</td>
                        <td class="actions" data-th="">
                            <a href="{{ route('clear.item', $product['id'])}}"
                               class="btn btn-warning btn-block text-center bg-blue-500 hover:bg-red-500 text-white font-bold  px-4 rounded-full "
                               role="button">Remove Items</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="5" class="text-right"><h3><strong>Total
                                £{{  number_format($total/100,2, '.', '.') }}</strong></h3></td>
                </tr>
                <tr>
                    <td colspan="5" class="text-right">
                        <a href="{{ url('/') }}"
                           class="btn btn-warning bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"></i>
                            Continue Shopping</a>
                        <a href="{{ route('clear.cart')}}"
                           class="btn btn-warning btn-block text-center bg-blue-500 hover:bg-red-500 text-white font-bold py-2 px-4 rounded-full "
                           role="button">Clear Cart</a>
                        <button
                            class="btn btn-success bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                            Checkout
                        </button>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    @else
        <!--Show if session(cart) is not set -->
        <div class="flex justify-center font-bold text-lg self-center p-3">
            <p>Your Cart is Empty</p>
        </div>
    @endif
</x-app-layout>
