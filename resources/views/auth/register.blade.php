@extends('frontEnd.layouts.app')

@section('content')
<!-- bratcam area  start-->
<section class="bradcam">
<div class="container">
<h3 class="text-white pt-5 pb-3">Sing In</h3>
    <p class="pb-5 text-white">
        <a href="{{route('home_page')}}" class="text-decoration-none bradcam-active-btn pe-2">Home</a>
         / 
         <a href="" class="text-decoration-none text-white ps-2">Sing In</a>
    </p>
</div>

</section>
<!-- bratcam area  end-->
<div class="container my-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg">
                <div class="card-header py-3 bg-success text-white fs-5">{{ __('Registration Form') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-4 px-4 pt-4">

                            <div class="col-md-12">
                                <input id="name" placeholder="Your name" type="text" class="form-control py-2 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4 px-4">

                            <div class="col-md-9">
                                <input id="email" type="phone" placeholder="Mobile number" class="form-control py-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3 mt-2">
                                <a class="btn-danger" id="otp-btn" style="cursor:pointer">OTP send</a>
                            </div>
                        </div>

                        <div class="row mb-4 px-4" id="otpDiv" style="display:none">

                            <div class="col-md-12">
                                <input id="otp" type="number" placeholder="Write OTP" class="form-control py-2 @error('otp') is-invalid @enderror" name="otp" value="{{ old('otp') }}" required autocomplete="otp">
                                @error('otp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
            
                        </div>
 
                        <div class="row mb-4 px-4">

                            <div class="col-md-12">
                                <input id="password" type="password" placeholder="Password" class="form-control py-2 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4 px-4">

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" placeholder="Conform password" class="form-control py-2" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="ms-4">
                                <button type="submit" class="btn-danger">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    document.getElementById("otp-btn").addEventListener("click", function() {
        const div=document.getElementById("otpDiv");
        // console.log(otpDiv);
        div.style.display = "block"; 
    }); 
</script>

@endsection
