@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add new Task Status</h2>
        {{ Form::model($status, ['url' => route('task_statuses.store')]) }}
            @include('task_statuses.form')
            {{ Form::submit('click') }}
        {{ Form::close() }}
    </div>
@endsection