@extends('frontend.layouts.app')
@section('content')
    <section class="container">
        <div class="row d-flex justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <img class="rounded" style=" object-fit:cover;height:400px; width:100%;"
                        src="{{ voyager::image($post->image) }}" alt="">
                    <div class="card-body Larger shadow">


                        <h1>{{ $post->title }}</h1>
                        <div style="border-bottom: 1px solid #b5b5b5;"></div>

                        {!! $post->body !!}

                        <span class="mt-5">{{ $post->created_at->diffForHumans() }}</span>



                    </div>

                </div>




                @auth
                    <h2 class="ms-4">Comments</h2>


                    <form action="{{ route('comment') }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="row">
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <textarea name="comment" id="" cols="84" rows="4"></textarea>

                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">comment</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="mb-4" style="border-bottom: 1px solid #b5b5b5;"></div>

                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12">
                                @foreach ($post->comments as $comment)
                                    <div class="row">
                                        <p>{{ $comment->comment }}</p>
                                        <hr>
                                        <span>{{ $comment->user->name }}</span>
                                        <small>{{ $comment->created_at->diffForHumans() }}</small>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center"> কমেন্ট করার জন্য <a class="" href="{{ route('login') }}">Login</a> করুন</h3>
                        </div>
                    </div>

                @endauth
            </div>

    </section>
@endsection
