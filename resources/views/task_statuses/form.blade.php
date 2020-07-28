<br>
{{ Form::label('name', trans('task_statuses.label_name')) }}
<br>
{{ Form::text('name', $status->name, ['placeholder' => trans('task_statuses.ph_name')]) }} <br>
@if ($errors->any())()
<div style="Color: red">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<br>