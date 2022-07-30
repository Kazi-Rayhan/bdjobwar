@php
$from = new EasyBanglaDate\Types\BnDateTime($exam->from, new DateTimeZone('Asia/Dhaka'));
$to = new EasyBanglaDate\Types\BnDateTime($exam->to, new DateTimeZone('Asia/Dhaka'));
@endphp

<div class="card border border-success rounded shadow m-2">
   
    <div class="card-body">
        <!-- <div class=" d-flex justify-content-between gap-2 flex-wrap mb-3 text-muted" style="font-size: 12px ;font-weight:700">
            <span>শুরু : {{ $from->getDateTime()->format('j F, Y b h:i')}} </span> <span> শেষ : {{ $to->getDateTime()->format('j F, Y b h:i') }}</span>
        </div> -->
       <a 
         href="{{route('exam.read',$exam->uuid)}}" style="text-decoration:none"><h6 class="text-success" style="font-weight: 700;">{{$exam->title}}</h6></a> 
        <div style="height:2px;width:100px" class="bg-danger"></div>
        <!-- <p class="text-secondary mt-2" style="font-size: 14px;">
            {{$exam->sub_title}}
        </p> -->
        <div class=" d-flex flex-sm-column flex-md-row gap-3  flex-wrap justify-content-between align-items-center mt-4">

        <!-- @if($exam->from <= now())
            <a class="btn btn-success btn-sm " href="{{route('question',$exam->uuid)}}" style="font-size: 13px ;">টেস্ট দিন </a>
           @endif -->
            <div class="d-flex  gap-5 text-dark" style="font-size: 14px;">
                <!-- <span>
                    <i class="fa fa-coins"></i> : {{$exam->priceFormat()}}
                </span> -->
                <!-- <span>
                    <i class="fa fa-clock"></i> :

                    {{$exam->duration}} মিনিট
                </span> -->
                <span>
                    <i class="fa fa-users"></i> :

                    {{$exam->participants}} জন
                </span>

            </div>
        </div>




    </div>
</div>