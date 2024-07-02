@extends('frontend.layouts.app')
@section('content')
    <div class="container my-5 ">
        <div class="main-blog-area mb-5">
            @if (request()->practice)
                <a href="{{ route('answerSheetPdf', [$exam->uuid, 'pracitce' => request()->practice]) }}"
                    class="btn btn-dark ">উত্তরপত্র ডাউনলোড করুন</a>
            @else
                <a href="{{ route('answerSheetPdf', $exam->uuid) }}" class="btn btn-dark ">উত্তরপত্র ডাউনলোড করুন</a>
            @endif
            <a href="{{ route('answerSheetPdfWithOutMarking', $exam->uuid) }}" class="btn btn-dark ">প্রশ্নপত্র ডাউনলোড
                করুন</a>
            <div class=" mt-1">
                <div id="exam-header " class="  text-center border border-success shadow  rounded text-light pt-2"
                    style="background-color: #019514;">
                    <h3>উত্তরপত্র</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto">
                @foreach ($exam->questions as $question)
                    <x-questionAnswer :question="$question" :loop="$loop" :exam="$exam" />
                @endforeach

            </div>

        </div>




    </div>
@endsection
