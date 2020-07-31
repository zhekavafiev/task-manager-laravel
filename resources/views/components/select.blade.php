<select name="{{ $name }}" id="" class="{{ $selectClass }}">
    <option value="{{ $startValue }}">{{ $startText }}</option>
    @foreach ($array as $item)
    <option value="{{ $item->id }}">{{ $item->name }}</option>
    @endforeach
</select>
