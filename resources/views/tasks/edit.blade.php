@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit task {{$task->name}}</h2>
        @include('layouts.label_with_button')
        {{ Form::model($task, ['url' => route('tasks.update', $task), 'method' => 'PATCH']) }}
            @include('tasks.form')
            <div>
                {{ Form::submit('Update', ['class' => 'btn btn-lg btn-dark dropdown-toggle']) }}
            </div>
        {{ Form::close() }}
    </div>
@endsection