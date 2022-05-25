<div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="heading{{ $index }}">

            <button class="btn btn-link mr-5" type="button" data-toggle="collapse"
                data-target="#collapse{{ $index }}" aria-expanded="true"
                aria-controls="collapse{{ $index }}">
                #{{ $index }} {{ $question->title }}
            </button>
            <a target="_blank" href="{{ route('voyager.questions.edit', $question) }}"><i
                    class="voyager-edit"></i></a>

        </div>

        <div id="collapse{{ $index }}" class="collapse " aria-labelledby="heading{{ $index }}"
            data-parent="#accordionExample">
            <div class="card-body">
                <ol step="a" class="list-group">
                    @foreach ($question->choices as $choice)
                        <li class="list-group-item">
                            @if ($choice->choice_image)
                                <img src="{{ Voyager::image($choice->choice_image) }}" class="ml-4" alt=""
                                    height="50px">
                                <br>
                            @endif
                            <span> #{{$loop->iteration}} {{ $choice->choice_text }}</span>
                        </li>
                    @endforeach
                <ol>
            </div>
        </div>
    </div>
</div>
