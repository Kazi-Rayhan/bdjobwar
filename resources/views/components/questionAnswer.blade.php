 @php
     use Rakibhstu\Banglanumber\NumberToBangla;
     $numto = new NumberToBangla();
 @endphp

 <div class="card mb-3 shadow">
     <div class="card-body">

         <h6 style="font-weight: 700; " class="d-flex">{{ $numto->bnNum($loop->iteration) }}.{!! $question->title !!}</h6>
         @if ($question->title_image)
             <div class="text-center">
                 <img src="{{ Voyager::image($question->title_image) }}" width="300px" style="object-fit:contain"
                     alt="">

             </div>
         @endif
         <hr>
         <div class="row row-cols-2">
             @foreach ($question->choices as $choice)
                 <div class="d-flex justify-content-between align-items-center">

            
                     <small
                         class="mb-3 @if ($choice->index == $question->answer) text-success @elseif($exam->userChoice(auth()->user(), $question->id) == $choice->index) text-danger @elseif($exam->userChoice(auth()->user(), $question->id) == '') text-warning  @else text-muted @endif">
                         {{ $choice->label }}. {{ $choice->choice_text }} @if ($choice->index == $question->answer)
                             <sup class=" text-success "><i class="fa fa-check"></i> </sup>
                         @elseif($exam->userChoice(auth()->user(), $question->id) == $choice->index)
                             <sup class=" text-danger "><i class="fa fa-times"></i> </sup>
                         @else
                         @endif
                     </small>


                     @if ($choice->choice_image)
                         <img class="" src="{{ Voyager::image($choice->choice_image) }}" width="200px"
                             style="object-fit:cover ;" alt="">
                     @endif


                 </div>
             @endforeach
         </div>

     </div>
     <div class="card-footer">
         <div class=" btn-group gap-2">
             @if ($question->description)
                 <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                     data-bs-target="#question{{ $question->id }}">ব্যাখ্যা</button>
             @endif
             @auth
                 <a href="{{ route('fav', $question) }}"
                     class="btn btn-sm @if (auth()->user()->isFavourite($question)) btn-danger  @else btn-outline-danger @endif"><i
                         class="fa fa-heart"></i></a>
             @endauth
         </div>
     </div>

     {{-- <h6>ব্যাখ্যা :</h6>
     <hr>
     <p style="font-size: 12px;">
         {!! $question->description !!}
     </p> --}}

 </div>
 <!-- Modal -->
 <div class="modal fade" id="question{{ $question->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
     tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="staticBackdropLabel">ব্যাখ্যা</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 {!! $question->description !!}
                 @if ($question->image)
                     <div>
                         <img src="{{ Voyager::image($question->image) }}" width="300px" style="object-fit:contain"
                             alt="">

                     </div>
                 @endif
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">okay</button>

             </div>
         </div>
     </div>
 </div>
