@extends('voyager::master')

@section('page_title', 'Package Students')


@section('content')
    <div class="page-content  browse container" style="margin-top:50px">
        @include('voyager::alerts')
        <div class="row ">
            <div class="col-md-12">
                <h3>{{ $package->title }}</h3>

                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <table class="table table-primary">
                            @if ($package->id != env('FREE_PACKAGE'))
                                <tr>
                                    <td @if ($package->id != env('FREE_PACKAGE')) colspan="3"@else colspan="4" @endif>
                                        <ul style="list-style:none">
                                            <li>
                                                <strong class="text-danger h3">
                                                    Expired : {{ $userCounts['expired'] }}
                                                </strong>
                                            </li>

                                            <li class="text-success h3">
                                                <strong>
                                                    Running : {{ $userCounts['not_expired'] }}
                                                </strong>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endif
                            <tr>
                                <td @if ($package->id != env('FREE_PACKAGE')) colspan="3"@else colspan="4" @endif>
                                    <form action="{{ route('package.students', $package) }}" method="get">
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select class="form-control" name="s" id="">
                                                <option value="">All</option>
                                                <option value="RUNNING" @if (request()->s == 'RUNNING') selected @endif>
                                                    RUNNING</option>
                                                <option value="EXPIRED" @if (request()->s == 'EXPIRED') selected @endif>
                                                    EXPIRED</option>
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
                                        <a class="btn btn-info" href="{{ route('package.students', $package) }}">Reset</a>
                                         <a class="btn btn-info" href="{{ route('package.students.pdf', $package) }}">Download PDF</a>
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
                                @if ($package->id != env('FREE_PACKAGE'))
                                    <th>
                                        Expire At
                                    </th>
                                @endif
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
                                        {{ @$user->information->id ?? 'N/A' }}
                                    </td>
                                    @if ($package->id != env('FREE_PACKAGE'))
                                        <td>
                                            {{ @$user->information->expired_at->format('d M, Y') }} -
                                            {{ @$user->information->expired_at->diffForHumans() }} - @if (@$user->information->expired_at->isPast())
                                                <strong class="text-danger">
                                                    EXPIRED
                                                </strong>
                                            @else
                                                <strong class="text-primary">
                                                    RUNNING
                                                </strong>
                                            @endif
                                        </td>
                                    @endif
                                    <td>
                                        <a href="{{ route('voyager.users.show', $user) }}" class="btn btn-primary">View</a>
                                        @if ($package->id != env('FREE_PACKAGE'))
                                            <a href="{{ route('package.students.remove', [$package, $user]) }}"
                                                onclick="return confirm('Are you sure ?')"
                                                class="btn btn-warning">Remove</a>
                                        @endif
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
