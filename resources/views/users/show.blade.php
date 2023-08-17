@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$user['name']}}'s Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        You are logged in!
                        <img src="{{ Storage::disk('s3')->url($user['avatar']) }}">
{{--                        <img class="image rounded-circle" src="{{asset($user['avatar'])}}" alt="profile_image" style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">--}}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.store.avatar', ['user_id' => $user['id']]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="avatar">
                            <input type="submit" value="Upload">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
