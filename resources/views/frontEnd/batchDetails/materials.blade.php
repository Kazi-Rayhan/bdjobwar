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
    <div class=" d-flex  justify-content-center align-items-center mt-5">
            <div class="card shadow">
                <div class="card-body text-center w-lg-50">
                    <h2 class="mb-4">এই ব্যাচের জন্য এখন পর্যন্ত কোন পড়ার পিডিএফ দেয়া হয় নি । <br>
                    পিডিএফ দেওয়া হলে এখানে ডাউনলোড করে পড়তে পারবেন।
                     </h2>
                    <a href="{{ route('batch', [$slug, $batch]) }}" class="btn btn-primary">Go Back</a>
                </div>
            </div>
        </div>
        
    @endif
@endsection
