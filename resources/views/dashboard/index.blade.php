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
        <div class="row row-cols-1 row-cols-md-2">
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
            <div class="card mt-2">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="  card border border-success shadow package-hover ">

                                <div
                                    class="card-body d-flex  flex-column justify-content-center align-items-center shadow  p-5 gap-2">
                                    <div style="height:80px;width:80px"
                                        class="text-success shadow rounded-circle border-success border d-flex justify-content-center flex-column  align-items-center">
                                        <i class="fa fa-gifts fa-2x"></i>
                                    </div>
                                    <h4 class="text-uppercase" style="font-weight:700 ;">
                                        {{ auth()->user()->information->package->title }}
                                    </h4>

                                    <h5 style="font-weight:700;">

                                        Expire at : {{ auth()->user()->information->expired_at->format('d M, Y') }}

                                    </h5>

                                    <ul class="premium-feature">
                                        <li><span>প্রশ্ন ব্যাংক সার্স</span></li>
                                        <li><span>সকল পেইড কোর্স</span></li>
                                        <li><span>জব সলিউশন</span></li>
                                        <li><span>পিডিএফ ডাউনলোড</span></li>
                                        <li><span>সকল লাইভ ও আর্কাইভ পরীক্ষা</span></li>

                                    </ul>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>





    </div>
@endsection
