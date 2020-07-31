@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>@lang('task_statuses.update_header') "{{$status->name}}"</h2>
        {{ Form::model($status, ['url' => route('task_statuses.update', $status), 'method' => 'PATCH']) }}
            @include('task_statuses.form') <br>
            {{ Form::submit(trans('task_statuses.button_update'), ['class' => 'btn btn-secondary btn-sm']) }}
        {{ Form::close() }}
    </div>
@endsection