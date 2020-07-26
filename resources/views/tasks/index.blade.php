@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tasks</h2>
            <div style="padding-top: 10px; padding-bottom: 10px" class="row">
                
                <div class="col md-col-8">
                {{ Form::open(['url' => route('tasks.index'), 'method' => 'GET']) }}
                        <select name="filter[status]" id="">
                            <option value="0">Status</option>
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}">{{$status->name}}</option>
                            @endforeach
                        </select>

                        <select name="filter[creator]" id="">
                            <option value="0">Creator</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{$user->name}}</option>
                            @endforeach
                        </select>

                        <select name="filter[assigner]" id="">
                            <option value="0">Assigner</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{$user->name}}</option>
                            @endforeach
                        </select>

                        <select name="filter[label]" id="">
                            <option value="0">Label</option>
                            @foreach ($labels as $label)
                                <option value="{{ $label->id }}">{{$label->text}}</option>
                            @endforeach
                        </select>

                        {{ Form::submit('Filter', ['class' => 'btn btn-secondary']) }}
                    {{ Form::close() }}

                    <div>
                        {{ Form::open(['url' => route('tasks.index'), 'method' => 'GET']) }}
                            {{ Form::submit('Unfilter', ['class' => 'btn btn-secondary btm-sm']) }}
                        {{ Form::close() }}
                    </div>

                </div>

                <div class="col col-md-4">
                        <div>
                            <a href="{{ route('tasks.create') }}" class="btn btn-secondary btm-lg float-right">Create new</a>
                        </div>
                </div>
            </div>
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
                            <td width="20%">@include('layouts.label')</td>
                            <td width="60%">{{ $task->description }}</td>
                            <td nowrap>{{ $task->status->name }}</td>
                            <td>{{ $task->creator->name}}</td>
                            <td>{{ $task->assigner->name ?? null}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection

