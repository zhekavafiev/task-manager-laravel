@extends('layouts.app')

@section('content')
    <div class="container">
        {{ Form::model($task, ['url' => route('tasks.update', $task), 'method' => 'PATCH']) }}
            @include('tasks.form')
        {{ Form::close() }}
    </div>
@endsection