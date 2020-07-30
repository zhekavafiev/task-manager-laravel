@extends('layouts.app')

@section('content')
    <x-label-select
    name="status_id"
    labelText="Peec"
    selectClass="form-control"
    startText="Spartaaaa!"
    startValue=""
    :array=$users
    />
@endsection