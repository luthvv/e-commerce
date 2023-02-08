@extends('layouts.app')

@section('content')
    <div class="flex gap-20 lg:gap-32 h-full items-center justify-center lg:justify-between">
        <div class="regist-container bg-white shadow-custom border-xl p-7 rounded-xl w-full">
            <div class="flex justify-between mb-6 items-end">
                <div class="font-extrabold text-2xl lg:text-3xl">Register</div>

                <div class="text-xs font-bold cursor-pointer"><a href="{{ route('login')}}" class="flex gap-1"><span class="hidden lg:block">Have an account ?</span> <span class="text-primary">Login</span></a></div>
            </div>

            <form method="POST" action="{{ route('registerProcess') }}">
                @csrf

                <div class="mb-4 duration-200 flex bg-white hover-login py-2 px-7 rounded-lg border-black border-2 items-center w-full cursor-pointer">
                        <img class="w-6 h-auto" src="{{ asset('src/Google.png') }}" alt="">
                        <div class="w-full text-lg text-center font-bold lg:text-xl">Google</div>
                </div>

                <div class="flex justify-between mb-2 items-center">
                    <div class="w-full h-0.5 bg-info"></div>
                    <div class="px-3">OR</div>
                    <div class="w-full h-0.5 bg-info"></div>
                </div>

                <div class="mb-8 lg:row">
                    <label for="text" class="col-form-label text-info text-sm font-bold">Phone Number / Email</label>

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
                <button type="form" class="btn btn-primary w-full text-lg text-info p-2 font-extrabold">Next</button>

                <div class="mt-8 mb-3 font-semibold text-sm text-center lg:text-base">
                    Dengan mendaftar, saya menyetujui <br>
                  <span class="text-primary">Syarat dan Ketentuan</span> serta <span class="text-primary">Kebijakan Privasi</span>
                </div>
            </form>
        </div>

        <div class="hidden flex-col hidden items-center md:flex">
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
