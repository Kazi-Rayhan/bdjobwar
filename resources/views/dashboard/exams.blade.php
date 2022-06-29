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
                <th scope="col">Type</th>
                <th scope="col">result</th>
                <th scope="col">Created At</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            @foreach($exams as $exam)
            <tbody>
              
                <tr>
                <th scope="row">{{ $loop->iteration  }}</th>
                <td>
                 {{$exam->exam->title}}
      
                </td>
              
                <td>
                @if($exam->exam->is_paid==0)
                    <button class="btn btn-success px-2 py-0">Paid</button>
                @else
                <button class="btn btn-warning px-2 py-0">Unpaid</button>
                @endif
                </td>
                <td>
                    @if($exam->total==!NULL)
                    <p>{{$exam->total}}</p>
                    @else
                    <button class="btn btn-danger px-2 py-0">Pending</button>
                    @endif
                </td>
  
                <td>
                {{ \Carbon\Carbon::parse($exam->created_at)->format('d M ,Y ') }}
                </td>
                <td>
                    @if($exam->answers==!null)
                    <a class="btn btn-info" href="{{route('question',$exam->exam->uuid)}}">Finished</a>
                    @else
                    <a class="btn btn-warning" href="{{route('question',$exam->exam->uuid)}}">Unfinished</a>
                    @endif
                </td>
                <td>
                <a href="{{route('answerSheet',$exam->exam->uuid)}}" class="btn btn-success">Answer Sheet</a>
                <a href="{{route('all-results-exam',$exam->exam->uuid)}}" class="btn btn-primary">see all Results</a>

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