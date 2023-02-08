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
    <header class="w-full bg-secondary flex items-center px-12 py-3">
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
    <div class="pt-7">
        <div class="px-[72px]">
            <div class="slider">
                <div class="h-[313px] w-full">
                    <img class="w-full h-full object-fit" src="{{ asset('src/banner1.jpg') }}" alt="">
                </div>
                <div class="h-[313px] w-full">
                    <img class="w-full h-full object-fit" src="{{ asset('src/banner1.jpg') }}" alt="">
                </div>
            </div>

            <div class="flex items-start justify-between mb-2">
                <div class="text-2xl mb-3 font-black text-[#282828]">Categories</div>
                <div class="flex items-center gap-2 cursor-pointer">
                    <div class="2xl text-primary text-xl font-bold">
                        <a href="{{ route('categories') }}">
                            See more</a>
                        </div>
                    <i class="fa-solid fa-angle-right text-primary"></i>
                </div>
            </div>

            <div class="flex justify-between items-center mb-12">
                @foreach ($loop = [1, 2, 3, 4, 5, 6, 7, 8, 9] as $loops)
                    <div class="cursor-pointer flex flex-col gap-2 justify-center">
                        <div class="rounded-full h-14 w-14">
                            <img class="h-full w-full rounded-full" src="{{ asset('src/facebook.png') }}"
                                alt="">
                        </div>

                        <div class="text-sm text-[#282828] font-bold text-center">Foods</div>
                    </div>
                @endforeach

                <div class="cursor-pointer flex flex-col gap-2 justify-center">
                    <div class="rounded-full h-14 w-14 bg-primary">

                    </div>

                    <div class="text-xs text-[#282828] font-bold text-center">Foods</div>
                </div>
            </div>
        </div>

        <div class="py-4 px-20 bg-white mb-12">
            <div class="flex items-start justify-between">
            <div class="text-2xl mb-3 font-black text-[#282828]">Al-bai’ Promo</div>
            <div class="flex items-center gap-2 cursor-pointer">
                <div class="2xl text-primary text-xl font-bold">
                    <a href="{{ route('promo') }}">
                        See more</a>
                    </div>
                <i class="fa-solid fa-angle-right text-primary"></i>
            </div>
        </div>
            <div class="flex gap-4">
                @foreach ($loop = [1, 2, 3, 4, 5] as $loops)
                <div class="shadow-items bg-white rounded-lg cursor-pointer">
                    <div class="h-[155px] w-full">
                        <img class="w-full rounded-tr-lg rounded-tl-lg h-full" src="https://c4.wallpaperflare.com/wallpaper/553/119/620/windows-10-windows-10x-windows-11-minimalism-material-minimal-hd-wallpaper-preview.jpg" alt="">
                    </div>
                    <div class="px-3 py-2 pb-3">
                        <div class="font-semibold mb-[5px]">
                            Cosmos 17-WFG Kipas angin dingin kosmos
                        </div>

                        <div class="flex gap-3 items-center mb-2.5">
                            <div>
                                <div class="text-lg font-bold">
                                    Rp200.000
                                </div>
                                <div class="text-[#525252] text-semibold">Rp200.000</div>
                            </div>

                            <div class="rounded-sm text-sm text-[#FF3636] p-2 bg-[#FFB3B3]">
                                40%
                            </div>
                        </div>

                        <div class="flex gap-[5px] items-center mb-2.5">
                            <i class="fa-solid fa-store text-primary"></i>
                            <div class="text-[#525252] text-sm">Jakarta pusat</div>
                        </div>

                        <div class="flex gap-[5px] items-center mb-3">
                            <i class="text-[#FFD600] fa-solid fa-star"></i>
                            <div class="text-[#525252] text-sm">4.5 | 500 Sold</div>
                        </div>

                        <div class="flex gap-[5px] items-center">
                            <i class="fa-solid fa-truck-fast text-[#525252]"></i>
                            <div class="text-[#525252] text-sm">Free Shipping</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="flex bg-white pt-5 w-full">
            <div class="cursor-pointer pb-1 flex-1 border-[#AC8B75] text-center text-[#282828] font-bold text-lg border-b-[2px] w-full">
                For you
            </div>

            <div class="cursor-pointer pb-1 flex-1 border-[#C4C4C4] text-center text-[#C4C4C4] font-semibold text-lg border-b-[2px] w-full">
                Speacial promo
            </div>

            <div class="cursor-pointer pb-1 flex-1 border-[#C4C4C4] text-center text-[#C4C4C4] font-semibold text-lg border-b-[2px] w-full">
                End Year Sale
            </div>

            <div class="cursor-pointer pb-1 flex-1 border-[#C4C4C4] text-center text-[#C4C4C4] font-semibold text-lg border-b-[2px] w-full">
                Populer
            </div>

            <div class="cursor-pointer pb-1 flex-1 border-[#C4C4C4] text-center text-[#C4C4C4] font-semibold text-lg border-b-[2px] w-full">
                Gadgets
            </div>

            <div class="cursor-pointer pb-1 flex-1 border-[#C4C4C4] text-center text-[#C4C4C4] font-semibold text-lg border-b-[2px] w-full">
                Great Deals
            </div>

            <div class="cursor-pointer pb-1 flex-1 border-[#C4C4C4] text-center text-[#C4C4C4] font-semibold text-lg border-b-[2px] w-full">
                Great Deals
            </div>

        </div>
        <div class="grid grid-cols-6 gap-4 px-10 py-4">
            @foreach ($loop = [1, 2, 3, 4, 5,6,7,8,9,10,11,12] as $loops)
            <div class="shadow-items bg-white rounded-lg cursor-pointer">
                <div class="h-[155px] w-full">
                    <img class="w-full rounded-tr-lg rounded-tl-lg h-full" src="https://c4.wallpaperflare.com/wallpaper/553/119/620/windows-10-windows-10x-windows-11-minimalism-material-minimal-hd-wallpaper-preview.jpg" alt="">
                </div>
                <div class="px-3 py-2 pb-3">
                    <div class="font-semibold mb-[5px] text-sm">
                        Cosmos 17-WFG Kipas angin dingin kosmos
                    </div>

                    <div class="flex gap-3 items-center mb-2.5">
                        <div>
                            <div class="text font-bold">
                                Rp200.000
                            </div>
                            <div class="text-[#525252] text-semibold text-sm">Rp200.000</div>
                        </div>

                        <div class="rounded-sm text-xs text-[#FF3636] p-1.5 bg-[#FFB3B3]">
                            40%
                        </div>
                    </div>

                    <div class="flex gap-[5px] items-center mb-2.5">
                        <i class="fa-solid fa-store text-primary text-sm"></i>
                        <div class="text-[#525252] text-xs">Jakarta pusat</div>
                    </div>

                    <div class="flex gap-[5px] items-center">
                        <i class="text-[#FFD600] fa-solid fa-star text-sm"></i>
                        <div class="text-[#525252] text-xs">4.5 | 500 Sold</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
<style>
    body {
        background: #FAFAFA;
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
