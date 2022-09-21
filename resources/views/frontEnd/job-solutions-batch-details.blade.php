@extends('frontEnd.layouts.app')
@section('css')
    <meta property="og:url" content="{{ request()->url() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $batch->title }} | BD Job War" />
    <meta property="og:description" content="{{ $batch->description }}" />
    <meta property="og:image" content="{{ Voyager::image($batch->thumbnail) }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"
        integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
    <!-- bratcam area  end-->
    <div
        class="container-fluid container-md my-md-5 my-2 d-flex flex-column gap-3 justify-content-center align-items-center">
        
        <div class="d-flex flex-column gap-3 w-100 w-xl-50">

            <div>
                <h2 class="text-dark">{{ $batch->title }}</h2>
                <div style="height:2px;width:60px" class="bg-danger"></div>
                <h3>{{ $batch->sub_title }}</h3>


            </div>

        </div>
        <h2>
            Exams
        </h2>

       
        <table class="table">
            <tr>
                <th>
                    #
                </th>
                <th>
                    Exam
                </th>
                <th>
                    Subjects
                </th>
                <th>
                    Actions
                </th>
            </tr>
            @foreach ($exams as $exam)
                <tr>
                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td>
                        <h6 class="text-dark" style="font-weight: 700;">{{ $exam->title }}</h6>
                        <p class="text-secondary mt-2" style="font-size: 14px;">
                            {{ $exam->sub_title }}
                        </p>
                    </td>
                    <td>
                        {{ join(' ,', $exam->subjects->pluck('name')->toArray()) }}
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('exam.read', $exam->uuid) }}">পড়ুন</a>
                    </td>
                </tr>
            @endforeach

        </table>
        {{ $exams->links() }}
    @endsection
    @section('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
            integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(document).ready(function() {
                $(".owl-carousel").owlCarousel({
                    loop: true,
                    nav: false,
                    autoplay: true,
                    margin: 10,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1,

                        },
                        600: {
                            items: 3,
                        },
                    }
                });
            });
        </script>
    @endsection
