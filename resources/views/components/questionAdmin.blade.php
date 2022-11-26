@php
    $actions = [];
    $dataType = Voyager::model('DataType')
        ->where('slug', '=', 'questions')
        ->first();
    if (!empty($question)) {
        foreach (Voyager::actions() as $action) {
            $action = new $action($dataType, $question);
    
            if ($action->shouldActionDisplayOnDataType()) {
                $actions[] = $action;
            }
        }
    }
@endphp
<div class="card " style="border:2px solid ">

    <div class="card-body">
        <p>
            <span> {{ $iteration }} |</span> {!! $question->title !!}

            @if ($question->title_image)
                <img class="" src="{{ Voyager::image($question->title_image) }}" width="300px" height="300px"
                    style="object-fit:contain ;display:block" alt="">
            @endif
        <ul style="list-style: none;">
            @foreach ($question->choices as $choice)
                <li class=" @if ($question->answer == $choice->index) text-success @endif ">
                    {{ $choice::LABEL[$choice->index] }} . </strong> {{ $choice->choice_text }} @if ($choice->choice_image)
                        <img class="" src="{{ Voyager::image($choice->choice_image) }}" width="200px"
                            height="200px" style="object-fit:contain ;" alt="">
                    @endif
                </li>
            @endforeach
        </ul>
        </p>

    </div>
    <div class="card-footer" style="padding:5px ;">
        @if (!$question->active)
            <form action="{{ route('question-active', $question) }}" method="post" style="display: inline-block;">
                @csrf
                <button class="btn btn-primary" type="submit">Active</button>
            </form>
        @else
            <form action="{{ route('question-disable', $question) }}" method="post" style="display: inline-block;">
                @csrf
                <button class="btn btn-warning">Disable</button>
            </form>
        @endif
        @php
            $data = $question;
        @endphp
        @foreach ($actions as $action)
            @if ($data)
                @php
                    // need to recreate object because policy might depend on record data
                    $class = get_class($action);
                    $action = new $class($dataType, $data);
                @endphp
                @can($action->getPolicy(), $data)
                    @if ($action->shouldActionDisplayOnRow($data))
                        @if ($action->getTitle() == 'Delete')
                            <a href="JavaScript:void(0);" data-url="{{ route('question-detach',[$data,request()->exam]) }}" title="{{ $action->getTitle() }}"
                                {!! $action->convertAttributesToHtml() !!}>
                                {{ $action->getTitle() }}
                            </a>
                        @else
                            <a href="{{ $action->getRoute($dataType->name) }}" title="{{ $action->getTitle() }}"
                                {!! $action->convertAttributesToHtml() !!}>
                                <i class="{{ $action->getIcon() }}"></i> <span
                                    class="hidden-xs hidden-sm">{{ $action->getTitle() }}</span>
                            </a>
                        @endif
                    @endif
                @endcan
            @elseif (method_exists($action, 'massAction'))
                <form method="post" action="{{ route('voyager.' . $dataType->slug . '.action') }}"
                    style="display:inline">
                    {{ csrf_field() }}
                    <button type="submit" {!! $action->convertAttributesToHtml() !!}><i class="{{ $action->getIcon() }}"></i>
                        {{ $action->getTitle() }}</button>
                    <input type="hidden" name="action" value="{{ get_class($action) }}">
                    <input type="hidden" name="ids" value="" class="selected_ids">
                </form>
            @endif
        @endforeach
    </div>
</div>
