@extends('frontEnd.layouts.app')
@section('content')
<!-- Slider section start -->
<section class="slider">
  <a href="">
    <img src="{{asset('frontEnd-assets/img/slider.png')}}" alt="" width="100%" style="object-fit:cover">
  </a>
</section>
<!-- Slider section end -->
<!-- Live section start -->
<section class="live-section" style="background-image: url({{asset('frontEnd-assets/img/bg.png')}})">
  <div class="live-section-title" style="background-image: url({{asset('frontEnd-assets/img/Blog.png')}})">
    <h1>Live Section</h1>
  </div>
        <div class="container">
           <div class="row">
            <div class="col-md-6">
                <h6 class="mt-5 fw-bold live-exam-heading mb-4">
                <i class="far fa-file-alt fs-3 text-muted"></i> <span class="text-success">Live testing in progress</span>
                </h6>
                @foreach($liveExams as $exam)
                <div class="live-exam mb-5">
                    <h6 class="live-exam-name"><a href="">{{$exam->title}}</a></h6>
                     <div class="d-flex flex-wrap col-4">
                       @foreach($exam->categories as $category)
                     <p class="live-exam-category me-2"><a href="">{{$category->name}}</a></p>
                     @endforeach

                     </div>
                    <p class="live-exam-date"><span><i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($exam->from)->format('d M ,Y ') }} </span>| To <span><i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($exam->to)->format('d M ,Y') }}</span></p>
                    <a class="test-btn" href="{{route('question',$exam)}}">Give the test</a>
                </div>
                @endforeach
               
                <!-- <div class="live-exam mb-5">
                    <h6 class="live-exam-name"><a href="">44th BCS Prelim Final Model Test</a></h6>
                    <p class="live-exam-category"><a href="">Model test-2</a></p>
                    <p class="live-exam-date"><span><i class="far fa-calendar-alt"></i> 22 May, 2022 10:00 AM </span>| To <span><i class="far fa-calendar-alt"></i> 22 May, 2022 10:00 AM</span></p>
                    <a class="test-btn" href="">Give the test</a>
                </div>
                <div class="live-exam mb-5">
                  <h6 class="live-exam-name"><a href="">Special tests</a></h6>
                    <p class="live-exam-category"><a href="">Model test-2</a></p>
                    <p class="live-exam-date"><span><i class="far fa-calendar-alt"></i> 22 May, 2022 10:00 AM </span>| To <span><i class="far fa-calendar-alt"></i> 22 May, 2022 10:00 AM</span></p>
                    <a class="test-btn" href="">Give the test</a>
                </div> -->
            </div>
            <div class="col-md-4 ms-md-5 ps-md-5">
                <h6 class="mt-5 fw-bold live-exam-heading mb-4">
                <i class="fas fa-file-invoice fs-3 text-muted"></i> <span class="text-success">Upcoming tests</span>
                </h6>
                @foreach($upcommingTests as $upcommingTest)
                <div class="card mb-3 col-12" style="">
                  <div class="card-body">
                    <h6 class="up-exam-title"><a href="">{{$upcommingTest->title}}</a></h6>
                   <div class="d-flex flex-wrap ">
                     @foreach($upcommingTest->categories as $category)
                   <h6 class="up-exam-subtitle mb-2 text-muted my-3 pe-2"><a class="" href="">{{$category->name}}</a></h6>
                    @endforeach
                   </div>
                    <p class="live-exam-date"><span><i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($upcommingTest->from)->format('d M ,Y ') }} </span>| To <span><i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($upcommingTest->to)->format('d M ,Y') }}</span></p>
                  </div>
                </div>
                @endforeach
        
                <a class="test-btn" href="{{route('exams')}}">See more</a>
          
                <!-- <div class="card mb-3 col-12" >
                  <div class="card-body">
                    <h6 class="up-exam-title"><a href="">44th BCS Prelim Final Model Test</a></h6>
                    <h6 class="up-exam-subtitle mb-2 text-muted my-3"><a class="" href="">Model test-2</a></h6>
                    <p class="live-exam-date"><span><i class="far fa-calendar-alt"></i> 22 May, 2022 10:00 AM </span>| To <span><i class="far fa-calendar-alt"></i> 22 May, 2022 10:00 AM</span></p>
                  </div>
                </div>
                <div class="card mb-3 col-12" >
                  <div class="card-body">
                    <h6 class="up-exam-title"><a href="">44th BCS Prelim Final Model Test</a></h6>
                    <h6 class="up-exam-subtitle mb-2 text-muted my-3"><a class="" href="">Model test-2</a></h6>
                    <p class="live-exam-date"><span><i class="far fa-calendar-alt"></i> 22 May, 2022 10:00 AM </span>| To <span><i class="far fa-calendar-alt"></i> 22 May, 2022 10:00 AM</span></p>
                  </div>
                </div> -->
   
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-4">
              <h6 class="mt-5 fw-bold live-exam-heading mb-4">
              <i class="fas fa-poll-h fs-3 text-muted"></i> <span class="text-success">Latest results</span>
                </h6>
              <table class="table table-striped">
                  <thead class="text-muted">
                    <tr>
                      <th scope="col">Exam name</th>
                      <th scope="col">Subjects</th>
                      <th scope="col">Result</th>
                    </tr>
                  </thead>
                  <tbody class="text-muted">
                    <tr>
                      <td>Model test-1</td>
                      <td>BCS Prelim all subjects</td>
                      <td><a href="" class="btn-danger">See</a></td>
                    </tr>
                    <tr>
                      <td>Model test-2</td>
                      <td>BCS Prelim all subjects</td>
                      <td><a href="" class="btn-danger">See</a></td>
                    </tr>
                    <tr>
                      <td>Model test-3</td>
                      <td>BCS Prelim all subjects</td>
                      <td><a href="" class="btn-danger">See</a></td>
                    </tr>
                  </tbody>
              </table>
            </div>
            <div class="col-md-4 ms-md-5 ps-md-5 mb-4">
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
<section class="live-section">
  <div class="live-section-title" style="background-image: url({{asset('frontEnd-assets/img/Blog.png')}})">
    <h1>Our packages</h1>
  </div>
   <div class="container">
    <div class="row mt-5">
       @foreach($packages as $package)
      <div class="col-md-3 mb-5 ">
        <div class="card package">
          <div class="card-header bg-success text-center text-white">
            <div class="d-flex justify-content-center">
            <i class="fas fa-box-open bg-white text-danger rounded-circle p-2 fs-3"></i> <h5 class="mt-2 ps-2">{{$package->title}}</h5>
            </div>
          </div>
          <div class="card-body">
            <h5 class="card-title text-success ps-3 border-bottom pb-2">Premium features :</h5>
          <ul class="premium-feature">
            <li><span>Question bank searchs</span></li>
            <li><span>All routine-based test</span></li>
            <li><span>Question bank searchs</span></li>
            <li><span>All routine-based test</span></li>
            
          </ul>
          
          </div>
          <div class="card-footer bg-success">
          <div class="d-flex justify-content-center">
            <a href="#" class="valid-btn d-block">Expiration : {{$package->duration}} days</a>
          </div>
          <h5 class="text-white text-center my-3">subscription fees : {{$package->price}} BDT</h5>
          </div>
        </div>
        <a href="{{route('orderCreate',$package)}}" class="details-btn">Buy</a>
      </div>
      @endforeach
      <!-- <div class="col-md-3 mb-5 ">
        <div class="card package">
          <div class="card-header bg-success text-center text-white">
            <div class="d-flex justify-content-center">
            <i class="fas fa-box-open bg-white text-danger rounded-circle p-2 fs-3"></i> <h5 class="mt-2 ps-2">Monthly</h5>
            </div>
          </div>
          <div class="card-body">
            <h5 class="card-title text-success ps-3 border-bottom pb-2">Premium features :</h5>
          <ul class="premium-feature">
            <li><span>Question bank searchs</span></li>
            <li><span>All routine-based test</span></li>
            <li><span>Question bank searchs</span></li>
            <li><span>All routine-based test</span></li>
            
          </ul>
          
          </div>
          <div class="card-footer bg-success">
          <div class="d-flex justify-content-center">
            <a href="#" class="valid-btn d-block">Expiration : 30 days</a>
          </div>
          <h5 class="text-white text-center my-3">subscription fees : 100 BDT</h5>
          </div>
        </div>
        <a href="" class="details-btn">Details</a>
      </div>
      <div class="col-md-3 mb-5 ">
        <div class="card package">
          <div class="card-header bg-success text-center text-white">
            <div class="d-flex justify-content-center">
            <i class="fas fa-box-open bg-white text-danger rounded-circle p-2 fs-3"></i> <h5 class="mt-2 ps-2">Monthly</h5>
            </div>
          </div>
          <div class="card-body">
            <h5 class="card-title text-success ps-3 border-bottom pb-2">Premium features :</h5>
          <ul class="premium-feature">
            <li><span>Question bank searchs</span></li>
            <li><span>All routine-based test</span></li>
            <li><span>Question bank searchs</span></li>
            <li><span>All routine-based test</span></li>
            
          </ul>
          
          </div>
          <div class="card-footer bg-success">
          <div class="d-flex justify-content-center">
            <a href="#" class="valid-btn d-block">Expiration : 30 days</a>
          </div>
          <h5 class="text-white text-center my-3">subscription fees : 100 BDT</h5>
          </div>
        </div>
        <a href="" class="details-btn">Details</a>
      </div>
      <div class="col-md-3 mb-5 ">
        <div class="card package">
          <div class="card-header bg-success text-center text-white">
            <div class="d-flex justify-content-center">
            <i class="fas fa-box-open bg-white text-danger rounded-circle p-2 fs-3"></i> <h5 class="mt-2 ps-2">Monthly</h5>
            </div>
          </div>
          <div class="card-body">
            <h5 class="card-title text-success ps-3 border-bottom pb-2">Premium features :</h5>
          <ul class="premium-feature">
            <li><span>Question bank searchs</span></li>
            <li><span>All routine-based test</span></li>
            <li><span>Question bank searchs</span></li>
            <li><span>All routine-based test</span></li>
            
          </ul>
          
          </div>
          <div class="card-footer bg-success">
          <div class="d-flex justify-content-center">
            <a href="#" class="valid-btn d-block">Expiration : 30 days</a>
          </div>
          <h5 class="text-white text-center my-3">subscription fees : 100 BDT</h5>
          </div>
        </div>
        <a href="" class="details-btn">Details</a>
      </div> -->
    </div>
   </div>
</section>
<!-- Courses section start -->
<section class="live-section">
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
</section>
<!-- Course section end -->
<!--  -->
<section class="mt-4">
  <div class="bg-danger">
    <div class="d-flex justify-content-around flex-wrap pb-4">
      <div class="subscribers mt-3 pe-5">
        <i class="fas fa-users text-white d-block d-flex justify-content-center fs-1"></i>
        <p class="text-white mt-2">Subscribers</p>
        <h5 class="text-white fw-bold text-center">540</h5>
      </div>
      <div class="subscribers mt-3 pe-5">
        <i class="far fa-file-alt text-white d-block d-flex justify-content-center fs-1"></i>
        <p class="text-white mt-2">Model tests</p>
        <h5 class="text-white fw-bold text-center">320</h5>
      </div>
      <div class="subscribers mt-3 pe-5">
        <i class="far fa-question-circle text-white d-block d-flex justify-content-center fs-1"></i>
        <p class="text-white mt-2">Question number</p>
        <h5 class="text-white fw-bold text-center">4540</h5>
      </div>
      <div class="subscribers mt-3 pe-5">
        <i class="fas fa-chalkboard text-white d-block d-flex justify-content-center fs-1"></i>
        <p class="text-white mt-2">Course number</p>
        <h5 class="text-white fw-bold text-center">14</h5>
      </div>

  
    </div>
  </div>
</section>
<!--  -->


@endsection