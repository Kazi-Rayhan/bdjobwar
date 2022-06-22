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
            দাম : 
            </span>
            <span class="h3">
                {{$exam->price}} টাকা
            </span>
        </div>

        <ul style="list-style: none; margin:0px;padding:0px;">
            <li  style="color:#666666"> <strong>শিরোনাম :</strong> {{$exam->title}} Exam</li>
            <li  style="color:#666666"> <strong>উপ শিরোনাম :</strong> {{$exam->sub_title}} Exam</li>
        </ul>
        <ul style="list-style: none; margin:0px;padding:0px;">
            <li  style="color:#666666"> <strong>শুরু : </strong> {{$exam->from->format('d M, Y')}}</li> 
            <li  style="color:#666666"> <strong>শেষ : </strong> {{$exam->to->format('d M, Y')}}</li> 
            <li  style="color:#666666"> <strong>সময় সীমা :</strong> {{$exam->duration}} Min</li>
        </ul>

        <ul style="list-style: none; margin:0px;padding:0px;">
            <li  style="color:#666666"> <strong>বিষয় :</strong> {{join(', ',$exam->subjects->pluck('name')->toArray())}}</li>
            <li  style="color:#666666"> <strong>ক্যাটাগরিসমূহ:</strong> {{join(', ',$exam->categories->pluck('name')->toArray())}}</li>
        </ul>

        <p class="" style="color:#666666">
            <strong>পরীক্ষার বিবরণ :</strong>
            <br>
            ১) মোট প্রশ্নের সংখ্যা হল : {{$exam->questions->count()}}.
            <br>
            ২) প্রতিটি প্রশ্ন {{$exam->point}} পয়েন্টের সমান তাই এই পরীক্ষার জন্য পূর্ণ নম্বর ( {{$exam->point}} * {{$exam->questions->count()}} )  {{$exam->point * $exam->questions->count()}}
            <br>
            ৩) প্রতিটি ভুল উত্তরের জন্য মোট স্কোর থেকে {{$exam->minius_mark}} বিয়োগ করা হবে . <br> বিঃদ্রঃ : অনুত্তরিত প্রশ্ন ভুল উত্তর হিসাবে গণনা করা হয়.
            <br>
            ৪) এই পরীক্ষায় পাস করার জন্য আপনাকে কমপক্ষে {{$exam->minimum_to_pass}} স্কোর করতে হবে .
            
        </p>

        <p style="color:#666666">
            <strong>বিঃদ্রঃ  : </strong>প্রতিটি পরীক্ষার জন্য আপনার শুধুমাত্র একটি প্রচেষ্টা আছে। <br> প্রতিটি পরীক্ষার শুরুতে একটি কাউন্টডাউন শুরু হবে আপনাকে করতে হবে <br>
কাউন্টডাউন শেষ হওয়ার আগে পরীক্ষা শেষ করুন অন্যথায় আপনার প্রচেষ্টা <br> অসমাপ্ত হিসাবে গণনা করা হবে।
        </p>
        <a href="{{route('start',$exam->uuid)}}" class="btn btn-dark"> আমি এই পরীক্ষা দিতে চাই</a>

    </div>
  
</div>
@endsection