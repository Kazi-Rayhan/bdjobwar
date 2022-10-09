@extends('dashboard.layouts.app')
@section('content')
    @php
        $examAttended = auth()
            ->user()
            ->exams()
            ->where('total')
            ->count();
        $exam = auth()
            ->user()
            ->exams()
            ->count();
    @endphp
   
    <div class="container">
        <div class="card border-dark rounded">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 col-12 text-center p-3">
                        <img src="{{ Voyager::image(auth()->user()->avatar) }}"
                            class="rounded-circle border border-dark shadow"
                            style="height:150px;width:150px;object-fit:cover" alt="">
                    </div>
                    <div class="col-md-8 col-12">
                        <table class="table table-bordered  ">
                            <tr>
                                <th>
                                    Name :
                                </th>
                                <td>
                                    {{ auth()->user()->name }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Email :
                                </th>
                                <td>
                                    {{ auth()->user()->email ?? 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Phone :
                                </th>
                                <td>
                                    {{ auth()->user()->phone }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Roll :
                                </th>
                                <td>
                                    {{ auth()->user()->information->id }}
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered  ">
                            <tr>
                                <th>
                                    Exams : {{ $exam }}
                                </th>
                                <th>
                                    Courses : {{ auth()->user()->batches()->count() }}
                                </th>


                            </tr>
                            <tr>
                                <th>
                                    Orders : {{ auth()->user()->orders()->count() }}
                                </th>
                                <th>
                                    Favourites : {{ auth()->user()->favourites()->count() }}
                                </th>
                            </tr>
                            <tr>
                                <th colspan="2">
                                    Exam Attended : {{ $examAttended }}
                                </th>

                            </tr>
                            </tr>
                            <tr>
                                <th colspan="2">

                                    Exam not taken : {{ $exam - $examAttended }}

                                </th>
                            </tr>
                              <tr>
                                <th colspan="2">

                                   Averge Mark: {{ number_format(auth()->user()->exams()->avg('total'),2) }}

                                </th>

                            </tr>
                        </table>
                    </div>
                </div>
                <a href="{{route('editprofile')}}" class="btn btn-primary">Update Profile</a>
            </div>
        </div>
    </div>
@endsection
