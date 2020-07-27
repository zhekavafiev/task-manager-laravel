@extends('layouts.app')

@section('content')
<div class="container">
    <h2 style="margin-left: 15px;">@lang('tasks.create_header')</h2>
    <div class="col col-md-2">
        {{ Form::model($task, ['url' => route('tasks.store')]) }}
            <label for="label_id">@lang('tasks.messege_label')</label>
            <select name="label_id" class="form-control form-controle-sm" id="">
                <option value="0">Label</option>
                @foreach ($labels as $label)
                    <option value="{{ $label->id }}">{{$label->text}}</option>
                @endforeach
            </select>
            @include('tasks.form')
            <div>
                {{ Form::submit('Create', ['class' => 'btn btn-sm btn-dark dropdown-toggle']) }}
            </div>
        {{ Form::close() }}
    </div>
</div>
@endsection