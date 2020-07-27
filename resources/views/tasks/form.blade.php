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
    <label for="name">Name</label>
</div>

<div>
    {{ Form::text('name', 'Name', ['class' => 'form-control form-control-sm']) }} <br>
</div>

<div>
    <label for="status_id">Status</label>
    <select name="status_id" id="" class="form-control form-control-sm">
        @foreach ($statuses as $status)
            <option value="{{$status->id}}">{{ $status->name }}</option>
        @endforeach
    </select>
</div>
<br>
<div>
    <label for="assigned_to_id">Assigner</label>
    <select name="assigned_to_id" id=""  class="form-control form-control-sm">
        <option value="0">Assigner</option>
        @foreach ($users as $user)
            <option value="{{$user->id}}">{{ $user->name }}</option>
        @endforeach
    </select>
</div>
<div>
    <label for="description">Description</label>
        {{ Form::textarea('description') }}
</div>
<br>

