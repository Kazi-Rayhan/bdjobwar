
@extends('frontEnd.layouts.app')
@section('content')
    <!-- nav bar end -->
    <!-- banner start -->
    <div class="banner-area banner-area-1" style="background-image: url('{{asset('frontEnd-assets/img/banner/2.png')}}');">
        <img class="animate-image-1 top_image_bounce" src="{{asset('frontEnd-assets/img/banner/5.png')}}" alt="img">
        <div class="container">
            <div class="banner-slider owl-carousel">
                <div class="item">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-9 order-lg-12 align-self-center">
                            <div class="thumb banner-animate-thumb pl-lg-5" style="background-image: url('{{asset('frontEnd-assets/img/banner/3.png')}}');">
                                <img src="{{asset('frontEnd-assets/img/banner/1.png')}}" alt="img">
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-1 mt-5 mt-lg-0 align-self-center">
                            <div class="banner-inner style-white text-center text-lg-left">
                                <h6 class="al-animate-1 sub-title">BSC Exam</h6>
                                <h1 class="al-animate-2 title">Preprae for the life biggest exam</h1>
                                <p class="al-animate-3">We have 100+ BSC exam prepartion exam and much more to help you achive you dream</p>
                                <a class="btn btn-white al-animate-4" href="course.html">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-9 order-lg-12 align-self-center">
                            <div class="thumb banner-animate-thumb pl-5" style="background-image: url('{{asset('frontEnd-assets/img/banner/3.png')}}');">
                                <img src="{{asset('frontEnd-assets/img/banner/1.png')}}" alt="img">
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-1 mt-5 mt-lg-0 align-self-center">
                            <div class="banner-inner style-white text-center text-lg-left">
                                <h6 class="b-animate-1 sub-title">University Admission Test </h6>
                                <h1 class="b-animate-2 title">Change the course of you life</h1>
                                <p>Prepare for admission tests with our 500 + exam and get the best education this country has to offer</p>
                                <a class="btn btn-white b-animate-3" href="course.html">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
    <!-- banner end -->   

    <!-- intro area start -->
    {{-- <div class="intro-area pd-top-90">
        <div class="container">
            <div class="intro-slider owl-carousel">
                @foreach($categories as $category)
                <div class="item">
                    <div class="single-intro-inner bg-base style-white text-center">
                        <!-- <div class="thumb">
                            <img src="{{asset('frontEnd-assets/img/intro/1.png')}}" alt="img">
                        </div> -->
                        <div class="details">
                            <h5>{{$category->name}}</h5>
                        </div>
                    </div>
                </div>

                @endforeach


         
            </div>
        </div>
    </div> --}}
    <!-- intro area end -->

    <!-- about area start -->
    {{-- <div class="about-area pd-top-90 pd-bottom-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-lg-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="thumb about-thumb  wow animated zoomIn" data-wow-duration="0.8s" data-wow-delay="0.1s">
                                <img src="{{asset('frontEnd-assets/img/about/2.png')}}" alt="img">
                            </div>
                            <div class="thumb about-thumb  wow animated zoomIn" data-wow-duration="0.8s" data-wow-delay="0.2s">
                                <img src="{{asset('frontEnd-assets/img/about/3.png')}}" alt="img">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="thumb about-thumb  wow animated zoomIn" data-wow-duration="0.8s" data-wow-delay="0.3s">
                                <img src="{{asset('frontEnd-assets/img/about/1.png')}}" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1 align-self-center mt-3 mt-lg-0 pb-4 pb-lg-0">
                    <div class="section-title mb-0">
                        <h5 class="sub-title">About EduGood</h5>
                        <h2 class="title">Welcome to Our Online Learning Center</h2>
                        <p class="content">we believe everyone should have the opportunity to create progress through technology and develop the skills of tomorrow.  paths should have and learning courses assessments, authored.</p>
                        <a class="btn btn-base" href="blog.html">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- about area end -->

    <!-- course section start -->
    <div class="course-area pd-top-115 pd-bottom-90 bg-parallax" style="background-image: url('{{asset('frontEnd-assets/img/bg/2.png')}}');">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title style-white text-md-right text-center">
                        <h5 class="sub-title">New Exams</h5>
                        <h2 class="title">Featured Exams</h2>
                    </div>
                </div>
            </div>
            <div class="course-slider slider-control-round owl-carousel">
                @foreach($exams as $exam)
                <div class="item">
                    <div class="single-course-inner">
                        <div class="thumb">
                            <!-- <img src="{{asset('frontEnd-assets/img/course/1.png')}}" alt="img"> -->
                            @foreach($exam->subjects as $subject)
                            <div class="cat-area">
                                <a class="cat-yellow" href="#">{{$subject->name}}</a>
                                <!-- <a class="cat-green" href="#">Design</a> -->
                            </div>
                            @endforeach
                        </div>
                        <div class="details">
                            <h5><a href="course-single.html">{{$exam->title}}</a></h5>
                            <div class="meta">
                                <div class="d-flex justify-content-between">
                                    <div class="">
                                        <span><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($exam->from)->format('d M ,Y')}} </span>
                                    </div>
                                    <div class="">
                                        <span class="text-info">To</span>
                                    </div>
                                  
                                    <div class="">
                                        <span><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($exam->to)->format('d M ,Y')}}  </span>
                                    </div>
                                    <!-- <div class="col-1 align-self-center">
                                        <span>To</span>
                                    </div> -->
                                    <!-- <div class="col-4 align-self-center">
                                        <span><i class="fa fa-clock-o"></i>16 May, 2022</span>
                                    </div> -->
                                    <!-- <div class="col-6 align-self-center">
                                        <div class="rating-inner text-right">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="btn-area">
                                <div class="row">
                                    <div class="col-6 align-self-center">
                                        <span class="price">BDT {{$exam->price}}</span>
                                    </div>
                                    <div class="col-6 align-self-center text-right">
                                        <a class="btn btn-border-base b-animate-3" href="{{ route('question',$exam)}}">Start Exam</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- <div class="item">
                    <div class="single-course-inner">
                        <div class="thumb">
                            <img src="{{asset('frontEnd-assets/img/course/2.png')}}" alt="img">
                            <div class="cat-area">
                                <a class="cat-yellow" href="#">Data</a>
                                <a class="cat-green" href="#">Design</a>
                            </div>
                        </div>
                        <div class="details">
                            <h5><a href="course-single.html">Fundamentals Design Theory Learn New student</a></h5>
                            <div class="meta">
                                <div class="row">
                                    <div class="col-6 align-self-center">
                                        <span><i class="fa fa-clock-o"></i>12 Week</span>
                                    </div>
                                    <div class="col-6 align-self-center">
                                        <div class="rating-inner text-right">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-area">
                                <div class="row">
                                    <div class="col-6 align-self-center">
                                        <span class="price">$150.00</span>
                                    </div>
                                    <div class="col-6 align-self-center text-right">
                                        <a class="btn btn-border-base b-animate-3" href="course-single.html">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-course-inner">
                        <div class="thumb">
                            <img src="{{asset('frontEnd-assets/img/course/3.png')}}" alt="img">
                            <div class="cat-area">
                                <a class="cat-yellow" href="#">Ui/Ux</a>
                                <a class="cat-green" href="#">Design</a>
                            </div>
                        </div>
                        <div class="details">
                            <h5><a href="course-single.html">Development Theory Learn student in New Batch</a></h5>
                            <div class="meta">
                                <div class="row">
                                    <div class="col-6 align-self-center">
                                        <span><i class="fa fa-clock-o"></i>11 Week</span>
                                    </div>
                                    <div class="col-6 align-self-center">
                                        <div class="rating-inner text-right">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-area">
                                <div class="row">
                                    <div class="col-6 align-self-center">
                                        <span class="price">$350.00</span>
                                    </div>
                                    <div class="col-6 align-self-center text-right">
                                        <a class="btn btn-border-base b-animate-3" href="course-single.html">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-course-inner">
                        <div class="thumb">
                            <img src="{{asset('frontEnd-assets/img/course/4.png')}}" alt="img">
                            <div class="cat-area">
                                <a class="cat-green" href="#">Design</a>
                            </div>
                        </div>
                        <div class="details">
                            <h5><a href="course-single.html">Music Theory Learn student New & Fundamentals</a></h5>
                            <div class="meta">
                                <div class="row">
                                    <div class="col-6 align-self-center">
                                        <span><i class="fa fa-clock-o"></i>12 Week</span>
                                    </div>
                                    <div class="col-6 align-self-center">
                                        <div class="rating-inner text-right">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-area">
                                <div class="row">
                                    <div class="col-6 align-self-center">
                                        <span class="price">$250.00</span>
                                    </div>
                                    <div class="col-6 align-self-center text-right">
                                        <a class="btn btn-border-base b-animate-3" href="course-single.html">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- course section End --> 

    <!-- counter start -->
    <!-- <div class="counter-area pd-top-115 pd-bottom-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-11">
                    <div class="section-title text-center">
                        <h5 class="sub-title">Funfact</h5>
                        <h2 class="title">Strength in Numbers</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-counter-inner text-center">
                        <div class="details">
                            <h2><span class="counter">230</span> k</h2>
                            <p>Downloaded</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-counter-inner text-center">
                        <div class="details">
                            <h2><span class="counter">40</span> k</h2>
                            <p>Feedback</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-counter-inner text-center">
                        <div class="details">
                            <h2><span class="counter">600</span> k</h2>
                            <p>Worker</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-counter-inner text-center">
                        <div class="details">
                            <h2><span class="counter">230</span> k</h2>
                            <p>Contributors</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- counter end -->

    <!-- video area start -->
    <!-- <div class="video-area bg-overlay-rgba pd-top-110 pd-bottom-120 jarallax" style="background-image: url('{{asset('frontEnd-assets/img/other/1.png')}}');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10">
                    <div class="section-title mb-2 text-center">
                        <h2 class="title">Watch Campus Life Video Tour</h2>
                        <p>we believe everyone should have the to create progress through technology and develop the skills of tomorrow. assessments, learning</p>
                        <a class="video-play-btn" href="../../www.youtube.com/embed/Wimkqo8gDZ0.html" data-effect="mfp-zoom-in"><i class="fa fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- video area end -->

    <!-- case-study start -->
    <div class="case-study-area pd-top-115 pd-bottom-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-11">
                    <div class="section-title text-center">
                        <h5 class="sub-title">Why Choose Us</h5>
                       
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-case-study-inner">
                        <div class="icon">
                            <img src="{{asset('frontEnd-assets/img/icon/1.png')}}" alt="img">
                        </div>
                        <div class="details">
                            <h5>Top Paid Faculity</h5>
                            <p>we believe everyone should have the to create</p>
                            <a class="read-more-text" href="course-single.html">Read More <i class="la la-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-case-study-inner">
                        <div class="icon">
                            <img src="{{asset('frontEnd-assets/img/icon/2.png')}}" alt="img">
                        </div>
                        <div class="details">
                            <h5>Graduation Certificate</h5>
                            <p>we believe everyone should have the to create</p>
                            <a class="read-more-text" href="course-single.html">Read More <i class="la la-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-case-study-inner">
                        <div class="icon">
                            <img src="{{asset('frontEnd-assets/img/icon/3.png')}}" alt="img">
                        </div>
                        <div class="details">
                            <h5>Online Exam Facilities</h5>
                            <p>we believe everyone should have the to create</p>
                            <a class="read-more-text" href="course-single.html">Read More <i class="la la-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-case-study-inner">
                        <div class="icon">
                            <img src="{{asset('frontEnd-assets/img/icon/4.png')}}" alt="img">
                        </div>
                        <div class="details">
                            <h5>Free Materials</h5>
                            <p>we believe everyone should have the to create</p>
                            <a class="read-more-text" href="course-single.html">Read More <i class="la la-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-case-study-inner">
                        <div class="icon">
                            <img src="{{asset('frontEnd-assets/img/icon/5.png')}}" alt="img">
                        </div>
                        <div class="details">
                            <h5>Free Books Library</h5>
                            <p>we believe everyone should have the to create</p>
                            <a class="read-more-text" href="course-single.html">Read More <i class="la la-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-case-study-inner">
                        <div class="icon">
                            <img src="{{asset('frontEnd-assets/img/icon/6.png')}}" alt="img">
                        </div>
                        <div class="details">
                            <h5>24/7 Support</h5>
                            <p>we believe everyone should have the to create</p>
                            <a class="read-more-text" href="course-single.html">Read More <i class="la la-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- case-study end -->

    <!-- course section start -->
    <!-- <div class="course-area bg-overlay pd-top-115 pd-bottom-90 jarallax" style="background-image: url('{{asset('frontEnd-assets/img/bg/1.png')}}');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 col-md-11">
                    <div class="section-title style-white text-center">
                        <h5 class="sub-title">Browse Categories</h5>
                        <h2 class="title">Pick a Course to Get Started</h2>
                    </div>
                </div>
            </div>
            <div class="lxyz-nav-tab style-white text-center">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">All Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">Data Science & Analytics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab3-tab" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">Computer Science</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab4-tab" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false">Foreign Language</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="single-course-inner">
                                <div class="thumb">
                                    <img src="{{asset('frontEnd-assets/img/course/1.png')}}" alt="img">
                                    <div class="cat-area">
                                        <a class="cat-yellow" href="#">Art</a>
                                        <a class="cat-green" href="#">Design</a>
                                    </div>
                                </div>
                                <div class="details">
                                    <h5><a href="course-single.html">Music Theory Learn student New & Fundamentals</a></h5>
                                    <div class="meta">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span><i class="fa fa-clock-o"></i>12 Week</span>
                                            </div>
                                            <div class="col-6 align-self-center">
                                                <div class="rating-inner text-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-area">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span class="price">$250.00</span>
                                            </div>
                                            <div class="col-6 align-self-center text-right">
                                                <a class="btn btn-border-base b-animate-3" href="course-single.html">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-course-inner">
                                <div class="thumb">
                                    <img src="{{asset('frontEnd-assets/img/course/2.png')}}" alt="img">
                                    <div class="cat-area">
                                        <a class="cat-yellow" href="#">Data</a>
                                        <a class="cat-green" href="#">Design</a>
                                    </div>
                                </div>
                                <div class="details">
                                    <h5><a href="course-single.html">Fundamentals Design Theory Learn New student</a></h5>
                                    <div class="meta">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span><i class="fa fa-clock-o"></i>12 Week</span>
                                            </div>
                                            <div class="col-6 align-self-center">
                                                <div class="rating-inner text-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-area">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span class="price">$150.00</span>
                                            </div>
                                            <div class="col-6 align-self-center text-right">
                                                <a class="btn btn-border-base b-animate-3" href="course-single.html">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-course-inner">
                                <div class="thumb">
                                    <img src="{{asset('frontEnd-assets/img/course/3.png')}}" alt="img">
                                    <div class="cat-area">
                                        <a class="cat-yellow" href="#">Ui/Ux</a>
                                        <a class="cat-green" href="#">Design</a>
                                    </div>
                                </div>
                                <div class="details">
                                    <h5><a href="course-single.html">Development Theory Learn student in New Batch</a></h5>
                                    <div class="meta">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span><i class="fa fa-clock-o"></i>11 Week</span>
                                            </div>
                                            <div class="col-6 align-self-center">
                                                <div class="rating-inner text-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-area">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span class="price">$350.00</span>
                                            </div>
                                            <div class="col-6 align-self-center text-right">
                                                <a class="btn btn-border-base b-animate-3" href="course-single.html">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-course-inner">
                                <div class="thumb">
                                    <img src="{{asset('frontEnd-assets/img/course/4.png')}}" alt="img">
                                    <div class="cat-area">
                                        <a class="cat-green" href="#">Data</a>
                                        <a class="cat-yellow" href="#">Java</a>
                                    </div>
                                </div>
                                <div class="details">
                                    <h5><a href="course-single.html">Computer Strategy law for all students</a></h5>
                                    <div class="meta">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span><i class="fa fa-clock-o"></i>12 Week</span>
                                            </div>
                                            <div class="col-6 align-self-center">
                                                <div class="rating-inner text-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-area">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span class="price">$250.00</span>
                                            </div>
                                            <div class="col-6 align-self-center text-right">
                                                <a class="btn btn-border-base b-animate-3" href="course-single.html">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-course-inner">
                                <div class="thumb">
                                    <img src="{{asset('frontEnd-assets/img/course/5.png')}}" alt="img">
                                    <div class="cat-area">
                                        <a class="cat-yellow" href="#">Data</a>
                                        <a class="cat-green" href="#">Marketing</a>
                                    </div>
                                </div>
                                <div class="details">
                                    <h5><a href="course-single.html">Achieving Advanced In Insights With Big</a></h5>
                                    <div class="meta">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span><i class="fa fa-clock-o"></i>12 Week</span>
                                            </div>
                                            <div class="col-6 align-self-center">
                                                <div class="rating-inner text-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-area">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span class="price">$50.00</span>
                                            </div>
                                            <div class="col-6 align-self-center text-right">
                                                <a class="btn btn-border-base b-animate-3" href="course-single.html">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-course-inner">
                                <div class="thumb">
                                    <img src="{{asset('frontEnd-assets/img/course/6.png')}}" alt="img">
                                    <div class="cat-area">
                                        <a class="cat-yellow" href="#">Marketing</a>
                                        <a class="cat-green" href="#">Digital</a>
                                    </div>
                                </div>
                                <div class="details">
                                    <h5><a href="course-single.html">Diploma in Teaching Skills for Educators</a></h5>
                                    <div class="meta">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span><i class="fa fa-clock-o"></i>12 Week</span>
                                            </div>
                                            <div class="col-6 align-self-center">
                                                <div class="rating-inner text-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-area">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span class="price">$250.00</span>
                                            </div>
                                            <div class="col-6 align-self-center text-right">
                                                <a class="btn btn-border-base b-animate-3" href="course-single.html">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="single-course-inner">
                                <div class="thumb">
                                    <img src="{{asset('frontEnd-assets/img/course/4.png')}}" alt="img">
                                    <div class="cat-area">
                                        <a class="cat-green" href="#">Data</a>
                                        <a class="cat-yellow" href="#">Java</a>
                                    </div>
                                </div>
                                <div class="details">
                                    <h5><a href="course-single.html">Computer Strategy law for all students</a></h5>
                                    <div class="meta">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span><i class="fa fa-clock-o"></i>12 Week</span>
                                            </div>
                                            <div class="col-6 align-self-center">
                                                <div class="rating-inner text-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-area">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span class="price">$250.00</span>
                                            </div>
                                            <div class="col-6 align-self-center text-right">
                                                <a class="btn btn-border-base b-animate-3" href="course-single.html">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-course-inner">
                                <div class="thumb">
                                    <img src="{{asset('frontEnd-assets/img/course/5.png')}}" alt="img">
                                    <div class="cat-area">
                                        <a class="cat-yellow" href="#">Data</a>
                                        <a class="cat-green" href="#">Marketing</a>
                                    </div>
                                </div>
                                <div class="details">
                                    <h5><a href="course-single.html">Achieving Advanced In Insights With Big</a></h5>
                                    <div class="meta">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span><i class="fa fa-clock-o"></i>12 Week</span>
                                            </div>
                                            <div class="col-6 align-self-center">
                                                <div class="rating-inner text-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-area">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span class="price">$50.00</span>
                                            </div>
                                            <div class="col-6 align-self-center text-right">
                                                <a class="btn btn-border-base b-animate-3" href="course-single.html">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-course-inner">
                                <div class="thumb">
                                    <img src="{{asset('frontEnd-assets/img/course/6.png')}}" alt="img">
                                    <div class="cat-area">
                                        <a class="cat-yellow" href="#">Marketing</a>
                                        <a class="cat-green" href="#">Digital</a>
                                    </div>
                                </div>
                                <div class="details">
                                    <h5><a href="course-single.html">Diploma in Teaching Skills for Educators</a></h5>
                                    <div class="meta">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span><i class="fa fa-clock-o"></i>12 Week</span>
                                            </div>
                                            <div class="col-6 align-self-center">
                                                <div class="rating-inner text-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-area">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span class="price">$250.00</span>
                                            </div>
                                            <div class="col-6 align-self-center text-right">
                                                <a class="btn btn-border-base b-animate-3" href="course-single.html">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-course-inner">
                                <div class="thumb">
                                    <img src="{{asset('frontEnd-assets/img/course/1.png')}}" alt="img">
                                    <div class="cat-area">
                                        <a class="cat-yellow" href="#">Art</a>
                                        <a class="cat-green" href="#">Design</a>
                                    </div>
                                </div>
                                <div class="details">
                                    <h5><a href="course-single.html">Music Theory Learn student New & Fundamentals</a></h5>
                                    <div class="meta">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span><i class="fa fa-clock-o"></i>12 Week</span>
                                            </div>
                                            <div class="col-6 align-self-center">
                                                <div class="rating-inner text-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-area">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span class="price">$250.00</span>
                                            </div>
                                            <div class="col-6 align-self-center text-right">
                                                <a class="btn btn-border-base b-animate-3" href="course-single.html">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-course-inner">
                                <div class="thumb">
                                    <img src="{{asset('frontEnd-assets/img/course/2.png')}}" alt="img">
                                    <div class="cat-area">
                                        <a class="cat-yellow" href="#">Data</a>
                                        <a class="cat-green" href="#">Design</a>
                                    </div>
                                </div>
                                <div class="details">
                                    <h5><a href="course-single.html">Fundamentals Design Theory Learn New student</a></h5>
                                    <div class="meta">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span><i class="fa fa-clock-o"></i>12 Week</span>
                                            </div>
                                            <div class="col-6 align-self-center">
                                                <div class="rating-inner text-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-area">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span class="price">$150.00</span>
                                            </div>
                                            <div class="col-6 align-self-center text-right">
                                                <a class="btn btn-border-base b-animate-3" href="course-single.html">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-course-inner">
                                <div class="thumb">
                                    <img src="{{asset('frontEnd-assets/img/course/3.png')}}" alt="img">
                                    <div class="cat-area">
                                        <a class="cat-yellow" href="#">Ui/Ux</a>
                                        <a class="cat-green" href="#">Design</a>
                                    </div>
                                </div>
                                <div class="details">
                                    <h5><a href="course-single.html">Development Theory Learn student in New Batch</a></h5>
                                    <div class="meta">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span><i class="fa fa-clock-o"></i>11 Week</span>
                                            </div>
                                            <div class="col-6 align-self-center">
                                                <div class="rating-inner text-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-area">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span class="price">$350.00</span>
                                            </div>
                                            <div class="col-6 align-self-center text-right">
                                                <a class="btn btn-border-base b-animate-3" href="course-single.html">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="single-course-inner">
                                <div class="thumb">
                                    <img src="{{asset('frontEnd-assets/img/course/6.png')}}" alt="img">
                                    <div class="cat-area">
                                        <a class="cat-yellow" href="#">Marketing</a>
                                        <a class="cat-green" href="#">Digital</a>
                                    </div>
                                </div>
                                <div class="details">
                                    <h5><a href="course-single.html">Diploma in Teaching Skills for Educators</a></h5>
                                    <div class="meta">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span><i class="fa fa-clock-o"></i>12 Week</span>
                                            </div>
                                            <div class="col-6 align-self-center">
                                                <div class="rating-inner text-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-area">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span class="price">$250.00</span>
                                            </div>
                                            <div class="col-6 align-self-center text-right">
                                                <a class="btn btn-border-base b-animate-3" href="course-single.html">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-course-inner">
                                <div class="thumb">
                                    <img src="{{asset('frontEnd-assets/img/course/5.png')}}" alt="img">
                                    <div class="cat-area">
                                        <a class="cat-yellow" href="#">Data</a>
                                        <a class="cat-green" href="#">Marketing</a>
                                    </div>
                                </div>
                                <div class="details">
                                    <h5><a href="course-single.html">Achieving Advanced In Insights With Big</a></h5>
                                    <div class="meta">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span><i class="fa fa-clock-o"></i>12 Week</span>
                                            </div>
                                            <div class="col-6 align-self-center">
                                                <div class="rating-inner text-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-area">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span class="price">$50.00</span>
                                            </div>
                                            <div class="col-6 align-self-center text-right">
                                                <a class="btn btn-border-base b-animate-3" href="course-single.html">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-course-inner">
                                <div class="thumb">
                                    <img src="{{asset('frontEnd-assets/img/course/2.png')}}" alt="img">
                                    <div class="cat-area">
                                        <a class="cat-yellow" href="#">Data</a>
                                        <a class="cat-green" href="#">Design</a>
                                    </div>
                                </div>
                                <div class="details">
                                    <h5><a href="course-single.html">Fundamentals Design Theory Learn New student</a></h5>
                                    <div class="meta">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span><i class="fa fa-clock-o"></i>12 Week</span>
                                            </div>
                                            <div class="col-6 align-self-center">
                                                <div class="rating-inner text-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-area">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span class="price">$150.00</span>
                                            </div>
                                            <div class="col-6 align-self-center text-right">
                                                <a class="btn btn-border-base b-animate-3" href="course-single.html">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-course-inner">
                                <div class="thumb">
                                    <img src="{{asset('frontEnd-assets/img/course/3.png')}}" alt="img">
                                    <div class="cat-area">
                                        <a class="cat-yellow" href="#">Ui/Ux</a>
                                        <a class="cat-green" href="#">Design</a>
                                    </div>
                                </div>
                                <div class="details">
                                    <h5><a href="course-single.html">Development Theory Learn student in New Batch</a></h5>
                                    <div class="meta">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span><i class="fa fa-clock-o"></i>11 Week</span>
                                            </div>
                                            <div class="col-6 align-self-center">
                                                <div class="rating-inner text-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-area">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span class="price">$350.00</span>
                                            </div>
                                            <div class="col-6 align-self-center text-right">
                                                <a class="btn btn-border-base b-animate-3" href="course-single.html">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-course-inner">
                                <div class="thumb">
                                    <img src="{{asset('frontEnd-assets/img/course/4.png')}}" alt="img">
                                    <div class="cat-area">
                                        <a class="cat-green" href="#">Data</a>
                                        <a class="cat-yellow" href="#">Java</a>
                                    </div>
                                </div>
                                <div class="details">
                                    <h5><a href="course-single.html">Computer Strategy law for all students</a></h5>
                                    <div class="meta">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span><i class="fa fa-clock-o"></i>12 Week</span>
                                            </div>
                                            <div class="col-6 align-self-center">
                                                <div class="rating-inner text-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-area">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span class="price">$250.00</span>
                                            </div>
                                            <div class="col-6 align-self-center text-right">
                                                <a class="btn btn-border-base b-animate-3" href="course-single.html">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-course-inner">
                                <div class="thumb">
                                    <img src="{{asset('frontEnd-assets/img/course/1.png')}}" alt="img">
                                    <div class="cat-area">
                                        <a class="cat-yellow" href="#">Art</a>
                                        <a class="cat-green" href="#">Design</a>
                                    </div>
                                </div>
                                <div class="details">
                                    <h5><a href="course-single.html">Music Theory Learn student New & Fundamentals</a></h5>
                                    <div class="meta">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span><i class="fa fa-clock-o"></i>12 Week</span>
                                            </div>
                                            <div class="col-6 align-self-center">
                                                <div class="rating-inner text-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-area">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span class="price">$250.00</span>
                                            </div>
                                            <div class="col-6 align-self-center text-right">
                                                <a class="btn btn-border-base b-animate-3" href="course-single.html">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="single-course-inner">
                                <div class="thumb">
                                    <img src="{{asset('frontEnd-assets/img/course/3.png')}}" alt="img">
                                    <div class="cat-area">
                                        <a class="cat-yellow" href="#">Ui/Ux</a>
                                        <a class="cat-green" href="#">Design</a>
                                    </div>
                                </div>
                                <div class="details">
                                    <h5><a href="course-single.html">Development Theory Learn student in New Batch</a></h5>
                                    <div class="meta">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span><i class="fa fa-clock-o"></i>11 Week</span>
                                            </div>
                                            <div class="col-6 align-self-center">
                                                <div class="rating-inner text-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-area">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span class="price">$350.00</span>
                                            </div>
                                            <div class="col-6 align-self-center text-right">
                                                <a class="btn btn-border-base b-animate-3" href="course-single.html">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-course-inner">
                                <div class="thumb">
                                    <img src="{{asset('frontEnd-assets/img/course/4.png')}}" alt="img">
                                    <div class="cat-area">
                                        <a class="cat-green" href="#">Data</a>
                                        <a class="cat-yellow" href="#">Java</a>
                                    </div>
                                </div>
                                <div class="details">
                                    <h5><a href="course-single.html">Computer Strategy law for all students</a></h5>
                                    <div class="meta">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span><i class="fa fa-clock-o"></i>12 Week</span>
                                            </div>
                                            <div class="col-6 align-self-center">
                                                <div class="rating-inner text-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-area">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span class="price">$250.00</span>
                                            </div>
                                            <div class="col-6 align-self-center text-right">
                                                <a class="btn btn-border-base b-animate-3" href="course-single.html">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-course-inner">
                                <div class="thumb">
                                    <img src="{{asset('frontEnd-assets/img/course/5.png')}}" alt="img">
                                    <div class="cat-area">
                                        <a class="cat-yellow" href="#">Data</a>
                                        <a class="cat-green" href="#">Marketing</a>
                                    </div>
                                </div>
                                <div class="details">
                                    <h5><a href="course-single.html">Achieving Advanced In Insights With Big</a></h5>
                                    <div class="meta">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span><i class="fa fa-clock-o"></i>12 Week</span>
                                            </div>
                                            <div class="col-6 align-self-center">
                                                <div class="rating-inner text-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-area">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span class="price">$50.00</span>
                                            </div>
                                            <div class="col-6 align-self-center text-right">
                                                <a class="btn btn-border-base b-animate-3" href="course-single.html">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-course-inner">
                                <div class="thumb">
                                    <img src="{{asset('frontEnd-assets/img/course/1.png')}}" alt="img">
                                    <div class="cat-area">
                                        <a class="cat-yellow" href="#">Art</a>
                                        <a class="cat-green" href="#">Design</a>
                                    </div>
                                </div>
                                <div class="details">
                                    <h5><a href="course-single.html">Music Theory Learn student New & Fundamentals</a></h5>
                                    <div class="meta">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span><i class="fa fa-clock-o"></i>12 Week</span>
                                            </div>
                                            <div class="col-6 align-self-center">
                                                <div class="rating-inner text-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-area">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span class="price">$250.00</span>
                                            </div>
                                            <div class="col-6 align-self-center text-right">
                                                <a class="btn btn-border-base b-animate-3" href="course-single.html">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-course-inner">
                                <div class="thumb">
                                    <img src="{{asset('frontEnd-assets/img/course/2.png')}}" alt="img">
                                    <div class="cat-area">
                                        <a class="cat-yellow" href="#">Data</a>
                                        <a class="cat-green" href="#">Design</a>
                                    </div>
                                </div>
                                <div class="details">
                                    <h5><a href="course-single.html">Fundamentals Design Theory Learn New student</a></h5>
                                    <div class="meta">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span><i class="fa fa-clock-o"></i>12 Week</span>
                                            </div>
                                            <div class="col-6 align-self-center">
                                                <div class="rating-inner text-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-area">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span class="price">$150.00</span>
                                            </div>
                                            <div class="col-6 align-self-center text-right">
                                                <a class="btn btn-border-base b-animate-3" href="course-single.html">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-course-inner">
                                <div class="thumb">
                                    <img src="{{asset('frontEnd-assets/img/course/6.png')}}" alt="img">
                                    <div class="cat-area">
                                        <a class="cat-yellow" href="#">Marketing</a>
                                        <a class="cat-green" href="#">Digital</a>
                                    </div>
                                </div>
                                <div class="details">
                                    <h5><a href="course-single.html">Diploma in Teaching Skills for Educators</a></h5>
                                    <div class="meta">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span><i class="fa fa-clock-o"></i>12 Week</span>
                                            </div>
                                            <div class="col-6 align-self-center">
                                                <div class="rating-inner text-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-area">
                                        <div class="row">
                                            <div class="col-6 align-self-center">
                                                <span class="price">$250.00</span>
                                            </div>
                                            <div class="col-6 align-self-center text-right">
                                                <a class="btn btn-border-base b-animate-3" href="course-single.html">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- course section End --> 

    <!-- testimonial section start -->
    <!-- <div class="testimonial-area pd-top-115 pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 col-md-11">
                    <div class="section-title text-center">
                        <h5 class="sub-title">Testimonials</h5>
                        <h2 class="title">Student Community Feedback</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="testimonial-slider owl-carousel">
                        <div class="item">
                            <div class="testimonial-content text-center">
                                <div class="author-thumb">
                                    <img src="{{asset('frontEnd-assets/img/testimonial/1.png')}}" alt="img">
                                </div>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, </p>
                                <div class="icon">
                                    <img src="{{asset('frontEnd-assets/img/testimonial/quote.png')}}" alt="img">
                                </div>
                                <h5><a href="#">Alexandra</a></h5>
                                <span class="author-meta">Popular University</span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content text-center">
                                <div class="author-thumb">
                                    <img src="{{asset('frontEnd-assets/img/testimonial/1.png')}}" alt="img">
                                </div>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, </p>
                                <div class="icon">
                                    <img src="{{asset('frontEnd-assets/img/testimonial/quote.png')}}" alt="img">
                                </div>
                                <h5><a href="#">Jlexa Enra</a></h5>
                                <span class="author-meta">Popular University</span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content text-center">
                                <div class="author-thumb">
                                    <img src="{{asset('frontEnd-assets/img/testimonial/1.png')}}" alt="img">
                                </div>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, </p>
                                <div class="icon">
                                    <img src="{{asset('frontEnd-assets/img/testimonial/quote.png')}}" alt="img">
                                </div>
                                <h5><a href="#">Andra Farno</a></h5>
                                <span class="author-meta">Popular University</span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content text-center">
                                <div class="author-thumb">
                                    <img src="{{asset('frontEnd-assets/img/testimonial/1.png')}}" alt="img">
                                </div>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, </p>
                                <div class="icon">
                                    <img src="{{asset('frontEnd-assets/img/testimonial/quote.png')}}" alt="img">
                                </div>
                                <h5><a href="#">Alexandra</a></h5>
                                <span class="author-meta">Popular University</span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content text-center">
                                <div class="author-thumb">
                                    <img src="{{asset('frontEnd-assets/img/testimonial/1.png')}}" alt="img">
                                </div>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, </p>
                                <div class="icon">
                                    <img src="{{asset('frontEnd-assets/img/testimonial/quote.png')}}" alt="img">
                                </div>
                                <h5><a href="#">Jesika Doe</a></h5>
                                <span class="author-meta">Popular University</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- testimonial section End -->

    <!--team-area start-->
    <!-- <div class="team-area bg-gray pd-top-115 pd-bottom-90">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-md-right text-center">
                        <h5 class="sub-title">Instructors</h5>
                        <h2 class="title">World-class Instructors</h2>
                    </div>
                </div>
            </div>
            <div class="team-slider slider-control-round owl-carousel">
                <div class="item">
                    <div class="single-team-inner text-center">
                        <div class="thumb">
                            <img src="{{asset('frontEnd-assets/img/team/1.png')}}" alt="img">
                        </div>
                        <div class="details">
                            <h5><a href="single-team.html">Alexandra</a></h5>
                            <p>Teaches Communication</p>
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
                </div>
                <div class="item">
                    <div class="single-team-inner text-center">
                        <div class="thumb">
                            <img src="{{asset('frontEnd-assets/img/team/2.png')}}" alt="img">
                        </div>
                        <div class="details">
                            <h5><a href="single-team.html">Amanda</a></h5>
                            <p>Teaches Communication</p>
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
                </div>
                <div class="item">
                    <div class="single-team-inner text-center">
                        <div class="thumb">
                            <img src="{{asset('frontEnd-assets/img/team/3.png')}}" alt="img">
                        </div>
                        <div class="details">
                            <h5><a href="single-team.html">Gabrielle</a></h5>
                            <p>Teaches Communication</p>
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
                </div>
                <div class="item">
                    <div class="single-team-inner text-center">
                        <div class="thumb">
                            <img src="{{asset('frontEnd-assets/img/team/4.png')}}" alt="img">
                        </div>
                        <div class="details">
                            <h5><a href="single-team.html">Angela</a></h5>
                            <p>Teaches Communication</p>
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
                </div>
                <div class="item">
                    <div class="single-team-inner text-center">
                        <div class="thumb">
                            <img src="{{asset('frontEnd-assets/img/team/5.png')}}" alt="img">
                        </div>
                        <div class="details">
                            <h5><a href="single-team.html">Hexandra</a></h5>
                            <p>Teaches Communication</p>
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
                </div>
            </div>
        </div>
    </div> -->
    <!--team-area end-->

    <!--blog-area start-->
    <!-- <div class="blog-area pd-top-115 pd-bottom-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-11">
                    <div class="section-title text-center">
                        <h5 class="sub-title">Latest News</h5>
                        <h2 class="title">University Latest Blog </h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="single-blog-inner">
                        <div class="thumb">
                            <img src="{{asset('frontEnd-assets/img/blog/1.png')}}" alt="img">
                        </div>
                        <div class="details">
                            <h4><a href="single-blog.html">Those Other College Expenses You Aren`t Thinking About</a></h4>
                            <p>we believe everyone should have the to create progress through and develop the skills of tomorrow. assessments, learning paths and courses authored.</p>
                            <div class="blog-meta">
                                <ul>
                                    <li class="author">Posted by: EduGood</li>
                                    <li>25 Jan, 2021</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-blog-inner">
                        <div class="thumb">
                            <img src="{{asset('frontEnd-assets/img/blog/2.png')}}" alt="img">
                        </div>
                        <div class="details">
                            <h4><a href="single-blog.html">Expenses You Aren`t Thinking About Those Other College</a></h4>
                            <p>we believe everyone should have the to create progress through and develop the skills of tomorrow. assessments, learning paths and courses authored.</p>
                            <div class="blog-meta">
                                <ul>
                                    <li class="author">Posted by: EduGood</li>
                                    <li>25 Jan, 2021</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!--blog-area end-->
    @endsection

