@extends('frontEnd.layouts.app')
@section('content')
<!-- Slider section start -->
<section class="slider">
  <a href="">
    <img src="{{asset('frontEnd-assets/img/slider.webp')}}" alt="" width="100%" style="object-fit:cover">
  </a>
</section>
<!-- Slider section end -->
<!-- Live section start -->
<section class="live-section" id="live-section" style="background-image: url({{asset('frontEnd-assets/img/bg.png')}})">
  <div class="live-section-title" style="background-image: url({{asset('frontEnd-assets/img/Blog.png')}})">
    <h1 class="text-uppercase" style="font-weight:700 ;">Live Section</h1>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h6 class="mt-5 fw-bold live-exam-heading mb-4">
          <i class="far fa-file-alt fs-3 text-muted"></i> <span class="text-success">Live Exams</span>
        </h6>
        @foreach($liveExams as $exam)
        <div class=" mb-4 card   rounded shadow">
          <div class="card-body">
            <h4 class="text-success">{{$exam->title}}</h4>

            <p class="text-secondary ">{{join(', ',$exam->categories->pluck('name')->toArray())}}</p>

            <div class=" d-flex gap-3 mb-4 text-dark" style="font-size: 12px ;">
              <span><i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($exam->from)->format('d M , Y ') }} </span> <span>To</span> <span> <i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($exam->to)->format('d M , Y') }}</span>
            </div>
            <a class="btn btn-outline-danger btn-sm " href="{{route('question',$exam->uuid)}}" style="font-size: 13px ;">Start Exam</a>
          </div>
        </div>
        @endforeach
      </div>
      <div class="col-md-6">
        <h6 class="mt-5 fw-bold live-exam-heading mb-4">
          <i class="fas fa-users fs-3 text-muted"></i> <span class="text-success">Live Examinees</span>
        </h6>
        <ul class="list-group ">
          @foreach($liveExaminees as $examinee)
          <li class="list-group-item bg-transparent">
            {{App\Models\User::find($examinee->user_id)->name}} - {{App\Models\Exam::find($examinee->exam_id)->title}}
          </li>
          @endforeach
        </ul>
      </div>

    </div>
    <div class="row">
      <div class="col-md-6 mb-4">
        <h6 class="mt-5 fw-bold live-exam-heading mb-4">
          <i class="fas fa-chess fs-3 text-muted"></i> <span class="text-success">This Week Top</span>
        </h6>
        <table class="table table-striped table-light">
          <thead class="text-muted">
            <tr>
              <th scope="col">Position</th>
              <th scope="col">Name</th>
              <th scope="col">Score</th>
            </tr>
          </thead>
          <tbody class="">
            @foreach($topStudents as $pos => $student)
            <tr>
              <td>{{$pos+1}}</td>
              <td>{{$student->user->name}}</td>
              <td>{{$student->total}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="col-md-6 mb-4">
        <h6 class="mt-5 fw-bold live-exam-heading mb-4">
          <i class="fas fa-poll fs-3 text-muted"></i> <span class="text-success">Latest Exam Result</span>
        </h6>
        <table class="table table-striped table-light">
          <thead class="text-muted">
            <tr>
              <th scope="col">Exam</th>
              <th scope="col">Subjects</th>
              <th scope="col">Result</th>
            </tr>
          </thead>
          <tbody class="">
            @foreach($liveExams as $exam)
            <tr>
              <td>{{$exam->title}}</td>
              <td>{{join(', ',$exam->subjects->pluck('name')->toArray())}}</td>
              <td><a class="btn btn-sm btn-danger" href="">See</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>


    </div>
    <div class="row">
      <div class="col-md-6">
        <h6 class="mt-5 fw-bold live-exam-heading mb-4">
          <i class="far fa-file-alt fs-3 text-muted"></i> <span class="text-success">Upcoming Exams</span>
        </h6>
        @foreach($upcomingExams as $exam)
        <div class=" mb-4 card bg-transparent  rounded shadow">
          <div class="card-body">
            <h6>{{$exam->title}}</h6>

            <p class="text-secondary ">{{join(', ',$exam->categories->pluck('name')->toArray())}}</p>

            <div class=" d-flex gap-3 mb-4 text-dark" style="font-size: 12px ;">
              <span><i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($exam->from)->format('d M , Y ') }} </span> <span>To</span> <span> <i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($exam->to)->format('d M , Y') }}</span>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="col-md-6">
        <h6 class="mt-5 fw-bold live-exam-heading mb-4">
          <i class="fas fa-file-invoice fs-3 text-muted"></i> <span class="text-success">Notice board</span>
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
    <h1 class="text-uppercase" style="font-weight:700 ;">Our packages</h1>
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

              {{$package->price}} &#2547;

            </h5>
            <ul class="premium-feature">
              <li><span>Question Bank</span></li>
              <li><span>All routine based test</span></li>
              <li><span>All exisiting test</span></li>
              <li><span>Online Self Test</span></li>
              <li><span>Job Solution</span></li>

            </ul>
            <!-- <a href="{{route('orderCreate',['package',$package->id])}}" class="btn  btn-danger text-uppercase">
    Subscribe
  </a> -->
          </div>
        </div>
        <a class="btn btn-outline-danger d-block mt-3 text-uppercase" href="{{route('package-details',[Str::slug($package->title),$package])}}"> See Details</a>
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
<!--  -->
<section class="" >
  <div class="bg-danger py-4 d-flex flex-column flex-md-row justify-content-around gap-3">
    <div class="d-flex flex-column justify-content-center align-items-center text-light">
      <i class="fa fa-users fa-3x"></i>
      <h6>Users</h6>
      <h5>{{App\Models\User::count()}}</h5>
    </div>
    
    <div class="d-flex flex-column justify-content-center align-items-center text-light gap-2">
      <i class="fa fa-file-alt fa-3x"></i>
      <h6>Model Test</h6>
      <h5 >{{App\Models\Exam::count()}}</h5>
    </div>
    
    <div class="d-flex flex-column justify-content-center align-items-center text-light gap-2">
      <i class="fa fa-question-circle fa-3x"></i>
      <h6>Questions</h6>
      <h5>{{App\Models\Question::count()}}</h5>
    </div>
    
    <div class="d-flex flex-column justify-content-center align-items-center text-light gap-2">
      <i class="fa fa-chalkboard fa-3x"></i>
      <h6>Categories</h6>
      <h5>{{App\Models\Category::count()}}</h5>
    </div>
  </div>
</section>

@endsection