@extends('frontEnd.layouts.app')
@section('content')
    @php
    use Rakibhstu\Banglanumber\NumberToBangla;
    $numto = new NumberToBangla();
    @endphp

    <div class="container-fluid container-md my-5">
        <div class="d-flex justify-content-center ali">

        </div>
        <h3 class="text-success">
            {{ $batch->title }}
        </h3>
        <div style="height:2px;width:100px" class="bg-success"></div>

        @auth
            @if (@auth()->user()->information->is_paid ||
                auth()->user()->bought($batch->id))
                @if ($batch->reading_pdf && count(json_decode($batch->reading_pdf)))
                    <a href="{{ Voyager::image(json_decode($batch->reading_pdf)[0]->download_link) }}" class="btn btn-dark mt-2">
                        পড়ার
                        পিডিএফ</a>
                @endif
            @endif
        @endauth
        <p class="w-100 mt-4">
            <span></span> Live = চলমান পরীক্ষা Live বাটনে দেখতে পাবেন ।
            <br>
            Upcoming = আসন্ন পরীক্ষার সময় ও সিলেবাস দেখতে পাবেন ।
            <br>
            Archived = পূর্বে শেষ হওয়া পরীক্ষা গুলো এখানে দেখতে পারবেন ।
        </p>
        <div class="mt-5">
            <nav class="navbar navbar-expand navbar-light ">
                <div class="nav navbar-nav">
                    <a class="nav-item nav-link @if (request()->filter == '') bg-success text-light @endif border border-success"
                        href="{{ $batch->link() }}">Live <span class="visually-hidden">(current)</span></a>
                    <a class="nav-item nav-link @if (request()->filter == 'upcoming') bg-success text-light @endif border border-success"
                        href="{{ $batch->link() }}?filter=upcoming">Upcoming</a>
                    <a class="nav-item nav-link @if (request()->filter == 'archived') bg-success text-light @endif border border-success"
                        href="{{ $batch->link() }}?filter=archived">Archived</a>
                </div>
            </nav>
            <div>
                @if (request()->filter == '')
                    <table class="table table-borderless table-hover text-center ">
                        <thead class="bg-success text-light">
                            <tr>
                                <th scope="col">
                                    শুরু
                                </th>

                                <th scope="col">
                                    নাম
                                </th>

                                <th scope="col">
                                    পূর্ণ নম্বর
                                </th>
                                <th scope="col">
                                    শেষ
                                </th>

                                <th scope="col">

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($exams as $exam)
                                @php
                                    $from = new EasyBanglaDate\Types\BnDateTime($exam->from, new DateTimeZone('Asia/Dhaka'));
                                    $to = new EasyBanglaDate\Types\BnDateTime($exam->to, new DateTimeZone('Asia/Dhaka'));
                                @endphp
                                <tr>
                                    <td scope="row">
                                        {{ $from->getDateTime()->format('j F, Y b h:i') }}


                                    </td>

                                    <td>
                                        {{ $exam->title }}
                                    </td>

                                    <td>
                                        {{ $exam->fullMark }}
                                    </td>
                                    <td>
                                        {{ $to->getDateTime()->format('j F, Y b h:i') }}
                                    </td>

                                    <td>
                                        <!-- <div class="dropdown open"> -->
                                        <!-- <a class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Dropdown
                                                        </a> -->
                                        <!-- <div class="dropdown-menu" aria-labelledby="triggerId"> -->
                                        <a href="{{ route('start-exam', $exam->uuid) }}" class="btn btn-primary"> টেস্ট
                                            দিন</a>
                                        <button data-syllabus="{{ $exam->syllabus }}" type="button" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal" class="btn btn-dark"> সিলেবাস</button>
                                        @if (auth()->user()->information->is_paid ||
                                            auth()->user()->bought($batch->id))
                                            @if ($exam->reading_pdf && count(json_decode($exam->reading_pdf)))
                                                <a href="{{ Voyager::image(json_decode($exam->reading_pdf)[0]->download_link) }}"
                                                    class="btn btn-dark mt-2"> পড়ার পিডিএফ</a>
                                            @endif
                                        @endif
            </div>
        </div>

        </td>
        </tr>
        @endforeach
        </tbody>
        </table>
        @endif
        @if (request()->filter == 'upcoming')
            <table class="table table-borderless table-hover text-center ">
                <thead class="bg-success text-light">
                    <tr>
                        <th scope="col">
                            পরীক্ষার নাম
                        </th>
                        <th scope="col">
                            বিষয়
                        </th>
                        <th scope="col">
                            শুরু
                        </th>

                        <th scope="col">
                            শেষ
                        </th>
                        <th scope="col">

                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($exams as $exam)
                        @php
                            $from = new EasyBanglaDate\Types\BnDateTime($exam->from, new DateTimeZone('Asia/Dhaka'));
                            $to = new EasyBanglaDate\Types\BnDateTime($exam->to, new DateTimeZone('Asia/Dhaka'));
                        @endphp
                        <tr>


                            <td>
                                {{ $exam->title }}
                            </td>

                            <td>
                                {{ $exam->sub_title }}
                            </td>

                            <td>
                                {{ $from->getDateTime()->format('j F, Y b h:i') }}
                            </td>
                            <td>
                                {{ $to->getDateTime()->format('j F, Y b h:i') }}
                            </td>

                            <td>
                                <!-- <div class="dropdown open">
                                                        <a class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Dropdown
                                                        </a> -->
                                <!-- <div class="dropdown-menu" aria-labelledby="triggerId"> -->
                                <!-- <a href="{{ route('start-exam', $exam->uuid) }}" class="dropdown-item"> টেস্ট দিন</a> -->
                                <button data-syllabus="{{ $exam->syllabus }}" type="button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" class="btn btn-dark"> সিলেবাস</button>
                                @if (auth()->user()->information->is_paid ||
                                    auth()->user()->bought($batch->id))
                                    @if ($exam->reading_pdf && count(json_decode($exam->reading_pdf)))
                                        <a href="{{ Voyager::image(json_decode($exam->reading_pdf)[0]->download_link) }}"
                                            class="btn btn-dark mt-2"> পড়ার পিডিএফ</a>
                                    @endif
                                @endif
                                <!-- </div> -->
    </div>

    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
    </div>
    @endif
    @if (request()->filter == 'archived')
        <table class="table table-borderless table-hover text-center ">
            <thead class="bg-success text-light">
                <tr>
                    <th scope="col">
                        নাম
                    </th>
                    <th scope="col">
                        বিষয়
                    </th>
                    <th scope="col">
                        পূর্ণ নম্বর
                    </th>

                    <th scope="col">

                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($exams as $exam)
                    @php
                        $from = new EasyBanglaDate\Types\BnDateTime($exam->from, new DateTimeZone('Asia/Dhaka'));
                        $to = new EasyBanglaDate\Types\BnDateTime($exam->to, new DateTimeZone('Asia/Dhaka'));
                    @endphp
                    <tr>


                        <td>
                            {{ $exam->title }}
                        </td>

                        <td>
                            {{ $exam->sub_title }}
                        </td>

                        <td>
                            {{ $exam->fullMark }}
                        </td>


                        <td>
                            <!-- <div class="dropdown open">
                                                        <a class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Dropdown
                                                        </a> -->
                            <!-- <div class="dropdown-menu" aria-labelledby="triggerId"> -->
                            <a href="{{ route('start-exam', $exam->uuid) }}" class="btn btn-primary"> টেস্ট দিন</a>
                            <!-- <button data-syllabus="{{ $exam->syllabus }}" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="dropdown-item"> সিলেবাস</button> -->
                            <a href="{{ route('all-results-exam', $exam->uuid) }}" class="btn btn-dark"> মেধাতালিকা</a>
                            <a href="{{ route('answerSheet', $exam->uuid) }}" class="btn btn-info text-white">
                                উত্তরমালা</a>

                            <!-- </div> -->
                            <!-- </div> -->
                            @if (auth()->user()->information->is_paid ||
                                auth()->user()->bought($batch->id))
                                @if ( $exam->reading_pdf && count(json_decode($exam->reading_pdf)))
                                    <a href="{{ Voyager::image(json_decode($exam->reading_pdf)[0]->download_link) }}"
                                        class="btn btn-dark mt-2"> পড়ার পিডিএফ</a>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    @endif


    </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">পরিক্ষার সিলেবাস</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="syllabus">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('syllabus') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            document.getElementById('syllabus').innerText = recipient;
        })
    </script>
@endsection
