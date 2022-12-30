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
{{--            <?php ddd(session('cart')); ?>--}}
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <tr data-id="{{ $id }}">
                        <td data-th="Product">
                            <div class="row">
                                {{--<div class="col-sm-3 hidden-xs"><img src="{{ $details['imagename'] }}" width="100" height="100" class="img-responsive"/></div>--}}
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['title'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">${{ $details['price'] }}</td>
                        <td data-th="Quantity">

                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                        </td>
                        <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                        <td class="actions" data-th="">

                            <button value="{{ $details['quantity'] }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full update-cart">Edit</button>

                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
            <tfoot>
            <tr>
                <td colspan="5" class="text-right"><h3><strong>Total ${{ $total }}</strong></h3></td>
            </tr>
            <tr>
                <td colspan="5" class="text-right">
                    <a href="{{ url('/') }}" class="btn btn-warning bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                    <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full clear-cart">Clear Cart</button>

                    <button class="btn btn-success bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Checkout</button>
                </td>
            </tr>
            </tfoot>
        </table>


        </script>
</x-app-layout>
