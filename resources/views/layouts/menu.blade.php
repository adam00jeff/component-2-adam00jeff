<nav class = "flex justify-center">
    <div class = "flex rounded-xl m-5 shadow-2xl rounded-sm bg-yellow-300 border-blue-300">
        <a href="{{route('home')}}" class=" p-5 font-semibold text-gray-600 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
        Home
        </a>
    </div>
    <div class = "flex rounded-xl m-5 shadow-2xl rounded-sm bg-yellow-300 border-blue-300">
        <a href="{{route('index')}}" class="p-5 font-semibold text-gray-600 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
            Products
        </a>
    </div>


    @can('edit-product')
    <div class = "flex rounded-xl m-5 shadow-2xl rounded-sm bg-yellow-300 border-blue-300">
        <a href="{{route('create')}}" class="p-5 font-semibold text-gray-600 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
            Add Product
        </a>
    </div>

    @endcan

    <div class = "flex rounded-xl m-5 shadow-2xl rounded-sm bg-yellow-300 border-blue-300">
        <form action="{{ route('search') }}" method="GET">
            <input type="text" name="search" required class="font-semibold p-1 mt-4 m-2 text-gray-600 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out"/>
            <button type="submit" class="font-semibold p-1 mt-4 m-2 text-gray-600 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">Search</button>
        </form>

</div>


    @auth
        <div class="hidden border-2  sm:flex sm:items-center sm:ml-6 m-5">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="flex text-2xl items-center rounded-sm shadow-2xl p-2 font-bold bg-yellow-300 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart Items: <span class="badge badge-pill badge-danger p-1">{{ count((array) session('cart')) }}</span>

                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </button>
                </x-slot>
                @if(session('cart'))
                <x-slot name="content">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf


                        <x-dropdown-link>
                            <div class="dropdown-menu">
                                <div class="row total-header-section">
                                    <div class="col-lg-6 col-sm-6 col-6">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">Your Cart</span>
                                    </div>
                                    @php $total = 0 @endphp
                                    @foreach((array) session('cart') as $id => $details)
                                        @php $total += $details['price'] * $details['quantity'] @endphp
                                    @endforeach
                                    <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                        <p>Total: <span class="text-info">$ {{ number_format($total/100,2, '.', '.') }}</span></p>
                                    </div>
                                </div>
                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        <div class="row cart-detail">
                                           <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                <p>{{ $details['title'] }}</p>
                                                <span class="price text-info"> ${{ number_format($details['price']/100,2, '.', '.') }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                        <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
                                    </div>
                                </div>
                            </div>
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    @else

    @endif
@endif

</nav>
