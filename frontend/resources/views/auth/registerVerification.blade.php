@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center h-full">
        <div class="regist-container bg-white shadow-custom border-xl py-8 p-8 sm:p-12 w-10/12 rounded-xl flex flex-col items-center">
            <div class="mb-2 text-xl font-extrabold text-center">Input your verification code</div>

            <div class="mb-6 text-info text-sm font-semibold text-center">We have sent the verification code to contohaja@gmail.com</div>

            <form class="w-full flex flex-col items-center" method="POST" action="{{ route('registerVerificationProcess') }}">
                @csrf

                <div class="mb-16 text-sm text-info font-semibold text-center">Verification Code</div>

                <div class="mb-7" id="divOuter">
                    <div id="divInner">
                        <input id="partitioned" class="text-xl font-bold" type="text" maxlength="4" />
                    </div>
                </div>

                <button type="form" class="mb-4 btn btn-primary w-full text-base sm:text-lg text-info p-1 sm:p-2 font-extrabold">Next</button>

                <div class="text-sm font-semibold text-center">
                    Didnt recieve the code? <br>
                   <span class="cursor-pointer text-primary">Resend</span> or Register <span class="text-primary cursor-pointer">with Phone Number</span>
                </div>

            </form>
        </div>
</div>

@endsection
<script>

</script>
<style>
  #partitioned {
  padding-left: 15px;
  letter-spacing: 42px;
  border: 0;
  background-image: linear-gradient(to left, black 70%, rgba(255, 255, 255, 0) 0%);
  background-position: bottom;
  background-size: 50px 1px;
  background-repeat: repeat-x;
  background-position-x: 35px;
  width: 220px;
  outline : none;
  overflow: hidden;
}

#divOuter{
  width: 190px;
  overflow: hidden;
}

    .logo-albai{
        height: auto;
        width: 275px;
    }

    .illustration{
        height: auto;
        width: 400px;
    }
</style>
