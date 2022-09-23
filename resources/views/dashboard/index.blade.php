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
        <div class="row">
            <div class="col-xl-4 col-sm-6 col-12">
                <div class="card shadow">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-pencil primary font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h1>{{ $exam }}</h1>
                                    <span>Exams</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-12">
                <div class="card shadow">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-pencil primary font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h1>{{ auth()->user()->batches()->count() }}</h1>
                                    <span>Courses</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-12">
                <div class="card shadow">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-pencil primary font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h1>{{ auth()->user()->orders()->count() }}</h1>
                                    <span>Orders</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-12 mt-2">
                <div class="card shadow">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-pencil primary font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h1>{{ auth()->user()->favourites()->count() }}</h1>
                                    <span>Favourites</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-sm-6 col-12 mt-2">
                <div class="card shadow">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-pencil primary font-large-2 float-left"></i>
                                </div>

                                <div class="media-body text-right">
                                    <h1>{{ $examAttended }}</h1>
                                    <span>Exam Attended</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-sm-6 col-12 mt-2">
                <div class="card shadow">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-pencil primary font-large-2 float-left"></i>
                                </div>

                                <div class="media-body text-right">
                                    <h1>{{ $exam - $examAttended }}</h1>
                                    <span>Exam not taken</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-sm-6 col-12 mt-2">
                <div class="card shadow">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-pencil primary font-large-2 float-left"></i>
                                </div>

                                <div class="media-body text-right">
                                    <h1>{{ number_format(auth()->user()->exams()->avg('total'),2) }}</h1>
                                    <span>Averge Mark</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="row row-cols-1">
            <div class="card mt-2 shadow">
                <div class="card-body d-flex gap-5  flex-wrap align-items-center ">
                    <img src="{{ Voyager::image(auth()->user()->avatar) }}"   height="250px" alt="">
                    <dl>
                        <dt>Name :</dt>
                        <dd>{{ auth()->user()->name }}</dd>
                        <dt>Email :</dt>
                        <dd>{{ auth()->user()->email ?? 'n/a' }}</dd>
                        <dt>Phone :</dt>
                        <dd>{{ auth()->user()->phone }}</dd>
                        <dt>Roll</dt>
                        <dd>{{ auth()->user()->information->id }}</dd>
                        <a href="{{route('editprofile')}}" class="btn btn-primary">Update Profile</a>
                    </dl>
                    

                </div>
            </div>
      
        </div>





    </div>
@endsection
