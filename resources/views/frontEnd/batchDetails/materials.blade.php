@extends('frontEnd.layouts.app')

@section('content')
    <h2 class="m-5">
        স্টাডি মেটিরিয়ালস
    </h2>
    @if ($batch->files())
        <div class="container table-responsive my-5" style="height:80vh;overflow-y:scroll">

            <table class="table table-bordered table-hover  ">
                
                <tbody>
                    @foreach ($batch->files() as $file)
                     
                        <tr>


                            <td>
                                {{ $file->original_name }}
                            </td>

                             <td>
                             <a href="{{ Storage::url($file->download_link) }}" class="btn btn-primary">ডাউনলোড করুন</a>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    @else
        <div class="container text-center my-5">
            <img src="{{ asset('icons/books.png') }}" height="200px" class="mb-5" alt="">
            <h1>এখন পর্যন্ত কোন স্টাডি মেটিরিয়ালস দেয়া হয়নি। সকল স্টাডি মেটিরিয়ালস এখানে দেখতে পাবেন।</h1>

        </div>
    @endif
@endsection
