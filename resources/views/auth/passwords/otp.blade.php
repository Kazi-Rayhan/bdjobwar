@extends('frontEnd.layouts.app')

@section('content')

<!-- bratcam area  end-->

<div class="container my-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            @if(session()->has('error'))
            <div class="alert alert-danger" role="alert">

                <p>{{session('error')}}</p>

            </div>
            @endif

            <div class="card shadow-lg">
                <div class="card-header py-3 bg-success text-white fs-5">ওটিপি</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('resetOtpCheck') }}">
                        @csrf

                        <div class="row mb-4 px-4 pt-4">

                            <div class="col-md-12">
                                <input id="otp" placeholder="আপানার মোবাইলে পাঠানো ওটিপি টি এখানে লিখুন" type="number" class="form-control py-2 @error('otp') is-invalid @enderror" name="otp" autocomplete="otp" autofocus>

                                @error('otp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                               
                            </div>
                            
                        </div>
                        <a class="btn btn-link  " type="button" href="{{route('password.request')}}">পুনোরায় কোডটি পাঠান</a>
                       

                        
                  
                </div>
                <div class="card-footer">
                <button type="submit" class="btn btn-danger px-4">
                            সাবমিট
                        </button>

                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection