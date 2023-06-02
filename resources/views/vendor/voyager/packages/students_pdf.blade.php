<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        @page {
            margin-top: 3.5cm;
            margin-bottom: 1cm;
            margin-left: 1cm;
            margin-right: 1cm;
        }

        @font-face {
            font-family: "Nikosh";
            src: url({{ asset('Nikosh.ttf') }});
        }

        body {
            /* margin-top: 3.5cm;
            margin-bottom: 1cm;
            margin-left: 1cm;
            margin-right: 1cm; */
            font-family: "Nikosh";

        }

        .cus-info {
            /* margin: 20px 0 20px 40px; */
            font-size: 30px;
            /* background: green;
            padding:5px;
            color:white; */
        }



        table.content {
            width: 100%;
            border-collapse: collapse;
            padding: 0;
            /* margin-left:30px; */
            font-size: 12px;
            line-height: 1.4;
        }

        .content th {
            border: solid 1px #000000;
            text-align: center;
            padding: 5px;


        }

        .content .row td {
            border: solid 1px #000000;
            text-align: center;
            padding: 5px;


        }

        .content.thead {
            background-color: #4e73df;
            color: white;
        }
    </style>
    <title>Results</title>
</head>

<body>

    <div class="">

        <table class="content">
            <tr>

                <td colspan="5" style="text-align:center">
                    <p style="font-weight: 700; margin:10px 0 5px 0; padding:0;display:flex;font-size:20px">
                        {!! 'ভর্তিতালিকা' !!}</p>
                    <p style="font-weight: 700; margin:10px 0 5px 0; padding:0;display:flex;font-size:30px">
                        {!! $package->title !!}</p>
                </td>
            </tr>
        
            <tr class="row">

                <td style="text-align:center">
                    {!! 'স্থান' !!}
                </td>
                <td style="text-align:center">
                    {!! 'নাম' !!}
                </td>
                <td style="text-align:center">
                    {!! 'রোল' !!}
                </td>
                <td  style="text-align:center">
                    {{!!'মেয়াদ শেষ'!!}}
                </td>
                <td style="text-align:center">
                    {!! 'স্ট্যাটাস' !!}
                </td>
            </tr>
            @foreach ($users as $user )
                 <tr class="row">

                <td style="text-align:center">
                    {!! $loop->iteration !!}
                </td>
                <td style="text-align:center">
                    {!! $user->name !!}
                </td>
                 <td style="text-align:center">
                    {!! $user->information->id !!}
                </td>
                <td style="text-align:center">
                    {!! $user->information->expired_at->format('d M, Y') !!}
                </td>
                <td style="text-align:center">
                    {{$user->information->is_paid ? 'চলমান' : 'স্থগিত'}}
                </td>
            </tr>
            @endforeach
          



        </table>
    </div>

</body>

</html>
