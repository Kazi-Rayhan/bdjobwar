@extends('frontend.layouts.app')
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
                    <div class="card border-success shadow package-hover shadow">

                        <div class="card-body ">
                            <h2>{{ $batch->title }}</h2>

                            @auth
                                @if (!auth()->user()->bought($batch->id))
                                    <p style="font-size:20px">
                                        <i class="fa fa-coins"> মূল্য : @if ($batch->price > 0)
                                                {{ $numto->bnNum($batch->price) }} ৳
                                            @else
                                                ফ্রি
                                            @endif </i>
                                    </p>
                                @else
                                    <p style="font-size:20px"></p>
                                @endif
                            @else
                                <p style="font-size:20px">
                                    <i class="fa fa-coins"> মূল্য :
                                        @if ($batch->price > 0)
                                            {{ $numto->bnNum($batch->price) }} ৳
                                        @else
                                            ফ্রি
                                        @endif
                                    </i>
                                </p>
                            @endauth

                            <div class="d-flex justify-content-end w-100">

                                <div class="">
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


                                </div>

                            </div>



                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection
