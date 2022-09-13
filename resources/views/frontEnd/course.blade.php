@extends('frontEnd.layouts.app')
@section('content')
    @php
        use Rakibhstu\Banglanumber\NumberToBangla;
        $numto = new NumberToBangla();
    @endphp

    <div class="container my-5">
        <h3 class="text-success">
            {{ $course->title }}
        </h3>
        <div style="height:2px;width:100px" class="bg-danger"></div>
        <div class="row mt-5">
            @foreach ($batches as $batch)
                <div class="col-md-4 mb-2">
                    <div class="card border-success shadow package-hover">
                        <img src="{{ Voyager::image($batch->thumbnail) }}" height="300px" style="object-fit:stretch"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title">{{ $batch->title }}</h3>
                            <div style="height:2px;width:100px" class="bg-danger"></div>
                            <div class="d-flex gap-2  justify-content-between align-items-center mt-3 flex-wrap text-dark "
                                style="font-size: 16px;">

                                <span>
                                    <i class="fa fa-coins"> মূল্য : @if ($batch->price > 0)
                                            {{ $numto->bnNum($batch->price) }} ৳
                                        @else
                                            ফ্রি
                                        @endif </i> </span>
                                <div class=" btn-group  gap-2">
                                    @if ($batch->price > 0)
                                        @auth

                                            @if (!auth()->user()->bought($batch->id))
                                                <a href="{{ route('orderCreate', ['type' => 'batch', 'id' => $batch->id]) }}"
                                                    class="btn btn-success">ভর্তি হন</a>
                                            @endif
                                        @else
                                            <a href="{{ route('orderCreate', ['type' => 'batch', 'id' => $batch->id]) }}"
                                                class="btn btn-success">ভর্তি হন</a>
                                        @endauth
                                    @endif
                                    <a href="{{ route('batch.details', $batch) }}" class="btn btn-success">বিস্তারিত
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
