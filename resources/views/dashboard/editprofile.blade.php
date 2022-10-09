@extends('dashboard.layouts.app')
@section('content')
    <div class="container">
        <h2>
            Edit Profile Informations
        </h2>
        <hr>
        <form action="{{ route('dashboard.profile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="text-center mt-5">
                <img src="{{ Voyager::image(auth()->user()->avatar) }}" height="100" width="100" style="object-fit:cover"
                    class="img-fluid rounded-top " alt="">

            </div>

            <div class="row">

                <div class="col-md-12 form-group ">
                    <label for="avatar">Profile Image</label>
                    <input type="file" name="avatar" class="form-control  @error('avatar') is-invalid @enderror "
                        id="avatar">
                    @error('avatar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-12 form-group">
                    <label for="name">Roll</label>
                    <input type="text" name="roll" class="form-control " id="id" aria-describedby="name"
                        value="{{ Auth()->user()->information->id ?? '' }}" placeholder="Roll" disabled>
                </div>
                <div class="col-md-6 form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        id="name" aria-describedby="name" value="{{ Auth()->user()->name }}" placeholder="Enter name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror"
                        id="email" value="{{ Auth()->user()->email }}" aria-describedby="email"
                        placeholder="Enter email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="phone">Phone</label>
                    <input type="phone" name="phone" disabled read
                        class="form-control @error('phone') is-invalid @enderror" id="phone" aria-describedby="phone"
                        value="{{ Auth()->user()->phone }}" placeholder="Enter phone">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


            </div>



            <button type="submit" class="btn btn-success">Update</button>

        </form>
        <h2 class="mt-5">
            Change Password
        </h2>
        <hr>
        <form action="{{ route('dashboard.changepass') }}" class="mt-2" method="POST" enctype="multipart/form-data">
            @csrf


            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Current Password</label>
                        <input type="password" class="form-control" name="current" placeholder="Enter your current password">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">New Password</label>
                        <input type="password" class="form-control" name="new" placeholder="Enter your new password">
                    </div>
                </div>
                 <div class="col-12">
                    <div class="form-group">
                        <label for="">Confirm New Password</label>
                        <input type="password" class="form-control" name="confirm" placeholder="Confirm your new password">
                    </div>
                </div>
            </div>




            <button type="submit" class="btn btn-success">Change Password</button>

        </form>

    </div>
@endsection
