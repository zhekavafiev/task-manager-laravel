@extends('layouts.app')

@section('content')
<section class="jumbotron text-center">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="container">
        <p class="lead text-muted">@lang('content.hello'), {{ $user->name }}<br>@lang('content.loggined')</p>
        <p class="lead text-muted">@lang('content.message')</p>
            <a href="{{route('users')}}" class="btn btn-secondary my-2">@lang('content.users')</a>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary my-2">@lang('content.tasks')</a>
            <a href="{{ route('task_statuses.index') }}" class="btn btn-secondary my-2">@lang('content.statuses')</a>
    </div>
</section>
@endsection