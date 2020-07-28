@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <h2>@lang('task_statuses.index_header')</h2>
        <div style="padding-top: 20px; padding-bottom: 20px;" class="float-right">
            <a href="{{ route('task_statuses.create') }}" class="btn btn-secondary btm-lg">@lang('task_statuses.button_create_new')</a>
        </div>
        <div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="column">@lang('task_statuses.table_id')</th>
                        <th scope="column">@lang('task_statuses.table_name')</th>
                        <th scope="column" class="text-center">@lang('task_statuses.table_action')</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($statuses as $status)
                        <tr>
                            <th scope="row">{{ $status->id }}</th>
                            <td>{{ $status->name }}</td>
                            <td>
                                <div class="text-center">
                                    <a href="{{ route('task_statuses.edit', $status) }}">@lang('task_statuses.button_edit')</a>
                                    <a href="{{ route('task_statuses.destroy', $status) }}" data-confirm="@lang('task_statuses.warning_message')" data-method="delete">@lang('task_statuses.button_delete')</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

