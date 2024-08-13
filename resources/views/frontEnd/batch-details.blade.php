@extends('frontEnd.layouts.app')
@section('css')
    <meta property="og:url" content="{{ request()->url() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $batch->title }} | BD Job War" />
    <meta property="og:description" content="{{ $batch->description }}" />
    <meta property="og:image" content="{{ Voyager::image($batch->thumbnail) }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"
        integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')

    <!-- bratcam area  end-->
    <div
        class="position-relative container-fluid container-md my-md-5 my-2 d-flex flex-column gap-3 justify-content-center align-items-center">
        <img src="{{ Voyager::image($batch->thumbnail) }}" style="width:100%;height:300px;object-fit:contain"
            alt="">
        <div class="d-flex flex-column gap-3 w-100 w-xl-50">

            <div>
                <h2 class="text-dark">{{ $batch->title }}</h2>
                <div style="height:2px;width:60px" class="bg-danger"></div>

                <div class="d-flex flex-wrap gap-2 mt-2">

                    @if ($batch->price > 0)
                        @auth
                            @if (!auth()->user()->bought($batch->id))
                                <a href="{{ route('orderCreate', ['type' => 'batch', 'id' => $batch->id]) }}" class="btn btn-success">ভর্তি হন</a>
                            @endif
                        @else
                            <a href="{{ route('orderCreate', ['type' => 'batch', 'id' => $batch->id]) }}"
                                class="btn btn-success">ভর্তি হন</a>
                        @endauth
                    @endif
                    <a href="{{$batch->link()}}" class="btn btn-success">পরীক্ষাসমূহ</a>
                    @if (json_decode($batch->routine))
                        <a href="{{ Voyager::image(json_decode($batch->routine)[0]->download_link) }}"
                            class="btn btn-success">রুটিন ডাউনলোড করুন</a>
                    @endif
                </div>
            </div>
            @if ($batch->price > 0)
                <div class="">

                    <span class="h3">
                        {{ $batch->price }} ৳
                    </span>
                </div>
            @endif






            <p class="m-0 p-0" style="color:#666666">
                {{ $batch->description }}

            </p>



        </div>
  
    </div>


@endsection

