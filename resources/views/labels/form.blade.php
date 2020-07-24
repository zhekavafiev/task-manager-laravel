@if ($errors->any())
<div style="Color: red">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<!-- обходим возврат данных при непрошедшей валидации -->
<div class="form-row">
    <div class="col">
        {{ Form::label('Text') }}
        {{ Form::text('text') }}

    </div>
    <div class="col">
    {{ Form::label('Text') }}
    {{ Form::select('color', [
            'red' => 'red',
            'green' => 'green',
            'yellow' => 'yellow',
            'black' => 'black',
            'white' => 'white',
            'orange' => 'orange',
            'silver' => 'silver',
            'purple' => 'purple',
            'indigo' => 'indigo',
            'gray' => 'gray',
            'white' => 'white',
            'aqua' => 'aqua'
        ]) }}
    </div>
    <div class="col">
    {{ Form::label('Text') }}
    {{ Form::select('text_color', [
            'red' => 'red',
            'green' => 'green',
            'yellow' => 'yellow',
            'black' => 'black',
            'white' => 'white',
            'orange' => 'orange',
            'silver' => 'silver',
            'purple' => 'purple',
            'indigo' => 'indigo',
            'gray' => 'gray',
            'white' => 'white',
            'aqua' => 'aqua'
        ]) }}
    </div>

</div>

<div>
    {{ Form::submit('Create', ['class' => 'btn btn-lg btn-dark dropdown-toggle']) }}
</div>
