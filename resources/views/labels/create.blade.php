@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 style="margin-left: 15px;">{{__('labels.create')}}</h2>
        <p style="margin-left: 15px;">{{__('labels.create_message')}}</p>
        {{ Form::model($task, ['url' => route('tasks.labels.store', $task)]) }}
            @include('labels.form')
        {{ Form::close() }}
    </div>
@endsection