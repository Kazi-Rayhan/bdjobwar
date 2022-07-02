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
            <div class="card shadow package-hover">
                <div class="d-flex gap-5">
                    <img src="{{Voyager::image($batch->thumbnail)}}" style="object-fit:cover" class="w-50" alt="{{$batch->title}}">
                    <div class="p-3 d-flex flex-column gap-4 ">
                        <div>
                            <h5 class="text-success">
                                {{$batch->title}}
                            </h5>
                            <div style="height:2px;width:100px" class="bg-danger"></div>

                        </div>
                        <ul style="list-style: none;margin:0px;padding:0px;" class="text-muted">
                            <li>
                                <i class="fa fa-coins"> মূল্য : {{$numto->bnNum($batch->price)}} ৳ </i>
                            </li>
                            <li>
                                <i class="fa fa-certificate"> পরীক্ষা : {{$numto->bnNum($batch->exams()->count())}}</i>
                            </li>
                        </ul>
                        <div class=" btn-group gap-2">
                            <a href="{{$batch->link()}}" class="btn btn-success">বিস্তারিত</a>
                            <a href="#" class="btn btn-dark">রুটিন</a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection