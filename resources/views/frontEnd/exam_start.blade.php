@extends('frontEnd.layouts.app')
@section('content')
<!-- bratcam area  start-->
<section class="bradcam">
    <div class="container">
        <h3 class="text-white pt-5 pb-3">{{$exam->title}}</h3>
        <p class="pb-5 text-white">
            <a href="{{ route('home_page') }}" class="text-decoration-none bradcam-active-btn pe-2">Home</a>
            /
            <a href="" class="text-decoration-none text-white ps-2">{{$exam->title}}</a>
        </p>
    </div>

</section>
<!-- bratcam area  end-->
<div class="container my-5 d-flex flex-column gap-3 justify-content-center align-items-center">
    <div class="d-flex flex-column gap-3">
        <div>
            <h2 class="text-dark">{{$exam->title}}</h2>
            <h5 style="color:#666666">{{$exam->sub_title}}</h5>
            <div style="height:2px;width:60px" class="bg-danger"></div>
        </div>
        <div class="">
            <span class=" h3 text-danger ">
                Price :
            </span>
            <span class="h3">
                {{$exam->price}} BDT
            </span>
        </div>

        <ul style="list-style: none; margin:0px;padding:0px;">
            <li  style="color:#666666"> <strong>Title :</strong> {{$exam->title}} Exam</li>
            <li  style="color:#666666"> <strong>Sub Title :</strong> {{$exam->sub_title}} Exam</li>
        </ul>
        <ul style="list-style: none; margin:0px;padding:0px;">
            <li  style="color:#666666"> <strong>From : </strong> {{$exam->from->format('d M, Y')}}</li> 
            <li  style="color:#666666"> <strong>To : </strong> {{$exam->to->format('d M, Y')}}</li> 
            <li  style="color:#666666"> <strong>Time Limit :</strong> {{$exam->duration}} Min</li>
        </ul>

        <ul style="list-style: none; margin:0px;padding:0px;">
            <li  style="color:#666666"> <strong>Subjects :</strong> {{join(', ',$exam->subjects->pluck('name')->toArray())}}</li>
            <li  style="color:#666666"> <strong>Categories :</strong> {{join(', ',$exam->categories->pluck('name')->toArray())}}</li>
        </ul>

        <p class="" style="color:#666666">
            <strong>Exam Details :</strong>
            <br>
            1) Total number of  questions  is : {{$exam->questions->count()}}.
            <br>
            2) Each question is equal to {{$exam->point}} point  so full mark  for this exam is ( {{$exam->point}} * {{$exam->questions->count()}} )  {{$exam->point * $exam->questions->count()}}
            <br>
            3) For every wrong answer {{$exam->minius_mark}} will be subtracted from total score . <br> Note : Unanswerd question dosent count as Wrong answer.
            <br>
            4) You need to score at least {{$exam->minimum_to_pass}} to pass this exam .
            
        </p>

        <p style="color:#666666">
            <strong>Note : </strong>You have only one attempt for each exam . On start of each exam a countdown will begain you have to <br> finish the exam before countdown end  
            or else your attempt will be counted as unfinished.
        </p>
        <a href="{{route('start',$exam->uuid)}}" class="btn btn-dark"> I want to take this exam</a>

    </div>
  
</div>
@endsection