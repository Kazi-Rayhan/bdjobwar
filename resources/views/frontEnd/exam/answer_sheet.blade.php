@extends('frontEnd.layouts.app')
@section('content')
@php
use Rakibhstu\Banglanumber\NumberToBangla;
$numto = new NumberToBangla();
@endphp
<div class="container my-5 ">
    <div id="exam-header" class="text-center">
        <h1>
            {{$exam->title}}
        </h1>
        <h3>
            {{$exam->sub_title}}
        </h3>
        <h5>
            পূর্ণমান : {{$numto->bnNum($exam->fullMark)}}
        </h5>
        <p>
            বিষয় : {{join(', ',$exam->subjects->pluck('name')->toArray())}}
        </p>
    </div>
    <div id="exam-body ">
        @foreach($exam->questions as $question)
        <div class="card rounded shadow mb-4">
            <div class="card-body ">
                <div class="text-center">
                    @if($question->image)
                    <img src="{{Voyager::image($question->image)}}" class="img-fluid mb-4" style="height:350px;object-fit:cover;" alt="">
                    @endif
                </div>

                <h4> {{$numto->bnNum($loop->iteration)}} . {{$question->title}} </h4>
                @if($question->description)
                <p>
                    {{$question->description}}
                </p>
                @endif

                <div class="row row-cols-2 mt-5">
                    @foreach($question->choices as $choice)
                    <p @if($choice->index == $question->answer) class="text-primary fs-5" style="font-weight:700" @else class="fs-5" @endif >
                        <span>
                            {{$choice::LABEL[$choice->index]}} .
                        </span>
                        @if($choice->choice_image)
                        <img class="" src="{{Voyager::image($choice->choice_image)}}" width="100%" height="100px" style="object-fit:cover ;" alt="">
                        @endif
                        {{$choice->choice_text}}
                    </p>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>



</div>
@endsection