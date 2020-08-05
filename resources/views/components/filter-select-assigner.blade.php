<select name="{{ $name }}" id="" class="{{ $selectClass }}">
    <option value="{{ $startValue }}">{{ $startText }}</option>
    @foreach ($array as $item)
        @if (
            isset($filter)
            && array_key_exists('assigner', $filter)
            && $filter['assigner'] == $item->id
            && $filter['assigner'] != $startValue
        )
            <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
        @else
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endif
    @endforeach
</select>
