@php
    use Rakibhstu\Banglanumber\NumberToBangla;
    $numto = new NumberToBangla();
@endphp
<!DOCTYPE html>
<!-- <html lang="en"> -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @page {
            margin-top: 3.5cm;
            margin-bottom: 1cm;
            margin-left: 1cm;
            margin-right: 1cm;
        }

        /* @font-face {
            font-family: 'Anek Bangla';
  font-style: normal;
  font-weight: 200;
  font-stretch: 100%;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/anekbangla/v4/_gPr1R38qTExHg-17BhM6n66QhabMYB0fBKONtHLWwrlyis.woff2) format('woff2');
  unicode-range: U+0964-0965, U+0981-09FB, U+200C-200D, U+20B9, U+25CC;
} */
        /* * {
    font-family: "Anek Bangla";
} */
        body {
            margin-top: 3.5cm;
            margin-bottom: 1cm;
            margin-left: 1cm;
            margin-right: 1cm;
            font-family: "Nikosh";

        }

        h1,
        h3,
        h4,
        h5 {
            padding: 0;
            margin: 0;

        }

        table {
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid;
            padding: 10px;
        }

        .header {
            text-align: center;
            color: white;
        }

        .header-info span {
            /* display:flex;
            justify-content:space-around; */
            /* margin-top:10px; */
            margin-right: 40px;
            font-size: 16px;
        }

        .row {
            display: grid;
            grid-template-columns: reaped(2, 1fr);
        }
    </style>
</head>

<body>
    @php
        $count = 1;
    @endphp
    <table style="width: 100%;">
        <tr>
            <td colspan="2" style="text-align:center">
                <p style="font-weight: 700; margin:10px 0 5px 0; padding:0;display:flex;font-size:20px">
                    {!! 'উত্তরপত্র' !!}</p>
                <p style="font-weight: 700; margin:10px 0 5px 0; padding:0;display:flex;font-size:30px">
                    {!! $exam->title !!}</p>
                <p style="font-weight: 700; margin:10px 0 5px 0; padding:0;display:flex;font-size:20px">
                    {!! $exam->sub_title !!}</p>
            </td>
        </tr>
        @foreach ($questions->chunk(2) as $q)
            <tr>
                @foreach ($q as $question)
                    <td width="50%">

                        <p style="font-weight: 700; margin:10px 0 5px 0; padding:0;display:flex">
                            {{ $numto->bnNum($count) }} / {!! $question->title !!}</p>
                        @php
                            $count++;
                        @endphp
                        @if ($question->title_image)
                            <div class="text-center">
                                <img src="{{ Voyager::image($question->title_image) }}" width="200px"
                                    style="object-fit:contain" alt="">

                            </div>
                        @endif

                        <div class="">
                            @foreach ($question->choices as $choice)
                                <div>


                                    @if ($choice->index == $question->answer)
                                        <p style="color:green">

                                            {{ $choice->label }}. {{ $choice->choice_text }} @if ($choice->index == $question->answer)
                                                <sup class=" text-success "><i class="fa fa-check"></i> </sup>
                                            @elseif($exam->userChoice(auth()->user(), $question->id, true) == $choice->index)
                                                <sup class=" text-danger "><i class="fa fa-times"></i> </sup>
                                            @else
                                            @endif

                                        </p>
                                    @elseif($exam->userChoice(auth()->user(), $question->id, true) == $choice->index)
                                        <p style="color:red">
                                            {{ $choice->label }}. {{ $choice->choice_text }} @if ($choice->index == $question->answer)
                                                <sup class=" text-success "><i class="fa fa-check"></i> </sup>
                                            @elseif($exam->userChoice(auth()->user(), $question->id, true) == $choice->index)
                                                <sup class=" text-danger "><i class="fa fa-times"></i> </sup>
                                            @else
                                            @endif
                                        </p>
                                    @else
                                        <p style="color:black">
                                            {{ $choice->label }}. {{ $choice->choice_text }} @if ($choice->index == $question->answer)
                                                <sup class=" text-success "><i class="fa fa-check"></i> </sup>
                                            @elseif($exam->userChoice(auth()->user(), $question->id, true) == $choice->index)
                                                <sup class=" text-danger "><i class="fa fa-times"></i> </sup>
                                            @else
                                            @endif
                                        </p>
                                    @endif
                                    @if ($choice->choice_image)
                                        <img class="" src="{{ Voyager::image($choice->choice_image) }}"
                                            width="100px" style="object-fit:contain ;display: block;" alt="">
                                    @endif
                                </div>
                            @endforeach
                        </div>


                    </td>
                @endforeach

            </tr>


            </div>
        @endforeach
    </table>


    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
</body>

</html>
