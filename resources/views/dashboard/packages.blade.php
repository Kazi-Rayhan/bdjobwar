@extends('dashboard.layouts.app')
@section('content')
    <div class="container d-flex justify-content-center align-items-center 100-vh">

        <div class="card border border-success shadow package-hover ">
            @if (auth()->user()->information->package->paid == true)
                <div class="card-body d-flex  flex-column justify-content-center align-items-center shadow  p-5 gap-2">
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
            @else
                <div class="card">
                    <div class="card-body">
                        <h3>
                            আপনি কোন প্যাকেজ ক্রয় করেননি । আমাদের প্যাকেজ সমূহ দেখতে <a
                                href="{{ route('home_page') }}#package">এখানে ক্লিক করুন</a>
                        </h3>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
