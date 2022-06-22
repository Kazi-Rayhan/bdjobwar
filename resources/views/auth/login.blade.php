@extends('frontEnd.layouts.app')

@section('content')
<!-- bratcam area  start-->
<section class="bradcam">
<div class="container">
<h3 class="text-white pt-5 pb-3">সাইন ইন </h3>
    <p class="pb-5 text-white">
        <a href="{{route('home_page')}}" class="text-decoration-none bradcam-active-btn pe-2">হোম</a>
         / 
         <a href="" class="text-decoration-none text-white ps-2">সাইন ইন </a>
    </p>
</div>

</section>
<!-- bratcam area  end-->
<div class="container my-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            
            <div class="card shadow-lg">
                <div class="card-header py-3 bg-success text-white fs-5">সাইন ইন  ফরম</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-4 px-4 pt-4">
     

                            <div class="col-md-12">
                                <input id="phone" type="text" placeholder="মোবাইল অথবা রোল নম্বর" class="border border-success form-control py-2 @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4 px-4">

                            <div class="col-md-12">
                                <input id="password" placeholder="পাসওয়ার্ড" type="password" class=" border border-success form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <button type="button" id="hidePassword" style="" onclick="myFunction()" class="field-icon"><i class=" text-secondary fas fa-eye"></i></button>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="">
                             @if (Route::has('password.request'))
                                    <a class="text-decoration-none text-muted  ms-4" href="{{ route('password.request') }}">
                                        {{ __('পাসওয়ার্ড ভুলে গেছেন? রিসেট করুন ') }}
                                    </a>
                                @endif
                        </div>
                        <div class="">
                            <div class=" mt-3 ms-4">
                                <button type="submit" class="btn  btn-danger px-4">
                                সাইন ইন 
                                </button>

                            </div>
                        </div>
                        <div class="mt-2">
                             @if (Route::has('password.request'))
                                    <a id="register" class="text-decoration-none fs-6 ms-4 custom-reg-btn" href="{{ route('register') }}">
                                        {{ __('আপনি কি নতুন ইউজার? ফ্রি অ্যাকাউন্ট খুলুন ') }}
                                    </a>
                                @endif
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
    document.getElementById('password').addEventListener('input', function () {
        const hidePassword=document.getElementById('hidePassword');
        hidePassword.style.display ="block";

    })
function myFunction() {
  var x = document.getElementById("password");
  
  if (x.type === "password") {
    x.type = "text";
    document.getElementById('hidePassword').innerHTML = '<i class=" text-secondary fas fa-eye-slash"></i>'
  } else {
    x.type = "password";
    document.getElementById('hidePassword').innerHTML = '<i class=" text-secondary fas fa-eye"></i>'
  }
} 

</script>

@if(session()->has('error'))
  <script>
    const registrationLink = document.getElementById("register");
    console.log(registrationLink)
    registrationLink.style.fontWeight  = "bold";
    registrationLink.style.color  = "red";

  
  </script>
@endif



@endsection