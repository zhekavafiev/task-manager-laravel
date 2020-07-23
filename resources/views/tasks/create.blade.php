@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Task</h2>
        {{ Form::model($task, ['url' => route('tasks.store')]) }}
            @include('tasks.form')
        {{ Form::close() }}
    </div>
@endsection