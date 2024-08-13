@extends('frontEnd.layouts.app')
@section('css')
    <style>
        .marquee {
        }



        @keyframes marquee {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-50%);
            }
        }
    </style>
@endsection
@section('content')
    @php
        use Rakibhstu\Banglanumber\NumberToBangla;
        $numto = new NumberToBangla();
    @endphp


    <div class="b-success position-relative" style="overflow:hidden">

        <span class="h3 px-2 bg-success position-absolute d-flex justify-content-center align-items-center :"
            style="height:100%;z-index:20">Notice</span>
        <div class="marquee">
         
                <span class="text-success" style="white-space: nowrap;">
                    **** {{ $notice->description }} ****
                </span>
         
        </div>
    </div>

    <section class="container-fluid   justify-content-center mt-4">

        <div class="row ">
            <div class="col-md-12 col-xl-12 col-12 mb-2">
                <div id="carouselExampleDark" class="carousel carousel-dark slide mx-auto" data-bs-ride="carousel">

                    <div class="carousel-inner ">
                        @foreach ($sliderExams as $exam)
                            <div class="carousel-item @if ($loop->first) active @endif">
                                <a href="{{ $exam->link }}">
                                    <img class="d-block rounded slider-img" style="object-fit:contain;" height="300px"
                                        width="100%" src="{{ Voyager::image($exam->image) }}" alt="First slide">
                                </a>
                            </div>
                        @endforeach
                    </div>
                    @if (count($sliderExams) > 1)
                        <button class="carousel-control-prev  " style="background:none;border:none" type="button"
                            data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                            <span class=" bg-dark rounded-circle d-flex justify-content-center align-items-center "
                                style="height:40px;width:40px" aria-hidden="true"><i class="fa  fa-arrow-left"
                                    style="font-size:25px"></i></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" style="background:none;border:none" type="button"
                            data-bs-target="#carouselExampleDark" data-bs-slide="next">
                            <span class=" bg-dark rounded-circle d-flex justify-content-center align-items-center "
                                style="height:40px;width:40px" aria-hidden="true"><i class="fa  fa-arrow-right"
                                    style="font-size:25px"></i></span>

                            <span class="visually-hidden">Next</span>
                        </button>
                    @endif


                </div>

            </div>
            <div class="row">
                <div class="col-6 d-grid">
                    <a href="{{ route('liveexams') }}" class="btn btn-successh live"> Live Exam</a>
                </div>
                <div class="col-6 d-grid">
                    <a href="{{ route('courses') }}" class="btn btn-success">My Courses</a>
                </div>
            </div>
    </section>
    <section class="mt-2 container" id="courses">

        <div class="row py-5">
            <div class="col-12 mb-2">
                <div class="live-section-title" style="background-image: url({{ asset('frontEnd-assets/img/Blog.png') }})">
                    <h1 class="text-uppercase" style="font-weight:700 ;font-size:25px">আমাদের কোর্সসমূহ</h1>
                </div>
            </div>
            @foreach ($courses as $course)
                <div class="col-md-4 mb-3">
                    <a href="{{ $course->link() }}" style="font-decoration:none">

                        <div class="card package-hover shadow">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="{{ Voyager::image($course->thumbnail) }}"
                                            style="object-fit:fit;height:80px;width:80px"
                                            class="card-img-top border-rounded" alt="...">
                                    </div>
                                    <div class="col-9 d-flex flex-column justify-content-center align-items-start">
                                        <h4 title="{{ $course->title }}" class="text-dark">
                                            {{ Str::limit($course->title, 28) }}
                                        </h4>
                                        <span class="text-dark">
                                            <i class="fa fa-users"> ব্যাচ</i> :

                                            {{ $numto->bnNum($course->batches()->active()->count()) }} টি</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </a>


                    {{-- <div class="row">
                        <div class="col-5">
                            

                        </div>
                        <div class="col-7">

                            <div class="card-body d-flex flex-column justify-content-between h-100">
                                <div>
                                   
                                    <span>
                                        <i class="fa fa-users"> ব্যাচ</i> :

                                        {{ $numto->bnNum($course->batches()->active()->count()) }} টি</span>
        </div>







    </div>
    </div>
    </div> --}}

                </div>
            @endforeach


            <div class="live-section-title" style="background-image: url({{ asset('frontEnd-assets/img/Blog.png') }})">
                <h1 class="text-uppercase" style="font-weight:700 ;font-size:25px">আমাদের প্যাকেজসমূহ</h1>
            </div>
            <hr>
            <div class="container" id="package">
                <div class="row py-5">
                    @foreach ($packages as $package)
                        @if ($package->paid)
                            <div class="col-md-3 col-12">
                                <div class="card border border-success shadow package-hover ">

                                    <div
                                        class="card-body d-flex  flex-column justify-content-center align-items-center shadow  p-5 gap-2">
                                        <div style="height:80px;width:80px"
                                            class="text-success shadow rounded-circle border-success border d-flex justify-content-center flex-column  align-items-center">
                                            <i class="fa fa-gifts fa-2x"></i>
                                        </div>
                                        <h4 class="text-uppercase" style="font-weight:700 ;">
                                            {{ $package->title }}
                                        </h4>
                                        <h5 style="font-weight:700;">

                                            {{ $numto->bnNum($package->price) }} &#2547;

                                        </h5>
                                        <ul class="premium-feature">
                                            <li><span>প্রশ্ন ব্যাংক সার্চ ।</span></li>
                                            <li><span>সকল পেইড কোর্স ।</span></li>
                                            <li><span>জব সলিউশন ।</span></li>
                                            <li><span>পিডিএফ ডাউনলোড ।</span></li>
                                            <li><span>সকল লাইভ ও আর্কাইভ পরীক্ষা ।</span></li>

                                        </ul>

                                    </div>
                                </div>
                                @auth
                                    @if (@auth()->user()->information->package_id == $package->id)
                                        <a class="btn btn-outline-danger d-block my-3 text-uppercase" href="javascript:void(0)"
                                            onclick="alert('আপনি এই প্যাকেজটিতে সাবস্ক্রাইব করেছেন ')">
                                            সাবস্ক্রাইবড</a>
                                    @else
                                        <a class="btn btn-outline-danger d-block my-3 text-uppercase"
                                            href="{{ route('package-details', [Str::slug($package->title), $package]) }}">
                                            বিস্তারিত
                                            দেখুন</a>
                                    @endif
                                @else
                                    <a class="btn btn-outline-danger d-block my-3 text-uppercase"
                                        href="{{ route('package-details', [Str::slug($package->title), $package]) }}">
                                        বিস্তারিত
                                        দেখুন</a>
                                @endauth

                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>

        </div>
    </section>
@endsection
@section('js')
    <!-- Messenger Chat plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "109161351880535");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v15.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
@endsection
