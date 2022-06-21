@extends('frontEnd.layouts.app')
@section('content')

<div class="container my-5 d-flex flex-column gap-3 justify-content-center align-items-center">
    <div class="d-flex flex-column gap-3">
    <div class="" style="color:#666666">
            
            @if($result->pivot->মোট >= $result->minimum_to_pass)
            <div class="bg-warning rounded-circle d-flex justify-content-center align-items-center mx-auto text-white shadow" style="height: 100px;width:100px;">
                <i class="fa fa-trophy fa-4x"></i>
            </div>
            <div class=" text-center">
                <h1>Congratulations !</h1>
                <h5>Best wishes for passing the exam and good luck for more excellent achievement.</h5>
                <h2>  {{$result->getRanking(auth()->user())}} / {{$result->users()->count()}}</h2>

            </div>
            @elseif(!$result->pivot->answers)
            <div class="bg-dark rounded-circle d-flex justify-content-center align-items-center mx-auto text-white shadow" style="height: 100px;width:100px;">
                <i class="fa fa-frown fa-4x"></i>
            </div>
            <div class=" text-center">
                <h1>Unfinished .</h1>
                <h5>You didn't finished your exam.</h5>
            </div>
            @else
            <div class="bg-dark rounded-circle d-flex justify-content-center align-items-center mx-auto text-white shadow" style="height: 100px;width:100px;">
                <i class="fa fa-frown fa-4x"></i>
            </div>
            <div class=" text-center">
                <h1>আপনি আপনার সেরা করেছেন .</h1>
                <h5>একমাত্র আসল ব্যর্থতা হল হাল ছেড়ে দেওয়া.</h5>
            </div>
            @endif

        </div>    
    <div>
            <h2 class="text-dark">{{$result->title}}</h2>
            <div style="height:2px;width:60px" class="@if($result->pivot->মোট >= $result->minimum_to_pass) bg-success @else bg-danger @endif "></div>
        </div>
        <div class="">
            <span class=" h3 @if($result->pivot->মোট >= $result->minimum_to_pass) text-success @else text-danger @endif ">
            @if($result->pivot->মোট >= $result->minimum_to_pass)     
            পাস করেছে
            @elseif(!$result->pivot->answers)
            অসমাপ্ত
            @else
            ব্যর্থ হয়েছে
            @endif
            </span>
        </div>

      
        
        @if(!$result->pivot->answers )
        <ul style="list-style: none; margin:0px;padding:0px;">
            <li style="color:#666666"> <strong>ভুল উত্তর:</strong> N/A</li>
            <li style="color:#666666"> <strong>নেতিবাচক মার্ক:</strong> {{$result->minius_mark}}</li>
            <li style="color:#666666"> <strong>মিস :</strong> N/A</li>
            <li style="color:#666666"> <strong>সঠিক উত্তর :</strong> N/A</li>
            <li style="color:#666666"> <strong>সর্বনিম্ন পাস করতে হবে :</strong> {{$result->minimum_to_pass}}</li>
            <li style="color:#666666"> <strong>মোট :</strong> N/A</li>
        </ul>
        @else
        <ul style="list-style: none; margin:0px;padding:0px;">
            <li style="color:#666666"> <strong>ভুল উত্তর:</strong> {{$result->pivot->wrong_answers}}</li>
            <li style="color:#666666"> <strong>নেতিবাচক মার্ক:</strong> {{$result->minius_mark}}</li>
            <li style="color:#666666"> <strong>মিস :</strong> {{$result->pivot->empty_answers}}</li>
            <li style="color:#666666"> <strong>সঠিক উত্তর :</strong> {{($result->questions->count() - ($result->pivot->wrong_answers + $result->pivot->empty_answers ))/$result->point}} </li>
            <li style="color:#666666"> <strong>সর্বনিম্ন পাস করতে হবে :</strong> {{$result->minimum_to_pass}}</li>
            <li style="color:#666666"> <strong>মোট :</strong> {{$result->pivot->total}}</li>
        </ul>
        @endif

       

        <p style="color:#666666">
            <strong>বিঃদ্রঃ </strong> আপনার ড্যাশবোর্ড থেকে আরও দেখুন।.
        </p>

    </div>
    <div>
        <a href="{{route('all-results-exam',$result->uuid)}}" class="btn btn-dark">Answers</a>
        <a href="{{route('dashboard')}}" class="btn btn-dark"> Go to dashboard</a>
        <a href="{{route('home_page')}}" class="btn btn-dark"> Home</a>
        <a href="{{route('all-results-exam',$result->uuid)}}" class="btn btn-dark"> Results</a>
    </div>

</div>
@endsection