<div>
    <label for="assigned_to_id">{{ $labelText }}</label>
    <select name="assigned_to_id" id="" class="{{ $selectClass }}">
        <option value="{{ $startValue }}">{{ $startText }}</option>
        @foreach ($array as $item)
            @if ($task->assigned_to_id == $item->id)
                <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
            @else
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endif
       @endforeach
   </select>
</div>