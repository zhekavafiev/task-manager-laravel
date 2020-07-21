@extends('layouts.app')

@section('content')
    <div class="container">
        {{ Form::model($status, ['url' => route('task_statuses.store')]) }}
            @include('task_statuses.form')
            {{ Form::submit('click') }}
        {{ Form::close() }}
    </div>
@endsection