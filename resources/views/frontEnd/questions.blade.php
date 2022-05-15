@extends('frontEnd.layouts.app')
@section('content')
    <!-- page title start -->
    <div class="page-title-area bg-overlay text-center" style="background-image: url('{{asset('frontEnd-assets/img/bg/3.png')}}')">
        <div class="container">
            <div class="breadcrumb-inner">
                <h2 class="page-title">{{$exam->title}}</h2>
            </div>
        </div>
    </div>
    <!-- page title end -->

    <!-- single blog page -->
    <div class="main-blog-area pd-top-120 pd-bottom-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="course-details-page">
                        <div class="course-details-meta-list">
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <div class="media">
                                        <!-- <div class="media-left">
                                            <img src="{{asset('frontEnd-assets/img/team/1.png')}}" alt="img">
                                        </div> -->
                                        <div class="media-body align-self-center border-right">
                                            <span>Subjects</span>
                                            <div class="d-flex">
                                            @foreach($exam->subjects as $subject)
                                            <h6 class="mr-3 text-info"><a href="">{{$subject->name}}</a></h6>
                                          
                                        
                                        
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4 mt-md-0">
                                    <div class="row">
                                        <div class="align-self-center">
                                            <span>Categories</span>
                                            
                                           <div class="d-flex">
                                           @foreach($exam->categories as $category)
                                           <h6 class="mr-3 text-info"><a href="">{{$category->name}}</a></h6>
                                             @endforeach
                                           </div>
                                            
                                          
                                        </div>
                                
                                    </div>
                                </div>
                                <!-- <div class="col-md-3 mt-4 mt-md-0 align-self-center text-md-right">
                                    <div class="enrole-inner">
                                        <strong>Free</strong>
                                        <a class="btn btn-base" href="#">Get Enroll</a>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <!-- <div class="thumb">
                            <img src="{{asset('frontEnd-assets/img/course/course-single.png')}}" alt="img">
                        </div> -->
                        <!-- <div class="course-details-nav-tab text-center">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true"><i class="fa fa-book"></i> Overview</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">
                                        <i class="fa fa-file-text-o"></i> Course Features</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab3-tab" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">
                                        <i class="fa fa-graduation-cap"></i> Teachers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab4-tab" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false">
                                        <i class="fa fa-th"></i> Projects & Resources</a>
                                </li>
                            </ul>
                        </div> -->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                                <div class="course-details-content">
                                <form action="">
                                    @foreach($exam->questions as $question)
                                    <h4 class="title">{{$question->title}}</h4>
                                    <div class="d-flex flex-wrap ml-2 mb-5">
                                        @foreach($question->choices as $choice)
                                        <div class="form-check col-3">
                                            <input class="form-check-input" type="checkbox" value="">
                                            <label class="form-check-label">
                                                {{$choice->choice}}
                                            </label>
                                        </div>
                                        @endforeach
                             
                                    
                                 
                                
                               
                                 
                                        </div>
                                    </div>
                                    @endforeach
                               
                                    </form>
                      
                                </div>
                            </div>
                            <!-- <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                                <div class="course-details-content">
                                    <h4 class="title">Course Features Here</h4>
                                    <p>eLearning for the learnxyz You can start and finish one of these popular courses in under a day - for free! Check out the list below. “ LearnPress WordPress LMS Plugin designed with flexible & scalable</p>
                                    <div class="course-feature-area">
                                        <ul class="row">
                                            <li class="col-6">
                                                Course Features
                                            </li>
                                            <li class="col-6">
                                                <span>12</span>
                                            </li>
                                            <li class="col-6">
                                                Quizzes
                                            </li>
                                            <li class="col-6">
                                                <span>1</span>
                                            </li>
                                            <li class="col-6">
                                                Course Duration
                                            </li>
                                            <li class="col-6">
                                                <span>3 Hours</span>
                                            </li>
                                            <li class="col-6">
                                                Skill level 
                                            </li>
                                            <li class="col-6">
                                                <span>All Level</span>
                                            </li>
                                            <li class="col-6">
                                                Language 
                                            </li>
                                            <li class="col-6">
                                                <span>English</span>
                                            </li>
                                            <li class="col-6">
                                                Assessments
                                            </li>
                                            <li class="col-6">
                                                <span>Yes</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                                <div class="row">
                                    <div class="col-md-6">
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
                                    <div class="col-md-6">
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
                                    <div class="col-md-6">
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
                                    <div class="col-md-6">
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
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">
                                <div class="row">
                                    <div class="col-md-6">
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
                                    <div class="col-md-6">
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
                                    <div class="col-md-6">
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
                                    <div class="col-md-6">
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
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <!-- sidebar -->
                <!-- <div class="col-lg-4 col-12">
                    <div class="td-sidebar">
                        <div class="widget widget_search">
                            <form class="search-form">
                                <div class="form-group">
                                    <input type="text" placeholder="Search">
                                </div>
                                <button class="submit-btn" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>                  
                        <div class="widget widget-recent-post">                            
                            <h4 class="widget-title">Recent Course</h4>
                            <ul>
                                <li>
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="{{asset('frontEnd-assets/img/blog/w1.png')}}" alt="blog">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <h5 class="title"><a href="single-blog.html">World’s most famous Powerful JavaScript</a></h5>
                                            <div class="post-info">25 Jan, 2021</div>                             
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="{{asset('frontEnd-assets/img/blog/w2.png')}}" alt="blog">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <h5 class="title"><a href="single-blog.html">End Software Testing Training Audit Insurance</a></h5>
                                            <div class="post-info">25 Jan, 2021</div>                             
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="{{asset('frontEnd-assets/img/blog/w3.png')}}" alt="blog">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <h5 class="title"><a href="single-blog.html">Famous app Developers and Designer</a></h5>
                                            <div class="post-info">25 Jan, 2021</div>                                 
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="widget widget_catagory">
                            <h4 class="widget-title">Course Category</h4>                                 
                            <ul class="catagory-items">
                                <li><a href="#"><i class="fa fa-angle-right"></i>Course</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Learning</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Education</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Design</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Development</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Business</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>photography</a></li>
                            </ul>
                        </div>
                        <div class="widget widget_tags mb-0">
                            <h4 class="widget-title">Tags</h4>
                            <div class="tagcloud">
                                <a href="#">Art</a>
                                <a href="#">Creative</a>
                                <a href="#">Article</a>
                                <a href="#">Designer</a>
                                <a href="#">Portfolio</a>
                                <a href="#">Project</a>
                                <a href="#">Personal</a>
                                <a href="#">Landing</a>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- /.sidebar -->
            </div>
            <div class=" container course-area pd-top-100">
                <h4 class="mb-4">Related Courses</h4>
                <div class="row">
                    @foreach($exams as $exam)
                    <div class="col-lg-4 col-md-6">
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
                                        <span class="price">$ {{$exam->price}}</span>
                                    </div>
                                    <div class="col-6 align-self-center text-right">
                                        <a class="btn btn-border-base b-animate-3" href="{{ route('question',$exam)}}">Questions</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                    @endforeach
                    <!-- <div class="col-lg-4 col-md-6">
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
                                <img src="{{asset('frontEnd-assets/img/course/9.png')}}" alt="img">
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
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- single blog page end -->

@endsection