
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
        @foreach($batches as $batch)
        <div class="col-md-4 mb-2">
            <div class="card border-success shadow package-hover">
                
                <div class="card-body">
                    <h5 class="card-title">{{$batch->title}}</h5>
                    <div style="height:2px;width:100px" class="bg-danger"></div>
                   
                    <div class=" btn-group gap-2 mt-2">
                        <a href="{{route('job.solutions.batch.details',$batch)}}" class="btn btn-sm btn-success">বিস্তারিত</a>
                        <!-- <a href="#" class="btn btn-dark">রুটিন</a> -->

                    </div>

                </div>
            </div>

        </div>
        @endforeach
    </div>
</div>

@endsection