@extends('voyager::master')

@section('page_title', 'Batch Students')


@section('content')

    <div class="page-content  browse container" style="margin-top:50px">
        @include('voyager::alerts')
        <div class="row ">
            <div class="col-md-12">
                <h3>{{ $batch->title }}</h3>
                <ul class="list-group">
                @foreach ($count as $key => $data)
                <li class="list-group-item"> <strong>{{ucwords($key)}} :</strong> {{$data}}</li>
                @endforeach
                </ul>
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <table class="table table-primary">
                            <tr>
                                <td colspan="5">
                                    <form action="{{ route('batch.students', $batch) }}" method="get">
                                        <div class="form-group">
                                            <label for="">Filter</label>
                                            <select name="f" id="" class="form-control">
                                                <option value="" >All</option>
                                                <option value="0" @if(request()->f == 0) selected @endif>Ban</option>
                                                <option value="1" @if(request()->f == 1) selected @endif>Unban</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Search</label>
                                            <input type="text" name="q" class="form-control"
                                                placeholder="I am looking for ...." value="{{ request()->q }}">
                                        </div>
                                        <button class="btn btn-primary">
                                            Find
                                        </button>
                                        <a class="btn btn-info" href="{{ route('batch.students', $batch) }}">Reset</a>
                                        <a class="btn btn-info" href="{{ route('batch.students.pdf', $batch) }}">Download PDF</a>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Phone
                                </th>
                                <th>
                                    Roll
                                </th>
                                <th>
                                    Actions
                                </th>

                            </tr>
                            @foreach ($users as $user)
                                <tr>
                                    @php
                                        $index = ($users->currentPage() - 1) * $users->perPage() + $loop->index + 1;
                                    @endphp
                                    <td>
                                        {{ $index }}
                                    </td>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                    <td>
                                        {{ $user->phone }}
                                    </td>
                                    <td>
                                        {{ $user->information->id }}
                                    </td>

                                    <td>
                                        <a href="{{ route('voyager.users.show', $user) }}" class="btn btn-primary">View</a>
                                        @if ($batch->studentStatus($user))
                                            <a href="{{ route('batch.students.ban', [$batch, $user]) }}"
                                                onclick="return confirm('Are you sure ?')" class="btn btn-danger">Ban</a>
                                        @else
                                            <a href="{{ route('batch.students.unban', [$batch, $user]) }}"
                                                onclick="return confirm('Are you sure ?')" class="btn btn-success">Unban</a>
                                        @endif
                                        <a href="{{ route('batch.students.remove', [$batch, $user]) }}"
                                            onclick="return confirm('Are you sure ?')" class="btn btn-warning">Remove</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{ $users->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

@stop
