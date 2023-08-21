@extends('layouts.app')

@section('content')
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">{{__('content.header')}}</h1>
        <p class="lead text-muted">{{__('content.school')}} <a href="https://ru.hexlet.io">Hexlet</a> </p>
        <p class="lead text-muted">{{__('content.fraimwork')}} <a href="https://laravel.com/">Laravel</a> </p>
        <p class="lead text-muted">{{__('content.welcomPageMessage')}}</p>
        <p>
            <a href="{{route('login')}}" class="btn btn-primary my-2">{{__('header.login')}}</a>
            <a href="{{route('register.show')}}" class="btn btn-secondary my-2">{{__('header.register')}}</a>
            <a href="{{route('tasks.index')}}" class="btn btn-primary my-2">{{__('content.start')}}</a>
        </p>
    </div>
</section>
@endsection
