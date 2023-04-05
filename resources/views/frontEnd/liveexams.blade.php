@extends('frontEnd.layouts.app')
@section('content')
    @php
        use Rakibhstu\Banglanumber\NumberToBangla;
        $numto = new NumberToBangla();
    @endphp
    <div class="d-flex justify-content-between">
        <h1 class=" live ">
            Live Exams
        </h1>
        <h3>
            পরিক্ষা চলছে : {{ $numto->bnNum(count($liveExams)) }} টি
        </h3>
    </div>
    <hr>
    <div class="row">
        @foreach ($liveExams as $exam)
            <div class="col-md-6">
                <x-exam-card :exam="$exam" />
            </div>
        @endforeach
    </div>
@endsection
