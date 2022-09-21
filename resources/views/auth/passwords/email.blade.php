@extends('frontEnd.layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-light">পাসওয়ার্ড রিসেট</div>

                <div class="card-body d-flex justify-content-center align-items-center" style="height: 150px;" >
                    

                    <form method="POST" action="{{ route('resetPassword') }}" class="w-100">
                        @csrf

                        <div class="row ">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">মোবাইল নম্বর</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required>

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                  
                </div>
                <div class="card-footer">
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