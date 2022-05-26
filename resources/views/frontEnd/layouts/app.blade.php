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
    @yield('css')
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
          <a class="nav-link" href="{{route('register')}}">Sing Up</a>
        </li>


      </ul>
   
    </div>
  </div>
</nav>
<!-- Main Nav end -->
<main>
@yield('content')
</main>
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
@yield('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>