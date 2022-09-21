@extends('frontEnd.layouts.app')

@section('content')
    <!-- bratcam area  end-->
    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <p>
                 আপনার রেজিস্ট্রেশনকৃত মোবাইল নম্বর ও পাসওয়ার্ড দিয়ে লগইন করুন । পূর্বে রেজিস্ট্রশেন করে না থাকলে রেজিস্ট্রেশন করতে <a href="{{route('register')}}" class="text text-success">এখানে ক্লিক করুণ।</a> 
                </p>
                <div class="card shadow-lg">
                    <div class="card-header py-3 bg-success text-white fs-5">লগইন ফরম</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-4 px-4 pt-4">


                                <div class="col-md-12">
                                    <input id="phone" type="text" placeholder="মোবাইল অথবা রোল নম্বর"
                                        class="border border-success form-control py-2 @error('phone') is-invalid @enderror"
                                        name="phone" value="{{ old('phone') }}" autocomplete="phone" autofocus>

                                    @error('phone')
                                        <small class="text-info">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4 px-4">

                                <div class="col-md-12">
                                    <input id="password" placeholder="পাসওয়ার্ড" type="password"
                                        class=" border border-success form-control @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password">
                                    <button type="button" id="hidePassword" style="" onclick="myFunction()"
                                        class="field-icon"><i class=" text-secondary fas fa-eye"></i></button>

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
                                    <button type="submit" class="btn  btn-success px-4">
                                        লগইন করুন
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
        document.getElementById('password').addEventListener('input', function() {
            const hidePassword = document.getElementById('hidePassword');
            hidePassword.style.display = "block";

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

    @if (session()->has('error'))
        <script>
            const registrationLink = document.getElementById("register");
            console.log(registrationLink)
            registrationLink.style.fontWeight = "bold";
            registrationLink.style.color = "red";
        </script>
    @endif
@endsection
