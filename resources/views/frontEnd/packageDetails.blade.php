@extends('frontEnd.layouts.app')
@section('content')
<!-- bratcam area  start-->
<section class="bradcam">
    <div class="container">
        <h3 class="text-white pt-5 pb-3">{{$package->title}}</h3>
        <p class="pb-5 text-white">
            <a href="{{ route('home_page') }}" class="text-decoration-none bradcam-active-btn pe-2">Home</a>
            /
            <a href="" class="text-decoration-none text-white ps-2">{{$package->title}}</a>
        </p>
    </div>

</section>
<!-- bratcam area  end-->
<div class="container my-5 d-flex flex-column gap-3 justify-content-center align-items-center">
    <div class="d-flex flex-column gap-3">
        <div>
            <h2 class="text-dark">{{$package->title}}</h2>
            <div style="height:2px;width:60px" class="bg-danger"></div>
        </div>
        <div class="">
            <span class=" h3 text-danger ">
                Subscription Fee :
            </span>
            <span class="h3">
                {{$package->price}} BDT
            </span>
        </div>

        <ul style="list-style: none; margin:0px;padding:0px;">
            <li  style="color:#666666"> <strong>Package :</strong> {{$package->title}} Package</li>
            <li  style="color:#666666"> <strong>Duration :</strong> {{$package->duration}} Days</li>
        </ul>

        <p class="" style="color:#666666">
            <strong>Premium Features :</strong>
            <br>
            1) You can participate in the routine test of all the buttons.
            <br>
            2) You can read Job Solution Question Bank with more than 1 lakh questions.
            <br>
            3) You can give 24 hours self test on different subjects.
            <br>
            4) You will get the opportunity to search questions and answers from the question bank.
            <br>
            5) You will get access to all the paid sections of the app.
        </p>

        <p style="color:#666666">
            <strong>Note:</strong> There is no need to buy separate packages for each batch test. If you buy any one package, you will
            <br>
            be able to give running exam of all the buttons of the app till the specified period.
        </p>
        
    </div>
    <a href="{{route('orderCreate',['package',$package->id])}}" class="btn btn-dark"> Subscribe</a>

</div>
@endsection