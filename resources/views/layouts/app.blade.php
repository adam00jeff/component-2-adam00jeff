<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/my.js') }}"></script>
</head>
<body>
<div class="min-h-screen bg-gray-100">

    <!-- Page Heading -->
    <header class="flex justify-between border-bottom-double border-8 bg-white shadow">
        <!-- app logo -->
        <div class="flex flex-col items-start border-2 rounded-lg m-5">
            <a href="{{route('home')}}"><img src="{{asset('images/om.jpg')}}" alt="logo" class="m-5"></a>
            <h2 class="font-bold text-lg self-center"> Component 2</h2>

        </div>
        <!--    login/logout dropdown & register/login link-->
        <div class="p-4">
            <!-- checks for a logged-in user shows login/register if not-->
            @auth
                <div class="hidden border-2  sm:flex sm:items-center sm:ml-6 m-5">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex text-2xl items-center rounded-sm shadow-2xl p-2 font-bold bg-yellow-300 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->name }}</div>

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

                        <x-slot name="content">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                                 class="text-medium font-extrabold hover:bg-yellow-300">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @else
                <!-- shown when no user is logged in-->
                <a href="{{ route('login') }}"
                   class="flex-rows rounded-xl m-1 shadow-2xl rounded-sm bg-yellow-300 border-blue-300 p-3 font-semibold text-gray-600 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="flex-rows rounded-xl m-1 shadow-2xl rounded-sm bg-yellow-300 border-blue-300 p-3 font-semibold text-gray-600 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">Register</a>
                @endif
            @endif
        </div>

    </header>
    <!-- includes the menu bar -->
    @include('layouts.menu')
    <!-- sub-page header, if required-->
    <page-header class="flex justify-center font-bold text-lg self-center p-3">
        {{$header ?? ''}}
    </page-header>
    <!-- Page Content -->
    <main class="justify-center mx-auto border-bottom-double border-2 self-center p-3">
        <!-- Reports back Session info when required at top of section-->
        @if(session('success'))
            <div class="flex justify-center font-bold text-lg self-center p-3 alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        {{$slot ?? ''}}


    </main>


</div>
</body>
</html>
