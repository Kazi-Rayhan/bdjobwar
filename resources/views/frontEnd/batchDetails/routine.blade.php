@extends('frontEnd.layouts.app')

@section('content')
    <h2 class="m-5 ">
        রুটিন
    </h2>
    @if ($batch->routine)
        <div class="container ">
            <a href="{{ Voyager::image(json_decode($batch->routine)[0]->download_link) }}"
                class="btn btn-outline-primary mb-2"> ডাউনলোড করুন <i class="fas fa-download"></i></a>
            <iframe src="{{ Voyager::image(json_decode($batch->routine)[0]->download_link) }}" width="100%"
                frameborder="2" height="500px"></iframe>
        </div>
    @else
        <div class="container text-center my-5">
            <img src="{{ asset('icons/routine.svg') }}" height="200px" class="mb-5" alt="">
            <h1>কোন রুটিন নেই</h1>
            <h5>
                পড়ে আবার চেক করুণ
            </h5>
        </div>
    @endif
@endsection
