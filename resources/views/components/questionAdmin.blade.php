@php
$actions = [];
$dataType = Voyager::model('DataType')->where('slug', '=', 'questions')->first();
if (!empty($question)) {
foreach (Voyager::actions() as $action) {
$action = new $action($dataType, $question);

if ($action->shouldActionDisplayOnDataType()) {
$actions[] = $action;
}
}
}
@endphp
<div class="card single-course-inner border border-dark">
    <div class="card-header    " style="display: flex;justify-content:space-between; align-items:center ;">
        <h4 class="card-title text-dark ">
            <span>{{ $iteration }}.</span> {{ $question->title }}
        </h4>



    </div>
    <div class="card-body">
        <div class="row mb-5">
            @foreach ($question->choices as $choice)
            <div class="col-md-6">
                <div class="form-check p-3">
                    <div>
                        <input class="form-check-input bg-secondary  mt-2 ms-2 choice" type="radio" value="{{$choice->index}}" disabled @if($question->answer == $choice->index) checked @endif id="choice{{ $question->id }}{{ $loop->iteration }}">
                        <label class="form-check-label d-block ms-5" for="choice{{ $question->id }}{{ $loop->iteration }}">
                            <strong style="font-size: 20px;">{{$choice::LABEL[$choice->index]}} . </strong> {{ $choice->choice_text }}
                        </label>
                    </div>

                </div>
                @if($choice->image)
                <div class="text-center mb-2">
                    <img class="" src="{{Voyager::image($choice->image)}}" width="100%" height="100px" style="object-fit:cover ;" alt="">

                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>

    <div class="card-footer">
        <div  style="display:flex ;gap:10px;" class="actions">


            @foreach($actions as $action)

            @include('voyager::bread.partials.actions', ['action' => $action, 'data' => $question])

            @endforeach
        </div>
    </div>

</div>