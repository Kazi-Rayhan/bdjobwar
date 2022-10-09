@extends('frontEnd.layouts.app')

@section('content')
    <h2 class="m-5 ">
        পরিসংখ্যান
    </h2>
    <div class="container text-center my-5">
        @php
            $examAttended = auth()
                ->user()
                ->exams()
                ->where('total')
                ->count();
            $exam = auth()
                ->user()
                ->exams()
                ->count();
        @endphp

        <div class="container">
            <div class="card border-dark rounded">
                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered  ">
                                <tr>
                                    <th>
                                        Exams : {{ $exam }}
                                    </th>
                                    <th>
                                        Favourites : {{ auth()->user()->favourites()->count() }}
                                    </th>

                                </tr>

                                <tr>
                                    <th colspan="2">
                                        Exam Attended : {{ $examAttended }}
                                    </th>

                                </tr>
                                </tr>
                                <tr>
                                    <th colspan="2">

                                        Exam not taken : {{ $exam - $examAttended }}

                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="2">

                                        Averge Mark: {{ number_format(auth()->user()->exams()->avg('total'),2) }}

                                    </th>

                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
