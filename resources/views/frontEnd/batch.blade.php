@extends('frontEnd.layouts.app')
@section('content')
@php
use Rakibhstu\Banglanumber\NumberToBangla;
$numto = new NumberToBangla();
@endphp

<div class="container my-5">
    <h3 class="text-success">
        {{$batch->title}}
    </h3>
    <div style="height:2px;width:100px" class="bg-danger"></div>
    <a href="" class="btn btn-dark mt-2"> রুটিন  ডাউনলোড করুন</a>
    <div class="mt-5">
        <nav class="navbar navbar-expand navbar-light ">
            <div class="nav navbar-nav">
                <a class="nav-item nav-link @if(request()->filter == '')bg-danger text-light @endif border border-danger" href="{{$batch->link()}}">Live <span class="visually-hidden">(current)</span></a>
                <a class="nav-item nav-link @if(request()->filter == 'upcoming')bg-danger text-light @endif border border-danger" href="{{$batch->link()}}?filter=upcoming">Upcoming</a>
                <a class="nav-item nav-link @if(request()->filter == 'archived')bg-danger text-light @endif border border-danger" href="{{$batch->link()}}?filter=archived">Archived</a>
            </div>
        </nav>
        <div class="table-responsive">
            <table class="table text-center">
                <thead class="bg-danger text-light">
                    <tr>
                        <th>
                           তারিখ
                        </th>
                        <th>
                            নাম
                        </th>
                        <th>
                            বিষয় সমূহ
                        </th>
                        <th>
                            পূর্ণ নম্বর
                        </th>
                       
                       
                        <th>

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($exams as $exam)
                    @php
                    $from = new EasyBanglaDate\Types\BnDateTime($exam->from, new DateTimeZone('Asia/Dhaka'));
                    $to = new EasyBanglaDate\Types\BnDateTime($exam->to, new DateTimeZone('Asia/Dhaka'));
                    @endphp
                    <tr>
                        <td>
                        {{ $from->getDateTime()->format('j F, Y b h:i')}}
                        <p class="m-0 p-0">থেকে</p> 
                        {{ $to->getDateTime()->format('j F, Y b h:i')}}
                        </td>
                        <td>
                            {{$exam->title}}
                        </td>
                        <td>
                            {{join(', ',$exam->subjects->pluck('name')->toArray())}}
                        </td>
                        <td>
                            {{$exam->fullMark}}
                        </td>
                        
                     
                       <td>
                        <div class="btn-group gap-2">
                            <a href="{{route('start-exam',$exam->uuid)}}" class="btn btn-dark "> টেস্ট দিন</a>
                            <a href="" class="btn btn-dark "> সিলেবাস</a>
                            <a href="{{route('all-results-exam',$exam->uuid)}}" class="btn btn-dark "> মেধাতালিকা</a>
                        </div>
                       </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection