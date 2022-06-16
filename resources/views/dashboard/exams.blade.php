@extends('dashboard.layouts.app')
@section('content')
<div class="container">



<div class="row">

    <div class="col-12">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Exams Informations</h6>
            </div>
            
       
        </div>
        <table class="table">
            <thead class="bg-primary text-white">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Exam name</th>
                <th scope="col">Created At</th>
                <th scope="col">Status</th>
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
                {{ \Carbon\Carbon::parse($exam->created_at)->format('d M ,Y ') }}
                </td>
                <td>
                    @if($exam->answers==!null)
                    <a class="btn btn-info" href="{{route('question',$exam->exam->uuid)}}">Finished</a>
                    @else
                    <a class="btn btn-warning" href="{{route('question',$exam->exam->uuid)}}">Unfinished</a>
                    @endif
                </td>
                </tr>
          
            
            </tbody>
            @endforeach
        </table>

    </div>




</div>

</div>
@endsection