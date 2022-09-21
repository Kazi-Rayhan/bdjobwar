@extends('dashboard.layouts.app')
@section('content')
    @php
        use Rakibhstu\Banglanumber\NumberToBangla;
        $numto = new NumberToBangla();
    @endphp
    <div class="container my-5 ">

        @if ($favourites)
            <div class="row">
                @foreach ($favourites as $question)
                    <div class="col-md-12 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <h6 style="font-weight: 700; " class="d-flex">
                                    {{ $numto->bnNum($loop->iteration) }}.{!! $question->title !!}</h6>
                                @if ($question->title_image)
                                    <div class="text-center">
                                        <img src="{{ Voyager::image($question->title_image) }}" width="300px"
                                            style="object-fit:contain" alt="">

                                    </div>
                                @endif
                                <hr>
                                <div class="row row-cols-2">
                                    @foreach ($question->choices as $choice)
                                        <div class="d-flex justify-content-between align-items-center">


                                            <small class="mb-3 @if ($choice->index == $question->answer) text-success @endif">
                                                {{ $choice->label }}. {{ $choice->choice_text }} @if ($choice->index == $question->answer)
                                                    <sup class=" text-success "><i class="fa fa-check"></i> </sup>
                                                @endif
                                            </small>


                                            @if ($choice->choice_image)
                                                <img class="" src="{{ Voyager::image($choice->choice_image) }}"
                                                    width="200px" style="object-fit:cover ;" alt="">
                                            @endif


                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class=" btn-group gap-2">
                                    @if ($question->description)
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#question{{ $question->id }}">ব্যাখ্যা</button>
                                    @endif
                                    @auth
                                        <a href="{{ route('fav', $question) }}"
                                            class="btn btn-sm @if (auth()->user()->isFavourite($question)) btn-danger  @else btn-outline-danger @endif"><i
                                                class="fa fa-heart"></i></a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="question{{ $question->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">ব্যাখ্যা</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {!! $question->description !!}
                                    @if ($question->image)
                                        <div>
                                            <img src="{{ Voyager::image($question->image) }}" width="300px"
                                                style="object-fit:contain" alt="">

                                        </div>
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">okay</button>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{ $favourites->links() }}
            </div>
        @else
            <div class="text-center">

                <img src="{{ asset('icons/fav.svg') }}" height="200px" class="mb-5" alt="">
                <h1>এই মুহূর্তে কোন রুটিন নেই।</h1>
                <h5>
                    পড়ে আবার চেক করুণ
                </h5>
            </div>
        @endif




    </div>
@endsection
