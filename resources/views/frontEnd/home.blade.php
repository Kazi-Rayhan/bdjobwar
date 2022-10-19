@extends('frontEnd.layouts.app')
@section('content')
    @php
        use Rakibhstu\Banglanumber\NumberToBangla;
        $numto = new NumberToBangla();
    @endphp
    <!-- Slider section start -->
    <section class="container-fluid  d-flex justify-content-center  " style="background-color:#161E31">
        <div class="row w-100 my-2">
            <div class="col-md-12 col-xl-7 col-12 mb-2">
                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">

                    <div class="carousel-inner ">
                        @foreach ($sliderExams as $exam)
                            <div class="carousel-item @if ($loop->first) active @endif">
                                <a href="{{ $exam->link }}">
                                    <img class="d-block rounded slider-img" style="object-fit:stretch;" height="400px"
                                        width="100%" src="{{ Voyager::image($exam->image) }}" alt="First slide">
                                </a>
                            </div>
                        @endforeach
                    </div>
                    @if (count($sliderExams) > 1)
                        <button class="carousel-control-prev  " type="button" data-bs-target="#carouselExampleDark"
                            data-bs-slide="prev">
                            <span class=" bg-dark rounded-circle d-flex justify-content-center align-items-center "
                                style="height:40px;width:40px" aria-hidden="true"><i class="fa  fa-arrow-left"></i></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                            data-bs-slide="next">
                            <span class=" bg-dark rounded-circle d-flex justify-content-center align-items-center "
                                style="height:40px;width:40px" aria-hidden="true"><i class="fa  fa-arrow-right"></i></span>

                            <span class="visually-hidden">Next</span>
                        </button>
                    @endif
                </div>

            </div>
            <div class="col-md-12 col-xl-5 col-12">
                <div class="card shadow video-card" style="background-color: none;">
                    <div class="card-body">
                        <h4 style="font-weight: 600;">
                            Videos
                        </h4>
                        <ul class="videos m-0 p-0">
                            @foreach ($videos as $video)
                                <li class="rounded">
                                    <a class="my-video-links" style="text-decoration: none;color:inherit"
                                        data-autoplay="true" data-vbtype="video" href="{{ $video->link }}">
                                        <span class=""><i class="fa fa-play"></i></span> {{ $video->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Slider section end -->
    <!-- Live section start -->
    <section class="live-section" id="live-section"
        style="background-image: url({{ asset('frontEnd-assets/img/bg.png') }})">
        <div class="live-section-title" style="background-image: url({{ asset('frontEnd-assets/img/Blog.png') }})">
            <h1 class="text-uppercase" style="font-weight:500 ; font-size:25px">লাইভ সেকশন</h1>
        </div>
        <div class="container">
            <div class="row " id="live-section-free">
                <div class="col-md-6">
                    <h6 class="mt-2 fw-bold live-exam-heading mb-4">
                        <i class="far fa-file-alt fs-3 text-muted"></i> <span class="text-danger"> লাইভ পরীক্ষা চলছে
                            <sup>Free</sup></span>
                    </h6>
                    @foreach ($liveExams as $exam)
                        <x-exam-card :exam="$exam" />
                    @endforeach
                </div>
                <div class="col-md-6">
                    <h6 class="mt-2 fw-bold live-exam-heading mb-4">
                        <i class="fas fa-file-alt fs-3 text-muted"></i> <span class="text-success">সম্প্রতি বন্ধ
                            <sup>Free</sup></span>
                    </h6>
                    @foreach ($finishedExams as $exam)
                        <x-exam-card :exam="$exam" />
                    @endforeach
                </div>

            </div>
            <div class="row" id="live-section-paid">
                <div class="col-md-6">
                    <h6 class="mt-2 fw-bold live-exam-heading mb-4">
                        <i class="far fa-file-alt fs-3 text-muted"></i> <span class="text-danger"> লাইভ পরীক্ষা চলছে
                            <sup>Paid</sup></span>
                    </h6>
                    @foreach ($livePaidExams as $exam)
                        <x-exam-card :exam="$exam" />
                    @endforeach
                </div>
                <div class="col-md-6">
                    <h6 class="mt-2 fw-bold live-exam-heading mb-4">
                        <i class="fas fa-file-alt fs-3 text-muted"></i> <span class="text-success">সম্প্রতি বন্ধ
                            <sup>Paid</sup></span>
                    </h6>
                    @foreach ($finishedPaidExams as $exam)
                        <x-exam-card :exam="$exam" />
                    @endforeach
                </div>

            </div>
            <div class="row">

                <div class="col-md-12 mb-4">
                    <h6 class="mt-2 fw-bold live-exam-heading mb-4">
                        <i class="fas fa-poll fs-3 text-muted"></i> <span class="text-success">সর্বশেষ ফলাফল </span>
                    </h6>
                    <table class="table table-striped table-light">
                        <thead class="text-muted">
                            <tr>
                                <th scope="col">পরীক্ষা</th>
                                <th scope="col">বিষয়</th>
                                <th scope="col">ফলাফল</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($latestResults as $exam)
                                <tr>
                                    <td>{{ $exam->title }} <br>
                                        <small>
                                            {{ $exam->sub_title }}
                                        </small>
                                    </td>
                                    <td>{{ join(', ', $exam->subjects->pluck('name')->toArray()) }}</td>
                                    <td><a class="btn btn-sm btn-success"
                                            href="{{ route('all-results-exam', $exam->uuid) }}">দেখুন</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
            <div class="row">
                <div class="col-md-6">
                    <h6 class="mt-2 fw-bold live-exam-heading mb-4">
                        <i class="far fa-file-alt fs-3 text-muted"></i> <span class="text-success">আসন্ন পরীক্ষা </span>
                    </h6>
                    @foreach ($upcomingExams as $exam)
                        @php
                            $from = new EasyBanglaDate\Types\BnDateTime($exam->from, new DateTimeZone('Asia/Dhaka'));
                            $to = new EasyBanglaDate\Types\BnDateTime($exam->to, new DateTimeZone('Asia/Dhaka'));
                        @endphp
                        <x-exam-card :exam="$exam" />
                    @endforeach
                </div>
                <div class="col-md-6">
                    <h6 class="mt-2 fw-bold live-exam-heading mb-4">
                        <i class="fas fa-file-invoice fs-3 text-muted"></i> <span class="text-success">নোটিশ বোর্ড </span>
                    </h6>
                    @foreach ($notices as $notice)
                        <div class="card mb-3 col-md-12" style="">
                            <div class="card-body">

                                <h6 class="up-exam-title"><a href="{{ $notice->fileLink }}">{{ $notice->title }}</a>
                                </h6>
                                <p class="live-exam-date pt-2"><span><i class="far fa-calendar-alt"></i>
                                        {{ \Carbon\Carbon::parse($notice->created_at)->format('d M ,Y ') }} </span></p>
                                <a href="{{ $notice->fileLink }}" class="btn btn-success">নোটিশ দেখুন</a>
                            </div>
                        </div>
                    @endforeach



                </div>
            </div>

        </div>
    </section>
    <section class="live-section" id="courses">
        <div class="live-section-title" style="background-image: url({{ asset('frontEnd-assets/img/Blog.png') }})">
            <h1 class="text-uppercase" style="font-weight:700 ;font-size:25px">আমাদের কোর্সসমূহ</h1>
        </div>
        <div class="container">
            <div class="row py-5">
                @foreach ($courses as $course)
                    <div class="col-md-4 mb-3">
                        <div class="card border-success shadow package-hover">

                            <img src="{{ Voyager::image($course->thumbnail) }}" height="300px"
                                style="object-fit:stretch" class="card-img-top" alt="...">


                            <div class="card-body">
                                <h4 class="card-title" title="{{ $course->title }}">{{ Str::limit($course->title, 28) }}
                                </h4>

                                <div
                                    class=" d-flex flex-sm-column flex-md-row gap-3  flex-wrap justify-content-between align-items-center mt-4">

                                    <a class="btn btn-success btn-lg " href="{{ $course->link() }}"
                                        style="font-size: 13px ;">ব্যাচসমূহ</a>
                                    <div class="d-flex  gap-5 text-dark" style="font-size: 14px;">

                                        <span>
                                            <i class="fa fa-users"> ব্যাচ</i> :

                                            {{ $numto->bnNum($course->batches()->active()->count()) }} টি</span>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Live section end -->
    <!-- Package section start -->
    <section class="live-section" id="package">
        <div class="live-section-title" style="background-image: url({{ asset('frontEnd-assets/img/Blog.png') }})">
            <h1 class="text-uppercase" style="font-weight:700 ;font-size:25px">আমাদের প্যাকেজসমূহ</h1>
        </div>
        <div class="container">
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
                                    href="{{ route('package-details', [Str::slug($package->title), $package]) }}"> বিস্তারিত
                                    দেখুন</a>
                            @endauth

                        </div>
                    @endif
                @endforeach

            </div>
        </div>


        <section class="">
            <div class=" py-4 d-flex flex-column flex-md-row justify-content-around gap-3"
                style="background-image: url({{ asset('frontEnd-assets/img/Blog.png') }})">
                <div class="d-flex flex-column justify-content-center align-items-center text-light">
                    <i class="fa fa-users fa-3x"></i>
                    <h6>সাবস্ক্রাইবার </h6>
                    <h5>{{ $numto->bnNum(App\Models\User::count()) }}</h5>
                </div>

                <div class="d-flex flex-column justify-content-center align-items-center text-light gap-2">
                    <i class="fa fa-file-alt fa-3x"></i>
                    <h6>মডেল টেস্ট </h6>
                    <h5>{{ $numto->bnNum(App\Models\Exam::count()) }}</h5>
                </div>

                <div class="d-flex flex-column justify-content-center align-items-center text-light gap-2">
                    <i class="fa fa-question-circle fa-3x"></i>
                    <h6>প্রশ্ন সংখ্যা </h6>
                    <h5>{{ $numto->bnNum(App\Models\Question::count()) }}</h5>
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
