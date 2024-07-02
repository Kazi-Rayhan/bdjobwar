<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from admin.pixelstrap.com/koho/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Mar 2023 06:52:21 GMT -->

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
    <!-- Google font-->
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

    <link href="{{ asset('frontend-assets/css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.maateen.me/adorsho-lipi/font.css" rel="stylesheet">
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
            background-color: #0cf724;


            border: none;
            color: #eeeeee;
            cursor: pointer;
            display: inline-block;
            font-family: sans-serif;
            font-size: 20px;
            padding: 5px 15px;
            text-align: center;
            text-decoration: none;
        }

        @keyframes glowing {
            0% {
                background-color: #0cf724;
                box-shadow: 0 0 5px #0cf724;
            }

            50% {
                background-color: #0cf724;
                box-shadow: 0 0 20px #0cf724;
            }

            100% {
                background-color: #0cf724;
                box-shadow: 0 0 5px #0cf724
            }
        }

        .live {
            animation: glowing 1300ms infinite;
        }
    </style>
</head>

<body>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- Loader starts-->

    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-header">
            <div class="header-wrapper row m-0">

                <div class="header-logo-wrapper col-auto p-0">
                    <div class="logo-wrapper"><a href="{{ url('/') }}">
                            <img class="img-fluid for-light" src="{{ asset('logo.png') }}" alt="">
                            <img class="img-fluid for-dark" src="{{ asset('logo.png') }}" alt=""></a>
                    </div>
                    <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle"
                            data-feather="align-center"></i></div>
                </div>

                <div class="nav-right col-12 pull-right right-header p-0">
                    <ul class="nav-menus">


                        @auth

                            <li class="profile-nav onhover-dropdown p-0 me-0">
                                <div class="d-flex profile-media"><img class="b-r-50"
                                        src="{{ Voyager::image(auth()->user()->avatar) }}" alt="">
                                    <div class="flex-grow-1"><span>{{ auth()->user()->name }}</span>
                                        <p class="mb-0 font-roboto">Student <i class="middle fa fa-angle-down"></i></p>
                                    </div>
                                </div>
                                <ul class="profile-dropdown onhover-show-div">

                                    <li><a href="{{ route('dashboard') }}"> <i data-feather="user"></i> ড্যাশবোর্ড</a>
                                    </li>

                                    <li><a href="{{ route('courses') }}"><i data-feather="book"></i>আপনার কোর্সসমূহ</a>
                                    </li>
                                    <li><a href="{{ route('exams') }}"><i data-feather="edit-2"></i>আপনার পরীক্ষাসমূহ</a>
                                    </li>
                                    <li>
                                        <!-- <a class="dropdown-item" href="#">Logout</a> -->
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                                            <i data-feather="log-out"></i> লগ আউট</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form </li>



                                </ul>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}"> লগইন</a></li>
                            <li><a href="{{ route('register') }}"> রেজিস্টার</a></li>

                        @endauth
                    </ul>
                </div>
                <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">                        
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" style="color:#fff" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName"></div>
            </div>
            </div>
          </script>
                <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
            </div>
        </div>
        <!-- Page Header Ends                              -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <div class="sidebar-wrapper">
                <div>
                    <div class="logo-wrapper" style="background-color:#161e31"><a href="{{ url('/') }}"><img
                                class=" for-light" src="{{ asset('logo.png') }}" style="height:50px"
                                alt=""> </a>
                        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
                        <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle"
                                data-feather="align-left" style="color:#fff"> </i></div>
                    </div>
                    <div class="logo-icon-wrapper" style="background-color:#161e31"><a
                            href="{{ url('/') }}"><img class=" for-light" src="{{ asset('logo.png') }}"
                                style="height:20px" alt=""></a></div>
                    <nav class="sidebar-main">
                        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left" class="text-light"></i>
                        </div>
                        <div id="sidebar-menu">
                            <ul class="sidebar-links" id="simple-bar">
                                <li class="back-btn"><a href="{{ url('/') }}"><img class=" for-light"
                                            src="{{ asset('logo.png') }}" style="height:20px" alt=""></a>
                                    <div class="mobile-back text-end"><span>Back</span><i
                                            class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                                </li>


                                </li>
                                <li class="sidebar-list">
                                    <a class="nav-link " style="font-size: 13px;" aria-current="page"
                                        href="{{ route('home_page') }}"> <i data-feather="home"></i> <span>হোম</span>
                                    </a>
                                </li>

                                <li class="sidebar-list">
                                    <a class="nav-link" style="font-size: 13px;" href="{{ route('liveexams') }}"> <i
                                            data-feather="target"></i><span>লাইভ
                                            সেকশন</span></a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="nav-link" style="font-size: 13px;"
                                        href="{{ route('home_page') }}#courses"> <i data-feather="book"></i>
                                        <span>কোর্স
                                            সমূহ</span></a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="nav-link" style="font-size: 13px;"
                                        href="{{ route('home_page') }}#package"> <i data-feather="gift"></i><span>
                                            প্যাকেজসমূহ</span>
                                    </a>
                                </li>



                                <li class="sidebar-list">
                                    <a class="nav-link" style="font-size: 13px;"
                                        href="{{ route('jobsolutions') }}"><i data-feather="users"></i><span> জব
                                            সলিউশন</span></a>
                                </li>


                            </ul>
                        </div>
                        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                    </nav>
                </div>
            </div>
            <!-- Page Sidebar Ends-->
            <div class="page-body">

                <!-- Container-fluid starts-->
                <div class="container-fluid pt-5 default-page">
                    @yield('content')
                </div>
                <!-- Container-fluid Ends-->
            </div>
            <!-- footer start-->
            <footer class=" p-0">
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
        </div>
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
            }, 10);
        }

        [...document.getElementsByClassName('marquee')].map(e => {
            animate(e)
        })
    </script>

</body>



</html>
