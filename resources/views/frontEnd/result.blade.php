@extends('frontEnd.layouts.app')
@section('content')

<div class="container my-5 d-flex flex-column gap-3 justify-content-center align-items-center">
    <div class="d-flex flex-column gap-3">
        <div class="" style="color:#666666">

            @if($result->pivot->মোট >= $result->minimum_to_pass)
            <div class="bg-warning rounded-circle d-flex justify-content-center align-items-center mx-auto text-white shadow" style="height: 100px;width:100px;">
                <i class="fa fa-trophy fa-4x"></i>
            </div>
            <div class=" text-center">
                <h1>Passed</h1>
                <h5>আপনি পরীক্ষায় পাশ করেছেন</h5>
                <h2> {{$result->getRanking(auth()->user())}} / {{$result->users()->count()}}</h2>

            </div>
            @elseif(!$result->pivot->answers)
            <div class="bg-dark rounded-circle d-flex justify-content-center align-items-center mx-auto text-white shadow" style="height: 100px;width:100px;">
                <i class="fa fa-frown fa-4x"></i>
            </div>
            <div class=" text-center">
                <h1>Unfinished</h1>
                <h5>আপনি পরীক্ষা শেষ করতে পারেনি ।</h5>
            </div>
            @else
            <div class="bg-dark rounded-circle d-flex justify-content-center align-items-center mx-auto text-white shadow" style="height: 100px;width:100px;">
                <i class="fa fa-frown fa-4x"></i>
            </div>
            <div class=" text-center">
                <h1>Failed</h1>
                <h5>একমাত্র আসল ব্যর্থতা হল হাল ছেড়ে দেওয়া.</h5>
            </div>
            @endif

        </div>
        <div>
            <h2 class="text-dark">{{$result->title}}</h2>
            <div style="height:2px;width:60px" class="mb-2 @if($result->pivot->মোট >= $result->minimum_to_pass) bg-success @else bg-danger @endif "></div>
            <h3 class="text-success">মেধাস্থান : {{$result->getRanking(auth()->user())}}</h3>
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
                    {$result->minius_mark}}
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
                    ভুল উত্তর:
                </th>
                <td>
                {{$result->pivot->wrong_answers}}
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
                {{$result->pivot->empty_answers}}
                </td>
            </tr>
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
                {{$result->pivot->total}}
                </td>
            </tr>
        </table>
        
        @endif



        <p style="color:#666666">
            <strong>বিঃদ্রঃ </strong> আপনার ড্যাশবোর্ড থেকে আরও দেখুন।.
        </p>

    </div>
    <div class="row row-cols-3 gap-5">
        <a href="{{route('answerSheet',$result->uuid)}}" class="btn btn-dark ">উত্তরপত্র</a>
        <a href="{{route('dashboard')}}" class="btn btn-dark">Dashboard</a>
        <a href="{{route('home_page')}}" class="btn btn-dark"> Home</a>
        <a href="{{route('all-results-exam',$result->uuid)}}" class="btn btn-dark"> Results</a>
    </div>

</div>
@endsection