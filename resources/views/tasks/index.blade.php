@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{__('tasks.index_header')}}</h2>
            <div style="padding-top: 10px; padding-bottom: 10px" class="row">
               
                <div class="col md-col-8">
                    {{ Form::open(['url' => route('tasks.index'), 'method' => 'GET']) }}
                    <div class="row">
                        <div class="col col-md-2">
                            <x-select
                                name="filter[status]"
                                selectClass="form-control form-control-sm"
                                startText="{{ __('tasks.select_status') }}"
                                startValue="0"
                                :array=$statuses
                            />
                        </div>

                        <div class="col col-md-2">
                            <x-select
                                name="filter[creator]"
                                selectClass="form-control form-control-sm"
                                startText="{{ __('tasks.select_creator') }}"
                                startValue="0"
                                :array=$users
                            />
                        </div>

                        <div class="col col-md-2">
                            <x-select
                                name="filter[assigner]"
                                selectClass="form-control form-control-sm"
                                startText="{{ __('tasks.select_assigner') }}"
                                startValue="0"
                                :array=$users
                            />
                        </div>
                        
                        <div class="col col-md-2">
                            <select name="filter[label]" id=""  class="form-control form-control-sm">
                                <option value="0">{{__('tasks.select_label')}}</option>
                                @foreach ($labels as $label)
                                    <option value="{{ $label->id }}">{{$label->text}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col col-md-2">
                            {{ Form::submit(__('tasks.button_filter'), ['class' => 'btn btn-secondary btn-sm']) }}
                        </div>
                    </div>
                    {{ Form::close() }}

                    <div>
                        <br>
                        {{ Form::open(['url' => route('tasks.index'), 'method' => 'GET']) }}
                            {{ Form::submit(__('tasks.button_reset_filter'), ['class' => 'btn btn-secondary btn-sm']) }}
                        {{ Form::close() }}
                        <br>
                    </div>

                </div>

                <div class="col col-md-4">
                        <div>
                            <a href="{{ route('tasks.create') }}" class="btn btn-secondary btn-sm float-right">{{__('tasks.button_create_new')}}</a>
                        </div>
                </div>
            </div>
        <div>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="column">{{__('tasks.table_id')}}</th>
                        <th scope="column">{{__('tasks.table_name')}}</th>
                        <th scope="column">{{__('tasks.table_labels')}}</th>
                        <th scope="column">{{__('tasks.table_description')}}</th>
                        <th scope="column">{{__('tasks.table_status')}}</th>
                        <th scope="column">{{__('tasks.table_creator')}}</th>
                        <th scope="column">{{__('tasks.table_assigner')}}</th>
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

