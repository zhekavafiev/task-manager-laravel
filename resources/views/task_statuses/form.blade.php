<div class="col col-md-2">
    <x-label-tag
        type="text"
        labelValue="{{__('task_statuses.label_name')}}"
        name="name"
        class="form-control form-control-sm"
        placeHolder="{{ __('task_statuses.ph_name') }}"
        value="{{ $status->name }}"
    />
</div>
@if ($errors->any())()
<div style="Color: red">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<br>