@extends('frontEnd.layouts.app')
@section('content')
@php
use Rakibhstu\Banglanumber\NumberToBangla;
$numto = new NumberToBangla();
@endphp

<div class="container my-5">
    <h3 class="text-success">
        {{$course->title}}
    </h3>
    <div style="height:2px;width:100px" class="bg-danger"></div>
    <div class="row mt-5">
        @foreach($course->batches as $batch)
        <div class="col-md-6 mb-2">
            <div class="card border-success shadow package-hover">
                <img src="{{Voyager::image($batch->thumbnail)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-title">{{$batch->title}}</h3>
                    <div style="height:2px;width:100px" class="bg-danger"></div>
                    <div class=" d-flex flex-sm-column flex-md-row gap-3  flex-wrap justify-content-between align-items-center mt-4">

                        <div class=" btn-group gap-2">
                            <a href="{{$batch->link()}}" class="btn btn-success">বিস্তারিত</a>
                            <a href="#" class="btn btn-dark">রুটিন</a>

                        </div>
                        <div class="d-flex  gap-5 text-dark" style="font-size: 16px;">

                            <span>
                            <i class="fa fa-coins"> মূল্য : {{$numto->bnNum($batch->price)}} ৳ </i> </span>
                            <span>
                            <i class="fa fa-certificate"> পরীক্ষা : {{$numto->bnNum($batch->exams()->count())}}</i>
                            </span>

                        </div>
                    </div>
                </div>
            </div>
        
        </div>
        @endforeach
    </div>
</div>

@endsection