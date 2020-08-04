<select name="{{ $name }}" id="" class="{{ $selectClass }}">
    <option value="{{ $startValue }}">{{ $startText }}</option>
    @foreach ($array as $item)
        @if (is_array($filter) && $filter['label'] == $item->id &&  $filter['label'] != $startValue)
            <option value="{{ $item->id }}" selected>{{ $item->text }}</option>
        @else
            <option value="{{ $item->id }}">{{ $item->text }}</option>
        @endif
    @endforeach
</select>
