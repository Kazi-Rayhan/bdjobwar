@extends('frontEnd.layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('exams/css/style.css')}}" />
<link rel="stylesheet" href="{{asset('exams/css/responsive.css')}}" />
@endsection
@section('content')
<div class="container my-5 d-flex flex-column gap-3 justify-content-center " style="height:60vh">
    <div class="d-flex flex-column gap-3">
        <div>
            <h2 class="text-dark">হাই!, {{auth()->user()->name}}</h2>
            <h5 style="color:#666666">{{$order->orderable->information()['type']}} টি ক্রয় করার জন্য আপনাকে ধন্যবাদ</h5>
            <div style="height:2px;width:60px" class="bg-danger"></div>
            
        </div>
        <div class="">
            <span class=" h3 text-danger ">
            মূল্য :
            </span>
            <span class="h3">
                {{$order->orderable->information()['price']}}
            </span>
        </div>

        <ul style="list-style: none; margin:0px;padding:0px;font-size:18px">
        <!-- <li style="color:#666666"> <strong>প্রকার : </strong> {{$order->orderable->information()['type']}}</li> -->
            <li style="color:#666666"> <strong>শিরোনাম : </strong> {{$order->orderable->information()['title']}}</li>
        </ul>

        <ul style="list-style: none; margin:0px;padding:0px;font-size:18px">
            <li style="color:#666666"> <strong>নাম : </strong> {{$order->user->name}}</li>
            <li style="color:#666666"> <strong>ফোন : </strong> {{$order->user->phone}}</li>
            <li style="color:#666666"> <strong>রোল :  </strong> {{$order->user->information->id}}</li>
        </ul>


        @if($order->status == 2)<p class="text-dark">পেমেন্ট ভেরেফাই সফল হলে  আপনার ফোনে একটি Conformation SMS পাবেন</p>@elseif($order->status == 0) <p class="text-dark">আপনার পেমেন্ট টি Decline করা হয়েছে </p> @else<p class="text-dark">আপনার পেমেন্ট সফল হয়েছে </p> @endif



        <div>
            <a href="{{route('dashboard')}}" class="btn btn-dark "> ড্যাশবোর্ড </a>
            <a href="{{route('home_page')}}" class="btn btn-info "> হোম </a>

        </div>

    </div>

</div>
@endsection

@section('js')
<script src="{{asset('exams/js/plugins.js')}}"></script>
<!-- Main JS -->
<script src="{{asset('exams/js/main.js')}}"></script>



@endsection