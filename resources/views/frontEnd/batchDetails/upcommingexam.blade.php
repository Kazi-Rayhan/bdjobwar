@extends('frontEnd.layouts.app')

@section('content')
    <h2 class="m-5 ">
        আসন্ন পরীক্ষা
    </h2>
     @if ($exams->count())
    <div class="container table-responsive my-5" style="height:80vh;overflow-y:scroll">


        <table class="table table-border table-hover text-center ">
            <thead class="bg-success text-light">
                <tr>
                    <th scope="col">
                        পরীক্ষার নাম
                    </th>
                    <th scope="col">
                        বিষয়
                    </th>
                    <th scope="col">
                        শুরু
                    </th>

                    <th scope="col">
                        শেষ
                    </th>
                    <th scope="col">

                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($exams as $exam)
                    @php
                        $from = new EasyBanglaDate\Types\BnDateTime($exam->from, new DateTimeZone('Asia/Dhaka'));
                        $to = new EasyBanglaDate\Types\BnDateTime($exam->to, new DateTimeZone('Asia/Dhaka'));
                    @endphp
                    <tr>


                        <td>
                            {{ $exam->title }}
                        </td>

                        <td>
                            {{ $exam->sub_title }}
                        </td>

                        <td>
                            {{ $from->getDateTime()->format('j F, Y b h:i') }}
                        </td>
                        <td>
                            {{ $to->getDateTime()->format('j F, Y b h:i') }}
                        </td>

                        <td>
                            <!-- <div class="dropdown open">
                                                                                                <a class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                                    Dropdown
                                                                                                </a> -->
                            <!-- <div class="dropdown-menu" aria-labelledby="triggerId"> -->
                            <!-- <a href="{{ route('start-exam', $exam->uuid) }}" class="dropdown-item"> টেস্ট দিন</a> -->
                            <button data-syllabus="{{ $exam->syllabus }}" type="button" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" class="btn btn-dark"> সিলেবাস</button>
                            @auth
                                @if (auth()->user()->information->is_paid ||
                                    auth()->user()->bought($batch->id))
                                    @if ($exam->reading_pdf && count(json_decode($exam->reading_pdf)))
                                        <a href="{{ Voyager::image(json_decode($exam->reading_pdf)[0]->download_link) }}"
                                            class="btn btn-dark mt-2"> পড়ার পিডিএফ</a>
                                    @endif
                                @endif
                            @endauth
                            <!-- </div> -->


                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>



    </div>
    @else
     <div class="container text-center my-5">
                <img src="{{ asset('icons/upcomingexam.svg') }}" height="200px" class="mb-5" alt="">
                <h1>এই মুহূর্তে কোন আপকামিং সিডিউল নেই।</h1>
                <h5>
                    পড়ে আবার চেক করুণ
                </h5>
            </div>
    @endif
@endsection
