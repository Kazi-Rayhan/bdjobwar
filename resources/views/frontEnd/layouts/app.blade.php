
<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from maantheme.com/uttara-university/home-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 May 2022 19:02:36 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Uttara-university - LMS & Online Courses Html Template</title>
    <link rel=icon href="{{asset('frontEnd-assets/img/favicon.png')}}" sizes="20x20" type="image/png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset('frontEnd-assets/css/vendor.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd-assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd-assets/css/responsive.css')}}">

</head>
<body>

    <!-- preloader area start -->
    <!-- <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div> -->
    <!-- preloader area end -->
    <div class="body-overlay" id="body-overlay"></div>

    <!-- navbar start -->
    <div class="navbar-area">
        <!-- navbar top start -->
        <div class="navbar-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 align-self-center text-md-left text-center">
                        <ul>
                            <li><p><i class="fa fa-phone"></i> +11 0259 3654 2360</p></li>
                            <li><p><i class="fa fa-envelope-o"></i>  info@website.com</p></li>
                        </ul>
                    </div>
                    <div class="col-md-4 d-none d-md-inline-block">
                        <ul class="topbar-right social-media text-md-right text-center">
                            <li>
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-area-1 navbar-area navbar-expand-lg">
            <div class="container nav-container">
                <div class="responsive-mobile-menu">
                    <button class="menu toggle-btn d-block d-lg-none" data-target="#edumint_main_menu" 
                    aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-left"></span>
                        <span class="icon-right"></span>
                    </button>
                </div>
                <div class="logo">
                    <a href="index.html"><img src="{{asset('frontEnd-assets/img/logo.png')}}" alt="img"></a>
                </div>
                <div class="collapse navbar-collapse" id="edumint_main_menu">
                    <ul class="navbar-nav text-right menu-open">
                        <li class="menu-item-has-children current-menu-item">
                            <a href="#">Home</a>
              
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Exam</a>
                          
                        </li>
                        <!-- <li class="menu-item-has-children">
                            <a href="#">Instructors</a>
                            <ul class="sub-menu">
                                <li><a href="team.html">Instructors</a></li>
                                <li><a href="single-team.html">Instructors Single</a></li>
                            </ul>
                        </li> -->
                        <li class="menu-item-has-children">
                            <a href="#">About</a>
                
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Blog</a>
                
                        </li>
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    @yield('content')

        <!-- footer area start -->
        <footer class="footer-area bg-overlay-rgba" style="background-image: url('{{asset('frontEnd-assets/img/other/1.png')}}');">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widget widget_contact">
                            <h4 class="widget-title">Contact Us</h4>
                            <ul class="details">
                                <li><i class="fa fa-map-marker"></i> 500 Treat Ave, Suite 200 San Francisco CA 94110</li>
                                <li><i class="fa fa-envelope"></i> info.contact@gmail.com</li>
                                <li><i class="fa fa-phone"></i> 012 345 678 9101</li>
                            </ul>
                            <ul class="social-media">
                                <li>
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget widget_nav_menu">
                            <h4 class="widget-title">Categorys</h4>
                            <ul>
                                <li><a href="course.html">Branding design</a></li>
                                <li><a href="course.html">Ui/Ux designing </a></li>
                                <li><a href="course.html">Make Elements</a></li>
                                <li><a href="course.html">Business</a></li>
                                <li><a href="course.html">Graphics design</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="widget widget_nav_menu">
                            <h4 class="widget-title">Uttara </h4>
                            <ul>
                                <li><a href="course.html">Exam</a></li>
                                <li><a href="team.html">Instructors</a></li>
                                <li><a href="signin.html">Sign In </a></li>
                                <li><a href="signup.html">Sign Up</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 pl-lg-5 pr-5 pr-lg-0">
                        <div class="widget widget_instagram">
                            <h4 class="widget-title">Gallery</h4>
                            <div class="instagram-inner">
                                <div class="row custom-gutters-10">
                                    <div class="col-6">
                                        <div class="thumb">
                                            <a href="gallery.html"><img src="{{asset('frontEnd-assets/img/instagram/1.png')}}" alt="img"></a>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="thumb">
                                            <a href="gallery.html"><img src="{{asset('frontEnd-assets/img/instagram/2.png')}}" alt="img"></a>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="thumb">
                                            <a href="gallery.html"><img src="{{asset('frontEnd-assets/img/instagram/3.png')}}" alt="img"></a>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="thumb">
                                            <a href="gallery.html"><img src="{{asset('frontEnd-assets/img/instagram/4.png')}}" alt="img"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 align-self-center">
                        <a href="index.html"><img src="{{asset('frontEnd-assets/img/footer-logo.png')}}" alt="img"></a>
                    </div>
                    <div class="col-md-8 text-md-right align-self-center mt-lg-0 mt-3">
                        <!-- <p>© 2021 MaanTheme. All Rights Reserved.</p> -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->

    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top"><i class="fa fa-angle-up"></i></span>
    </div>
    <!-- back to top area end -->


    <!-- all plugins here -->
    <script src="{{asset('frontEnd-assets/js/vendor.js')}}"></script>
    <!-- main js  -->
    <script src="{{asset('frontEnd-assets/js/main.js')}}"></script>
</body>

<!-- Mirrored from maantheme.com/uttara-university/home-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 May 2022 19:03:02 GMT -->
</html>