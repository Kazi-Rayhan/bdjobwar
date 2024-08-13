@extends('frontEnd.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('exams/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('exams/css/responsive.css') }}" />
@endsection
@section('content')
    <div class="container my-5 d-flex flex-column gap-3 justify-content-center " style="height:60vh">
        <div class="d-flex flex-column gap-3">
            <div>
                <h2 class="text-dark">Hi, {{ auth()->user()->name }}</h2>
                <h5 style="color:#666666">আপনি যে পাসওয়ার্ডটি সেট করেছেন সেটি মনে রাখুন অথবা কোথাও লিখে রাখুন । <br>
                    পরবর্তীতে লগইন করতে প্রয়োজন হবে । এই একটি অ্যাকাউন্ট থেকেই আপনি সকল ফ্রী ও পেইড কোর্সে অংশগ্রহণ করতে
                    পারবেন </h5>
                <div style="height:2px;width:60px" class="bg-danger"></div>
            </div>
            <div class="">
                <span class=" h3 text-danger ">
                    রোল :
                </span>
                <span class="h3">
                    {{ auth()->user()->information->id }}
                </span>
            </div>

            <ul style="list-style: none; margin:0px;padding:0px;font-size:18px">
                <li style="color:#666666"> <strong>নাম : </strong> {{ auth()->user()->name }}</li>
                <li style="color:#666666"> <strong>মোবাইল নম্বর : </strong> {{ auth()->user()->phone }}</li>
            </ul>





            <div>
                <a href="{{ route('dashboard') }}" class="btn btn-dark "> প্রোফাইল</a>
                <a href="{{ route('home_page') }}" class="btn btn-info "> হোম</a>

            </div>

        </div>

    </div>
@endsection

@section('js')
    <script src="{{ asset('exams/js/plugins.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('exams/js/main.js') }}"></script>
@endsection
