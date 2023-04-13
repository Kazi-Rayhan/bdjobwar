@extends('frontEnd.layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            @foreach ($posts as $post)
                <div class="col-md-5 col-mb-4 col-sm-12">
                    <div class="card Larger shadow">
                        <a href="{{ route('single_post', $post->slug) }}">
                            <img class="rounded" style="object-fit:cover;height:300px; width:420px;"
                                src="{{ voyager::image($post->image) }}" alt="">
                            <div class="card-body shadow">

                                <h1>{{ $post->title }}</h1>
                                <div style="border-bottom: 1px solid #b5b5b5;width: 100%;"></div>
                                <p class="mt-4">
                                    {{ $post->excerpt }}
                                </p>

                                <span class="mt-5">{{ $post->created_at->diffForHumans() }}</span>


                            </div>
                        </a>
                    </div>

                </div>
            @endforeach

        </div>
        <div class="d-flex justify-content-center "> {{ $posts->links() }}</div>

    </div>
@endsection
