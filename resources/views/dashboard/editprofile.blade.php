@extends('dashboard.layouts.app')
@section('content')

<div class="container">
    <form action="{{route('dashboard.profile')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="text-center mt-5">
            <img src="{{Voyager::image(auth()->user()->avatar)}}" height="100" width="100" style="object-fit:cover" class="img-fluid rounded-top " alt="">

        </div>

        <div class="row">

            <div class="col-md-12 form-group ">
                <label for="avatar">Profile Image</label>
                <input type="file" name="avatar" class="form-control " id="avatar">

            </div>
            <div class="col-md-12 form-group">
                <label for="name">Roll</label>
                <input type="text" name="roll" class="form-control " id="id" aria-describedby="name" value="{{Auth()->user()->information->id??''}}" placeholder="Roll" disabled>
            </div>
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
           
            <div class=" col-md-6 form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" aria-describedby="password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <small>
                    Leave empty if you do not want to change password
                </small>
            </div>
        </div>



        <button type="submit" class="btn btn-success">Update</button>

    </form>

   
</div>
@endsection