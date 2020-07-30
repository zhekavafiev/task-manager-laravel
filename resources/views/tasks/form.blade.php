<br>
    <x-label-tag
        type="text"
        labelValue="{{__('tasks.form_name')}}"
        name="name"
        class="form-control form-control-sm"
        placeHolder="Name"
        value="{{ $task->name }}"
    />
<br>
    <x-label-select
        name="status_id"
        labelText="{{__('tasks.form_status')}}"
        selectClass="form-control form-control-sm"
        startText="{{__('tasks.form_status')}}"
        startValue="0"
        :array=$statuses
    />
<br>
    <x-label-select
        name="assigned_to_id"
        labelText="{{__('tasks.form_assigner')}}"
        selectClass="form-control form-control-sm"
        startText="{{ __('tasks.form_assigner') }}"
        startValue=""
        :array=$users
    />
<div>
    <label for="description">@lang('tasks.form_description')</label>
    {{ Form::textarea('description') }}
</div>
<br>

