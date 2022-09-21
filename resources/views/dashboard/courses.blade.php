@extends('dashboard.layouts.app')
@section('content')
    @php
        use Rakibhstu\Banglanumber\NumberToBangla;
        $numto = new NumberToBangla();
    @endphp
    <div class="container">
        <div class="row">
            @foreach ($courses as $course)
                <div class="col-md-4 mb-2">
                    <div class="card border-success shadow package-hover">
                        <img src="{{ Voyager::image($course->thumbnail) }}" height="300px" style="object-fit:stretch"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title">{{ $course->title }}</h3>
                           
                            <div class="d-flex  gap-5 text-dark mt-2" style="font-size: 14px;">

                                <span>
                                    <i class="fa fa-coins"> মূল্য : @if ($course->price > 0)
                                            {{ $numto->bnNum($course->price) }} ৳
                                        @else
                                            ফ্রি
                                        @endif </i> </span>
                                <span>
                                    <i class="fa fa-certificate"> পরীক্ষা :
                                        {{ $numto->bnNum($course->exams()->count()) }}</i>
                                </span>

                            </div>
                            <div class=" btn-group gap-2 mt-5">
                                @if ($course->price > 0)
                                    @auth

                                        @if (!auth()->user()->bought($course->id))
                                            <a href="{{ route('orderCreate', ['type' => 'batch', 'id' => $course->id]) }}"
                                                class="btn btn-success">ভর্তি হন</a>
                                        @endif
                                    @else
                                        <a href="{{ route('orderCreate', ['type' => 'batch', 'id' => $course->id]) }}"
                                            class="btn btn-success">ভর্তি হন</a>
                                    @endauth
                                @endif
                                <a href="{{ $course->link() }}" class="btn btn-success">বিস্তারিত দেখুন</a>
                                <!-- <a href="#" class="btn btn-dark">রুটিন</a> -->

                            </div>

                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection
