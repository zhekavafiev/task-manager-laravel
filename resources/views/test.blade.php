@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($types as $type)
        <button style="color: black" type="button" class="btn btn-{{$type}} btn-sm ">This is {{$type}}</button>
    @endforeach
</div>
@endsection