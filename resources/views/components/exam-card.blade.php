@php
    $from = new EasyBanglaDate\Types\BnDateTime($exam->from, new DateTimeZone('Asia/Dhaka'));
    $to = new EasyBanglaDate\Types\BnDateTime($exam->to, new DateTimeZone('Asia/Dhaka'));
@endphp


<div class="card shadow">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-start">
            <h5>
                {{ $from->getDateTime()->format('j F b h:i') }} - {{ $to->getDateTime()->format('j F b h:i') }}
            </h5>
            <div>
                <h3>{{ $exam->title }}</h3>
                <h6> {{ $exam->sub_title }}</h6>

                <div class="d-flex justify-content-start">
                    @if (@$exam->batch->price > 0)
                        <span class="badge badge-info h5">
                            <i class="fa fa-coins"></i>
                        </span>
                    @else
                        <span class="badge badge-info h5">
                            ফ্রি
                        </span>
                    @endif
                    <span class="badge badge-info h5">
                        <i class="fa fa-clock"></i>

                        {{ $exam->duration }} মি
                    </span>
                    <span class="badge badge-info  h5">
                        <i class="fa fa-users"></i>

                        {{ $exam->participants }}
                    </span>
                </div>
            </div>
            <div>

                <div class="d-flex justify-content-end mt-3">
                    @if ($exam->from <= now())
                        <a class="btn btn-success btn-sm " href="{{ route('start-exam', $exam->uuid) }}"
                            style="font-size: 13px ;">টেস্ট দিন </a>
                    @else
                        <button class="btn btn-secondary btn-sm " style="font-size: 13px ;">শীঘ্রই আসছে</button>
                    @endif
                </div>
            </div>

        </div>


    </div>
</div>
