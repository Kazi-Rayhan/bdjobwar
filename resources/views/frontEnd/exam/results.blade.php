@extends('frontEnd.layouts.app')
@section('content')

<div class="container my-5 ">

    <h1>
        {{$exam->title}}
    </h1>
    <h3>
        {{$exam->sub_title}}
    </h3>
    <div style="height:2px;width:100px" class="bg-danger"></div>

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
                স্কোর
                </th>
                <th>
                ভুল উত্তর
                </th>
                <th>
                মিস
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $pos => $result)
            <tr>
            @if($result->user_id==Auth()->user()->id)
                <td class="text-danger">
                    {{$pos+1}}
                </td>
             
                <td class="text-danger">
          
                    {{$result->user->name}}
                </td>
             
                <td class="text-danger">
                    {{$result->user->information->id}}
                </td>
                <td class="text-danger">
                    {{$result->total}}
                </td>
                <td class="text-danger">
                    {{$result->wrong_answers}}
                </td>
                <td class="text-danger">
                    {{$result->empty_answers}}
                </td>
                @else
                <td>
                    {{$pos+1}}
                </td>
             
                <td>
          
                    {{$result->user->name}}
                </td>
             
                <td>
                    {{$result->user->information->id}}
                </td>
                <td>
                    {{$result->total}}
                </td>
                <td>
                {{$result->wrong_answers}}
                </td>
                <td>
                {{$result->empty_answers}}
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


</div>
@endsection