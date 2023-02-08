@extends('layouts.app')

@section('content')
<div class="flex mt-4 items-center w-10/12 z-50 justify-center">
    <div class="flex flex-col items-center justify-center h-full">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="logo-albai">
        <img class="w-100 h-100" src="{{ asset('src/logo-horizontal.png') }}" alt="">
    </div>
    <div class="login-container bg-white shadow-custom mt-3 border-xl p-7 rounded-xl">
        <div class="flex justify-between mb-7 items-center">
            <div class="font-extrabold text-3xl">Login</div>

            <div class="text-primary font-bold cursor-pointer"><a href="{{ route('register') }}">Register</a></div>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="row mb-6">
                <label for="email" class="col-form-label text-info text-sm font-bold">Phone Number / Email</label>

                <div class="col-md-6 w-full">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <label for="password" class="col-form-label text-info text-sm font-bold">Password</label>

                <div class="col-md-6 w-full">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row my-2">
                <div class="">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="font-semibold text-sm text-info ml-1 form-check-label" for="remember">
                            Remember Me
                        </label>
                </div>
            </div>
            <button type="form" class="btn btn-primary w-full text-lg text-info p-2 font-extrabold">Next</button>

            <div class="flex justify-between my-3 items-center">
                <div class="w-full h-0.5 bg-info"></div>
                <div class="px-3">OR</div>
                <div class="w-full h-0.5 bg-info"></div>
            </div>

            <div class="flex justify-between gap-4 items-center">
                <div class="duration-200 flex gap-3 bg-white hover-login py-3 rounded-lg border-black border-2 items-center justify-center w-full cursor-pointer">
                    <img class="w-6 h-auto" src="{{ asset('src/Google.png') }}" alt="">
                    <div class=" font-bold">Google</div>
                </div>

                <div class="duration-200 flex gap-3 bg-white hover-login py-3 rounded-lg border-black border-2 items-center justify-center w-full cursor-pointer">
                    <img class="w-6 h-auto" src="{{ asset('src/facebook.png') }}" alt="">
                    <div class="font-bold">Facebook</div>
                </div>
            </div>

        </form>
    </div>
</div>
</div>
<style>
    .logo-albai{
        height: auto;
        width: 205px;
    }
    .hover-login:hover{
        background-color: #AC8B75 !Important;
        color: white;
        border-color: #AC8B75;
    }
    .shadow-custom{
        box-shadow: 0px 4px 10px 2px rgba(0, 0, 0, 0.25);
    }
</style>
@endsection
