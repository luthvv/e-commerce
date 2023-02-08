@extends('layouts.app')

@section('content')
    <div class="flex gap-20 lg:gap-32 h-full items-center justify-center md:justify-between">
        <div class="w-full sm:w-full">
        <div class="regist-container bg-white shadow-custom border-xl p-7 rounded-xl">
                <div class="font-extrabold text-2xl text-center mb-6">Register with email</div>


            <form method="POST" action="{{ route('registerVerificatedProcess') }}">
                @csrf

                <div class="lg:row mb-3">
                    <label for="text" class="col-form-label text-info text-sm font-bold">Username</label>

                    <div class="col-md-6 w-full">
                        <input id="check" type="text" class="form-control @error('check') is-invalid @enderror"
                            name="check" required autocomplete="current-check">

                        @error('check')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="lg:row mb-3">
                    <label for="text" class="col-form-label text-info text-sm font-bold">Password</label>

                    <div class="col-md-6 w-full">
                        <input id="check" type="text" class="form-control @error('check') is-invalid @enderror"
                            name="check" required autocomplete="current-check">

                        @error('check')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="lg:row">
                    <label for="text" class="col-form-label text-info text-sm font-bold">Confirm Password</label>

                    <div class="col-md-6 w-full">
                        <input id="check" type="text" class="form-control @error('check') is-invalid @enderror"
                            name="check" required autocomplete="current-check">

                        @error('check')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="text-info text-xs font-semibold mb-4">Minumum 8 char.</div>
                <button type="form" class="btn btn-primary w-full text-lg text-info p-2 font-extrabold">Next</button>

                <div class="mt-8 font-semibold text-center text-sm lg:text-base">
                    Dengan mendaftar, saya menyetujui <br>
                  <span class="text-primary cursor-pointer">Syarat dan Ketentuan</span> serta <span class="text-primary cursor-pointer">Kebijakan Privasi</span>
                </div>
            </form>
        </div>
    </div>

        <div class="hidden flex flex-col items-center md:flex">
            <div class="logo-albai mb-4">
                <img class="w-100 h-auto" src="{{ asset('src/logo-horizontal.png') }}" alt="">
            </div>

            <div class="illustration mb-6">
                <img class="w-100 h-auto" src="{{ asset('src/register-illustration.png') }}" alt="">
            </div>

            {{-- <div class="illustration font-extrabold text-2xl whitespace-nowrap text-center">
                JUAL BELI MUDAH HANYA DI ALBA’I
            </div> --}}
        </div>
    </div>
@endsection

<style>
    .logo-albai{
        height: auto;
        width: 275px;
    }

    .illustration{
        height: auto;
        width: 400px;
    }
</style>
