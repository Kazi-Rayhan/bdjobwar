@extends('dashboard.layouts.app')
@section('content')
<div class="container-fluid">


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success">All Test History</h6>
    </div>
</div>
    
    @if($testHistories->count() >0)
        <table class="table">
            <thead class="bg-success text-white">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Exam name</th>
                <th scope="col">Subjects</th>
                <th scope="col">Date</th>
                <th scope="col">Right answer</th>
                <th scope="col">Wrong answer</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            @foreach($testHistories as $test)
            <tbody>
              
                <tr>
                <th scope="row">{{ $loop->iteration  }}</th>
                <td>
                    
                    {{$test->Exam->title}}
                </td>
                <td>
                    @foreach($test->Exam->subjects as $subject)
                    <span>{{$subject->name}} </span>
                    @endforeach
                  
                </td>
                <td>
                {{ \Carbon\Carbon::parse($test->created_at)->format('d M ,Y ') }}
                  
                </td>
                <td>
                {{$test->total}}
                </td>
                <td>
                {{$test->wrong_answers}}
                </td>
                <td>
                <a href="{{route('answerSheet',$test->Exam->uuid)}}" class="btn btn-success">Read</a>
                </td>
                </tr>
          
            
            </tbody>
            @endforeach
        </table>
        @else
        <h3 class="text-center"> You did not placed any order </h3>
        @endif
</div>

@endsection