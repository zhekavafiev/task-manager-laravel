<div class="col col-md-2" style="margin-left: -15px;">
    <x-label-tag
        type="text"
        labelValue="{{__('task_statuses.label_name')}}"
        name="name"
        class="form-control form-control-sm"
        placeHolder="{{ __('task_statuses.ph_name') }}"
        value="{{ $status->name }}"
    />
</div>
