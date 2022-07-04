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

    <table style="width: 100%;">
        @foreach($exams as $exam)

        <tr>
            <td>
                {{$exam->title}}
            </td>
            <td>
                {{join(', '$exam->subjects->pluck('name')->toArray())}}
            </td>
            <td>
                {{$exam->fullMark}}
            </td>
          
        </tr>


        </div>
        @endforeach
    </table>



</body>

</html>