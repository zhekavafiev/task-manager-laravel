<div class="col col-md-4">
    <x-label-tag 
        type="text"
        labelValue="{{__('labels.name')}}"
        name="text"
        class="form-control form-control-sm"
        placeHolder="{{__('labels.ph_new')}}"
        value=""
    />
</div>

<div class="col col-md-4">
    <label for="text">{{__('labels.color')}}</label>
</div>
<div class="col col-md-2">
    {{ Form::select('color', [
            'primary' => __('labels.color_blue'),
            'secondary' => __('labels.color_grey'),
            'sucess' => __('labels.color_green'),
            'danger' => __('labels.color_red'),
            'warning' => __('labels.color_orange'),
            'info' => __('labels.color_indigo'),
            'link' => __('labels.color_white'),
            'dark' => __('labels.color_black'),
            'light' => __('labels.color_silver')
        ], 0, ['class' => 'form-control form-control-sm']) }}
</div>

<div class="col col-md-4">
    <label for="text">{{__('labels.text_color')}}</label>
</div>

<div class="col col-md-2">
    {{ Form::select('text_color', [
        'red' => __('labels.color_red'),
        'green' => __('labels.color_green'),
        'yellow' => __('labels.color_yellow'),
        'black' => __('labels.color_black'),
        'white' => __('labels.color_white'),
        'orange' => __('labels.color_orange'),
        'silver' => __('labels.color_silver'),
        'indigo' => __('labels.color_indigo'),
        'gray' => __('labels.color_grey'),
    ], 0, ['class' => 'form-control form-control-sm']) }}
</div>

<br>
<div class="col col-md-2">
    <button type="submit" class="btn btn-secondary btm-sm">{{__('labels.button_create')}}</button>
</div>
