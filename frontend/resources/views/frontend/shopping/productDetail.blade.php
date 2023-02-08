@extends('layouts.shop')

@section('css')
@endsection

@section('content')
    <div class="px-[72px] flex justify-center gap-[40px] items-start">
        <div class="flex-1">
            <div class="w-[370px] h-[370px] rounded-lg mb-3">
                <img class="rounded-lg w-full h-full object-cover" src="{{ asset('src/banner1.jpg') }}" alt="">
            </div>

            <div class="flex gap-[11px]">
                @foreach ($test = [1, 2, 3, 4, 5] as $ok)
                    <div class="cursor-pointer w-[65px] h-[65px] rounded-md">
                        <img class="rounded-md w-full h-full object-cover" src="{{ asset('src/banner1.jpg') }}"
                            alt="">
                    </div>
                @endforeach
            </div>
        </div>

        <div class="flex-[2_2_0%]">
            <div class="text-2xl text-[#282828] font-bold mb-3">
                Cosmos 17-WFG Kipas angin dingin kosmos A-1000
            </div>

            <div class="flex gap-2.5 items-center mb-3">
                <div class="text-[#6B6B6B] text-xl">500 Sold</div>
                <div class="self-stretch w-[1px] bg-[#D7D7D7]"></div>
                <div class="flex gap-2">
                    <i class="fa-solid fa-star text-[#FFD600] text-xl"></i>
                    <div class="text-[#282828] text-lg">4.8 <span class="text-primary">(72)</span></div>
                </div>
            </div>

            <div class="text-3xl font-bold mb-6">
                Rp200.000
            </div>


            <div class="mb-7">
                <div class="flex justify-between items-center mb-4">
                    <div class="text-lg font-bold text-[#282828]">
                        Colour:
                    </div>
                    <div class="text-[#282828]">
                        4 Variants
                    </div>
                </div>
                <div class="flex items-center gap-2.5">
                    <div
                        class="cursor-pointer text-[#282828] bg-[#F1E5D2] border-[#E3CAA5] font-semibold cursor-pointer py-2.5 px-4 border-1 rounded-md">
                        Foods
                    </div>
                    @foreach ($loop = [1, 2, 3, 4] as $loop)
                        <div
                            class="cursor-pointer text-[#282828] font-semibold cursor-pointer py-2.5 px-4 bg-white border-1 border-[#282828] rounded-md">
                            Foods
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mb-12">
                <div class="flex justify-between items-center mb-4">
                    <div class="text-lg font-bold text-[#282828]">
                        Type:
                    </div>
                    <div class="text-[#282828]">
                        3 Variants
                    </div>
                </div>
                <div class="flex items-center gap-2.5">
                    <div
                        class="cursor-pointer text-[#282828] bg-[#F1E5D2] border-[#E3CAA5] font-semibold cursor-pointer py-2.5 px-4 border-1 rounded-md">
                        Foods
                    </div>
                    @foreach ($loop = [1, 2, 3] as $loop)
                        <div
                            class="cursor-pointer text-[#282828] font-semibold cursor-pointer py-2.5 px-4 bg-white border-1 border-[#282828] rounded-md">
                            Foods
                        </div>
                    @endforeach
                </div>
            </div>

            <div>
                <div class="font-bold mb-2">
                    Product Description
                </div>

                <div class="flex flex-column gap-1.5">
                    <div>
                        Brand: <span class="text-primary">Apple</span>
                    </div>

                    <div>
                        Category: <span class="text-primary">Handphone</span>
                    </div>

                    <div class="text-primary">
                        <i class="fa-solid fa-shield-halved"></i>
                        1 Year official warranty
                    </div>

                    <div>
                        Send from: <span class="text-primary">Jakarta Kota</span>
                    </div>
                </div>

                <div class="bg-[#D7D7D7] h-[1px] w-full my-3"></div>

                <div class="text-sm text-[#525252] mb-1">
                    Phone 13 Pro Max. Pembaruan sistem kamera Pro yang terbesar. Layar Super Retina XDR dengan ProMotion
                    untuk penggunaan yang terasa lebih cepat dan responsif. Chip A15 Bionic yang secepat kilat. Desain kokoh
                    dan kekuatan baterai terbaik yang pernah ada di iPhone.(1) Isi Kotak...
                </div>

                <div class="text-md cursor-pointer text-primary font-semibold">Read More</div>
            </div>

        </div>

        <div class="flex-1 bg-white border-[#282828] rounded-lg border-[1px] py-3 px-6">
            <div
                class="text-sm flex items-center gap-4 cursor-pointer font-bold text-white w-full bg-primary py-2 rounded-md mb-3 flex items-center justify-center">
                <i class="fa-solid fa-cart-plus"></i>
                <div>Add To Cart</div>
            </div>

            <div
                class="text-sm flex items-center gap-4 cursor-pointer font-bold border-[#AC8B75] text-primary border-1 w-full bg-white py-2 rounded-md mb-3 flex items-center justify-center">
                <i class="fa-regular fa-message"></i>
                <div>Chat Now</div>
            </div>

            <div class="flex items-stretch justify-between">
                <div class="cursor-pointer font-semibold flex items-center gap-2">
                    <i class="fa-regular fa-message"></i>
                    <div>Chat</div>
                </div>

                <div class="w-[1px] bg-[#D7D7D7]"></div>

                <div class="cursor-pointer font-semibold flex items-center gap-2">
                    <i class="fa-regular fa-heart"></i>
                    <div>Wishlist</div>
                </div>

                <div class="w-[1px] bg-[#D7D7D7]"></div>

                <div class="cursor-pointer font-semibold flex items-center gap-2">
                    <i class="fa-solid fa-share-nodes"></i>
                    <div>Share</div>
                </div>

            </div>
        </div>
    </div>

    <div>

    </div>
@endsection
