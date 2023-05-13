@extends('frontEnd.layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-success ">
                        <h3 class="text-light">পাসওয়ার্ড রিসেট</h3>
                    </div>

                    <div class="card-body  d-flex justify-content-center align-items-center py-5">


                        <form method="POST" action="{{ route('resetPassword') }}" class="w-100 ">
                            @csrf

                            <div class="form-group">
                                <label for="phone" class="">মোবাইল নম্বর</label>

                                <input style="border:1px solid;" id="phone" type="text"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ old('phone') }}" required>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

  <button type="submit" class="btn btn-success">
                            ওটিপি পাঠান
                        </button>

                    </div>
                   
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
