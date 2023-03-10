<!--Main Navigation Menu -->
<!--Home Button -->
<nav class="flex justify-center">
    <div class="flex rounded-xl m-5 shadow-2xl rounded-sm bg-yellow-300 border-blue-300">
        <a href="{{route('home')}}"
           class=" p-5 font-semibold text-gray-600 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
            Home
        </a>
    </div>
    <!--Products Button -->
    <div class="flex rounded-xl m-5 shadow-2xl rounded-sm bg-yellow-300 border-blue-300">
        <a href="{{route('index')}}"
           class="p-5 font-semibold text-gray-600 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
            Products
        </a>
    </div>
    <!--Add Product Button, protected by is-admin -->
    @can('edit-product')
        <div class="flex rounded-xl m-5 shadow-2xl rounded-sm bg-yellow-300 border-blue-300">
            <a href="{{route('create')}}"
               class="p-5 font-semibold text-gray-600 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                Add Product
            </a>
        </div>
    @endcan
    <!--Edit Users Button, protected by is-admin -->
    @can('edit-users')
        <div class="flex rounded-xl m-5 shadow-2xl rounded-sm bg-yellow-300 border-blue-300">
            <a href="{{route('users')}}"
               class="p-5 font-semibold text-gray-600 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                Manage Users
            </a>
        </div>
    @endcan
    <!--Search Bar -->
    <div class="flex rounded-xl m-5 shadow-2xl rounded-sm bg-yellow-300 border-blue-300">
        <form action="{{ route('search') }}" method="GET">
            <input type="text" name="search" required
                   class="font-semibold p-1 mt-4 m-2 text-gray-600 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out"/>
            <button type="submit"
                    class="font-semibold p-1 mt-4 m-2 text-gray-600 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                Search
            </button>
        </form>
    </div>
    <!-- Shopping Cart Dropdown, protected by logged-in user, checks for cart session being set -->
    @if(session('cart'))
        @auth
            <!--Displays the main dropdown -->
            <div class="flex rounded-xl m-5 shadow-2xl rounded-sm bg-yellow-300 border-blue-300">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex text-xl items-center shadow-2xl p-3 font-semibold text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            Cart Items: <span class="badge badge-pill badge-danger p-1">{{ count((array) session('cart')) }}</span>
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
                    <!--The content within the dropdown -->
                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link>
                                <div class="dropdown-menu">
                                    <div class="row total-header-section">
                                        <div class="col-lg-6 col-sm-6 col-6">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span
                                                class="badge badge-pill badge-danger">Your Cart</span>
                                        </div>
                                        @php $total = 0 @endphp
                                        @foreach((array) session('cart') as $id => $product)
                                            @php $total += $product['price'] * $product['quantity'] @endphp
                                        @endforeach
                                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                            <p>Total: <span
                                                    class="text-info">?? {{ number_format($total/100,2, '.', '.') }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    @if(session('cart'))
                                        @foreach(session('cart') as $id => $product)
                                            <div class="row cart-detail">
                                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                    <p>{{ $product['title'] }}</p>
                                                    <span
                                                        class="price text-info"> ??{{ number_format($product['price']/100,2, '.', '.') }}</span>
                                                    <span class="count"> Quantity:{{ $product['quantity'] }}</span>
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
        @endif
    @endif
</nav>
