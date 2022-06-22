@extends('frontEnd.layouts.app')
@section('css')
<style>
   
    .question {
        width: 80%;
    }

    .options {
        position: relative;
        padding-left: 40px;
    }

    #options label {
        display: block;
        margin-bottom: 15px;
        font-size: 14px;
        cursor: pointer;
    }

    .options input {
        opacity: 0;
    }

    .checkmark {
        position: absolute;
        top: -1px;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #555;
        border: 1px solid #ddd;
        border-radius: 50%;
    }

    .options input:checked~.checkmark:after {
        display: block;
    }

    .options .checkmark:after {
        content: "";
        width: 10px;
        height: 10px;
        display: block;
        background: white;
        position: absolute;
        top: 50%;
        left: 50%;
        border-radius: 50%;
        transform: translate(-50%, -50%) scale(0);
        transition: 300ms ease-in-out 0s;
    }

    .options input[type="radio"]:checked~.checkmark {
        background: #21bf73;
        transition: 300ms ease-in-out 0s;
    }

    .options input[type="radio"]:checked~.checkmark:after {
        transform: translate(-50%, -50%) scale(1);
    }
</style>
@endsection
@section('content')
@php
use Rakibhstu\Banglanumber\NumberToBangla;
$numto = new NumberToBangla();
@endphp
<div style="position: relative;">
    <div class="card bg-danger text-light  shadow m-1 "  style=" position: fixed; z-index:200;top: 30px;
right: 0px;">
        <div class="card-body   ">
            <strong style="font-size: 16px; " id="countdown">
            </strong>
        </div>
    </div>
    <form action="{{route('exam.store',$exam->uuid)}}" method="post">
        @csrf
        <div class="main-blog-area mb-5">
            <div class=" my-5">
                <div class="">
                    <div class="">
                        <div id="exam-header " class="text-center border border-success shadow  text-light p-4" style="background-color: #019514;">
                            <h1>
                                {{$exam->title}}
                            </h1>
                            <h3 style="font-weight: 700;">
                                {{$exam->sub_title}}
                            </h3>
                            <h5 style="font-weight: 700;">
                                পূর্ণমান : {{$numto->bnNum($exam->fullMark)}}
                            </h5>
                            <div class="d-flex justify-content-around fs-5 mt-5" style="font-weight: 700;">
                                <span class="">
                                    প্রশ্ন : {{$numto->bnNum($exam->questions->count())}}
                                </span>

                                <span>
                                    পাশ মার্ক : {{$numto->bnNum($exam->minimum_to_pass)}}
                                </span>
                            </div>
                            <div class="d-flex justify-content-around fs-5 " style="font-weight: 700;">
                                <span class="">
                                    প্রশ্ন প্রতি মার্ক : {{$numto->bnNum($exam->questions->count())}}
                                </span>

                                <span>
                                    নেগেটিভ মার্ক : {{$numto->bnNum($exam->minius_mark)}}
                                </span>
                            </div>

                            <div class="d-flex justify-content-center fs-5" style="font-weight: 700;">
                                <span class="">
                                    সময়কাল : {{$numto->bnNum($exam->duration)}} মিনিট
                                </span>

                            </div>

                        </div>

                        <div class="course-details-page" style="font-size: 22px;">
                           

                            <div>
                                <div class="p-2 d-flex flex-column justify-content-center align-items-center mt-5" id="tab1">
                                    @foreach($questions as $question)

                                    <div class="question card ml-sm-5 pl-sm-5 pt-2 mb-2">
                                        <div class="card-body shadow">
                                        <div class="py-2 h5"><b>{{ $numto->bnNum($loop->iteration) }}. {{ $question->title }}</b></div>
                                        <div class="text-center">
                                            @if($question->image)
                                            <img src="{{Voyager::image($question->image)}}" height="150" width="300" alt="">
                                            @endif
                                        </div>
                                       

                                        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                                            @foreach($question->choices as $choice)
                                            <label class="options  q{{$question->id}}" style="font-size: 16px;"  for="choice{{ $question->id }}{{ $loop->iteration }}"> <strong>{{$choice::LABEL[$choice->index]}} . </strong> {{ $choice->choice_text }}
                                                <input type="radio" value="{{$choice->index}}" name="choice[{{$question->id}}]" id="choice{{ $question->id }}{{ $loop->iteration }}">
                                                @if($choice->choice_image)
                                                        <div  class=" mb-2">
                                                            <img class="" src="{{Voyager::image($choice->choice_image)}}"  height="150px" style="object-fit:cover ;" alt="">

                                                        </div>
                                                        @endif
                                                <span class="checkmark"></span>
                                            </label>
                                            @endforeach

                                        </div>
                                        </div>
                                       
                                    </div>
                                    @endforeach
                                    <!-- <div class="row  ">
                                        @foreach ($questions as $question)
                                        <div class="col-md-12 mb-2">
                                            <div class="card single-course-inner border border-dark" id="q{{$question->id}}">
                                                <div class="card-header text-center " style="background-color:#5ab500 ;">
                                                    @if($question->image)
                                                    <img src="{{Voyager::image($question->image)}}" height="150" width="300" alt="">
                                                    @endif
                                                    <div style="text-align: left;">
                                                        <h4 class="card-title  text-light  fw-semibold py-3 ps-3">
                                                            <span>{{ $loop->iteration }}.</span> {{ $question->title }}
                                                        </h4>
                                                        @if($question->description)
                                                        <p class="text-light">
                                                            {{$question->description}}
                                                        </p>
                                                        @endif
                                                    </div>




                                                </div>
                                                <div class="row mb-5">
                                                    @foreach ($question->choices as $choice)
                                                    <div class="col-md-6">
                                                        <div class="form-check p-3">
                                                            <div>
                                                                <input class="form-check-input bg-secondary  mt-2 ms-2 choice q{{$question->id}}" type="radio" value="{{$choice->index}}" name="choice[{{ $question->id }}]" id="choice{{ $question->id }}{{ $loop->iteration }}">
                                                                <label class="form-check-label d-block ms-5" for="choice{{ $question->id }}{{ $loop->iteration }}">
                                                                    <strong style="font-size: 20px;">{{$choice::LABEL[$choice->index]}} . </strong> {{ $choice->choice_text }}
                                                                </label>
                                                            </div>

                                                        </div>
                                                        @if($choice->choice_image)
                                                        <div class="text-center mb-2">
                                                            <img class="" src="{{Voyager::image($choice->choice_image)}}" width="100%" height="100px" style="object-fit:cover ;" alt="">

                                                        </div>
                                                        @endif
                                                    </div>
                                                    @endforeach
                                                </div>


                                            </div>

                                        </div>
                                        @endforeach

                                    </div> -->
                                    <div class="d-flex justify-content-center my-3">
                                        <button class="btn btn-lg btn-success" type="submit">SUBMIT</button>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </form>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>

        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    // Set the date we're counting down to
    var countDownDate = new Date("{{auth()->user()->exams()->find($exam)->pivot->expire_at}}").getTime();
    const toBn = n => n.replace(/\d/g, d => "০১২৩৪৫৬৭৮৯"[d])
    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = Date.now();
    
        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var hours = Math.floor((distance % (1000 * 60 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        var time = hours + " ঘঃ " + minutes + " মিঃ " + seconds + " সেঃ";
        document.getElementById("countdown").innerHTML =  toBn(time);

        // If the count down is over, write some text 
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>
<script>
    var exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', function(event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var description = button.getAttribute('data-bs-description')
        var image = button.getAttribute('data-bs-image')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        if (image) {
            const img = document.createElement('img');
            img.setAttribute('src', image);
        }
        var modalBody = exampleModal.querySelector('.modal-body')

        modalBody.textContent = description;
        modalBody.append(img);
    })
</script>
<script>
    $(document).ready(()=>{
        $('input[type="radio"]').prop('checked',false)
    })
    $('input[type="radio"]').on('change', function() {
        $(this).closest('label').addClass('text-success')
        var isDisabled = $(this).closest('label').siblings().find('input').prop('disabled');
     $(this).closest('label').siblings().find('input').prop('disabled', !isDisabled);
});
</script>
@endsection