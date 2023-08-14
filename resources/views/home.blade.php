@extends('layouts.app')

@section('content')
<section class="jumbotron text-center">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="container">
        <p class="lead text-muted">{{__('content.hello')}}, {{ $user->name }}<br>{{__('content.loggined')}}</p>
        <p class="lead text-muted">{{__('content.message')}}</p>
            <a href="{{route('users.index')}}" class="btn btn-secondary my-2">{{__('content.users')}}</a>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary my-2">{{__('content.tasks')}}</a>
            <a href="{{ route('task_statuses.index') }}" class="btn btn-secondary my-2">{{__('content.statuses')}}</a>
    </div>
</section>
@endsection
