@extends('frontEnd.layouts.app')
@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="main-blog-area  pd-bottom-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="text-center">
                        <h3 class="text-center text-muted mt-5">{{ $exam->title }}</h3>
                        <h5 class="text-center text-muted mt-2">{{ $exam->sub_title }}</h5>

                    </div>

                    <div class="course-details-page">
                        <div class="course-details-meta-list">
                            <div class="row">
                                <div class="col-md-6 mt-4 mt-md-0 ">

                                    <div class="align-self-center text-left">
                                        <span class=" d-block">Minimum to pass : {{ $exam->minimum_to_pass }} %</span>
                                        <span class=" d-block">Start date:
                                            {{ \Carbon\Carbon::parse($exam->to)->format('d M ,Y') }}</span>
                                        <span class=" d-block">End date :
                                            {{ \Carbon\Carbon::parse($exam->to)->format('d M ,Y') }}</span>

                                    </div>


                                </div>
                                <div class="col-md-6 mt-4 mt-md-0 ">

                                    <div class="align-self-center text-right">
                                        <span class=" d-block">Full-mark :
                                            {{ $exam->point * $exam->questions->count() }} </span>
                                        <span class="d-block">Point : {{ $exam->point }}</span>
                                        <span class="d-block">Negative Point : {{ $exam->minius_mark }}</span>
                                        <span class="d-block">Duration: {{ $exam->duration }}</span>
                                    </div>


                                </div>
                                <!-- <div class="col-md-3 mt-4 mt-md-0 align-self-center text-md-right">
                                        <div class="enrole-inner">
                                            <strong>Free</strong>
                                            <a class="btn btn-base" href="#">Get Enroll</a>
                                        </div>
                                    </div> -->
                            </div>
                        </div>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">

                                <div class="row">
                                    @foreach ($exam->questions as $question)
                                        <div class="col-12 col-md-6 mt-2">
                                            <div class="card single-course-inner">
                                                <form action="">

                                                    <h4 class="card-title bg-success text-white fw-semibold py-3 pl-4">
                                                        <span>{{ $loop->iteration }}.</span> {{ $question->title }}</h4>
                                                    <div class="d-flex flex-wrap mb-5">
                                                        @foreach ($question->choices as $choice)
                                                            <div class="form-check col-12 col-md-6 p-3">
                                                                <input class="form-check-input ml-1 mt-2" type="radio"
                                                                    value="" name="choice{{ $question->id }}"
                                                                    id="choice{{ $question->id }}{{ $loop->iteration }}">
                                                                <label class="form-check-label queston ml-4"
                                                                    for="choice{{ $question->id }}{{ $loop->iteration }}">
                                                                    {{ $choice->choice }}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                </form>
                                            </div>

                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
           
        </div>
      
    </div>
    </div>

@endsection
