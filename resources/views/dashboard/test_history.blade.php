@extends('dashboard.layouts.app')
@section('content')
<div class="container-fluid">


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">All Test History</h6>
        </div>
    </div>

    @if($exams->count() >0)
    <table class="table">
        <thead class="bg-success text-white">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Exam name</th>
                <th scope="col">Position</th>
                <th scope="col">Missed</th>
                <th scope="col">Wrong answer</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($exams as $exam)
            @if($exam->pivot->total)
            <tr>
                <th scope="row">{{ $loop->iteration  }}</th>
                <td>

                    {{$exam->title}}
                </td>
                <td>
                    {{$exam->getRanking(auth()->user())}}
                </td>
                <td>
                   
                {{$exam->pivot->empty_answers}}
                </td>

               
                
                <td>
                    {{$exam->pivot->wrong_answers}}
                </td>
                <td>
                    {{$exam->pivot->total}}

                </td>
                <td>
                    <a href="{{route('answerSheet',$exam->uuid)}}" class="btn btn-success">Answer Sheet</a>
                </td>
            </tr>
            @endif
            @endforeach

        </tbody>
    </table>
    @else
    <h3 class="text-center"> You did not placed any order </h3>
    @endif
</div>

@endsection