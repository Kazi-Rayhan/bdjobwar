@extends('frontEnd.layouts.app')

@section('content')
<!-- bratcam area  start-->
@include('frontEnd.layouts.bradcam')
<!-- bratcam area  end-->
<div class="container my-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg">
                <div class="card-header py-3 bg-success text-white fs-5">{{ __('Login Form') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-4 px-4 pt-4">
     

                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="Phone number" class="form-control py-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4 px-4">

                            <div class="col-md-12">
                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="">
                             @if (Route::has('password.request'))
                                    <a class="text-decoration-none text-muted ms-4" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                        </div>
                        <div class="">
                            <div class=" mt-3 ms-4">
                                <button type="submit" class="btn-danger px-4">
                                    {{ __('Login') }}
                                </button>

                            </div>
                        </div>
                        <div class="mt-2">
                             @if (Route::has('password.request'))
                                    <a class="text-decoration-none text-muted ms-4 custom-reg-btn" href="{{ route('password.request') }}">
                                        {{ __('Are you a new user ? Create a free account') }}
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
