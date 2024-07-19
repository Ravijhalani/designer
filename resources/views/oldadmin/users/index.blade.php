@extends('admin.layout.header')
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
       <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5>User card</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Advance Components</a></li>
                            <li class="breadcrumb-item"><a href="#">User card</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="tab-content" id="myTabContent">           
                    <div class="row mb-n4">
                        @foreach($users as $user)
                        <div class="col-xl-4 col-md-6">
                            <div class="card user-card user-card-3 support-bar1">
                                <div class="card-body ">
                                    <div class="text-center">
                                        <img class="img-radius img-fluid wid-150"
                                            src="{{asset('admins/assets/images/user/img-avatar-1.jpg')}}" alt="User image">
                                        <h3 class="mb-1 mt-3 f-w-400">{{$user->name}}</h3>
                                        <p class="mb-3 text-muted">UI/UX Designer</p>
                                    </div>
                                </div>
                                <div class="card-footer bg-light">
                                    <div class="row text-center">
                                        <div class="col">
                                            <h6 class="mb-1">37</h6>
                                            <p class="mb-0">Applied</p>
                                        </div>
                                        <div class="col">
                                            <h6 class="mb-1">2749</h6>
                                            <p class="mb-0">Rejected</p>
                                        </div>
                                        <div class="col">
                                            <h6 class="mb-1">678</h6>
                                            <p class="mb-0">Selected</p>
                                        </div>
                                        <div class="col">
                                            <h6 class="mb-1">213</h6>
                                            <p class="mb-0">Pending</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection