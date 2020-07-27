@extends('layouts.app')

@section('content')
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">@lang('content.header')</h1>
        <p class="lead text-muted">@lang('content.school') <a href="https://ru.hexlet.io">Hexlet</a> </p>
        <p class="lead text-muted">@lang('content.fraimwork') <a href="https://laravel.com/">Laravel</a> </p>
        <p class="lead text-muted">@lang('content.welcomPageMessage')</p>
        <p>
            <a href="{{route('login')}}" class="btn btn-primary my-2">@lang('header.login')</a>
            <a href="{{route('register')}}" class="btn btn-secondary my-2">@lang('header.register')</a>
            <a href="{{route('tasks.index')}}" class="btn btn-primary my-2">@lang('content.start')</a>
        </p>
    </div>
</section>
@endsection
