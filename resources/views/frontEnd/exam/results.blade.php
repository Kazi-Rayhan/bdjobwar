@extends('frontEnd.layouts.app')
@section('content')
    <div class="container my-5 ">

        <h1>
            {{ $exam->title }}
        </h1>
        <h3>
            {{ $exam->sub_title }}
        </h3>
       

        <form class="my-3" action="#" method="get">
            <div class="row">
                <div class="col-md-5">
                    <input type="text" name="search" class="form-control" placeholder="নাম">
                </div>
                <div class="col-md-1">
                    <span>অথবা</span>
                </div>
                <div class="col-md-4">
                    <input type="text" name="roll" class="form-control" placeholder="রোল">
                </div>

                <div class="col-md-2">
                    <button type="submit" class="btn btn-success px-4"><i class="fas fa-search"></i>খুজুন </button>
                </div>

        </form>
    </div>

    <h2 class="text-center bg-success text-light p-2 mt-2"> ফলাফল</h2>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        অবস্থান
                    </th>
                    <th>
                        নাম
                    </th>
                    <th>
                        রোল
                    </th>
                    <th>
                        সঠিক উত্তর
                    </th>
                    <th>
                        ভুল উত্তর
                    </th>
                    <th>
                        প্রাপ্ত নম্বর
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $pos => $result)
                    <tr>
                        @if ($result->user_id == Auth()->user()->id)
                            <td class="text-info">
                                {{ (new Rakibhstu\Banglanumber\NumberToBangla())->bnNum($result->exam->getRanking($result->user)) }}
                            </td>

                            <td class="text-info">

                                {{ $result->user->name }}
                            </td>

                            <td class="text-info">
                                {{ (new Rakibhstu\Banglanumber\NumberToBangla())->bnNum($result->user->information->id) }}
                            </td>
                            <td class="text-info">
                                {{ (new Rakibhstu\Banglanumber\NumberToBangla())->bnNum(count((array) json_decode($result->answers)) - $result->wrong_answers) }}

                            </td>
                            <td class="text-info">
                                {{ (new Rakibhstu\Banglanumber\NumberToBangla())->bnNum($result->wrong_answers) }}
                            </td>

                            <td class="text-info">
                                {{ (new Rakibhstu\Banglanumber\NumberToBangla())->bnNum($result->total) }}
                            </td>
                        @else
                            <td>
                                {{ (new Rakibhstu\Banglanumber\NumberToBangla())->bnNum($result->exam->getRanking($result->user)) }}
                            </td>

                            <td>

                                {{ $result->user->name }}
                            </td>

                            <td>
                                                                {{ (new Rakibhstu\Banglanumber\NumberToBangla())->bnNum(@$result->user->information->id) }}
                            </td>
                            <td>
                               {{ (new Rakibhstu\Banglanumber\NumberToBangla())->bnNum(count((array) json_decode($result->answers)) - $result->wrong_answers) }}

                            </td>
                            <td>
                                {{ (new Rakibhstu\Banglanumber\NumberToBangla())->bnNum($result->wrong_answers) }}
                            </td>
                            <td>
                                {{ (new Rakibhstu\Banglanumber\NumberToBangla())->bnNum($result->total) }}
                            </td>
                        @endif
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $results->links() }}
    </div>


    </div>
@endsection
