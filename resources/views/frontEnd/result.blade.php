@extends('frontEnd.layouts.app')
@section('content')

<div class=" container-fluid container-xl  my-5 d-flex flex-column gap-3 justify-content-center align-items-center">
    <div class="d-flex flex-column gap-3 w-100  ">
       
        <div>
            <h2 class="text-dark">{{$result->title}}</h2>
            <div style="height:2px;width:60px" class="mb-2 @if($result->pivot->মোট >= $result->minimum_to_pass) bg-success @else bg-danger @endif "></div>
            <h5 class="">মোট পরীক্ষার্থী সংখ্যা : {{$count}}</h5>
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

    
    <div class="row row-cols-sm-1 row-cols-xl-5 gap-2 w-100">
        <a href="{{route('answerSheet',$result->uuid)}}" class="btn btn-dark ">উত্তরপত্র</a>
        <a href="{{route('all-results-exam',$result->uuid)}}" class="btn btn-dark"> মেধাতালিকা</a>
        <button  type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">পরবর্তী পরীক্ষার সিলেবাস</button>
        <a href="{{route('dashboard')}}" class="btn btn-dark">প্রোফাইল</a>
    </div>

   

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">পরবর্তী পরিক্ষার সিলেবাস</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       {{$result->next_syllabus}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
@endsection