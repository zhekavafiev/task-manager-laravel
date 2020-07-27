@foreach ($task->label as $label)
        <button style="color: {{$label->text_color}}" type="button" class="btn btn-{{$label->color}} btn-sm ">{{$label->text}}</button>
@endforeach
