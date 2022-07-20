@extends('frontEnd.layouts.app')
@section('css')
<style>
    .question {
        width: 70%;
    }
    .hr{
        padding:0 ;
        margin:3px 0;
    }
    .time{
         font-size: 16px;
    }

    @media screen and (max-width: 600px) {
        .question {
            width: 100%;
        }
       .exam-title{
            font-size:23px;
        }
        .exam-subtitle{
            font-size:18px;
        }
        .fullmark{
            font-size:16px;
        }
        .custom-body span,small,strong{
            font-size:12px !important;
        }

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
    <div class="card text-dark border border-danger  shadow  mt-4" style=" position: fixed; z-index:200;top: 60px;
right: 10;">
        <div class="card-body custom-body"  >
            <span>
                উত্তর দিয়েছেন : <span id="answered"></span>
            </span>
            <br>
            <span class="pb-2">
                বাকি আছে : <span id="left"></span>
            </span>
            <br>
            <hr class="hr">
            <small>সময় :</small>
            <br>
            <strong class="time" style=" " id="countdown">
            </strong>

        </div>
    </div>

    <form action="{{route('exam.store',$exam->uuid)}}" id="question" method="post">
        @csrf
        
                    <div >
                        <div id="exam-header " class="text-center border border-success shadow  text-light p-4" style="background-color: #019514;">
                            <h3 class="exam-title">
                                {{$exam->title}}
                            </h3>
                            <h4 class="exam-subtitle" style="font-weight: 700;">
                                {{$exam->sub_title}}
                            </h4>
                            <h6 class="fullmark" style="font-weight: 700;">
                                পূর্ণমান : {{$numto->bnNum($exam->fullMark)}}
                            </h6>
                            <div class="d-flex justify-content-around " style="font-weight: 700;">
                                <span class="">
                                    প্রশ্ন : {{$numto->bnNum($exam->questions->count())}}
                                </span>

                                <span>
                                    পাশ মার্ক : {{$numto->bnNum($exam->minimum_to_pass)}}
                                </span>
                            </div>
                            <div class="d-flex justify-content-around " style="font-weight: 700;">
                                <span class="">
                                    প্রশ্ন প্রতি মার্ক : {{$numto->bnNum($exam->point)}}
                                </span>

                                <span>
                                    নেগেটিভ মার্ক : {{$numto->bnNum($exam->minius_mark)}}
                                </span>
                            </div>

                            <div class="d-flex justify-content-center " style="font-weight: 700;">
                                <span class="">
                                    সময়কাল : {{$numto->bnNum($exam->duration)}} মিনিট
                                </span>

                            </div>

                        </div>

                        <div class="course-details-page" style="font-size: 22px;">


                            <div>
                                <div class="p-2 d-flex flex-column justify-content-center align-items-center mt-md-5" id="tab1">
                                    @foreach($questions as $question)

                                    <div class="question border border-success card ml-sm-5 pl-sm-5 pt-2 mb-2">

                                        <div class="card-body shadow">

                                            <div class="p-2 rounded text-light h6  " style="background-color: #019514;"><b>{{ $numto->bnNum($loop->iteration) }}. {{ $question->title }}</b></div>
                                            @if($question->title_image)
                                            <div class="text-center">
                                                <img src="{{Voyager::image($question->title_image)}}" width="80%" style="object-fit:cover" alt="">

                                            </div>
                                            @endif


                                            <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3 mt-4" id="options">
                                                @foreach($question->choices as $choice)
                                                <label class="options  q{{$question->id}}" style="font-size: 16px;" for="choice{{ $question->id }}{{ $loop->iteration }}"> <strong>{{$choice::LABEL[$choice->index]}} . </strong> {{ $choice->choice_text }}
                                                    <input type="radio" value="{{$choice->index}}" name="choice[{{$question->id}}]" id="choice{{ $question->id }}{{ $loop->iteration }}">
                                                    @if($choice->choice_image)
                                                    <div class=" mb-2">
                                                        <img class="" src="{{Voyager::image($choice->choice_image)}}" width="80%" style="object-fit:cover ;" alt="">

                                                    </div>
                                                    @endif
                                                    <span class="checkmark"></span>
                                                </label>
                                                @endforeach

                                            </div>
                                        </div>
                                     

                                    </div>
                                    @endforeach
                                
                                    <div class="d-flex justify-content-center my-3">
                                        <button class="btn btn-lg btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">Submit your answer</button>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <p class="p-4">
            <span>

                {{$questions->count() }} 
            </span>
             টি প্রশ্নের মধ্যে আপনি <span id="answeredModal"> </span> টির উত্তর করেছেন <span id="leftModal"> </span> উত্তর বাকি আছে। পরীক্ষাটি কি এখানেই শেষ করবেন
            </p>
            <div class="modal-footer">
                <button type="submit"  id=""class="btn btn-success">হ্যা</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">না</button>
            </div>
        </div>
    </div>
</div>
    </form>
</div>


@endsection
@section('js')
<script>
    // Set the date we're counting down to
    var countDownDate = new Date("{{auth()->user()->exams()->find($exam)->pivot->expire_at}}").getTime();
    const toBn = n => n.replace(/\d/g, d => "০১২৩৪৫৬৭৮৯" [d])
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
        document.getElementById("countdown").innerHTML = toBn(time);

        // If the count down is over, write some text 
        if (distance < 0) {
            document.getElementById("question").submit(); 
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
    const examCard = (answered, questions) => {
        $('#answered').text(answered);
        $('#answeredModal').text(answered);
        $('#left').text(questions - answered);
        $('#leftModal').text(questions - answered);
    }
</script>
<script>
    let answered = 0;
    let questions = {{$exam->questions->count()}};
    $(document).ready(() => {
        examCard(answered, questions);
        $('input[type="radio"]').prop('checked', false)
    })
    $('input[type="radio"]').on('change', function() {
        answered++
        examCard(answered, questions);
        console.log($(this).parent().parent().siblorings()[0]);
        $(this).parent().parent().siblings()[0].classList.add('bg-success')
        $(this).closest('label').addClass('text-success')
        var isDisabled = $(this).closest('label').siblings().find('input').prop('disabled');
        $(this).closest('label').siblings().find('input').prop('disabled', !isDisabled);
    });
</script>
@endsection