@extends('frontEnd.layouts.app')
@section('content')
    @php
        use Rakibhstu\Banglanumber\NumberToBangla;
        $numto = new NumberToBangla();
    @endphp
    <div class="d-flex justify-content-between">
        <h1 class=" live ">
            Live Exams
        </h1>

    </div>
    <hr>
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="live-section-title" style="background-image: url({{ asset('frontEnd-assets/img/Blog.png') }})">
                <h1 class="text-uppercase" style="font-weight:700 ;font-size:25px">পেইড পরিক্ষা চলছে :
                    {{ $numto->bnNum(count($liveExamsPaid)) }} টি</h1>
            </div>

            <div class="row">
                @foreach ($liveExamsPaid as $exam)
                    <div class="col-md-12">
                        <x-exam-card :exam="$exam" />
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="live-section-title" style="background-image: url({{ asset('frontEnd-assets/img/Blog.png') }})">
                <h1 class="text-uppercase" style="font-weight:700 ;font-size:25px"> ফ্রি পরিক্ষা চলছে :
                    {{ $numto->bnNum(count($liveExamsFree)) }} টি</h1>
            </div>

            <div class="row">
                @foreach ($liveExamsFree as $exam)
                    <div class="col-md-12">
                        <x-exam-card :exam="$exam" />
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
