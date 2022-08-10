@extends('frontEnd.layouts.app')
@section('css')
<meta property="og:url"           content="{{request()->url()}}" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="{{$exam->title}} | BD Job War" />
<meta property="og:description"   content="{{$exam->title}}  {{$exam->sub_title}}" />
<meta property="og:image"         content="{{Voyager::image($exam->image)}}" />
@endsection
@section('content')
@php
$from = new EasyBanglaDate\Types\BnDateTime($exam->from, new DateTimeZone('Asia/Dhaka'));
$to = new EasyBanglaDate\Types\BnDateTime($exam->to, new DateTimeZone('Asia/Dhaka'));
use Rakibhstu\Banglanumber\NumberToBangla;
$numto = new NumberToBangla();
@endphp

<!-- bratcam area  end-->
<div class="container my-md-5 my-2 d-flex flex-column gap-3 justify-content-center align-items-center">
    <div class="d-flex flex-column gap-3">
        <div>
            <h2 class="text-dark">{{$exam->title}}</h2>
            <h5 style="color:#666666">{{$exam->sub_title}}</h5>
            <div style="height:2px;width:60px" class="bg-danger"></div>
         
            <div class="d-flex gap-2 mt-2">
                <a href="{{route('start',$exam->uuid)}}" class="btn btn-success">পরীক্ষা শুরু করুন</a>   
                <button  type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">সিলেবাস দেখুন</button>
            </div>
        </div>
        <div class="">
         
            <span class="h3">
                {{$exam->priceFormat()}}
            </span>
        </div>

       
        <ul style="list-style: none; margin:0px;padding:0px;">
            <li  style="color:#666666"> <strong>পরীক্ষা শুরু : </strong> {{ $from->getDateTime()->format('j F, Y b h:i')}}</li> 
            <li  style="color:#666666"> <strong>পরীক্ষা শেষ : </strong> {{ $to->getDateTime()->format('j F, Y b h:i') }}</li> 
            <li  style="color:#666666"> <strong>সময় :</strong>  {{$numto->bnNum($exam->duration)}} মিনিট</li>
        </ul>

       

        <p class="m-0 p-0" style="color:#666666">
            <!-- <p class="fs-3 exam-description"></p> -->
            <strong class="fs-4 text-dark">
            পরীক্ষার বিবরণ :
            </strong>
            <br>
            প্রশ্নের সংখ্যা : {{$numto->bnNum($exam->questions()->active()->count())}}
            <br>
            পূর্ণ মান : {{$numto->bnNum($exam->fullMark)}} 
            <br>
            পাশ নম্বর : {{$numto->bnNum($exam->passMark)}} 
            <br>
            নেগেটিভ মার্ক : {{$numto->bnNum($exam->minius_mark)}}
            
        </p>

        <p style="color:#666666" class="m-0 p-0">
            <strong class="text-dark">বিঃদ্রঃ  : </strong>প্রতি পরীক্ষা শুরু হলে টাইম কাউন্ট শুরু হবে ।  নির্ধারিত সময়ের মধ্যে পরীক্ষা সাবমিট করুন ।
            সময় শেষ হলে পরীক্ষাটি  অটোমেটিক সাবমিট হয়ে যাবে । <br>পরীক্ষা চলাকালীন পরীক্ষার পেইজ থেকে বের হওয়া যাবেনা । বের হলেও আপনার টাইম কাউন্ট চলতে থাকবে ।
        </p>
      

    </div>
  
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">পরিক্ষার সিলেবাস</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       {{$exam->syllabus}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
@endsection