@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <h2>Types of Tasks</h2>
        <div style="padding-top: 20px; padding-bottom: 20px;" class="float-right">
            <a href="#" class="btn btn-secondary btm-lg">Create new</a>
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
                            <td><a href="#">{{ $task->name }}</a></td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->status_id }}</td>
                            <td>{{ $task->creator_by_id }}</td>
                            <td>{{ $task->assigned_to_id }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

