<br>
    <x-label-tag
        type="text"
        labelValue="{{__('tasks.form_name')}}"
        name="name"
        class="form-control form-control-sm"
        placeHolder="{{__('tasks.form_name')}}"
        value="{{ $task->name }}"
    />
<br>

    <x-label-select-status
        labelText="{{__('tasks.form_status')}}"
        selectClass="form-control form-control-sm"
        startText="{{__('tasks.form_status')}}"
        startValue="0"
        :array=$statuses
        :task=$task
    />
<br>
    <x-label-select-assigner
        labelText="{{__('tasks.form_assigner')}}"
        selectClass="form-control form-control-sm"
        startText="{{ __('tasks.form_assigner') }}"
        startValue=""
        :array=$users
        :task=$task
    />
<div>
    <label for="description">{{__('tasks.form_description')}}</label>
    {{ Form::textarea('description') }}
</div>
<br>

