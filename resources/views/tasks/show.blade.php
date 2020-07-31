@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{__('tasks.show_header')}}{{$task->name}}</h1>
    @include('layouts.label') <br>
    <table class="table table-striped table-bordered table-sm">
        <br>
        <thead class="thead-dark">
            <tr>
                <th>{{__('tasks.show_table_options')}}</th>
                <th>{{__('tasks.show_table_value')}}</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <th scope="row">{{__('tasks.table_id')}}</th>
                <td>{{ $task->id }}</td>
            </tr>

            <tr>
                <th scope="row">{{__('tasks.table_status')}}</th>
                <td>{{ $task->status->name }}</td>
            </tr>

            <tr>
                <th scope="row">{{__('tasks.table_creator')}}</th>
                <td>{{ $task->creator->name }}</td>
            </tr>

            <tr>
                <th scope="row">{{__('tasks.table_assigner')}}</th>
                <td>{{ $task->assigner->name ?? null}}</td>
            </tr>

            <tr>
                <th scope="row">{{__('tasks.table_description')}}</th>
                <td>{{ $task->description }}</td>
            </tr>

            <tr>
                <th scope="row">{{__('tasks.show_table_created')}}</th>
                <td>{{ $task->created_at }}</td>
            </tr>
        </tbody>
    </table>
    <div>
        <div style="padding-top: 20px; padding-bottom: 20px; padding-right: 20px;" class="float-right">
            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-secondary btm-lg">{{__('tasks.button_edit')}}</a>
        </div>

        <div style="padding-top: 20px; padding-bottom: 20px; padding-right: 20px;" class="float-right">
            <a href="{{ route('tasks.destroy', $task) }}" class="btn btn-secondary btm-lg" data-confirm="{{__('tasks.warning_message')}}" data-method="delete">{{__('tasks.button_delete')}}</a>
        </div>

    </div>

</div>

@endsection