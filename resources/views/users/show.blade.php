@extends('layouts.app')

@section('content')
<table class="table table-striped table-sm">
  <tbody>
      <tr>
        <td>Name</td>
        <td>{{ $user->name }}</td>
      </tr>
      <tr>
        <td>Creat</td>
        <td>{{ $user->created_at }}</td>
      </tr>
  </tbody>
</table>
@endsection
