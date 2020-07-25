@if ($errors->any())
<div style="Color: red">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="form-row">
    <div class="col">
        {{ Form::label('name', 'Task name') }} <br>
        {{ Form::text('name') }} <br>
        {{ Form::label('status_id', 'Status') }} <br>
        {{ Form::select('status_id', $statuses, $statuses[1], ['class' => 'form-control form-control-sm']) }} <br>
        {{ Form::label('Assigner') }} <br>
        {{ Form::select('assigned_to_id', $users, null, ['class' => 'form-control form-control-sm']) }} <br>
    </div>

    <div class="col">
        {{ Form::label('Task description') }}
        {{ Form::textarea('description') }}
    </div>
</div>

<br>

<div>
    {{ Form::submit('Update', ['class' => 'btn btn-lg btn-dark dropdown-toggle']) }}
</div>