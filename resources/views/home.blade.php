@extends('layouts.app')

@section('content')
<section class="jumbotron text-center">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="container">
        <p class="lead text-muted">@lang('content.hello'), <a href="/users/{{ $user->id }}"> {{ $user->name }}</a><br>@lang('content.loggined')</p>
        <p class="lead text-muted">@lang('content.message')</p>
        <p>
            <a href="{{route('users')}}" class="btn btn-primary my-2">@lang('content.users')</a>
            <a href="#" class="btn btn-secondary my-2">@lang('content.tasks')</a>
        </p>
    </div>
</section>
@endsection
