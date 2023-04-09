@extends('frontEnd.layouts.app')
@section('content')
    @php
        use Rakibhstu\Banglanumber\NumberToBangla;
        $numto = new NumberToBangla();
    @endphp

    <div class="container-fluid ">
        <h1 class="text-success">
            {{ $course->title }} :
        </h1>
        <hr>
        <div class="row mt-5">
            @foreach ($batches as $batch)
                <div class="col-md-6 mb-2">
                    <div class="card border-success shadow package-hover">

                        <div class="card-body">
                            <h2 class="card-title">{{ $batch->title }}</h2>

                            <div class="d-flex gap-2  justify-content-between align-items-center mt-3 flex-wrap text-dark "
                                style="font-size: 16px;">

                                <span>
                                    @auth
                                        @if (!auth()->user()->bought($batch->id))
                                            <i class="fa fa-coins"> মূল্য : @if ($batch->price > 0)
                                                    {{ $numto->bnNum($batch->price) }} ৳
                                                @else
                                                    ফ্রি
                                                @endif </i>
                                    </span>
                @endif
            @else
                <i class="fa fa-coins"> মূল্য : @if ($batch->price > 0)
                        {{ $numto->bnNum($batch->price) }} ৳
                    @else
                        ফ্রি
                    @endif </i> </span>
            @endauth
            <div class=" btn-group  gap-2">
                @if ($batch->price > 0)
                    @auth

                        @if (!auth()->user()->bought($batch->id))
                            <a href="{{ route('orderCreate', ['type' => 'batch', 'id' => $batch->id]) }}"
                                class="btn btn-success ">ভর্তি হন</a>
                        @endif
                    @else
                        <a href="{{ route('orderCreate', ['type' => 'batch', 'id' => $batch->id]) }}"
                            class="btn btn-success">ভর্তি হন</a>
                    @endauth
                @endif
                <a href="{{ $batch->link() }}" class="btn btn-success outline-success">বিস্তারিত
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
@endsection
