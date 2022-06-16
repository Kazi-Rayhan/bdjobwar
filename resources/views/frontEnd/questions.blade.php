@extends('frontEnd.layouts.app')
@section('content')

<form action="{{route('exam.store',$exam->uuid)}}" method="post">
    @csrf
    <div class="main-blog-area mb-5">
        <div class="container">
            <div class="">
                <div class="">
                    <div class="text-center bg-info py-1 mt-5">
                        <h3 class="text-center text-muted mt-5">{{ $exam->title }}</h3>
                        <h5 class="text-center text-muted mt-2">{{ $exam->sub_title }}</h5>

                    </div>

                    <div class="course-details-page" style="font-size: 22px;">
                        <div class="course-details-meta-list">
                            <table class="table mt-5 w-75 mx-auto">
                                <tr>
                                    <th>Full Mark :</th>
                                    <td>
                                        {{$exam->questions->count() * $exam->point}}
                                    </td>

                                    <th>Questions :</th>
                                    <td>
                                        {{$exam->questions->count()}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Mark Per Questions :</th>
                                    <td>
                                        {{ $exam->point }}
                                    </td>

                                    <th>Negative Mark :</th>
                                    <td>
                                        {{ $exam->minius_mark }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Minimum to pass :</th>
                                    <td>
                                        {{$exam->minimum_to_pass}}
                                    </td>

                                    <th>Duration :</th>
                                    <td> {{$exam->duration}} Miniute</td>
                                </tr>
                                <tr>
                                    <th>Subjects :</th>
                                    <td colspan="3">{{join(', ',$exam->subjects->pluck('name')->toArray())}}</td>
                                </tr>
                                <tr>
                                    <th>Categories :</th>
                                    <td colspan="3">{{join(', ',$exam->categories->pluck('name')->toArray())}}</td>
                                </tr>
                                <tr>
                                    <th colspan="2">
                                        Time left :
                                    </th>
                                    <td colspan="2">
                                        <span id="countdown">

                                        </span>
                                    </td>
                                </tr>
                            </table>

                        </div>

                        <div class="" >
                            <div class="p-2" id="tab1">

                                <div class="row  ">
                                    @foreach ($questions as $question)
                                    <div class="col-md-12 mb-2">
                                        <div class="card single-course-inner border border-dark">
                                            <div class="card-header bg-primary  d-flex justify-content-between align-items-center">
                                                <h4 class="card-title  text-light  fw-semibold py-3 ps-3">
                                                    <span >{{ $loop->iteration }}.</span> {{ $question->title }}
                                                </h4>
                                                @if($question->has_description)
                                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-description="{{Voyager::image($question->image)}}" data-bs-description="{{$question->description}}">
                                                    Details
                                                </button>
                                                @endif
                                            </div>
                                            <div class="row mb-5">
                                                @foreach ($question->choices as $choice)
                                                <div class="col-md-6" >
                                                    <div class="form-check p-3">
                                                        <div>
                                                            <input class="form-check-input bg-secondary  mt-2 ms-2 choice" type="radio" value="{{$choice->index}}" name="choice[{{ $question->id }}]" id="choice{{ $question->id }}{{ $loop->iteration }}">
                                                            <label class="form-check-label d-block ms-5" for="choice{{ $question->id }}{{ $loop->iteration }}">
                                                                <strong style="font-size: 20px;">{{$choice::LABEL[$choice->index]}} . </strong> {{ $choice->choice_text }}
                                                            </label>
                                                        </div>

                                                    </div>
                                                    @if($choice->image)
                                                    <div class="text-center mb-2">
                                                        <img class="" src="{{Voyager::image($choice->image)}}" width="100%" height="100px" style="object-fit:cover ;" alt="">

                                                    </div>
                                                    @endif
                                                </div>
                                                @endforeach
                                            </div>


                                        </div>

                                    </div>
                                    @endforeach

                                </div>
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
        document.getElementById("countdown").innerHTML = hours + "h " + minutes + "m " + seconds + "s ";

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
        if(image){
          const img =  document.createElement('img');
          img.setAttribute('src',image);
        }
        var modalBody = exampleModal.querySelector('.modal-body')
        
        modalBody.textContent = description;
        modalBody.append(img);
    })
</script>
<script>
    $('.choice').click((e)=>{
        console.log(e.target.parentNode.parentNode.parentNode.parentNode.parentNode.children[0].classList.add('bg-info'));
    });
</script>
@endsection