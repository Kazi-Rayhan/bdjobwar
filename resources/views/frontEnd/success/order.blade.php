@extends('frontEnd.layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('exams/css/style.css')}}" />
<link rel="stylesheet" href="{{asset('exams/css/responsive.css')}}" />
@endsection
@section('content')
<div class="container my-5 d-flex flex-column gap-3 justify-content-center " style="height:60vh">
    <div class="d-flex flex-column gap-3">
        <div>
            <h2 class="text-dark">Hi, {{auth()->user()->name}}</h2>
            <h5 style="color:#666666">Thank you for the purchase</h5>
            <div style="height:2px;width:60px" class="bg-danger"></div>
            
        </div>
        <div class="">
            <span class=" h3 text-danger ">
                Price :
            </span>
            <span class="h3">
                {{$order->orderable->information()['price']}}
            </span>
        </div>

        <ul style="list-style: none; margin:0px;padding:0px;font-size:18px">
            <li style="color:#666666"> <strong>Type : </strong> {{$order->orderable->information()['type']}}</li>
            <li style="color:#666666"> <strong>Title : </strong> {{$order->orderable->information()['title']}}</li>
        </ul>

        <ul style="list-style: none; margin:0px;padding:0px;font-size:18px">
            <li style="color:#666666"> <strong>Name : </strong> {{$order->user->name}}</li>
            <li style="color:#666666"> <strong>Phone : </strong> {{$order->user->phone}}</li>
            <li style="color:#666666"> <strong>Roll : </strong> {{$order->user->information->id}}</li>
        </ul>


        @if($order->status == 0)<p>Your purchase is being processed we will notify you updates as soon</p>@elseif($order->status == 2) <p>Your purchase is declined </p> @else<p>Your purchase is complete </p> @endif



        <div>
            <a href="{{route('dashboard')}}" class="btn btn-dark "> Check Dashboard</a>
            <a href="{{route('home_page')}}" class="btn btn-info "> Home</a>

        </div>

    </div>

</div>
@endsection

@section('js')
<script src="{{asset('exams/js/plugins.js')}}"></script>
<!-- Main JS -->
<script src="{{asset('exams/js/main.js')}}"></script>



@endsection