<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>BD Job War</title>
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">


  <script src="https://kit.fontawesome.com/10ec6aaa98.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="{{asset('frontEnd-assets/css/style.css')}}" rel="stylesheet">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;1,200;1,300;1,400;1,600&display=swap" rel="stylesheet">
  <link href="https://fonts.maateen.me/adorsho-lipi/font.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/venobox/2.0.4/venobox.css" integrity="sha512-FklhNXzHcdzrbf6AqtmZo3hOse+bIr/ofmEpzZmNWftOTsj8qWasNgJN6Y8d71grmcZZZa1bbHbXFbTTPCa3pA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  @yield('css')
  <style>
    body {
      font-family: 'AdorshoLipi', Arial, sans-serif !important;
      font-weight: 600;
    }
    .videos{
      list-style: none;
    }
    .videos li{
      border : 2px solid #161E31;
      color: #161E31;

      padding: 5px;
      margin: 10px 0px;
      transition: .2s ease-in;
      
    }
    .videos li a{
      font-size: 14px;
    }
    .videos li:hover{
      background-color :  #161E31;
      color: #fff;
    }

    /* Extra small devices (phones, 600px and down) */
    @media only screen and (max-width: 600px) {
      .video {
        width: 250px;
      }
    }

    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (min-width: 600px) {
      .video {
        width: 700px;
        height: 315px;
      }
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

          <img src="{{asset('frontEnd-assets/img/logo.png')}}" width="100" height="100" style="object-fit:contain" alt="">
        </a>



    
    </div>
  </nav> -->

  <!-- mid nav end -->
  <!-- Main Nav start -->
 
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" style="background-color:#161E31 !important">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="{{asset('frontEnd-assets/img/logo.png')}}" alt="" width="100" height="50" style="object-fit:cover">
      </a>
      <button class="navbar-toggler bg-success" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon "></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto" style="font-size: 14px;">
          <li class="nav-item">
            <a class="nav-link" style="font-size: 13px;" aria-current="page" href="{{route('home_page')}}#home">?????????</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" style="font-size: 13px;" href="{{route('home_page')}}#live-section">???????????? ???????????????</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="font-size: 13px;" href="{{route('home_page')}}#courses">??????????????? ????????????</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="font-size: 13px;" href="{{route('home_page')}}#package">????????????????????????????????? </a>
          </li>
          


          <li class="nav-item">
            <a class="nav-link" style="font-size: 13px;" href="{{route('jobsolutions')}}">?????? ??????????????????</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="font-size: 13px;" href="#">????????? ???????????????</a>
          </li>
        </ul>

        <ul class="navbar-nav mb-2 mb-lg-0">
          @auth

          <li class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{Auth()->user()->name}}
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
              <li><a class="dropdown-item" href="{{route('dashboard')}}">??????????????????????????????</a></li>
              <li>
                <!-- <a class="dropdown-item" href="#">Logout</a> -->
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                  <span class=" mr-3"></span>?????? ?????????</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form </li>

            </ul>
          </li>

          @else
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="{{route('login')}}">????????????</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('register')}}"> ???????????????????????????????????? </a>
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
      <div class="container-fluid bg-footer " style="background-color:#161E31 !important">
        <div class="row justify-content-around">
          <div class="col-md-4 d-flex justify-content-center align-items-center footer-info">
            <img src="{{asset('frontEnd-assets/img/logo.png')}}" height="150" width="150" alt="">


          </div>


          <div class="col-md-2 populer-course ">
            <h5 class="mt-3">????????????????????? ????????????????????? </h5>
            <a href="">
              <p>??????????????? </p>
            </a>
            <a href="">
              <p>??????????????????????????? </p>
            </a>
            <a href="">
              <p>??????????????????????????? </p>
            </a>
            <a href="">
              <p>????????????????????? </p>
            </a>
          </div>
          <div class="col-md-2 populer-course">
            <h5 class="mt-3">?????? ???????????????????????? </h5>
            <a href="">
              <p>?????????????????? </p>
            </a>
            <a href="">
              <p>?????????????????? </p>
            </a>
            <a href="">
              <p>??????????????? ?????????????????? </p>
            </a>

          </div>
          <div class="col-md-2 populer-course">
            <h5 class="mt-3">??????????????? ???????????????</h5>
            <p class="text-white social-link">?????????????????? ???????????? ????????????</p>
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
          <p>?? {{ now()->year }} Copyright <a href="{{url('/')}}">Bdjobwar.</a> All Right Reserved. Developed by <a target="blank" href="https://caregiver.com.bd/">Caregiver</a></p>
        </div>
      </div>

      <!-- Copyrigh -->


    </div>
  </footer>
  <!-- footer section end -->
  <!-- JavaScript Bundle with Popper -->
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  @yield('js')
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/venobox/2.0.4/venobox.min.js" integrity="sha512-KX9LF4BMXOG6qr9aGjFIPK1xysZAHWXpuZW6gnRi6oM+41qa8x4zaLPkckNxz5veoSWzmV5HZqPMMtknU+431g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    new VenoBox({
    selector: ".my-video-links"
});
  </script>
 
  <script>
    $(document).ready(function () { 
  $('.nav-item').click(function () {
     // if($(".navbar-collapse").hasClass("in")){
       $('.navbar-collapse').collapse('hide');
     // }
  });
});
  </script>

</body>

</html>