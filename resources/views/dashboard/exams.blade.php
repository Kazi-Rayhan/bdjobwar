@extends('dashboard.layouts.app')
@section('content')
<div class="container-fluid">



<div class="row">

    <div class="col-12">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Exams Informations</h6>
            </div>
            
       
        </div>
        <div class="table-responsive">
        @if($exams->count()>0)
        
        <table class="table">
            <thead class="bg-success text-white">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Exam name</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            @foreach($exams as $exam)
            <tbody>
              
                <tr>
                <th scope="row">{{ $loop->iteration  }}</th>
                <td>
                <h5>
                 {{$exam->exam->title}}
                </h5>
                <h6>
                 {{$exam->exam->sub_title}}
                </h6>
                </td>
              
                <td>
                <a href="{{route('answerSheet',$exam->exam->uuid)}}" class="btn btn-success">Answer Sheet</a>
                <a href="{{route('all-results-exam',$exam->exam->uuid)}}" class="btn btn-primary">Merit List</a>

                </td>
                </tr>
          
            
            </tbody>
            @endforeach
        </table>
        @else
</div>
				<h3 class="text-center"> You did not placed any exams </h3>
        @endif
    </div>




</div>

</div>
@endsection