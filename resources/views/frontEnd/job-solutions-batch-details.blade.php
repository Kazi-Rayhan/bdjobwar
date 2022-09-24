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
        class="container-fluid container-md my-md-5 my-2">

        <div class="">

            <div d-flex flex-column>
                <h2 class="text-dark">{{ $batch->title }}</h2>
                <div style="height:2px;width:60px" class="bg-danger"></div>
                <h3>{{ $batch->sub_title }}</h3>


            </div>

        </div>
        <div class="row mt-5">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-body">
                    <ul class="list-group">
                     <li class="list-group-item  @if(!request()->year) active @endif">
                        <a href="{{route('job.solutions.batch.details',[$batch])}}"  style="text-decoration:none;color:#000">
                            All
                        </a>
                        </li>
                    @php
                    $years = range(2000,date("Y"));
                    rsort($years);
                    @endphp
                    @foreach ( $years as $year )
                        <li class="list-group-item  @if(request()->year == $year) active @endif">
                        <a href="{{route('job.solutions.batch.details',[$batch,'year'=>$year])}}"  style="text-decoration:none;color:#000">
                            {{$year}}
                        </a>
                        </li>
                    @endforeach
                    </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
               
                <table class="table">
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Exam
                        </th>
                        <th>
                            Subjects
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>
                    @foreach ($exams as $exam)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                <h6 class="text-dark" style="font-weight: 700;">{{ $exam->title }}</h6>
                                <p class="text-secondary mt-2" style="font-size: 14px;">
                                    {{ $exam->sub_title }}
                                </p>
                            </td>
                            <td>
                                {{ join(' ,', $exam->subjects->pluck('name')->toArray()) }}
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('exam.read', $exam->uuid) }}">পড়ুন</a>
                            </td>
                        </tr>
                    @endforeach

                </table>
                {{ $exams->links() }}

            </div>
        </div>
    @endsection
