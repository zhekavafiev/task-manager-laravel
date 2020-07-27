@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>@lang('labels.create')</h2>
        {{ Form::model($task, ['url' => route('tasks.labels.store', $task)]) }}
            @include('labels.form')
        {{ Form::close() }}
    </div>
@endsection