@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-striped table-bordered table-sm">
        <thead class="thead-dark">
            <tr>
                <th>Options</th>
                <th>Values</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <th scope="row">Id</th>
                <td>{{ $task->id }}</td>
            </tr>

            <tr>
                <th scope="row">Status</th>
                <td>{{ $task->status->name }}</td>
            </tr>

            <tr>
                <th scope="row">Creator</th>
                <td>{{ $task->creator->name }}</td>
            </tr>

            <tr>
                <th scope="row">Assigner</th>
                <td>{{ $task->assigner->name ?? null}}</td>
            </tr>

            <tr>
                <th scope="row">Description</th>
                <td>{{ $task->description }}</td>
            </tr>

            <tr>
                <th scope="row">Created</th>
                <td>{{ $task->created_at }}</td>
            </tr>
        </tbody>
    </table>
    <div>
        <div style="padding-top: 20px; padding-bottom: 20px; padding-right: 20px;" class="float-right">
            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-secondary btm-lg">Edit</a>
        </div>

        <div style="padding-top: 20px; padding-bottom: 20px; padding-right: 20px;" class="float-right">
            <a href="{{ route('tasks.destroy', $task) }}" class="btn btn-secondary btm-lg" data-confirm="Are you sure?" data-method="delete">Delete</a>
        </div>

    </div>

</div>

@endsection