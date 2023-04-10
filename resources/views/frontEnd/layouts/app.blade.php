<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Koho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Koho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="assets/images/favicon/favicon.ico" type="image/x-icon">
    <title>BD Job War</title>

    <script src="https://kit.fontawesome.com/10ec6aaa98.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min2167.css?v=3.2.0') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/font-awesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/feather-icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">

    <link href="{{ asset('frontEnd-assets/css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.maateen.me/adorsho-lipi/font.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontEnd-assets/css/overright.css') }}">
    @yield('css')
    <style>
        body {
            font-family: 'AdorshoLipi', Arial, sans-serif !important;

        }

        .videos {
            list-style: none;
        }

        .videos li {
            border: 2px solid #161E31;
            color: #161E31;
            padding: 5px;
            margin: 10px 0px;
            transition: .2s ease-in;
        }

        .videos li a {
            font-size: 14px;
        }

        .videos li:hover {
            background-color: #161E31;
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

        .icon {
            transition: .2s ease-in;
        }

        .icon:hover {
            transform: rotate(5deg);
        }

        .icon-text {
            cursor: pointer;
        }

        .marquee {
            margin: 10px 0px;
            font-size: 14px;
            height: 24px;
            overflow: hidden;
        }

        .live {
            background-color: #FF6000 !important;


            border: none;
            color: #eeeeee;
            cursor: pointer;
            display: inline-block;
            font-family: sans-serif;
            font-size: 20px;
            padding: 5px 15px;
            text-align: center;
            text-decoration: none;
            transition: 1s;
        }

        .live:hover {
            background-color: transparent !important;
            border: 1px solid #FF6000;
            color: #FF6000;
        }

        @keyframes glowing {
            0% {
                background-color: #FF6000;
                box-shadow: 0 0 5px #FF6000;
            }

            50% {
                background-color: #FF6000;
                box-shadow: 0 0 20px #FF6000;
            }

            100% {
                background-color: #FF6000;
                box-shadow: 0 0 5px #FF6000
            }
        }

        .live {
            animation: glowing 1300ms infinite;
        }
    </style>




</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light sticky-top" style="z-index:10000">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('home_page') }}" class="nav-link">হোম</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('liveexams') }}" class="nav-link">লাইভ সেকশন</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('home_page') }}#courses" class="nav-link"> কোর্স
                        সমূহ</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('home_page') }}#package" class="nav-link"> প্যাকেজসমূহ</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('jobsolutions') }}" class="nav-link"> জব সলিউশন</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">



                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                @auth
                    <li class="nav-item ">
                        <a class="nav-link d-flex" data-widget="control-sidebar" data-controlsidebar-slide="true"
                            href="#" role="button">
                            <img src="{{ auth()->user()->avatar ? Storage::url(auth()->user()->avatar) : asset('profile.png') }}" style="height:30px" alt="">
                            {{ auth()->user()->name }}
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            Log In
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            Register
                        </a>
                    </li>
                @endauth

            </ul>
        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #161e31;">

            <a href="{{ url('/') }}" class="brand-link text-center">
                <img src="{{ asset('logo.png') }}" alt="AdminLTE Logo" class=""
                    style="opacity: .8;height:28px">
                <!-- <span class="brand-text font-weight-light">Bd Job War</span> -->
            </a>

            <div class="sidebar">

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">


                        <li class="nav-item ">
                            <a href="{{ route('home_page') }}" class="nav-link d-flex aling-items-center">
                                <i data-feather="home"></i>
                                <p class="ms-2">
                                    হোম
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('liveexams') }}" class="nav-link d-flex aling-items-center">
                                <i data-feather="target"></i>
                                <p class="ms-2">

                                    লাইভ সেকশন
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('home_page') }}#courses" class="nav-link d-flex aling-items-center">
                                <i data-feather="book"></i>
                                <p class="ms-2">

                                    কোর্স
                                    সমূহ
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('home_page') }}#package" class="nav-link d-flex aling-items-center">
                                <i data-feather="gift"></i>
                                <p class="ms-2">
                                    প্যাকেজসমূহ
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('jobsolutions') }}" class="nav-link d-flex aling-items-center">
                                <i data-feather="users"></i>
                                <p class="ms-2">
                                    জব
                                    সলিউশন
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>

        </aside>
        <div class="content-wrapper px-3 pt-3">

            @yield('content')
        </div>

        <footer class="main-footer p-0 mb-0">
            <div class="container-fluid bg-primary p-0">
                <div class="row justify-content-around ">
                    <div class="col-md-4 d-flex flex-column justify-content-center align-items-center footer-info">
                        <img src="{{ asset('logo.png') }}" width="150px" style="object-fit:stretch"
                            alt="">
                        <div class="d-flex flex-column align-items-center ">

                            <p class="text-light p-0 mt-3">
                                আমাদের মোবাইল অ্যাপ ডাউনলোড করুন
                            </p>
                            <a href="https://play.google.com/store/apps/details?id=bdjobwar.com">
                                <img src="{{ asset('download.png') }}" alt="" height="50">
                            </a>

                        </div>

                    </div>
                    @php
                        $fpackages = App\Models\Package::where('paid', 1)->get();
                        $fcourses = App\Models\Course::with('batches')
                            ->where('job_solutions', 0)
                            ->latest()
                            ->take(3)
                            ->get();
                        
                    @endphp

                    <div class="col-md-2 populer-course ">
                        <h5 class="mt-3">জনপ্রিয় প্যাকেজ </h5>
                        @foreach ($fpackages as $package)
                            @if (@auth()->user()->information->package_id == $package->id)
                                <a href="javascript:void(0)"
                                    onclick="alert('আপনি এই প্যাকেজটিতে সাবস্ক্রাইব করেছেন ')">
                                    <p>{{ $package->title }} </p>
                                </a>
                            @else
                                <a href="{{ route('package-details', [Str::slug($package->title), $package]) }}">
                                    <p>{{ $package->title }} </p>
                                </a>
                            @endif
                        @endforeach


                    </div>
                    <div class="col-md-2 populer-course">
                        <h5 class="mt-3">জনপ্রিয় কোর্সসমূহ </h5>
                        @foreach ($fcourses as $course)
                            <a href="{{ $course->link() }}">
                                <p>{{ Str::limit($course->title, 30) }}</p>
                            </a>
                        @endforeach


                    </div>
                    <div class="col-md-2 populer-course">
                        <p>
                            ঠিকানা: বরিশাল, বাংলাদেশ, মোবাইল: 01707725544, ইমেইল: hafizurrahaman013@gmail.com
                        </p>
                        <h5 class="mt-3">সোসাল লিঙ্ক</h5>
                        <p class="text-white social-link">আমাদের সাথে থাকো</p>
                        <a class="social-link" href="https://www.facebook.com/groups/bcsprimary2021"><i
                                class="fab fa-facebook-f fs-3 "></i></a>
                        {{-- <a class="social-link" href=""><i class="fab fa-youtube fs-3 ms-3 "></i></a>
                            <a class="social-link" href=""><i class="fab fa-instagram fs-3 ms-3  "></i></a>
                            <a class="social-link" href=""><i class="fab fa-twitter fs-3 ms-3 "></i></a> --}}

                    </div>

                </div>
            </div>
        </footer>

        <aside class="control-sidebar control-sidebar-dark">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">


                    <li class="nav-item ">
                        <a href="{{ route('dashboard') }}" class="d-flex aling-items-center">
                            <i data-feather="user"></i>
                            <p class="ms-2 mt-3">
                                ড্যাশবোর্ড
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('courses') }}" class="d-flex aling-items-center">
                            <i data-feather="book"></i>
                            <p class="ms-2 mt-3">
                                আপনার কোর্সসমূহ
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('courses') }}" class="d-flex aling-items-center">
                            <i data-feather="edit-2"></i>
                            <p class="ms-2 mt-3">
                                আপনার পরীক্ষাসমূহ
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">

                        <a href="{{ route('logout') }}" class="d-flex aling-items-center"
                            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                            <i data-feather="log-out"></i>
                            <p class="ms-2 mt-3">
                                লগ আউট
                            </p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>




                </ul>
            </nav>
        </aside>

    </div>

    <!-- latest jquery-->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <script src="{{ asset('assets/js/scrollbar/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/scrollbar/custom.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('assets/js/chart/knob/knob.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart/knob/knob-chart.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('assets/js/prism/prism.min.js') }}"></script>
    <script src="{{ asset('assets/js/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom-card/custom-card.js') }}"></script>
    <script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/default.js') }}"></script>

    <script src="{{ asset('assets/js/typeahead/handlebars.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.custom.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead-search/handlebars.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead-search/typeahead-custom.js') }}"></script>
    <!-- Theme js-->
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
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

    @if (session()->has('error'))
        <script>
            toastr.error("{{ session('error') }}")
        </script>
    @endif
    @if (session()->has('success'))
        <script>
            toastr.success("{{ session('success') }}")
        </script>
    @endif

    <script>
        function animate(element) {
            let elementWidth = element.offsetWidth;
            let parentWidth = element.parentElement.offsetWidth;
            let flag = 0;

            setInterval(() => {
                element.style.marginLeft = --flag + "px";

                if (elementWidth == -flag) {
                    flag = parentWidth;
                }
            }, 1);
        }

        [...document.getElementsByClassName('marquee')].map(e => {
            animate(e)
        })
    </script>


    <script src="{{ asset('dist/js/adminlte2167.js') }}?v=3.2.0"></script>
</body>

</html>
