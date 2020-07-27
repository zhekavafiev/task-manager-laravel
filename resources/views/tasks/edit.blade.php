@extends('layouts.app')

@section('content')
<div class="container">
    <div style="margin-left: 15px;">
        <h2>@lang('tasks.edit_header'){{$task->name}}</h2>
        @include('layouts.label_with_button')
    </div>
    <div class="col col-md-2">
        {{ Form::model($task, ['url' => route('tasks.update', $task), 'method' => 'PATCH']) }}
            @include('tasks.form')
            <div>
                {{ Form::submit('Update', ['class' => 'btn btn-sm btn-secondary dropdown-toggle']) }}
            </div>
        {{ Form::close() }}
    </div>
</div>
@endsection