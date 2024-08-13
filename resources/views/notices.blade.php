@extends('frontEnd.layouts.app')
@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-12 mb-2">
                <div class="live-section-title" style="background-image: url({{ asset('frontend-assets/img/Blog.png') }})">
                    <h1 class="text-uppercase" style="font-weight:700 ;font-size:25px">নোটিশসমূহ
                    </h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 ">
                <div class="card shadow">
                    <div class="card-header">
                        <h3>{{ $notice->title }}</h3>
                      
                    </div>
                    <div class="card-body">
                        <p>
                            {{ $notice->description }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                    <h3>Latest Notices </h3>
                        <ul class="">
                            @foreach ($notices as $n)
                                <li class="list-group-item shadow @if($notice == $n) bg-primary @endif"> <a class="h4"
                                        href="{{ route('notices', ['notice' => $n->id]) }}">{{ $loop->iteration }}.
                                        {{ $n->title }}</a>
                                        <br>
                                        <small class="ms-3">{{$n->created_at->format('d M, Y')}}</small>
                                </li>
                            @endforeach
                        </ul>
                        {{$notices->links()}}
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
