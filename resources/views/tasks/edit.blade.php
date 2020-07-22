@extends('layouts.app')

@section('content')
    <div class="container">
        {{ Form::model($status, ['url' => route('task_statuses.update', $status), 'method' => 'PATCH']) }}
            @include('task_statuses.form')
            {{ Form::submit('Update') }}
        {{ Form::close() }}
    </div>
@endsection