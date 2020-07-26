@foreach ($task->label as $label)
        <button style="color: black" type="button" class="btn btn-{{$label->color}} btn-sm ">{{$label->text}}</button>
@endforeach
