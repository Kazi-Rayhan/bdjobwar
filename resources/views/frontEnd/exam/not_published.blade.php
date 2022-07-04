@extends('frontEnd.layouts.app')
@php
$to = new EasyBanglaDate\Types\BnDateTime($exam->to, new DateTimeZone('Asia/Dhaka'));
@endphp
@section('content')
<div class="container  d-flex justify-content-center align-items-center" style="height:60vh">
    <div class="card border border-success shadow">
        <div class="card-body text-center">
            <h1 class="">
                রেজাল্ট দেখতে পারবেন {{$to->getDateTime()->format('j F, Y b h:i') }}
            </h1>
             <a class="btn btn-dark mt-3" href="{{url()->previous()}}">Go Back </a> 
        </div>
    </div>
</div>
@endsection