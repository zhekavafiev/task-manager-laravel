<html>
    <div class="container">
        <br>
    <h2>Добрый день, {{ $task->assigner->name }}</h2>
    <p class="font-weight-bold">Пользователь {{$task->creator->name}} создал новую задачу: {{$task->name}}</p>
    <p>Для входа в приложение перейдите <a href="{{config('app.url')}}">по ссылке</a></p>
    </div>
</html>