@extends('dashboard.layouts.app')
@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    <small>{{now()->format('d M, Y')}}</small>
    
</div>
</div>
<div class="container">
<form action="{{route('dashboard.profile')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- <img src="{{Voyager::image(auth()->user()->avatar)}}" alt="">
    <div class="form-group my-3">
            <label for="name">Image Change</label>
            <input type="file" class="form-control" id="image" aria-describedby="image" value="" name="avatar">
    </div> -->

    <div class="row">
        <div class="col-md-6 form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="name" value="{{Auth()->user()->name}}" placeholder="Enter name">
            @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-6 form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="email" value="{{Auth()->user()->email}}" aria-describedby="email" placeholder="Enter email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 form-group">
            <label for="phone">Phone</label>
            <input type="phone" name="phone" disabled read class="form-control @error('phone') is-invalid @enderror" id="phone" aria-describedby="phone" value="{{Auth()->user()->phone}}" placeholder="Enter phone">
            @error('phone')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!-- <div class="col-md-6 form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" value="{{Auth()->user()->address}}" aria-describedby="address" placeholder="Enter address">
            @error('address')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div> -->
        <div class=" col-md-6 form-group">
            <label for="password">Password</label>
            <input type="password" name="password"  class="form-control @error('password') is-invalid @enderror" id="password" aria-describedby="password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
            @enderror
            <small>
                Left empty if you do not want to change password
            </small>
        </div>
    </div>
   


  <button type="submit" class="btn btn-primary">Update</button>
  
</form>
</div>
@endsection

