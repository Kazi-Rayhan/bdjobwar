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
    <div class="container-fluid container-md my-md-5 my-2">

        <div class="">

            <div d-flex flex-column>
                <h2 class="text-dark">{{ $batch->title }}</h2>
                <div style="height:2px;width:60px" class="bg-danger"></div>
                <h3>{{ $batch->sub_title }}</h3>


            </div>

        </div>
        <div class="row mt-5">
            <div class="col-md-2 col-3">

                <ul class="list-group">
                    <li class="list-group-item  @if (!request()->year) active @endif">
                        <a href="{{ route('job.solutions.batch.details', [$batch]) }}"
                            style="text-decoration:none;color:#000">
                            All
                        </a>
                    </li>
                    @php
                        $years = range(2000, date('Y'));
                        rsort($years);
                    @endphp
                    @foreach ($years as $year)
                        <li class="list-group-item  @if (request()->year == $year) active @endif">
                            <a href="{{ route('job.solutions.batch.details', [$batch, 'year' => $year]) }}"
                                style="text-decoration:none;color:#000">
                                {{ $year }}
                            </a>
                        </li>
                    @endforeach
                </ul>

            </div>
            <div class="col-md-10 col-9 table-responsive">

                <table class="table">
                    <tr>
                        <td colspan="4">
                            <form action="{{ route('job.solutions.batch.details', $batch) }}" method="get">
                                <div class="form-group d-flex gap-2">
                                    <input type="text" class="form-control" name="search"
                                        placeholder="পরীক্ষাগুলো খুঁজুন">
                                    <button class="btn btn-primary">
                                        খুঁজুন
                                    </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Exam
                        </th>
                        <th>

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

                            </td>
                            <td>
                                <p class="text-secondary mt-2" style="font-size: 14px;">
                                    {{ $exam->sub_title }}
                                </p>
                            </td>
                            <td>
                                <div class="btn-group gap-2">

                                    <a class="btn btn-primary" href="{{ route('exam.read', $exam->uuid) }}">পড়ুন</a>
                                    <a class="btn btn-primary" href="{{ route('start', [$exam->uuid, 'practice' => true]) }}">পরীক্ষা দিন</a>

                                </div>
                            </td>
                        </tr>
                    @endforeach

                </table>
                {{ $exams->links() }}

            </div>
        </div>
    </div>
    @endsection
