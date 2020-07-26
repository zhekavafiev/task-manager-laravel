@if ($errors->any())
<div style="Color: red">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row">
    <div class="col col-md-3">
        {{ Form::label('name', 'Task name') }} <br>
        {{ Form::text('name') }} <br>
        <select name="status_id" id="">
            @foreach ($statuses as $status)
                <option value="{{$status->id}}">{{ $status->name }}</option>
            @endforeach
        </select>

        <select name="assigned_to_id" id="">
            <option value="0">Assigner</option>
            @foreach ($users as $user)
                <option value="{{$user->id}}">{{ $user->name }}</option>
            @endforeach
        </select>
        {{ Form::label('Task description') }}
        {{ Form::textarea('description') }}
    </div>
</div>

<br>

