@extends('frontEnd.layouts.app')
@section('content')
@php
use Rakibhstu\Banglanumber\NumberToBangla;
$numto = new NumberToBangla();
@endphp

<div class="container my-5 ">
    <div class="main-blog-area mb-5">
        <div class=" my-5">

            <div id="exam-header " class="text-center border border-success shadow  text-light p-4" style="background-color: #019514;">
                <h5>উত্তর পত্র</h5>
                <h1>
                    {{$exam->title}}
                </h1>
                <h3 style="font-weight: 700;">
                    {{$exam->sub_title}}
                </h3>
                <h5 style="font-weight: 700;">
                    পূর্ণমান : {{$numto->bnNum($exam->fullMark)}}
                </h5>
                <div class="d-flex justify-content-around mt-5" style="font-weight: 700;">
                    <span class="">
                        প্রশ্ন : {{$numto->bnNum($exam->questions->count())}}
                    </span>

                    <span>
                        পাশ মার্ক : {{$numto->bnNum($exam->minimum_to_pass)}}
                    </span>
                </div>
                <div class="d-flex justify-content-around mt-3 " style="font-weight: 700;">
                    <span class="">
                        প্রশ্ন প্রতি মার্ক : {{$numto->bnNum($exam->point)}}
                    </span>

                    <span>
                        নেগেটিভ মার্ক : {{$numto->bnNum($exam->minius_mark)}}
                    </span>
                </div>

                <div class="d-flex justify-content-center mt-3" style="font-weight: 700;">
                    <span class="">
                        সময়কাল : {{$numto->bnNum($exam->duration)}} মিনিট
                    </span>

                </div>

            </div>




        </div>
    </div>
    <div class="row">
        <div class="col-md-10 mx-auto">
            @foreach($exam->questions as $question)
            <div class="card mb-3 shadow">
                <div class="card-body">

                    <h6 style="font-weight: 700;">{{ $numto->bnNum($loop->iteration) }}. {{ $question->title }}</h6>
                    @if($question->image)
                    <div class="text-center">
                        <img src="{{Voyager::image($question->image)}}" width="300px" style="object-fit:contain" alt="">

                    </div>
                    @endif
                    <hr>
                    <div class="row row-cols-2">
                        @foreach($question->choices as $choice)
                        <div class="d-flex justify-content-between align-items-center">


                            <small class="mb-3 @if($choice->index == $question->answer) text-success @elseif($exam->userChoice(auth()->user(),$question->id)== $choice->index ) text-danger @else text-muted @endif">
                                {{$choice->label}}. {{$choice->choice_text}} @if($choice->index == $question->answer)<sup class=" text-success "><i class="fa fa-check"></i> </sup>@elseif($exam->userChoice(auth()->user(),$question->id)== $choice->index )<sup class=" text-danger "><i class="fa fa-times"></i> </sup> @else @endif
                            </small>


                            @if($choice->choice_image)
                            <img class="" src="{{Voyager::image($choice->choice_image)}}" width="200px" style="object-fit:cover ;" alt="">
                            @endif


                        </div>
                        @endforeach
                    </div>

                </div>
                @if($question->description)
                <div class="card-footer">
                    <h6>ব্যাখ্যা :</h6>
                    <hr>
                    <p style="font-size: 12px;">
                        {{$question->description}}
                    </p>
                </div>

                @endif
            </div>
            @endforeach

        </div>

    </div>




</div>
@endsection