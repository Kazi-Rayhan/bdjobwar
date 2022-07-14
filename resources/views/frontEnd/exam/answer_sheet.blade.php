@extends('frontEnd.layouts.app')
@section('content')
@php
use Rakibhstu\Banglanumber\NumberToBangla;
$numto = new NumberToBangla();
@endphp
<div class="container my-5 ">
    <div class="main-blog-area mb-5">
        <a href="{{route('answerSheetPdf',$exam->uuid)}}" class="btn btn-dark " >পিডিএফ ডাউনলোড করুন</a>    
        <a href="{{route('answerSheetPdfWithOutMarking',$exam->uuid)}}" class="btn btn-dark " >প্রশ্নপত্র ডাউনলোড করুন</a>    
    <div class=" mt-1">

            <div id="exam-header " class="  text-center border border-success shadow  rounded text-light pt-2" style="background-color: #019514;">
                <h3>উত্তর পত্র</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 mx-auto">
            @foreach($exam->questions as $question)
            <div class="card mb-3 shadow">
                <div class="card-body">

                    <h6 style="font-weight: 700;">{{ $numto->bnNum($loop->iteration) }}. {{ $question->title }}</h6>
                    @if($question->title_image)
                    <div class="text-center">
                        <img src="{{Voyager::image($question->title_image)}}" width="300px" style="object-fit:contain" alt="">

                    </div>
                    @endif
                    <hr>
                    <div class="row row-cols-2">
                        @foreach($question->choices as $choice)
                        <div class="d-flex justify-content-between align-items-center">


                            <small class="mb-3 @if($choice->index == $question->answer) text-success @elseif($exam->userChoice(auth()->user(),$question->id)== $choice->index  ) text-danger @elseif($exam->userChoice(auth()->user(),$question->id) == '') text-warning  @else text-muted @endif">
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
                    @if($question->image)
                    <div>
                        <img src="{{Voyager::image($question->image)}}" width="300px" style="object-fit:contain" alt="">

                    </div>
                    @endif
                </div>

                @endif
            </div>
            @endforeach

        </div>

    </div>




</div>
@endsection