<!doctype html>
<html lang="ru">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Пример на bootstrap 4: Простой одностраничный шаблон для фотогалереи, портфолио и многого другого.">
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
                            <a class="nav-link" href="{{ route('home') }}">@lang('header.home')<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('users') }}">@lang('header.users')<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('task_statuses.index') }}">@lang('header.statuses')</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('tasks.index') }}">@lang('header.tasks')</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-auto">
                        
                        <!-- Set language -->

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('header.lang')</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                <a class="dropdown-item" href="{{  route('language', ['lang' => 'en']) }}">@lang('header.eng')</a>
                                <a class="dropdown-item" href="{{  route('language', ['lang' => 'ru']) }}">@lang('header.rus')</a>
                            </div>
                        </li>

                        <!-- Authentication Links -->
                        
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">@lang('header.login')</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">@lang('header.register')</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">@lang('header.logout')
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