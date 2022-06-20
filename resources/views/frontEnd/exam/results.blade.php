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

    <h2 class="text-center bg-success text-light p-2 mt-2"> Results</h2>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>
                    Postion
                </th>
                <th>
                    Name
                </th>
                <th>
                    Roll
                </th>
                <th>
                    Score
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $pos => $result)
            <tr>
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
            </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection