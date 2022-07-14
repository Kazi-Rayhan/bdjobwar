@extends('frontEnd.layouts.app')
@section('css')
<meta property="og:url" content="{{request()->url()}}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{$batch->title}} | BD Job War" />
<meta property="og:description" content="{{$batch->description}}" />
<meta property="og:image" content="{{Voyager::image($batch->thumbnail)}}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')


<!-- bratcam area  end-->
<div class="container my-md-5 my-2 d-flex flex-column gap-3 justify-content-center align-items-center">
    <img src="{{Voyager::image($batch->thumbnail)}}" style="width:100%;height:300px;object-fit:contain" alt="">
    <div class="d-flex flex-column gap-3 w-50">
        <div>
            <h2 class="text-dark">{{$batch->title}}</h2>
            <div style="height:2px;width:60px" class="bg-danger"></div>

            <div class="d-flex flex-wrap gap-2 mt-2">
                <a href="{{route('orderCreate',['type'=>'batch','id'=>$batch->id])}}" class="btn btn-success">ভর্তি হন</a>
                <a href="{{$batch->link()}}" class="btn btn-success">বিস্তারিত</a>
                @if($batch->routine)
                <a href="{{Voyager::image(json_decode($batch->routine)[0]->download_link)??''}}" class="btn btn-success">রুটিন ডাউনলোড করুন</a>
                @endif
            </div>
        </div>
        <div class="">

            <span class="h3">
                {{$batch->price}} ৳
            </span>
        </div>






        <p class="m-0 p-0" style="color:#666666">
            {{$batch->description}}

        </p>



    </div>
    <h2>
        Exams
    </h2>
    <div style="height:2px;width:60px" class="bg-danger"></div>
    <div class="owl-carousel ">
        @foreach($batch->exams as $exam)
        <x-exam-card :exam="$exam" />

        @endforeach
    </div>
</div>


@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
    loop:true,
    nav:false,
    autoplay:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,

        },
        600:{
            items:3,
        },
    }
});
    });
</script>
@endsection