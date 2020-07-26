@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Task</h2>
        {{ Form::model($task, ['url' => route('tasks.store')]) }}
            <select name="label_id" id="">
                <option value="0">Label</option>
                @foreach ($labels as $label)
                    <option value="{{ $label->id }}">{{$label->text}}</option>
                @endforeach
            </select>
            @include('tasks.form')
            <div>
                {{ Form::submit('Create', ['class' => 'btn btn-lg btn-dark dropdown-toggle']) }}
            </div>
        {{ Form::close() }}
    </div>
@endsection