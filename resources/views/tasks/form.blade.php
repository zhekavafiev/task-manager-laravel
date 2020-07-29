@if ($errors->any())
<div style="Color: red">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<br>
<div>
    <label for="name">{{trans('tasks.form_name')}}</label>
</div>

<div>
    {{ Form::text('name', $task->name, ['class' => 'form-control form-control-sm', 'placeholder' => trans("tasks.form_name")]) }} <br>
</div>

<div>
    <label for="status_id">@lang('tasks.form_status')</label>
    <select name="status_id" id="" class="form-control form-control-sm">
        @foreach ($statuses as $status)
            <option value="{{$status->id}}">{{ $status->name }}</option>
        @endforeach
    </select>
</div>
<br>
<div>
    <label for="assigned_to_id">@lang('tasks.form_assigner')</label>
    <select name="assigned_to_id" id=""  class="form-control form-control-sm">
        <option value="">@lang('tasks.form_assigner')</option>
        @foreach ($users as $user)
            <option value="{{$user->id}}">{{ $user->name }}</option>
        @endforeach
    </select>
</div>
<div>
    <label for="description">@lang('tasks.form_description')</label>
        {{ Form::textarea('description') }}
</div>
<br>

