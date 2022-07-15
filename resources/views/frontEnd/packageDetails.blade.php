@extends('frontEnd.layouts.app')
@section('content')

<div class="container my-5 d-flex flex-column gap-3 justify-content-center align-items-center">
    <div class="d-flex flex-column gap-3">
        <div>
            <h2 class="text-dark">{{$package->title}}</h2>
            <div style="height:2px;width:60px" class="bg-danger"></div>
        </div>
        <div class="">
            <span class=" h3 text-danger ">
            সাবস্ক্রিপশন ফি :
            </span>
            <span class="h3">
                {{$package->price}} ৳
            </span>
        </div>

        <ul style="list-style: none; margin:0px;padding:0px;">
            <li  style="color:#666666"> <strong>প্যাকেজ :</strong> {{$package->title}}  প্যাকেজ</li>
            <li  style="color:#666666"> <strong>সময়কাল : </strong> {{$package->duration}} দিন </li>
        </ul>

        <p class="" style="color:#666666">
            <strong>প্রিমিয়াম বৈশিষ্ট্য :</strong>
            <br>
            ১) প্রশ্ন ব্যাংক সার্স
            <br>
            ২)সকল পেইড কোর্স
            <br>
            ৩) জব সলিউশন
            <br>
            ৪) পিডিএফ ডাউনলোড
            <br>
            ৫) সকল লাইভ ও আর্কাইভ পরীক্ষা
        </p>

        <p style="color:#666666">
            <strong>বিঃদ্রঃ</strong> প্রতিটি ব্যাচের পরীক্ষার জন্য আলাদা প্যাকেজ কেনার দরকার নেই। আপনি যে কোনো একটি প্যাকেজ কিনলেই হবে <br>
নির্দিষ্ট সময় পর্যন্ত অ্যাপের সমস্ত বাটনের চলমান পরীক্ষা দিতে সক্ষম হবেন।
        </p>
        
    </div>
    <a href="{{route('orderCreate',['package',$package->id])}}" class="btn btn-dark"> সাবস্ক্রাইব</a>

</div>
@endsection