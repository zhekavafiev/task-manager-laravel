@if ($errors->any())
<div style="Color: red">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="col col-md-4">
    <label for="text">@lang('labels.name')</label>
</div>

<div class="col col-md-2">
    {{ Form::text('text', 'New lab', ['class' => 'form-control form-control-sm']) }}
</div>

<div class="col col-md-4">
    <label for="text">@lang('labels.color')</label>
</div>

<!-- необходимо убрать генерацию форм либой, чтобы можно было передать языковые изменения -->

<div class="col col-md-2">
    {{ Form::select('color', [
            'primary' => 'Blue',
            'secondary' => 'Silver',
            'sucess' => 'Green',
            'red' => 'danger',
            'warning' => 'Orange',
            'info' => 'Indigo',
            'link' => 'White',
            'dark' => 'Black',
            'light' => 'Silver'
        ], 0, ['class' => 'form-control form-control-sm']) }}
</div>

<div class="col col-md-4">
    <label for="text">@lang('labels.text_color')</label>
</div>

<div class="col col-md-2">
    {{ Form::select('text_color', [
        'red' => 'Red',
        'green' => 'Green',
        'yellow' => 'Yellow',
        'black' => 'Black',
        'white' => 'White',
        'orange' => 'Orange',
        'silver' => 'Silver',
        'purple' => 'Purple',
        'indigo' => 'Indigo',
        'gray' => 'Gray',
        'white' => 'White',
        'aqua' => 'Aqua'
    ], 0, ['class' => 'form-control form-control-sm']) }}
</div>

<br>
<div class="col col-md-2">
    <button type="submit" class="btn btn-secondary btm-sm">@lang('labels.button_create')</button>
</div>
