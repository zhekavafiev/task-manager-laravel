@extends('layouts.app')

@section('content')
<div class="container">
  <h2>@lang('users.index_header')</h2>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">@lang('users.table_id')</th>
        <th scope="col">@lang('users.table_name')</th>
        <th scope="col">@lang('users.table_country')</th>
        <th scope="col">@lang('users.table_city')</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
        <tr>
          <th scope="row"> {{ $user->id }} </th>
          <td>{{ $user->name }} {{$user->second_name}}</td>
          <td>{{ $user->country ?? null }}</td>
          <td>{{ $user->city ?? null }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
