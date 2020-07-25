@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tasks</h2>
        
        <div>
            <div style="padding-top: 20px; padding-bottom: 20px;" class="float-right">
                <a href="{{ route('tasks.create') }}" class="btn btn-secondary btm-lg">Create new</a>
                <!-- <form action="{{ route('task_statuses.create') }}">
                    <input type="submit" value="Create">
                </form> -->
            </div>

            <div style="padding-top: 20px">
                    {{ Form::open(['url' => route('tasks.index'), 'method' => 'GET']) }}
                        <select name="filter[status]" id="">
                            <option value="0">Null</option>
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}">{{$status->name}}</option>
                            @endforeach
                        </select>

                        <select name="filter[creator]" id="">
                            <option value="0">Null</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{$user->name}}</option>
                            @endforeach
                        </select>

                        <select name="filter[assigner]" id="">
                            <option value="0">Null</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{$user->name}}</option>
                            @endforeach
                        </select>

                    <!-- <select name="assigned_to_id" id="">
                        @foreach ($labels as $label)
                            <option value="{{ $label->id }}">{{$label->text}}</option>
                        @endforeach
                    </select> -->
                    <!-- <button type="reset">hyrbgvfcdx</button> -->
                        {{ Form::submit('Click') }}
                    {{ Form::close() }}

                    {{ Form::open(['url' => route('tasks.index'), 'method' => 'GET']) }}
                        {{ Form::submit('Unfilter') }}
                    {{ Form::close() }}
            </div>
        <div>
        <div>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="column">Id</th>
                        <th scope="column">Task name</th>
                        <th scope="column">Labels</th>
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
                            <td>@include('layouts.label')</td>
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
