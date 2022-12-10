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
        <script src="{{ asset('js/my.js') }}"></script>
    </head>
    <body>
       <div class="min-h-screen bg-gray-100">

            <!-- Page Heading -->
            <header class="flex justify-between border-bottom-double border-8 bg-white shadow">
                <div class="flex flex-col items-start border-2 rounded-lg m-5">
                    <img src="{{asset('images/om.jpg')}}" alt="logo" class="m-5">
                    <h2 class = "font-bold text-lg self-center"> Component 2</h2>

                </div>
                <div class="border-1 m-2">
                    login/ account
                </div>

            </header>
           @include('layouts.menu')
           <div class="flex justify-center font-bold text-lg self-center"
           {{$header ?? ''}}
            </div>
            <!-- Page Content -->
            <main class="border-bottom-double border-2">
            {{$slot ?? ''}}



            </main>



    </body>
</html>
