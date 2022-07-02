@extends('frontEnd.layouts.app')
@section('content')

<div class="container my-5 d-flex flex-column gap-3 justify-content-center align-items-center">
    <div class="d-flex flex-column gap-3 w-50">
       
        <div>
            <h2 class="text-dark">{{$result->title}}</h2>
            <div style="height:2px;width:60px" class="mb-2 @if($result->pivot->মোট >= $result->minimum_to_pass) bg-success @else bg-danger @endif "></div>
            <h5 class="">মোট পরীক্ষার্থী সংখা : {{$result->users()->count()}}</h5>
            <h5 class="text-success">আপনার অবস্থান : {{$result->getRanking(auth()->user())}}</h5>
        </div>



        @if(!$result->pivot->answers )
        <table class="table">
            <tr>
                <th>
                    ভুল উত্তর:
                </th>
                <td>
                    N/A
                </td>
            </tr>
            <tr>
                <th>
                    নেতিবাচক মার্ক:
                </th>
                <td>
                    {{$result->minius_mark}}
                </td>
            </tr>
            <tr>
                <th>
                    মিস :
                </th>
                <td>
                    N/A
                </td>
            </tr>
            <tr>
                <th>
                    সঠিক উত্তর :
                </th>
                <td>
                    N/A
                </td>
            </tr>
            <tr>
                <th>
                    পাস মার্ক :
                </th>
                <td>
                    {{$result->minimum_to_pass}}
                </td>
            </tr>
            <tr>
                <th>
                    মোট :
                </th>
                <td>
                    N/A
                </td>
            </tr>
        </table>

        @else
        <table class="table table-striped ">
            <tr>
                <th>
                    সঠিক উত্তর :
                </th>
                <td>
                    {{($result->questions->count() - ($result->pivot->wrong_answers + $result->pivot->empty_answers ))/$result->point}}
                </td>
            </tr>
            <tr>
                <th>
                    ভুল উত্তর:
                </th>
                <td>
                    {{$result->pivot->wrong_answers}}
                </td>
            </tr>
            <tr>
                <th>
                    নেগেটিভ মার্ক:
                </th>
                <td>
                    {{$result->minius_mark}}
                </td>
            </tr>
            <tr>
                <th>
                    পাস মার্ক :
                </th>
                <td>
                    {{$result->minimum_to_pass}}
                </td>
            </tr>
            <tr>
                <th>
                    প্রাপ্ত নম্বর :
                </th>
                <td>
                    {{$result->pivot->total}}
                </td>
            </tr>
            <tr>
                <th>
                    রেজাল্ট :
                </th>
                <td>
                    @if($result->pivot->total >= $result->minimum_to_pass)
                    <span class="text-success">

                        Passed
                    </span>    
                    @else
                    <span class="text-danger">

                        Failed 
                    </span>
                    @endif
                </td>
            </tr>
        </table>

        @endif



        
    </div>
    <div class="row row-cols-3 gap-5">
        <a href="{{route('answerSheet',$result->uuid)}}" class="btn btn-dark ">উত্তরপত্র</a>
        <a href="{{route('dashboard')}}" class="btn btn-dark">প্রোফাইল</a>
        <a href="#" class="btn btn-dark">পরবর্তী পরিক্ষার সিলেবাস</a>
        <a href="{{route('all-results-exam',$result->uuid)}}" class="btn btn-dark"> মেধাতালিকা</a>
    </div>

</div>
@endsection