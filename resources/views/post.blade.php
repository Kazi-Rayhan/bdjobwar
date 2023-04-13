@extends('frontEnd.layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            @foreach ($posts as $post)
                <div class="col-md-5 col-mb-4 col-sm-12">
                    <a href="{{ route('single_post', $post->slug) }}">
                        <div class="card Larger shadow">
                            <img class="rounded" style="object-fit:cover;height:300px;"
                                src="{{ voyager::image($post->image) }}" alt="">
                            <div class="card-body shadow">

                                <h1>{{ $post->title }}</h1>
                                <div style="border-bottom: 1px solid #b5b5b5;width: 100%;"></div>
                                <p class="mt-4">
                                    {{ $post->excerpt }}
                                </p>

                                <div class="d-flex justify-content-between">
                                    <span class="mt-5">{{ $post->created_at->diffForHumans() }}</span>
                                    <span>Read more ...</span>
                                </div>


                            </div>
                        </div>
                    </a>

                </div>
            @endforeach

        </div>
        <div class="d-flex justify-content-center "> {{ $posts->links() }}</div>

    </div>
@endsection
