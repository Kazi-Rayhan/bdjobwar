<ul style="list-style:none">
    @foreach ($childs as $child)
        <li>
            <div class="form-check">
                <input type="checkbox" name="categories[]" value={{ $child->id }} class="form-check-input"
                    id="categories_{{ $child->id }}" @if($dataTypeContent->categories->contains($child->id))checked="true" @endif>
                <label class="form-check-label" for="category_{{ $child->id }}">{{ $child->name }}</label>
            </div>
            @if (count($child->childrens))
                @include('category-partial', ['childs' => $child->childrens])
            @endif
        </li>
    @endforeach
</ul>
