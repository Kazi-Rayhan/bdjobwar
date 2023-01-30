@extends('voyager::master')
@section('content')
    <div class="card">
        <div class="card-body ">
            <table class="table ">
                <tr class="text-center">

                    <td colspan="7" class="text-center">

                        <h5>{!! 'মেধাতালিকা' !!}</h5>
                        <h2>{!! $exam->title !!}</h2>
                        <h4>{!! $exam->sub_title !!}</h4>

                    </td>
                </tr>
                <form action="#" class="mx-auto" method="get">
                    <tr>
                        <td colspan="3">
                            <input type="text" name="search" class="form-control" placeholder="নাম">
                        </td>
                        <td colspan="3">
                            <input type="text" name="roll" class="form-control" placeholder="রোল">

                        </td>
                        <td colspan="1">
                            <button type="submit" class="btn btn-success px-4"><i class="fas fa-search"></i>খুজুন
                            </button>
                            <a href="{{ url()->current() }}" class="btn btn-success px-4"><i class="fas fa-search"></i>Reset
                            </a>
                            <a href="{{route('all-results-exam-pdf',$exam->uuid)}}" class="btn btn-success px-4"><i class="fas fa-search"></i>Download
                            </a>
                        </td>
                </form>
                </tr>
                <tr>
                    <td colspan="7" style="text-align:center">
                        <p>
                            {!! 'মোট উত্তীর্ণ' !!} :
                            {{ $results->filter(function ($result) use ($exam) {
                                    return $result->total >= $exam->minimum_to_pass;
                                })->count() }}
                        </p>
                        <p>
                            {!! 'মোট অনুত্তীর্ণ' !!} :
                            {{ $results->filter(function ($result) use ($exam) {
                                    return $result->total < $exam->minimum_to_pass;
                                })->count() }}
                        </p>
                    </td>
                </tr>
                <tr>

                    <td style="text-align:center">
                        {!! 'স্থান' !!}
                    </td>
                    <td style="text-align:center">
                        {!! 'নাম' !!}
                    </td>
                    <td style="text-align:center">
                        {!! 'রোল' !!}
                    </td>
                    <td style="text-align:center">
                        {!! 'সঠিক উত্তর' !!}
                    </td>
                    <td style="text-align:center">
                        {!! 'ভুল উত্তর' !!}
                    </td>
                    <td style="text-align:center">
                        {!! 'মোট' !!}
                    </td>
                    <td style="text-align:center">

                    </td>
                </tr>
                @foreach ($results as $pos => $result)
                    <tr class="text-center">
                        <td>
                            {{ $result->exam->getRanking($result->user) }}
                        </td>

                        <td>

                            {{ $result->user->name }}
                        </td>

                        <td>
                            {{ @$result->user->information->id }}
                        </td>
                        <td>
                            {{ count((array) json_decode($result->answers)) - $result->wrong_answers }}

                        </td>
                        <td>
                            {{ $result->wrong_answers }}
                        </td>

                        <td>
                            {{ $result->total }} @if ($result->total >= $exam->minimum_to_pass)
                                <b>(P)</b>
                            @else
                                <b>(F)</b>
                            @endif
                        </td>
                        <td>
                            <a onclick="return confirm('Are you sure')" href="{{ route('exam.results.destroy', $result) }}"
                                class="btn btn-sm btn-danger">Delete</a>
                        </td>

                    </tr>
                @endforeach
                <tr>
                    <td colspan="6">
                        {{ $results->links() }}
                    </td>
                </tr>


            </table>
        </div>

    </div>
@endsection
