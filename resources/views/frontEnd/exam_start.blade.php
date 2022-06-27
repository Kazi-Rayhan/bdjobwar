@extends('frontEnd.layouts.app')
@section('content')
@php
$from = new EasyBanglaDate\Types\BnDateTime($exam->from, new DateTimeZone('Asia/Dhaka'));
$to = new EasyBanglaDate\Types\BnDateTime($exam->to, new DateTimeZone('Asia/Dhaka'));
use Rakibhstu\Banglanumber\NumberToBangla;
$numto = new NumberToBangla();
@endphp
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
         
            <span class="h3">
                {{$exam->priceFormat()}}
            </span>
        </div>

       
        <ul style="list-style: none; margin:0px;padding:0px;">
            <li  style="color:#666666"> <strong>পরীক্ষা শুরু : </strong> {{ $from->getDateTime()->format('j F, Y b h:i')}}</li> 
            <li  style="color:#666666"> <strong>পরীক্ষা শেষ : </strong> {{ $to->getDateTime()->format('j F, Y b h:i') }}</li> 
            <li  style="color:#666666"> <strong>সময় :</strong>  {{$numto->bnNum($exam->duration)}} মিনিট</li>
        </ul>

       

        <p class="" style="color:#666666">
<<<<<<< HEAD
            <p class="fs-3 exam-description">পরীক্ষার বিবরণ :</p>
            <br>
            ১) মোট প্রশ্নের সংখ্যা হল : {{$exam->questions->count()}}
=======
            <strong>পরীক্ষার বিবণ :</strong>
            <br>
            প্রশ্ন সংখ্যা: {{$numto->bnNum($exam->questions->count())}}.
>>>>>>> 9173fbdc2c0205a4e00551a18859dcfdaa830b76
            <br>
            পূর্ণ মান : {{$numto->bnNum($exam->fullMark)}} 
            <br>
            পাশ নম্বর : {{$numto->bnNum($exam->passMark)}} 
            <br>
            নেগেটিভ মার্ক : {{$numto->bnNum($exam->minius_mark)}}
            
        </p>

        <p style="color:#666666">
            <strong>বিঃদ্রঃ  : </strong>প্রতি পরীক্ষা শুরু হলে টাইম কাউন্টার শুরু হবে ।  নির্ধারিত সময়ের মধ্যে পরীক্ষা সাবমিট করুন ।
            সময় শেষ হলে পরীক্ষাটি  অটোম্যাটিক সাবমিট হয়ে যাবে । <br>পরীক্ষা চলাকালীন পরীক্ষার পেইজ থেকে বের হওয়া যাবেনা । বের হলেও আপনার টাইম কাউন্ট চলতে থাকবে ।
        </p>
        <a href="{{route('start',$exam->uuid)}}" class="btn btn-dark">পরীক্ষা শুরুকরুন</a>

    </div>
  
</div>
@endsection