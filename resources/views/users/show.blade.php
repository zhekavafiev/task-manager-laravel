@extends('layouts.app')

@section('content')
<div class="account-layoutborder">
    <div class="account-hdr bg-primary text-white border ">
        User Account
    </div>
    <div class="account-bdy border py-3">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-12 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-black">
                                <div class="m-b-25">
                                    <img class="image" src="{{$user['avatar']}}" alt="profile_image" style="width: 200px;height: 400px; padding: 0px; margin: 0px; ">
                                    <div class="card-body">
                                        <form action="{{ route('users.store.avatar', ['user_id' => $user['id']]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row m-l-0 m-r-0">
                                                <input type="file" name="avatar">
                                            </div>
                                            <div class="row m-l-0 m-r-0">
                                                <input type="submit" value="Upload">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h4 class="m-b-20 p-b-5 b-b-default f-w-600" style="padding-top: 20px">Information</h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400">{{$user['email']}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone</p>
                                        <h6 class="text-muted f-w-400">not set</h6>
                                    </div>
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Account</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Logout</p>
                                        <a href="{{route('logout')}}" class="btn btn-outline-dark">Logout</a>
                                    </div>
                                </div>
                                <ul class="social-link list-unstyled m-t-40 m-b-10">
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
