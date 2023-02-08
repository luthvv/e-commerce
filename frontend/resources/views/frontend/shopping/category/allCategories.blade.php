@extends('layouts.shop')

@section('css')
    <style>
        .bx-wrapper {
        -moz-box-shadow: 0 0 0px !important;
        -webkit-box-shadow: 0 0 0px !important;
        box-shadow: 0 0 0px !important;
    }
    </style>
@endsection

@section('content')
    <div class="">
        <div>
            <div class="px-[72px] mb-7">
                <div class="flex justify-between mb-7">
                    <div class="text-3xl font-extrabold">
                        All Categories
                    </div>

                    <div class="w-2/5 relative">
                        <i class="fa-solid bottom-4  left-3.5 text-lg text-info fa-magnifying-glass absolute"></i>
                        <input type="text" placeholder="Search Category..."
                            class="px-12 py-2.5 form-control text-info w-full" name="search" required
                            autocomplete="current-check">
                    </div>
                </div>
                <div class="slider">
                    <div class="grid grid-cols-4 gap-3">
                        @foreach ($loop = [1, 2, 3, 4, 5, 6, 7, 8] as $num)
                        <a href="{{ route('category', ['name'=>'test']) }}">
                            <div class="cursor-pointer h-[200px] w-full relative rounded-lg bg-black">
                                <img class="rounded-lg opacity-80 h-full w-full object-cover"
                                    src="https://images.unsplash.com/photo-1586816001966-79b736744398?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwcm9maWxlLXBhZ2V8MXx8fGVufDB8fHx8&w=1000&q=80"
                                    alt="">

                                <div class="text-xl text-white font-bold absolute bottom-[10px] right-1/3 left-1/2">
                                    Foods
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>

                    <div class="grid grid-cols-4 gap-3">
                        @foreach ($loop = [1, 2, 3, 4, 5, 6, 7, 8] as $num)
                        <a href="{{ route('category', ['name'=>1]) }}">
                            <div class="cursor-pointer h-[200px] w-full relative rounded-lg bg-black">
                                <img class="rounded-lg opacity-80 h-full w-full object-cover"
                                    src="https://images.unsplash.com/photo-1586816001966-79b736744398?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwcm9maWxlLXBhZ2V8MXx8fGVufDB8fHx8&w=1000&q=80"
                                    alt="">

                                <div class="text-xl text-white font-bold absolute bottom-[10px] right-1/3 left-1/2">
                                    Foods
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="flex bg-white pt-3 w-full">
                <div
                    class="cursor-pointer pb-1 flex-1 border-[#AC8B75] text-center text-[#282828] font-bold text-lg border-b-[2px] w-full">
                    For you
                </div>

                <div
                    class="cursor-pointer pb-1 flex-1 border-[#C4C4C4] text-center text-[#C4C4C4] font-semibold text-lg border-b-[2px] w-full">
                    Speacial promo
                </div>

                <div
                    class="cursor-pointer pb-1 flex-1 border-[#C4C4C4] text-center text-[#C4C4C4] font-semibold text-lg border-b-[2px] w-full">
                    End Year Sale
                </div>

                <div
                    class="cursor-pointer pb-1 flex-1 border-[#C4C4C4] text-center text-[#C4C4C4] font-semibold text-lg border-b-[2px] w-full">
                    Populer
                </div>

                <div
                    class="cursor-pointer pb-1 flex-1 border-[#C4C4C4] text-center text-[#C4C4C4] font-semibold text-lg border-b-[2px] w-full">
                    Gadgets
                </div>

                <div
                    class="cursor-pointer pb-1 flex-1 border-[#C4C4C4] text-center text-[#C4C4C4] font-semibold text-lg border-b-[2px] w-full">
                    Great Deals
                </div>

                <div
                    class="cursor-pointer pb-1 flex-1 border-[#C4C4C4] text-center text-[#C4C4C4] font-semibold text-lg border-b-[2px] w-full">
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
    </div>
@endsection
