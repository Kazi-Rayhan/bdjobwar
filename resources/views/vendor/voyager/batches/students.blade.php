@extends('voyager::master')

@section('page_title', 'Batch Students')


@section('content')
    <div class="page-content  browse container" style="margin-top:50px">
        @include('voyager::alerts')
        <div class="row ">
            <div class="col-md-12">
                <h3>{{ $batch->title }}</h3>

                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <table class="table table-primary">
                            <tr>
                                <th>
                                    Image
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Phone
                                </th>
                               
                            </tr>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <img height="100" src="{{ Voyager::image($user->avatar) }}" alt="">
                                    </td>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                    <td>
                                        {{ $user->phone }}
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

@stop
