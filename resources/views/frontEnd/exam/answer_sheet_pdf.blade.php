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
        h1,h3,h4,h5{
            padding:0;
            margin:0;

        }
        .header{
            text-align:center;
            color:white;
        }
        .header-info span{
            /* display:flex;
            justify-content:space-around; */
            /* margin-top:10px; */
            margin-right:40px;
            font-size:16px;
        }
        .row{
            display:grid;
            grid-template-columns:reaped(2,1fr);
        }
    </style>
</head>
<body>
<div id="exam-header " class="header" style="background-color: #019514;">
                <h4>উত্তর পত্র</h4>
                <h1>
                    {{$exam->title}}
                </h1>
                <h3 style="font-weight: 700;">
                    {{$exam->sub_title}}
                </h3>
                <h5 style="font-weight: 700; font-size:20px;">
                পূর্ণমান : {{$exam->fullMark}}
                </h5>

                <div class="header-info" style="font-weight: 700; margin-top:10px">
                    <span class="">
                    প্রশ্ন  : {{$exam->questions->count()}}
                    </span>

                    <span >
                    পাশ মার্ক  : {{$exam->minimum_to_pass}}
                    </span>
                </div>
                <div class="header-info " style="font-weight: 700;">
                    <span class="">
                    প্রশ্ন প্রতি মার্ক : {{$exam->point}}
                    </span>

                    <span>
                    নেগেটিভ মার্ক: {{$exam->minius_mark}}
                    </span>
                </div>

                <div class="" style="font-weight: 700; margin-top:10px">
                    <span class="">
                    সময়কাল : {{$exam->duration}} মিনিট
                    </span>

                </div>

            </div>
            <div class="row">
        <div class="">
            @foreach($exam->questions as $question)
            <div class="">
                <div class="">

                    <h6 style="font-weight: 700; margin:5px 0 5px 0; padding:0">{{ $loop->iteration }}. {{ $question->title }}</h6>
    
                    <hr style="margin:5px 0 5px 0">
                    <div class="">
                        @foreach($question->choices as $choice)
                        <div class="">

                           @if($choice->index == $question->answer)
                            <small style="color:green">
                                {{$choice->label}}. {{$choice->choice_text}} @if($choice->index == $question->answer)<sup class=" text-success "><i class="fa fa-check"></i> </sup>@elseif($exam->userChoice(auth()->user(),$question->id)== $choice->index )<sup class=" text-danger "><i class="fa fa-times"></i> </sup> @else @endif
                            </small>
                            @elseif($exam->userChoice(auth()->user(),$question->id)== $choice->index )
                            <small style="color:red">
                                {{$choice->label}}. {{$choice->choice_text}} @if($choice->index == $question->answer)<sup class=" text-success "><i class="fa fa-check"></i> </sup>@elseif($exam->userChoice(auth()->user(),$question->id)== $choice->index )<sup class=" text-danger "><i class="fa fa-times"></i> </sup> @else @endif
                            </small>
                            @else
                            <small style="color:black">
                                {{$choice->label}}. {{$choice->choice_text}} @if($choice->index == $question->answer)<sup class=" text-success "><i class="fa fa-check"></i> </sup>@elseif($exam->userChoice(auth()->user(),$question->id)== $choice->index )<sup class=" text-danger "><i class="fa fa-times"></i> </sup> @else @endif
                            </small>
                            @endif


                        </div>
                        @endforeach
                    </div>

                </div>
 
            </div>
            @endforeach

        </div>

    </div>

</body>
</html>