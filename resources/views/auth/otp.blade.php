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
                <div class="card-header py-3 bg-success text-white fs-5">{{ __('OTP Form') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('checkOtp') }}">
                        @csrf

                        <div class="row mb-4 px-4 pt-4">

                            <div class="col-md-12">
                                <input id="otp" placeholder="Please write your OTP" type="number" class="form-control py-2 @error('otp') is-invalid @enderror" name="otp" value="" required autocomplete="otp" autofocus>

                                @error('otp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                      



                        <div class="row mb-0">
                         
                            <div class="col-3 ms-4">
                                <button type="submit" class="btn btn-danger px-4">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                            <div class="col-3 ">
                             <a class="btn btn-success px-3" href="{{route('otpSend')}}">Send OTP</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection