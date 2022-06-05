@extends('frontEnd.layouts.app')
@section('content')
<!-- bratcam area  start-->
<section class="bradcam">
<div class="container">
<h3 class="text-white pt-5 pb-3">Payment getaway</h3>
    <p class="pb-5 text-white">
        <a href="{{route('home_page')}}" class="text-decoration-none bradcam-active-btn pe-2">Home</a>
         / 
         <a href="" class="text-decoration-none text-white ps-2">Sing In</a>
    </p>
</div>

</section>
<!-- bratcam area  end-->
<div class="container my-5">
<form action="{{route('orderStore',$package)}}" method="POST">
@csrf
  <div class="form-group col-md-6">
    <label for="exampleInputEmail1" class="mb-3">Transaction Id</label>
    <input type="text" name="trnxId" class="form-control" id="trnxId" required placeholder="Enter Transaction Id">
    @error('trnxId')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

  </div>


  <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>
</div>
@endsection