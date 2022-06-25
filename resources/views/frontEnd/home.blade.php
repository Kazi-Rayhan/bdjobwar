@extends('frontEnd.layouts.app')
@section('content')

@php
use Rakibhstu\Banglanumber\NumberToBangla;
$numto = new NumberToBangla();
@endphp
<!-- Slider section start -->
<section class="slider">
  <a href="">
    <img src="{{asset('frontEnd-assets/img/slider.png')}}" alt="" width="100%" style="object-fit:cover">
  </a>
</section>
<!-- Slider section end -->
<!-- Live section start -->
<section class="live-section" id="live-section" style="background-image: url({{asset('frontEnd-assets/img/bg.png')}})">
  <div class="live-section-title" style="background-image: url({{asset('frontEnd-assets/img/Blog.png')}})">
    <h1 class="text-uppercase" style="font-weight:700 ;">লাইভ সেকশন</h1>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h6 class="mt-5 fw-bold live-exam-heading mb-4">
          <i class="far fa-file-alt fs-3 text-muted"></i> <span class="text-success"> লাইভ পরীক্ষা চলছে </span>
        </h6>
        @foreach($liveExams as $exam)
        <x-exam-card :exam="$exam" />
        @endforeach
      </div>
      <div class="col-md-6">
        <h6 class="mt-5 fw-bold live-exam-heading mb-4">
          <i class="fas fa-file-alt fs-3 text-muted"></i> <span class="text-success">সম্প্রতি বন্ধ</span>
        </h6>
        @foreach($finishedExams as $exam)
        <x-exam-card :exam="$exam" />
        @endforeach
      </div>

    </div>
    <div class="row">
      <div class="col-md-6 mb-4">
        <h6 class="mt-5 fw-bold live-exam-heading mb-4">
          <i class="fas fa-chess fs-3 text-muted"></i> <span class="text-success">এ সপ্তাহের সেরা পরীক্ষার্থী</span>
        </h6>
        <table class="table table-striped table-light">
          <thead class="text-muted">
            <tr>
              <th scope="col">স্থান</th>
              <th scope="col">নাম</th>
              <th scope="col">স্কোর</th>
            </tr>
          </thead>
          <tbody class="">
            @foreach($topStudents as $pos => $student)
            <tr>
              <td>{{$numto->bnNum($pos+1)}}</td>
              <td>{{$student->user->name}}</td>
              <td>{{$numto->bnNum($student->total)}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="col-md-6 mb-4">
        <h6 class="mt-5 fw-bold live-exam-heading mb-4">
          <i class="fas fa-poll fs-3 text-muted"></i> <span class="text-success">সর্বশেষ ফলাফল </span>
        </h6>
        <table class="table table-striped table-light">
          <thead class="text-muted">
            <tr>
              <th scope="col">পরীক্ষা</th>
              <th scope="col">বিষয়</th>
              <th scope="col">ফলাফল</th>
            </tr>
          </thead>
          <tbody class="">
            @foreach($liveExams as $exam)
            <tr>
              <td>{{$exam->title}}</td>
              <td>{{join(', ',$exam->subjects->pluck('name')->toArray())}}</td>
              <td><a class="btn btn-sm btn-danger" href="{{route('all-results-exam',$exam->uuid)}}">দেখুন</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>


    </div>
    <div class="row">
      <div class="col-md-6">
        <h6 class="mt-5 fw-bold live-exam-heading mb-4">
          <i class="far fa-file-alt fs-3 text-muted"></i> <span class="text-success">আসন্ন পরীক্ষা </span>
        </h6>
        @foreach($upcomingExams as $exam)
        @php
        $from = new EasyBanglaDate\Types\BnDateTime($exam->from, new DateTimeZone('Asia/Dhaka'));
        $to = new EasyBanglaDate\Types\BnDateTime($exam->to, new DateTimeZone('Asia/Dhaka'));
        @endphp
        <div class="card border border-success rounded shadow mb-2">

          <div class="card-body">
            <div class=" d-flex justify-content-between gap-2 flex-wrap mb-3 text-muted" style="font-size: 12px ;font-weight:700">
              <span>শুরু : {{ $from->getDateTime()->format('j F, Y b h:i')}} </span> <span> শেষ : {{ $to->getDateTime()->format('j F, Y b h:i') }}</span>
            </div>
            <h4 class="text-success" style="font-weight: 700;">{{$exam->title}}</h4>
            <div style="height:2px;width:100px" class="bg-danger"></div>
            <p class="text-secondary mt-2">
              {{join(', ',$exam->subjects->pluck('name')->toArray())}}
            </p>
            <div class=" d-flex flex-sm-column flex-md-row gap-3  flex-wrap justify-content-between align-items-center mt-4">

            
              <div class="d-flex  gap-5 text-dark" style="font-size: 14px;">
                <span>
                  <i class="fa fa-coins"></i> : {{$exam->priceFormat()}}
                </span>
                <span>
                  <i class="fa fa-clock"></i> :

                  {{$exam->duration}} মিনিট
                </span>
                <span>
                  <i class="fa fa-users"></i> :

                  {{$exam->participants}} জন
                </span>

              </div>
            </div>




          </div>
        </div>
        @endforeach
      </div>
      <div class="col-md-6">
        <h6 class="mt-5 fw-bold live-exam-heading mb-4">
          <i class="fas fa-file-invoice fs-3 text-muted"></i> <span class="text-success">নোটিশ বোর্ড </span>
        </h6>
        @foreach($notices as $notice)
        <div class="card mb-3 col-md-12" style="">
          <div class="card-body">

            <h6 class="up-exam-title"><a href="{{$notice->fileLink}}">{{$notice->title}}</a></h6>
            <p class="live-exam-date pt-2"><span><i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($notice->created_at)->format('d M ,Y ') }} </span></p>
          </div>
        </div>
        @endforeach



      </div>
    </div>

  </div>
</section>
<!-- Live section end -->
<!-- Package section start -->
<section class="live-section" id="package">
  <div class="live-section-title" style="background-image: url({{asset('frontEnd-assets/img/Blog.png')}})">
    <h1 class="text-uppercase" style="font-weight:700 ;">আমাদের প্যাকেজসমূহ</h1>
  </div>
  <div class="container">
    <div class="d-flex flex-wrap gap-5 justify-content-center py-5">
      @foreach($packages as $package)
      @if($package->paid)
      <div>
        <div class="card border border-success shadow package-hover ">

          <div class="card-body d-flex  flex-column justify-content-center align-items-center shadow  p-5 gap-2">
            <div style="height:80px;width:80px" class="text-success shadow rounded-circle border-success border d-flex justify-content-center flex-column  align-items-center">
              <i class="fa fa-gifts fa-2x"></i>
            </div>
            <h4 class="text-uppercase" style="font-weight:700 ;">
              {{$package->title}}
            </h4>
            <h5 style="font-weight:700;">

              {{$numto->bnNum($package->price)}} &#2547;

            </h5>
            <ul class="premium-feature">
              <li><span>প্রশ্ন ব্যাংক</span></li>
              <li><span>সমস্ত রুটিন ভিত্তিক পরীক্ষা</span></li>
              <li><span>সমস্ত বিদ্যমান পরীক্ষা</span></li>
              <li><span>অনলাইন স্ব-পরীক্ষা</span></li>
              <li><span>কাজের সমাধান</span></li>

            </ul>
            <!-- <a href="{{route('orderCreate',['package',$package->id])}}" class="btn  btn-danger text-uppercase">
    Subscribe
  </a> -->
          </div>
        </div>
        <a class="btn btn-outline-danger d-block mt-3 text-uppercase" href="{{route('package-details',[Str::slug($package->title),$package])}}"> বিস্তারিত দেখুন</a>
      </div>

      @endif

      @endforeach

    </div>
  </div>
</section>
<!-- 
<section class="live-section">
  <div class="live-section-title" style="background-image: url({{asset('frontEnd-assets/img/Blog.png')}})">
    <h1 class="text-uppercase" style="font-weight:700 ;">Our Blog</h1>
  </div>
  <div class="container">

  </div>
</section> -->

<!-- Courses section start -->
<!-- <section class="live-section">
  <div class="live-section-title" style="background-image: url({{asset('frontEnd-assets/img/Blog.png')}})">
    <h1>Our Courses</h1>
  </div>
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-4 mb-5 ">
        <a href="">
          <img class="img-fluid" src="{{asset('frontEnd-assets/img/Bcs-prep.png')}}" alt="">
        </a>
      </div>
      <div class="col-md-4 mb-5 ">
        <a href="">
          <img class="img-fluid" src="{{asset('frontEnd-assets/img/Subject-Care.png')}}" alt="">
        </a>
      </div>
      <div class="col-md-4 mb-5 ">
        <a href="">
          <img class="img-fluid" src="{{asset('frontEnd-assets/img/Bank_Prep.png')}}" alt="">
        </a>
      </div>
      <div class="col-md-4 mb-5 ">
        <a href="">
          <img class="img-fluid" src="{{asset('frontEnd-assets/img/Bcs-prep.png')}}" alt="">
        </a>
      </div>
      <div class="col-md-4 mb-5 ">
        <a href="">
          <img class="img-fluid" src="{{asset('frontEnd-assets/img/Subject-Care.png')}}" alt="">
        </a>
      </div>
      <div class="col-md-4 mb-5 ">
        <a href="">
          <img class="img-fluid" src="{{asset('frontEnd-assets/img/Other.png')}}" alt="">
        </a>
      </div>
    </div>
</section> -->
<!-- Course section end -->

<section class="">
  <div class=" py-4 d-flex flex-column flex-md-row justify-content-around gap-3" style="background-image: url({{asset('frontEnd-assets/img/Blog.png')}})">
    <div class="d-flex flex-column justify-content-center align-items-center text-light">
      <i class="fa fa-users fa-3x"></i>
      <h6>সাবস্ক্রাইবার </h6>
      <h5>{{$numto->bnNum(App\Models\User::count())}}</h5>
    </div>

    <div class="d-flex flex-column justify-content-center align-items-center text-light gap-2">
      <i class="fa fa-file-alt fa-3x"></i>
      <h6>মডেল টেস্ট </h6>
      <h5>{{$numto->bnNum(App\Models\Exam::count())}}</h5>
    </div>

    <div class="d-flex flex-column justify-content-center align-items-center text-light gap-2">
      <i class="fa fa-question-circle fa-3x"></i>
      <h6>প্রশ্ন সংখ্যা </h6>
      <h5>{{$numto->bnNum(App\Models\Question::count())}}</h5>
    </div>

    <div class="d-flex flex-column justify-content-center align-items-center text-light gap-2">
      <i class="fa fa-chalkboard fa-3x"></i>
      <h6>ক্যাটাগরিসমূহ</h6>
      <h5>{{$numto->bnNum(App\Models\Category::count())}}</h5>
    </div>
  </div>
</section>

@endsection