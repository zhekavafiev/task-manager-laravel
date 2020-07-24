@foreach ($task->label as $label)
    {{ Form::open(['url' => route('tasks.labels.destroy', [$task, $label])]) }}
        <input type="button" style="margin-top: 14px; text-align: center; font-size: 0.7vw; width: 5%; height: 5%; background: {{ $label->color }}; color: {{ $label->text_color }};" value="{{$label->text}}">
        <a href="{{ route('tasks.labels.destroy', [$task, $label]) }}" class="btn btn-secondary btm-lg" data-confirm="Are you sure?" data-method="delete">Delete</a>
    {{ Form::close() }}
@endforeach
<a type="button" href="{{ route('tasks.labels.create', $task) }}" class="btn btn-secondary btn-sm">Add new</a><br>


{{ Form::model($task, ['url' => route('tasks.labels.newconnection', $task)]) }}
    {{ Form::select('label_id', $labels) }}
    {{ Form::submit('Click me') }}
{{ Form::close() }}
