@extends('layouts.app')

@section('content')
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user)
      <tr>
        <th scope="row"> {{ $user->id }} </th>
        <td><a href="/users/{{ $user->id }}">{{ $user->name }}</a></td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection
