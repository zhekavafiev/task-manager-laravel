<p>@lang('labels.message')</p>
<div class="row">
    @foreach ($task->label as $label)
        <div class="col">
            {{ Form::open(['url' => route('tasks.labels.destroy', [$task, $label])]) }}
                <a href="{{ route('tasks.labels.destroy', [$task, $label]) }}" data-confirm="@lang('labels.delete_message')" data-method="delete" style="color: black" type="button" class="btn btn-{{$label->color}} btn-sm ">{{$label->text}}</a> <br>
            {{ Form::close() }}
        </div>
    @endforeach
    <div class="col col-md-2" style="margin-left: 15px;">
        {{ Form::model($task, ['url' => route('tasks.labels.newconnection', $task)]) }}
        <div class="row">
            <div calss="col">
                <select class="form-control form-control-sm" name="label_id" id="">
                    @foreach ($labels as $label)
                        <option value="{{ $label->id }}">{{ $label->text }}</option>
                    @endforeach
                </select>
            </div>

            <div calss="col">
                {{ Form::submit(trans('labels.button_add'), ['class' => "btn btn-secondary btn-sm"]) }}
            </div>
        </div>
        {{ Form::close() }}
    </div>
    <div class="col">
        <a type="button" href="{{ route('tasks.labels.create', $task) }}" class="btn btn-secondary btn-sm float-right">@lang('labels.create_new')</a><br>
    </div>
</div>


