@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Users:</h2>
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
</div>
@endsection
