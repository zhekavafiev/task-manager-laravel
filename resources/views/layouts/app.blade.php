<!doctype html>
<html lang="ru">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Пример учебного проекта">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="csrf-param" content="_token">
        <title>Task manager</title>
        <script src="{{ asset('js/app.js') }}"></script>
        <link href="{{  asset('css/app.css')  }}" rel="stylesheet" type="text/css">
        <link href="{{  asset('css/custom.css')  }}" rel="stylesheet" type="text/css">

    </head>

    <body>

        <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">

                <div class="collapse navbar-collapse" id="navbarsExample04">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home') }}">{{__('header.home')}}<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('users.index') }}">{{__('header.users')}}<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('task_statuses.index') }}">{{__('header.statuses')}}</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('tasks.index') }}">{{__('header.tasks')}}</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-auto">

                        <!-- Set language -->

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('header.lang')}}</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                <a class="dropdown-item" href="{{  route('language', ['lang' => 'en']) }}">{{__('header.eng')}}</a>
                                <a class="dropdown-item" href="{{  route('language', ['lang' => 'ru']) }}">{{__('header.rus')}}</a>
                            </div>
                        </li>

                        <!-- Authentication Links -->

                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login.show') }}">{{__('header.login')}}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{__('header.register')}}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                                @if(Auth::user()->avatar)
                                    <img class="image rounded-circle" src="{{Auth::user()->avatar()}}" alt="profile_image" style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">
                                @endif
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">{{__('header.logout')}}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>
        <main role="main">
            @include('layouts.weather_line')
            @include('flash::message')
            @if ($errors->any())
            <div class="container">
                <div style="Color: red">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            @yield('content')
        </main>
</html>
