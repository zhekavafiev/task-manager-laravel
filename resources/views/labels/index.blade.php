@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <h2>Tasks</h2>
        <div style="padding-top: 20px; padding-bottom: 20px;" class="float-right">
            <a href="{{ route('tasks.create') }}" class="btn btn-secondary btm-lg">Create new</a>
            <!-- <form action="{{ route('task_statuses.create') }}">
                <input type="submit" value="Create">
            </form> -->
        </div>
        <div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="column">Id</th>
                        <th scope="column">Task name</th>
                        <th scope="column">Description</th>
                        <th scope="column">Task status</th>
                        <th scope="column">Creator</th>
                        <th scope="column">Assigned</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <th scope="row">{{ $task->id }}</th>
                            <td><a href="{{ route('tasks.show', $task) }}">{{ $task->name }}</a></td>
                            <td width="60%">{{ $task->description }}</td>
                            <td nowrap>{{ $task->status->name }}</td>
                            <td>{{ $task->creator->name}}</td>
                            <td>{{ $task->assigner->name ?? null}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

