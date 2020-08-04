<div>
    <label for="status_id">{{ $labelText }}</label>
    <select name="status_id" id="" class="{{ $selectClass }}">
        <option value="{{ $startValue }}">{{ $startText }}</option>
        @foreach ($array as $item)
            @if ($task->status_id == $item->id)
                <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
            @else
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endif
       @endforeach
   </select>
</div>