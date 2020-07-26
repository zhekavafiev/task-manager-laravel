<div class="row">
    @foreach ($task->label as $label)
        <div class="col">
            {{ Form::open(['url' => route('tasks.labels.destroy', [$task, $label])]) }}
                <input type="button" style="margin-bottom: 5px; text-align: center; font-size: 0.7vw; width: 20%; height: 5%; background: {{ $label->color }}; color: {{ $label->text_color }};" value="{{$label->text}}"> <br>
                <a href="{{ route('tasks.labels.destroy', [$task, $label]) }}" class="btn btn-secondary btn-sm" data-confirm="Are you sure?" data-method="delete">Delete</a>
                {{ Form::close() }}
        </div>
    @endforeach
    <div class="col">
        {{ Form::model($task, ['url' => route('tasks.labels.newconnection', $task)]) }}
            {{ Form::select('label_id', $labels) }} <br>
            {{ Form::submit('Add label', ['class' => 'btn btn-secondary btn-sm']) }}
        {{ Form::close() }}
    </div>
    <div class="col">
        <a type="button" href="{{ route('tasks.labels.create', $task) }}" class="btn btn-secondary btn-sm float-left">Create Label</a><br>
    </div>
</div>


