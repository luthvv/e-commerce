<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{-- @yield('javascript')
    @yield('css') --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.slider').bxSlider();
        });
    </script>
</head>

<body>
    <header class="w-full bg-secondary flex items-center px-12 py-2">
        <div class="w-64 h-auto">
            <a class="hidden dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            <img class="w-full h-full logo" src="{{ asset('src/logo-horizontal.png') }}" alt="">
        </div>

        <div class="w-full relative">
            <i class="fa-solid bottom-4  left-3.5 text-lg text-info fa-magnifying-glass absolute"></i>
            <input type="text" placeholder="Search here..." class="px-12 py-2.5 form-control text-info w-full"
                name="search" required autocomplete="current-check">
        </div>

        <div class="pl-3 pr-6 relative cursor-pointer">
            <i class=" fa-solid fa-cart-shopping text-white text-2xl"></i>
            <div
                class="absolute inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-white bg-primary border-white rounded-full -top-3 right-3 dark:border-gray-900">
                20</div>
        </div>

        <div class="h-10 bg-white w-0.5 mr-5"></div>

        <div class="flex justify-center items-center gap-3">
            <button type="form"
                class="border border-2 border-brown rounded-md border-black btn btn-primary w-full text-primary bg-secondary font-bold px-6 py-1.5">Login</button>

            <button type="form" class="rounded-md  btn w-full font-bold px-3 py-1.5 hover-register">Register</button>

        </div>

    </header>
    <main class="py-7">
        @yield('content')
    </main>
</body>

@yield('css')

@yield('javascript')

<style>
    body {
        background: #FAFAFA;
        color: #282828;
    }

    .scroll::-webkit-scrollbar {
        display: none;
    }

    .logo {
        /* Safari 6.0 - 9.0 */
        filter: brightness(1000%);
    }

    .border-brown {
        border-color: #AC8B75 !important;
    }

    .hover-register:hover {
        background-color: #E3CAA5;
        color: #AC8B75;
        border: 2px #AC8B75 solid;
    }

    .hover-register {
        background-color: #AC8B75;
        color: white;
    }

    .shadow-items {
        filter: drop-shadow(0px 1px 5px rgba(0, 0, 0, 0.25));
    }
</style>

</html>
