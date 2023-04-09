@extends('dashboard.layouts.app')
@section('content')
@php
use Rakibhstu\Banglanumber\NumberToBangla;
$numto = new NumberToBangla();
@endphp
@if (count($courses) > 0)
<div class="container">
    <div class="row">

        @foreach ($courses as $course)
        <div class="col-md-6 mb-2">
            <div class="card border-success shadow package-hover">

                <div class="card-body">
                    <h2 class="card-title">{{ $course->title }}</h2>

                    <div class="d-flex gap-2  justify-content-between align-items-center mt-3 flex-wrap text-dark " style="font-size: 16px;">

                        <span>
                            @auth
                            @if (!auth()->user()->bought($course->id))
                            <i class="fa fa-coins"> মূল্য : @if ($course->price > 0)
                                {{ $numto->bnNum($course->price) }} ৳
                                @else
                                ফ্রি
                                @endif </i>
                        </span>
                        @endif
                        @else
                        <i class="fa fa-coins"> মূল্য : @if ($course->price > 0)
                            {{ $numto->bnNum($course->price) }} ৳
                            @else
                            ফ্রি
                            @endif </i> </span>
                        @endauth
                        <div class=" btn-group  gap-2">
                            @if ($course->price > 0)
                            @auth

                            @if (!auth()->user()->bought($course->id))
                            <a href="{{ route('orderCreate', ['type' => 'batch', 'id' => $course->id]) }}" class="btn btn-success ">ভর্তি হন</a>
                            @endif
                            @else
                            <a href="{{ route('orderCreate', ['type' => 'batch', 'id' => $course->id]) }}" class="btn btn-success">ভর্তি হন</a>
                            @endauth
                            @endif
                            <a href="{{ $course->link() }}" class="btn btn-success outline-success">বিস্তারিত
                                দেখুন</a>
                            <!-- <a href="#" class="btn btn-dark">রুটিন</a> -->

                        </div>

                    </div>


                </div>
            </div>

        </div>
        @endforeach
    </div>
</div>
@else
<div class="container d-flex justify-content-center align-items-center" style="height:80vh">

    <h1>
        You are not enrolled in any course.
    </h1>
</div>
@endif

@endsection