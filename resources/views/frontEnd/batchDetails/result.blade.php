@extends('frontEnd.layouts.app')

@section('content')
    <h2 class="m-5">
        মেধাতালিকা
    </h2>
    @if ($exams->count())
        <div class="container table-responsive my-5" style="height:80vh;overflow-y:scroll">

            <table class="table table-borderless table-hover text-center ">
                <thead class="bg-success text-light">
                    <tr>
                        <th scope="col">
                            নাম
                        </th>

                        <th scope="col">
                            পূর্ণ নম্বর
                        </th>
                        <th>
                            পরীক্ষার্থী সংখ্যা
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
                                {{ $exam->title }} - {{ $exam->sub_title }}

                            </td>



                            <td>
                                {{ (new Rakibhstu\Banglanumber\NumberToBangla())->bnNum($exam->fullMark) }}
                            </td>
                            <td>
                                {{ $exam->participants }}
                            </td>


                            <td>

                                <a href="{{ route('all-results-exam', $exam->uuid) }}" class="btn btn-dark"> মেধাতালিকা</a>
                                <a href="{{ route('answerSheet', $exam->uuid) }}" class="btn btn-info text-white">
                                    উত্তরমালা</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    @else
        <div class=" d-flex  justify-content-center align-items-center mt-5">
            <div class="card shadow w-lg-50">
                <div class="card-body text-center  ">
                    <h2 class="mb-4">এখন পর্যন্ত কোন মেধাতালিকা প্রকাশ করা হয়নি। <br> লাইভ শেষে সকল পরীক্ষার মেধাতালিকা এখানে দেখতে পাবেন।
                    </h2>
                    <a href="{{ route('batch', [$slug, $batch]) }}" class="btn btn-primary">Go Back</a>
                </div>
            </div>
        </div>
    @endif
@endsection
