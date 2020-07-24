@foreach ($task->label as $label)
    <input type="button" style="text-align: center; font-size: 0.7vw; width: 5%; height: 5%; background: {{ $label->color }}; color: {{ $label->text_color }};" value="{{$label->text}}">
@endforeach