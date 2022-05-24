<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/10ec6aaa98.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{asset('frontEnd-assets/css/style.css')}}" rel="stylesheet">
</head>
<body>
   
<!-- top nav -->
<nav class="top-nav" style="background-image: url({{asset('frontEnd-assets/img/Top.png')}})">
  <div class="container">
    <div class="d-flex flex-wrap justify-content-between">
        <div class="d-flex flex-wrap company-info">
            <p>রবিবার, ২২ মে ২০২২</p>
            <p><i class="fas fa-envelope"></i> info@quizcarnival.com</p>
            <p><i class="fas fa-phone-alt"></i>  01748545139</p>
        </div>
        <div class="d-flex flex-wrap top-btns">
          <a class="terms-btn" href="">Terms of use</a>
          <a class="cart-btn" href=""><i class="fas fa-shopping-cart"></i> CART</a>
        </div>
    </div>
  </div>
</nav>
<!-- top nav end-->
<!-- mid nav start -->
<nav class="mid-nav py-4">
  <div class="container d-flex justify-content-between flex-wrap">
    <div class="brand">
        <a class="navbar-brand" href="#">
              <img src="{{asset('frontEnd-assets/img/logo.png')}}" alt="">
        </a>
    </div>
    <div class="d-flex flex-wrap">
    <a class="g-play me-5 pe-5 pt-3" href=""><img src="{{asset('frontEnd-assets/img/PlayStore.png')}}" height="30" alt=""> DOWNLOAD APP</a>
    <div class="">
    <div class="input-group mb-3 pt-2">
      <input type="text" class="top-search" placeholder="Search..." aria-label="" aria-describedby="button-addon2">
      <button class="top-search-btn" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
    </div>
    </div>
    </div>
  </div>
</nav>

<!-- mid nav end -->
<!-- Main Nav start -->
<nav class="navbar navbar-expand-lg navbar-light py-3 main-nav" style="background-image: url({{asset('frontEnd-assets/img/Menu.png')}})">
  <div class="container">
  
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link nav-active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Package</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Live section</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Courses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Published books</a>
        </li>

      </ul>
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="auth-item">
          <a class="nav-link" aria-current="page" href="#">Sing In</a>
        </li>
        <li class="auth-item">
          <a class="nav-link" href="#">Sing Up</a>
        </li>


      </ul>
   
    </div>
  </div>
</nav>
<!-- Main Nav end -->
<!-- Slider section start -->
<section class="slider">
  <a href="">
    <img src="{{asset('frontEnd-assets/img/slider.png')}}" alt="">
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
                <div class="live-exam mb-5">
                    <h6 class="live-exam-name"><a href="">Special tests</a></h6>
                    <p class="live-exam-category"><a href="">Model test-2</a></p>
                    <p class="live-exam-date"><span><i class="far fa-calendar-alt"></i> 22 May, 2022 10:00 AM </span>| To <span><i class="far fa-calendar-alt"></i> 22 May, 2022 10:00 AM</span></p>
                    <a class="test-btn" href="">Give the test</a>
                </div>
                <div class="live-exam mb-5">
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
                </div>
            </div>
            <div class="col-md-4 ms-md-5 ps-md-5">
                <h6 class="mt-5 fw-bold live-exam-heading mb-4">
                <i class="fas fa-file-invoice fs-3 text-muted"></i> <span class="text-success">Upcoming tests</span>
                </h6>
                <div class="card mb-3 col-12" style="">
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
                </div>
                <div class="card mb-3 col-12" >
                  <div class="card-body">
                    <h6 class="up-exam-title"><a href="">44th BCS Prelim Final Model Test</a></h6>
                    <h6 class="up-exam-subtitle mb-2 text-muted my-3"><a class="" href="">Model test-2</a></h6>
                    <p class="live-exam-date"><span><i class="far fa-calendar-alt"></i> 22 May, 2022 10:00 AM </span>| To <span><i class="far fa-calendar-alt"></i> 22 May, 2022 10:00 AM</span></p>
                  </div>
                </div>
   
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
                <div class="card mb-3 col-md-12" style="">
                  <div class="card-body">
                    <h6 class="up-exam-title"><a href="">44th BCS Prelim Final Model Test</a></h6>
                    <p class="live-exam-date pt-2"><span><i class="far fa-calendar-alt"></i> 22 May, 2022 10:00 AM </span></p>
                  </div>
                </div>
                <div class="card mb-3 col-md-12" style="">
                  <div class="card-body">
                    <h6 class="up-exam-title"><a href="">44th BCS Prelim Final Model Test</a></h6>
                    <p class="live-exam-date pt-2"><span><i class="far fa-calendar-alt"></i> 22 May, 2022 10:00 AM </span></p>
                  </div>
                </div>
     

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
      </div>
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
        <img class="img-fluid" src="{{asset('frontEnd-assets/img/Job-Solution.png')}}" alt="">
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
        <img class="img-fluid" src="{{asset('frontEnd-assets/img/Job-Solution.png')}}" alt="">
        </a>
      </div>
   </div>
</section>
<!-- Course section end -->
<!--  -->
<section class="mt-4">
  <div class="bg-danger">
    <div class="d-flex justify-content-around flex-wrap pb-4">
      <div class="subscribers mt-3">
        <i class="fas fa-users text-white d-block d-flex justify-content-center fs-1"></i>
        <p class="text-white mt-2">Subscribers</p>
        <h5 class="text-white fw-bold text-center">540</h5>
      </div>
      <div class="subscribers mt-3">
        <i class="far fa-file-alt text-white d-block d-flex justify-content-center fs-1"></i>
        <p class="text-white mt-2">Model tests</p>
        <h5 class="text-white fw-bold text-center">320</h5>
      </div>
      <div class="subscribers mt-3">
        <i class="far fa-question-circle text-white d-block d-flex justify-content-center fs-1"></i>
        <p class="text-white mt-2">Question number</p>
        <h5 class="text-white fw-bold text-center">4540</h5>
      </div>
      <div class="subscribers mt-3">
        <i class="fas fa-chalkboard text-white d-block d-flex justify-content-center fs-1"></i>
        <p class="text-white mt-2">Course number</p>
        <h5 class="text-white fw-bold text-center">14</h5>
      </div>

  
    </div>
  </div>
</section>
<!--  -->
<!-- footer section start-->
<footer>
    <div class="">
      <div class="row">
          <div class="col-md-3 mt-3 footer-info">
                <div class="brand">
                  <a class="navbar-brand" href="#">
                        <img src="{{asset('frontEnd-assets/img/logo.png')}}" alt="">
                  </a>
                  <p class="location">Barishal,  Bangladesh</p>
                  <div class="contact">
                  <p class=""><i class="fas fa-phone-alt text-danger"></i>+88 01*******</p>
                  <p class=""><i class="far fa-envelope text-danger"></i>test@test.com</p>
                  </div>
                </div>
                    
            </div>
            <div class="col-md-8 bg-footer ">
                <div class="d-flex flex-wrap justify-content-around">
                    <div class="populer-course">
                            <h5 class="mt-3">Populer Courses</h5>
                            <a href="">
                              <p>Daily quiz-01</p>
                            </a>
                            <a href="">
                              <p>Daily quiz-02</p>
                            </a>
                            <a href="">
                              <p>Daily quiz-03</p>
                            </a>
                    </div>
                    <div class="populer-course">
                            <h5 class="mt-3">Populer Package</h5>
                            <a href="">
                              <p>Monthly</p>
                            </a>
                            <a href="">
                              <p>Three monts</p>
                            </a>
                            <a href="">
                              <p>Six months</p>
                            </a>
                            <a href="">
                              <p>Yearly</p>
                            </a>
                    </div>
                    <div class="populer-course">
                            <h5 class="mt-3">Job Guidline</h5>
                            <a href="">
                              <p>BCS</p>
                            </a>
                            <a href="">
                              <p>Bank</p>
                            </a>
                            <a href="">
                              <p>Focus Writing</p>
                            </a>
                            <a href="">
                              <p>Yearly</p>
                            </a>
                    </div>
                </div>
            </div>
      </div>
      <div class="d-flex justify-content-around flex-wrap mid-nav">
       <div class="social">
        <p class="text-danger mt-2">Stay with us</p>
          <p><a class="text-decoration-none  text-primary" href=""><i class="fab fa-facebook-f fs-3 me-2"></i></a> <a class="text-decoration-none text-danger" href=""><i class="fab fa-youtube fs-3"></i></a></p>
        </div>
   
      <div class="payment-method">
        <img class="" src="{{asset('frontEnd-assets/img/ssl.png')}}" alt="">
      </div>
      </div>
      <div class="row">
          <div class="col-md-3 mt-3 footer-info">
            <p class="copy-write">Copyright © All Rights Reserved by 2022-2024 Quiz Carnival</p>
                    
            </div>
            <div class="col-md-8 bg-footer dev-team">
             <p class="text-white mt-2 text-center">Developed By <a class="text-decoration-none text-danger" href="">Wizerd</a></p>
            </div>
      </div>
    </div>
</footer>
<!-- footer section end -->
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>