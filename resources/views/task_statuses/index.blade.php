@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <h2>Types of Tasks</h2>
        <div style="padding-top: 20px; padding-bottom: 20px;" class="float-right">
            <a href="{{ route('task_statuses.create') }}" class="btn btn-secondary btm-lg">Create new</a>
            <!-- <form action="{{ route('task_statuses.create') }}">
                <input type="submit" value="Create">
            </form> -->
        </div>
        <div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="column">Id</th>
                        <th scope="column">Status name</th>
                        <th scope="column" class="text-center">Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($statuses as $status)
                        <tr>
                            <th scope="row">{{ $status->id }}</th>
                            <td><a href="{{ route('task_statuses.show', $status) }}">{{ $status->name }}</a></td>
                            <td>
                                <div class="text-center">
                                    <a href="{{ route('task_statuses.edit', $status) }}">Edit</a>
                                    <a href="{{ route('task_statuses.destroy', $status) }}" data-confirm="Are you sure?" data-method="delete">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

