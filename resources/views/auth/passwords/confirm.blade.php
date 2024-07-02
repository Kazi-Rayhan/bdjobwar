@extends('frontend.layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-light">পাসওয়ার্ড পরিবর্তন করুন</div>

                <div class="card-body">
               

                    <form class="mt-3" method="POST" action="{{ route('confirmPassword') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">পাসওয়ার্ড</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <button type="button" id="hidePassword" style="" onclick="myFunction()" class="field-icon"><i class=" text-secondary fas fa-eye"></i></button>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">কনফার্ম পাসওয়ার্ড</label>

                            <div class="col-md-6">
                                <input id="password_confirmation" type="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">
                                <button type="button" id="hideConfirmPassword" style="" onclick="myFunction2()" class="field-icon"><i class=" text-secondary fas fa-eye"></i></button>
                                <div id="emailHelp" class="form-text">উপরের পাসওয়ার্ডটি পুনরায় দিন ।</div>

                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                  কনফার্ম
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
    function myFunction2() {
  var x = document.getElementById("password_confirmation");
  
  if (x.type === "password") {
    x.type = "text";
    document.getElementById('hideConfirmPassword').innerHTML = '<i class=" text-secondary fas fa-eye-slash"></i>'
  } else {
    x.type = "password";
    document.getElementById('hideConfirmPassword').innerHTML = '<i class=" text-secondary fas fa-eye"></i>'
  }
} 
</script>
@endsection
