@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{__('team.header')}}</h2>
        {{ Form::model($team, ['url' => route('team.store')]) }}
            <div class="col col-md-2" style="margin-left: -15px; margin-bottom: 10px">
                <x-label-tag
                    type="text"
                    labelValue="{{__('team.name')}}"
                    name="name"
                    class="form-control form-control-sm"
                    placeHolder="{{ __('team.name') }}"
                    value="{{ $team->name }}"
                />
            </div>
            <div class="col col-md-2" style="margin-left: -15px; margin-bottom: 10px">
                <x-label-tag
                    type="text"
                    labelValue="{{__('team.components')}}"
                    name="components"
                    class="form-control form-control-sm"
                    placeHolder="{{ __('team.components') }}"
                    value="{{ $team->components }}"
                />
            </div>
            {{ Form::submit(__('team.bottom'), ['class' => 'btn btn-secondary btn-sm']) }}
        {{ Form::close() }}
    </div>
@endsection
