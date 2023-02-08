@extends('layouts.shop')


@section('content')
    <div>
        <div class="px-[72px]">
            <div class="slider">
                <div class="h-[313px] w-full">
                    <img class="w-full h-full object-fit" src="{{ asset('src/banner1.jpg') }}" alt="">
                </div>
                <div class="h-[313px] w-full">
                    <img class="w-full h-full object-fit" src="{{ asset('src/banner1.jpg') }}" alt="">
                </div>
            </div>
        </div>

        <div class="py-4 px-20 bg-white mb-12">
            <div class="flex items-start justify-start">
                <div class="text-2xl mb-3 font-black text-[#282828]">Sport Top Seller</div>
            </div>
            <div class="flex gap-4">
                @foreach ($loop = [1, 2, 3, 4, 5] as $loops)
                    <div class="shadow-items bg-white rounded-lg cursor-pointer">
                        <div class="h-[155px] w-full">
                            <img class="w-full rounded-tr-lg rounded-tl-lg h-full"
                                src="https://c4.wallpaperflare.com/wallpaper/553/119/620/windows-10-windows-10x-windows-11-minimalism-material-minimal-hd-wallpaper-preview.jpg"
                                alt="">
                        </div>
                        <div class="px-3 py-2 pb-3">

                            <div class="max-w-fit py-1 px-2 rounded-sm bg-primary text-white font-bold text-sm mb-2">
                                #1
                            </div>
                            <div class="font-semibold mb-[5px]">
                                Cosmos 17-WFG Kipas angin dingin kosmos
                            </div>

                            <div class="flex gap-3 items-center mb-2.5">
                                <div>
                                    <div class="text-lg font-bold">
                                        Rp200.000
                                    </div>
                                    <div class="text-[#525252] text-semibold line-through">Rp200.000</div>
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

        <div class="px-[72px]">
            <div class="flex items-center gap-3 mb-7">
                <div class="font-bold text-2xl py-3 text-white px-8 bg-primary rounded-tr-lg rounded-br-lg">
                    Filter
                </div>

                <div class="flex items-center gap-3 overflow-x-scroll scroll">

                    <div class="text-white font-semibold text-xl cursor-pointer py-2.5 px-10 bg-secondary rounded-md">
                        Foods
                    </div>

                    @foreach ($loop = [1, 2, 3, 4, 5, 6, 8, 9] as $loop)
                        <div class="text-[#282828] font-medium text-xl cursor-pointer py-2.5 px-10 bg-white border-2 rounded-md">
                            Foods
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="grid grid-cols-5 gap-4">
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
