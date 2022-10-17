@extends('frontEnd.layouts.app')

@section('content')
    @php
        use Rakibhstu\Banglanumber\NumberToBangla;
        $numto = new NumberToBangla();
    @endphp
    <div class="container my-5 ">
        <div class="row g-2">

            <div class="col-md-4 col-lg-3 col-6">
                <a href="{{ route('batch.runningexam', [Str::slug($batch->title), $batch]) }}"
                    style="text-decoration:none;color:#000">
                    <div class="card  border border-dark" style="min-height:200px">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center gap-3">
                            <img height="100px" class="icon" src="{{ asset('icons/runningExam.svg') }}" alt="">
                            <h3 class="icon-text">
                                লাইভ পরীক্ষা
                            </h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-lg-3 col-6">
                <a href="{{ route('batch.upcommingexam', [Str::slug($batch->title), $batch]) }}"
                    style="text-decoration:none;color:#000">
                    <div class="card  border border-dark" style="min-height:200px">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center gap-3">
                            <img height="100px" class="icon" src="{{ asset('icons/upcomingexam.svg') }}" alt="">
                            <h3 class="icon-text">
                                আসন্ন পরীক্ষা
                            </h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-lg-3 col-6">
                <a href="{{ route('batch.archive', [Str::slug($batch->title), $batch]) }}"
                    style="text-decoration:none;color:#000">
                    <div class="card  border border-dark" style="min-height:200px">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center gap-3">
                            <img height="100px" class="icon" src="{{ asset('icons/archive.svg') }}" alt="">
                            <h3 class="icon-text">
                                আর্কাইভ
                            </h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-lg-3 col-6">
                <a href="{{ route('batch.missedexam', [Str::slug($batch->title), $batch]) }}"
                    style="text-decoration:none;color:#000">
                    <div class="card border border-dark" style="min-height:200px">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center gap-3">
                            <img height="100px" class="icon" src="{{ asset('icons/missedExam.svg') }}" alt="">
                            <h5 class="icon-text">
                                Missed পরীক্ষা
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-lg-3 col-6 ">
                <a href="{{ route('batch.routine', [Str::slug($batch->title), $batch]) }}"
                    style="text-decoration:none;color:#000">
                    <div class="card  border border-dark" style="min-height:200px">
                        <div class=" card-body d-flex flex-column justify-content-center align-items-center gap-3">
                            <img height="100px" class="icon" src="{{ asset('icons/routine.svg') }}" alt="">
                            <h3 class="icon-text">
                                রুটিন
                            </h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-lg-3 col-6">
                <a href="{{ route('batch.results', [Str::slug($batch->title), $batch]) }}"
                    style="text-decoration:none;color:#000">
                    <div class="card border border-dark" style="min-height:200px">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center gap-3">
                            <img height="100px" class="icon" src="{{ asset('icons/result.svg') }}" alt="">
                            <h3 class="icon-text">
                                মেধাতালিকা
                            </h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-lg-3 col-6">
                <a href="{{ route('batch.statics', [Str::slug($batch->title), $batch]) }}"
                    style="text-decoration:none;color:#000">
                    <div class="card   border border-dark" style="min-height:200px">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center gap-3">
                            <img height="100px" class="icon" src="{{ asset('icons/statics.svg') }}" alt="">
                            <h3 class="icon-text">
                                পরিসংখ্যান
                            </h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-lg-3 col-6">
                <a href="{{ route('favourites') }}" style="text-decoration:none;color:#000">
                    <div class="card  border border-dark" style="min-height:200px">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center gap-3">
                            <img height="100px" class="icon" src="{{ asset('icons/fav.svg') }}" alt="">
                            <h3 class="icon-text">
                                ফেভারিট
                            </h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-lg-3 col-6">
                <a href="{{ route('batch.materials', [Str::slug($batch->title), $batch]) }}" style="text-decoration:none;color:#000">
                    <div class="card  border border-dark" style="min-height:200px">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center gap-3">
                            <img height="100px" class="icon" src="{{ asset('icons/books.png') }}" alt="">
                            <h3 class="icon-text">
                                স্টাডি মেটিরিয়ালস
                            </h3>
                        </div>
                    </div>
                </a>
            </div>


        </div>
        <div class="row mt-3 fixed-bottom">
        @if($batch->price > 0)
            @auth

                @if (!auth()->user()->bought($batch->id))
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-end">
                                {{ $batch->price }} ৳
                            </h4>
                            <div class="d-grid">
                                <a href="{{ route('orderCreate', ['type' => 'batch', 'id' => $batch->id]) }}"
                                    class="btn btn-success btn-lg">ভর্তি
                                    হন</a>
                            </div>
                        </div>
                    </div>
                @endif
            @else
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-end">
                            {{ $batch->price }} ৳
                        </h4>
                        <div class="d-grid ">
                            <a href="{{ route('orderCreate', ['type' => 'batch', 'id' => $batch->id]) }}"
                                class="btn btn-success btn-lg">ভর্তি
                                হন</a>
                        </div>
                    </div>
                </div>
            @endauth
        @endif
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('syllabus') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            document.getElementById('syllabus').innerText = recipient;
        })
    </script>
@endsection
