<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'BD Job War') }}</title>
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">


  <script src="https://kit.fontawesome.com/10ec6aaa98.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="{{asset('frontEnd-assets/css/style.css')}}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
     alpha/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;1,200;1,300;1,400;1,600&display=swap" rel="stylesheet">
  <link href="https://fonts.maateen.me/charukola-ultra-light/font.css" rel="stylesheet">

  @yield('css')
  <style>
    body {
      font-family: 'CharukolaUltraLight', Arial, sans-serif !important;
    }
  </style>
</head>

<body>

  <!-- top nav -->
  <!-- <nav class="top-nav" style="background-image: url({{asset('frontEnd-assets/img/Blog.png')}})">
    <div class="container">
      <div class="d-flex flex-wrap justify-content-between">
        <div class="d-flex flex-wrap justify-content-center company-info">
          @php
          use EasyBanglaDate\Types\BnDateTime;
          use EasyBanglaDate\Types\DateTime as EnDateTime;

          $bongabda = new BnDateTime(now(), new DateTimeZone('Asia/Dhaka'));
          
          @endphp
          <p style="font-weight: 600;">{{ $bongabda->getDateTime()->format('l jS F Y ')}}</p>
          <p><i class="fas fa-envelope"></i> info@bdjobwar.com</p>
          <p><i class="fas fa-phone-alt"></i> 01748545139</p>
        </div>

      </div>
    </div>
  </nav> -->
  <!-- top nav end-->
  <!-- mid nav start -->
  <!-- <nav class="mid-nav py-4">
    <div class="container d-flex justify-content-between flex-wrap">
      <div class="brand">
        <a class="navbar-brand" href="{{route('home_page')}}">

          <img src="{{asset('frontEnd-assets/img/logo-eToro.png')}}" style="object-fit:contain" alt="">
        </a>



      </div>
      <div class="d-flex flex-wrap">
        <div class="">
          <div class="input-group mb-3 pt-2">
            <input type="text" class="top-search" placeholder="Search..." aria-label="" aria-describedby="button-addon2">
            <button class="top-search-btn" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </div>
    </div>
  </nav> -->

  <!-- mid nav end -->
  <!-- Main Nav start -->
  <!-- <nav class="navbar navbar-expand-lg navbar-light py-3 main-nav" style="background-image: url({{asset('frontEnd-assets/img/Blog.png')}})">
    <div class="container">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{route('home_page')}}#home">হোম</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('home_page')}}#live-section">লাইভ সেকশন</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('home_page')}}#package">প্যাকেজসমূহ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('exams')}}">পরীক্ষাসমূহ</a>
          </li>

        </ul>

        <ul class="navbar-nav mb-2 mb-lg-0">
          @auth

          <li class="auth-item">
            <a class="nav-link" aria-current="page" href="{{route('dashboard')}}">ড্যাশবোর্ড</a>
          </li>
          @else
          <li class="auth-item">
            <a class="nav-link" aria-current="page" href="{{route('login')}}">সাইন-ইন</a>
          </li>
          <li class="auth-item">
            <a class="nav-link" href="{{route('register')}}"> সাইন-আপ </a>
          </li>
          @endauth


        </ul>

      </div>
    </div>
  </nav> -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top" style="background-image: url({{asset('frontEnd-assets/img/Blog.png')}})">
  <div class="container">
  <a class="navbar-brand" href="#">
      <img src="{{asset('frontEnd-assets/img/logo-eToro.png')}}" alt="" width="100" height="80">
  </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ps-5">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{route('home_page')}}#home">হোম</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('home_page')}}#live-section">লাইভ সেকশন</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('home_page')}}#package">প্যাকেজসমূহ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('exams')}}">পরীক্ষাসমূহ</a>
          </li>

        </ul>

        <ul class="navbar-nav mb-2 mb-lg-0">
          @auth

          <li class="auth-item">
            <a class="nav-link" aria-current="page" href="{{route('dashboard')}}">ড্যাশবোর্ড</a>
          </li>
          @else
          <li class="auth-item">
            <a class="nav-link" aria-current="page" href="{{route('login')}}">সাইন-ইন</a>
          </li>
          <li class="auth-item">
            <a class="nav-link" href="{{route('register')}}"> সাইন-আপ </a>
          </li>
          @endauth


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
      <!-- <div class="row">
        <div class="col-md-3 mt-3 footer-info">
          <div class="brand">
            <a class="navbar-brand" href="#">
              <img src="{{asset('frontEnd-assets/img/logo.png')}}" height="60" width="60" style="object-fit:contain" alt="">
            </a>
            <p class="location">Barishal, Bangladesh</p>
            <div class="contact">
              <p class=""><i class="fas fa-phone-alt text-danger"></i>+88 01*******</p>
              <p class=""><i class="far fa-envelope text-danger"></i>test@test.com</p>
            </div>
          </div>

        </div> -->
      <div class="container-fluid bg-footer ">
        <div class="row justify-content-around">
          <div class="col-md-4 mt-3 footer-info">
            <div class="brand">
              <a class="navbar-brand" href="#">
                <img src="{{asset('frontEnd-assets/img/logo-eToro.png')}}" height="100" width="100" style="object-fit:contain" alt="">
              </a>
            </div>
            <p class="location mt-3"></p>

          </div>


          <div class="col-md-2 populer-course ">
            <h5 class="mt-3">জনপ্রিয় প্যাকেজ </h5>
            <a href="">
              <p>মাসিক </p>
            </a>
            <a href="">
              <p>ত্রৈমাসিক </p>
            </a>
            <a href="">
              <p>ষান্মাসিক </p>
            </a>
            <a href="">
              <p>বাৎসরিক </p>
            </a>
          </div>
          <div class="col-md-2 populer-course">
            <h5 class="mt-3">জব গাইডলাইন </h5>
            <a href="">
              <p>বিসিএস </p>
            </a>
            <a href="">
              <p>ব্যাংক </p>
            </a>
            <a href="">
              <p>ফোকাস রাইটিং </p>
            </a>

          </div>
          <div class="col-md-2 populer-course">
            <h5 class="mt-3">সোসাল লিঙ্ক</h5>
            <p class="text-white social-link">আমাদের সাথে থাকো</p>
            <a class="social-link" href=""><i class="fab fa-facebook-f fs-3 "></i></a>
            <a class="social-link" href=""><i class="fab fa-youtube fs-3 ms-3 "></i></a>
            <a class="social-link" href=""><i class="fab fa-instagram fs-3 ms-3  "></i></a>
            <a class="social-link" href=""><i class="fab fa-twitter fs-3 ms-3 "></i></a>

          </div>
        </div>
      </div>
      <!-- </div> -->
      <!-- Copyrigh -->

      <div class="text-center">
        <div class="copyright">
          <p>© {{ now()->year }} Copyright <a href="index.html">Bdjobwar.</a> All Right Reserved. Developed by <a target="blank" href="#">Uuizard</a></p>
        </div>
      </div>

      <!-- Copyrigh -->


    </div>
  </footer>
  <!-- footer section end -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script>
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": true,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "preventDuplicates": true,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
  </script>
  @if($errors->any())
  <script>
    @foreach($errors-> all() as $error)
    toastr.error("{{ session('error') }}")
    @endforeach
  </script>
  @endif
  @if(session()->has('error'))
  <script>
    toastr.error("{{ session('error') }}")
  </script>
  @endif
  @if(session()->has('success'))
  <script>
    toastr.success("{{ session('success') }}")
  </script>
  @endif

  @yield('js')

</body>

</html>