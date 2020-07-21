@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Types of Tasks</h2>
        <div>
            <form action="{{ route('task_statuses.create') }}">
                <input type="submit" value="Create">
            </form>
        </div>

        <div>
            <table>
                <tbody>
                    @foreach ($statuses as $status)
                        <tr>
                            <td>{{ $status->id }}</td>
                            <td><a href="{{ route('task_statuses.show', $status) }}">{{ $status->name }}</a></td>
                            <td>
                                <a href="{{ route('task_statuses.edit', $status) }}">Edit</a>
                                <a href="{{ route('task_statuses.destroy', $status) }}" data-confirm="Are you sure?" data-method="delete">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

