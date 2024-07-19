@extends('admin.layout.header')
@section('content')

<section class="header-user-list">
    <a href="#" class="h-close-text"><i class="feather icon-x"></i></a>
    <ul class="nav nav-tabs" id="chatTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active text-uppercase border-0" id="chat-tab" data-bs-toggle="tab" href="#chat"
                role="tab" aria-controls="chat" aria-selected="true"><i
                    class="feather icon-message-circle me-2"></i>Chat</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-uppercase border-0" id="user-tab" data-bs-toggle="tab" href="#user" role="tab"
                aria-controls="user" aria-selected="false"><i class="feather icon-users me-2"></i>User</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-uppercase border-0" id="setting-tab" data-bs-toggle="tab" href="#setting" role="tab"
                aria-controls="setting" aria-selected="false"><i class="feather icon-settings me-2"></i>Setting</a>
        </li>
    </ul>
    <div class="tab-content" id="chatTabContent">
        <div class="tab-pane fade show active" id="chat" role="tabpanel" aria-labelledby="chat-tab">
            <div class="h-list-header">
                <div class="input-group">
                    <input type="text" id="search-friends" class="form-control" placeholder="Search Friend . . ." />
                </div>
            </div>
            <div class="h-list-body">
                <div class="main-friend-cont scroll-div">
                    <div class="main-friend-list">
                        <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe">
                            <a class="media-left" href="#"><img class="media-object img-radius"
                                    src="../assets/images/user/avatar-1.jpg" alt="Generic placeholder image " />
                                <div class="live-status">3</div>
                            </a>
                            <div class="media-body">
                                <h6 class="chat-header">
                                    Josephin Doe<small class="d-block text-c-green">Typing . .
                                    </small>
                                </h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="2" data-status="online" data-username="Lary Doe">
                            <a class="media-left" href="#"><img class="media-object img-radius"
                                    src="../assets/images/user/avatar-2.jpg" alt="Generic placeholder image" />
                                <div class="live-status">1</div>
                            </a>
                            <div class="media-body">
                                <h6 class="chat-header">
                                    Lary Doe<small class="d-block text-c-green">online</small>
                                </h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="3" data-status="online" data-username="Alice">
                            <a class="media-left" href="#"><img class="media-object img-radius"
                                    src="../assets/images/user/avatar-3.jpg" alt="Generic placeholder image" /></a>
                            <div class="media-body">
                                <h6 class="chat-header">
                                    Alice<small class="d-block text-c-green">online</small>
                                </h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="4" data-status="offline" data-username="Alia">
                            <a class="media-left" href="#"><img class="media-object img-radius"
                                    src="../assets/images/user/avatar-1.jpg" alt="Generic placeholder image" />
                                <div class="live-status">1</div>
                            </a>
                            <div class="media-body">
                                <h6 class="chat-header">
                                    Alia<small class="d-block text-muted">10 min ago</small>
                                </h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="5" data-status="offline" data-username="Suzen">
                            <a class="media-left" href="#"><img class="media-object img-radius"
                                    src="../assets/images/user/avatar-4.jpg" alt="Generic placeholder image" /></a>
                            <div class="media-body">
                                <h6 class="chat-header">
                                    Suzen<small class="d-block text-muted">15 min ago</small>
                                </h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe">
                            <a class="media-left" href="#"><img class="media-object img-radius"
                                    src="../assets/images/user/avatar-1.jpg" alt="Generic placeholder image " />
                                <div class="live-status">3</div>
                            </a>
                            <div class="media-body">
                                <h6 class="chat-header">
                                    Josephin Doe<small class="d-block text-c-green">Typing . .
                                    </small>
                                </h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="2" data-status="online" data-username="Lary Doe">
                            <a class="media-left" href="#"><img class="media-object img-radius"
                                    src="../assets/images/user/avatar-2.jpg" alt="Generic placeholder image" />
                                <div class="live-status">1</div>
                            </a>
                            <div class="media-body">
                                <h6 class="chat-header">
                                    Lary Doe<small class="d-block text-c-green">online</small>
                                </h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="3" data-status="online" data-username="Alice">
                            <a class="media-left" href="#"><img class="media-object img-radius"
                                    src="../assets/images/user/avatar-3.jpg" alt="Generic placeholder image" /></a>
                            <div class="media-body">
                                <h6 class="chat-header">
                                    Alice<small class="d-block text-c-green">online</small>
                                </h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="4" data-status="offline" data-username="Alia">
                            <a class="media-left" href="#"><img class="media-object img-radius"
                                    src="../assets/images/user/avatar-1.jpg" alt="Generic placeholder image" />
                                <div class="live-status">1</div>
                            </a>
                            <div class="media-body">
                                <h6 class="chat-header">
                                    Alia<small class="d-block text-muted">10 min ago</small>
                                </h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="5" data-status="offline" data-username="Suzen">
                            <a class="media-left" href="#"><img class="media-object img-radius"
                                    src="../assets/images/user/avatar-4.jpg" alt="Generic placeholder image" /></a>
                            <div class="media-body">
                                <h6 class="chat-header">
                                    Suzen<small class="d-block text-muted">15 min ago</small>
                                </h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe">
                            <a class="media-left" href="#"><img class="media-object img-radius"
                                    src="../assets/images/user/avatar-1.jpg" alt="Generic placeholder image " />
                                <div class="live-status">3</div>
                            </a>
                            <div class="media-body">
                                <h6 class="chat-header">
                                    Josephin Doe<small class="d-block text-c-green">Typing . .
                                    </small>
                                </h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="2" data-status="online" data-username="Lary Doe">
                            <a class="media-left" href="#"><img class="media-object img-radius"
                                    src="../assets/images/user/avatar-2.jpg" alt="Generic placeholder image" />
                                <div class="live-status">1</div>
                            </a>
                            <div class="media-body">
                                <h6 class="chat-header">
                                    Lary Doe<small class="d-block text-c-green">online</small>
                                </h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="3" data-status="online" data-username="Alice">
                            <a class="media-left" href="#"><img class="media-object img-radius"
                                    src="../assets/images/user/avatar-3.jpg" alt="Generic placeholder image" /></a>
                            <div class="media-body">
                                <h6 class="chat-header">
                                    Alice<small class="d-block text-c-green">online</small>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="user-tab">
            <div class="h-list-body">
                <div class="main-friend-cont scroll-div">
                    <div class="main-friend-list">
                        <div class="media px-3 d-flex align-items-center mt-3">
                            <a class="media-left m-r-15" href="#">
                                <div
                                    class="hei-50 wid-50 bg-primary img-radius d-flex text-white f-22 align-items-center justify-content-center">
                                    <i class="icon feather icon-users"></i>
                                </div>
                            </a>
                            <div class="media-body">
                                <p class="chat-header f-w-600 mb-0">New Group</p>
                            </div>
                        </div>
                        <div class="media p-3 d-flex align-items-center">
                            <a class="media-left m-r-15" href="#">
                                <div
                                    class="hei-50 wid-50 bg-primary img-radius d-flex text-white f-22 align-items-center justify-content-center">
                                    <i class="icon feather icon-user-plus"></i>
                                </div>
                            </a>
                            <div class="media-body">
                                <p class="chat-header f-w-600 mb-0">New Contact</p>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe">
                            <a class="media-left" href="#"><img class="media-object img-radius"
                                    src="../assets/images/user/avatar-1.jpg" alt="Generic placeholder image " /></a>
                            <div class="media-body">
                                <p class="chat-header">
                                    Josephin Doe<small class="d-block">i am not what happened . .</small>
                                </p>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="2" data-status="online" data-username="Lary Doe">
                            <a class="media-left" href="#"><img class="media-object img-radius"
                                    src="../assets/images/user/avatar-2.jpg" alt="Generic placeholder image" /></a>
                            <div class="media-body">
                                <h6 class="chat-header">
                                    Lary Doe<small class="d-block">Avalable</small>
                                </h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="3" data-status="online" data-username="Alice">
                            <a class="media-left" href="#"><img class="media-object img-radius"
                                    src="../assets/images/user/avatar-3.jpg" alt="Generic placeholder image" /></a>
                            <div class="media-body">
                                <h6 class="chat-header">
                                    Alice<small class="d-block">hear using Elite able</small>
                                </h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="4" data-status="offline" data-username="Alia">
                            <a class="media-left" href="#">
                                <div
                                    class="hei-50 wid-50 img-radius bg-success d-flex text-white f-22 align-items-center justify-content-center">
                                    A
                                </div>
                            </a>
                            <div class="media-body">
                                <h6 class="chat-header">
                                    Alia<small class="d-block text-muted">Avalable</small>
                                </h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="5" data-status="offline" data-username="Suzen">
                            <a class="media-left" href="#"><img class="media-object img-radius"
                                    src="../assets/images/user/avatar-4.jpg" alt="Generic placeholder image" /></a>
                            <div class="media-body">
                                <h6 class="chat-header">
                                    Suzen<small class="d-block text-muted">Avalable</small>
                                </h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe">
                            <a class="media-left" href="#">
                                <div
                                    class="hei-50 wid-50 bg-danger img-radius d-flex text-white f-22 align-items-center justify-content-center">
                                    JD
                                </div>
                            </a>
                            <div class="media-body">
                                <h6 class="chat-header">
                                    Josephin Doe<small class="d-block text-muted">Don't send me image</small>
                                </h6>
                            </div>
                        </div>
                        <div class="media userlist-box" data-id="2" data-status="online" data-username="Lary Doe">
                            <a class="media-left" href="#"><img class="media-object img-radius"
                                    src="../assets/images/user/avatar-2.jpg" alt="Generic placeholder image" /></a>
                            <div class="media-body">
                                <h6 class="chat-header">
                                    Lary Doe<small class="d-block text-muted">not send free msg</small>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="setting-tab">
            <div class="p-4 main-friend-cont scroll-div">
                <h6 class="mt-2">
                    <i class="feather icon-monitor me-2"></i>Desktop settings
                </h6>
                <hr />
                <div class="form-group mb-0">
                    <div class="switch switch-primary d-inline m-r-10">
                        <input type="checkbox" id="cn-p-1" checked="" />
                        <label for="cn-p-1" class="cr"></label>
                    </div>
                    <label class="f-w-600">Allow desktop notification</label>
                </div>
                <p class="text-muted ms-5">
                    you get lettest content at a time when data will updated
                </p>
                <div class="form-group mb-0">
                    <div class="switch switch-primary d-inline m-r-10">
                        <input type="checkbox" id="cn-p-5" />
                        <label for="cn-p-5" class="cr"></label>
                    </div>
                    <label class="f-w-600">Store Cookie</label>
                </div>
                <h6 class="mb-0 mt-5">
                    <i class="feather icon-layout me-2"></i>Application settings
                </h6>
                <hr />
                <div class="form-group mb-0">
                    <div class="switch switch-primary d-inline m-r-10">
                        <input type="checkbox" id="cn-p-3" checked="" />
                        <label for="cn-p-3" class="cr"></label>
                    </div>
                    <label class="f-w-600">Backup Storage</label>
                </div>
                <p class="text-muted mb-0 ms-5">
                    Automaticaly take backup as par schedule
                </p>
                <div class="form-group mb-4">
                    <div class="switch switch-primary d-inline m-r-10">
                        <input type="checkbox" id="cn-p-4" checked="" />
                        <label for="cn-p-4" class="cr"></label>
                    </div>
                    <label class="f-w-600">Allow guest to print file</label>
                </div>
                <h6 class="mb-0 mt-5">
                    <i class="feather icon-globe me-2"></i>System settings
                </h6>
                <hr />
                <div class="form-group mb-0">
                    <div class="switch switch-primary d-inline m-r-10">
                        <input type="checkbox" id="cn-p-2" />
                        <label for="cn-p-2" class="cr"></label>
                    </div>
                    <label class="f-w-600">View other user chat</label>
                </div>
                <p class="text-muted ms-5">Allow to show public user message</p>
            </div>
        </div>
    </div>
</section>

<section class="header-chat">
    <div class="h-list-header">
        <h6>Josephin Doe</h6>
        <a href="#" class="h-back-user-list"><i class="feather icon-chevron-left"></i></a>
    </div>
    <div class="h-list-body">
        <div class="main-chat-cont scroll-div">
            <div class="main-friend-chat">
                <div class="media chat-messages">
                    <a class="media-left photo-table" href="#"><img class="media-object img-radius img-radius m-t-5"
                            src="../assets/images/user/avatar-2.jpg" alt="Generic placeholder image" /></a>
                    <div class="media-body chat-menu-content">
                        <div class="">
                            <p class="chat-cont">hello tell me something</p>
                            <p class="chat-cont">about yourself?</p>
                        </div>
                        <p class="chat-time">8:20 a.m.</p>
                    </div>
                </div>
                <div class="media chat-messages">
                    <div class="media-body chat-menu-reply">
                        <div class="">
                            <p class="chat-cont">Ohh! very nice</p>
                        </div>
                        <p class="chat-time">8:22 a.m.</p>
                    </div>
                    <a class="media-right photo-table" href="#"><img class="media-object img-radius img-radius m-t-5"
                            src="../assets/images/user/avatar-1.jpg" alt="Generic placeholder image" /></a>
                </div>
                <div class="media chat-messages">
                    <a class="media-left photo-table" href="#"><img class="media-object img-radius img-radius m-t-5"
                            src="../assets/images/user/avatar-2.jpg" alt="Generic placeholder image" /></a>
                    <div class="media-body chat-menu-content">
                        <div class="">
                            <p class="chat-cont">can you help me?</p>
                        </div>
                        <p class="chat-time">8:20 a.m.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="h-list-footer">
        <div class="input-group">
            <input type="file" class="chat-attach" style="display: none" />
            <a href="#" class="input-group-prepend btn rounded-circle btn-success btn-attach">
                <i class="feather icon-paperclip"></i>
            </a>
            <input type="text" name="h-chat-text" class="form-control h-auto h-send-chat"
                placeholder="Write hear . . " />
            <button type="submit" class="input-group-append btn-send btn btn-primary">
                <i class="feather icon-message-circle"></i>
            </button>
        </div>
    </div>
</section>

<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard sale</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html"><i class="feather icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Dashboard sale</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card prod-p-card bg-c-red">
                    <div class="card-body">
                        <div class="row align-items-center m-b-0">
                            <div class="col">
                                <h6 class="m-b-5 text-white">Total Profit</h6>
                                <h3 class="m-b-0 text-white">$1,783</h3>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-money-bill-alt text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card prod-p-card bg-c-blue">
                    <div class="card-body">
                        <div class="row align-items-center m-b-0">
                            <div class="col">
                                <h6 class="m-b-5 text-white">Total Orders</h6>
                                <h3 class="m-b-0 text-white">15,830</h3>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card prod-p-card bg-c-green">
                    <div class="card-body">
                        <div class="row align-items-center m-b-0">
                            <div class="col">
                                <h6 class="m-b-5 text-white">Average Price</h6>
                                <h3 class="m-b-0 text-white">$6,780</h3>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card prod-p-card bg-c-yellow">
                    <div class="card-body">
                        <div class="row align-items-center m-b-0">
                            <div class="col">
                                <h6 class="m-b-5 text-white">Product Sold</h6>
                                <h3 class="m-b-0 text-white">6,784</h3>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-tags text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-7">
                <div class="card">
                    <div class="card-header">
                        <h5>Department wise annual recurring and profit</h5>
                    </div>
                    <div class="card-body">
                        <div id="account-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="card feed-card">
                    <div class="card-header">
                        <h5>Feeds</h5>
                        <div class="card-header-right">
                            <div class="btn-group card-option">
                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-horizontal"></i>
                                </button>
                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-end">
                                    <li class="dropdown-item full-card">
                                        <a href="#"><span><i class="feather icon-maximize"></i>
                                                maximize</span><span style="display: none"><i
                                                    class="feather icon-minimize"></i> Restore</span></a>
                                    </li>
                                    <li class="dropdown-item minimize-card">
                                        <a href="#"><span><i class="feather icon-minus"></i> collapse</span><span
                                                style="display: none"><i class="feather icon-plus"></i>
                                                expand</span></a>
                                    </li>
                                    <li class="dropdown-item reload-card">
                                        <a href="#"><i class="feather icon-refresh-cw"></i> reload</a>
                                    </li>
                                    <li class="dropdown-item close-card">
                                        <a href="#"><i class="feather icon-trash"></i> remove</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="feed-scroll" style="height: 385px; position: relative">
                        <div class="card-body">
                            <div class="row m-b-25 align-items-center">
                                <div class="col-auto p-r-0">
                                    <i class="feather icon-bell badge-light-primary feed-icon"></i>
                                </div>
                                <div class="col">
                                    <a href="#">
                                        <h6 class="m-b-5">
                                            You have 3 pending tasks.
                                            <span class="text-muted float-end f-14">Just Now</span>
                                        </h6>
                                    </a>
                                </div>
                            </div>
                            <div class="row m-b-25 align-items-center">
                                <div class="col-auto p-r-0">
                                    <i class="feather icon-shopping-cart badge-light-danger feed-icon"></i>
                                </div>
                                <div class="col">
                                    <a href="#">
                                        <h6 class="m-b-5">
                                            New order received
                                            <span class="text-muted float-end f-14">30 min ago</span>
                                        </h6>
                                    </a>
                                </div>
                            </div>
                            <div class="row m-b-25 align-items-center">
                                <div class="col-auto p-r-0">
                                    <i class="feather icon-file-text badge-light-success feed-icon"></i>
                                </div>
                                <div class="col">
                                    <a href="#">
                                        <h6 class="m-b-5">
                                            You have 3 pending tasks.
                                            <span class="text-muted float-end f-14">Just Now</span>
                                        </h6>
                                    </a>
                                </div>
                            </div>
                            <div class="row m-b-25 align-items-center">
                                <div class="col-auto p-r-0">
                                    <i class="feather icon-bell badge-light-primary feed-icon"></i>
                                </div>
                                <div class="col">
                                    <a href="#">
                                        <h6 class="m-b-5">
                                            You have 4 tasks Done.
                                            <span class="text-muted float-end f-14">1 hours ago</span>
                                        </h6>
                                    </a>
                                </div>
                            </div>
                            <div class="row m-b-25 align-items-center">
                                <div class="col-auto p-r-0">
                                    <i class="feather icon-file-text badge-light-success feed-icon"></i>
                                </div>
                                <div class="col">
                                    <a href="#">
                                        <h6 class="m-b-5">
                                            You have 2 pending tasks.
                                            <span class="text-muted float-end f-14">Just Now</span>
                                        </h6>
                                    </a>
                                </div>
                            </div>
                            <div class="row m-b-25 align-items-center">
                                <div class="col-auto p-r-0">
                                    <i class="feather icon-shopping-cart badge-light-danger feed-icon"></i>
                                </div>
                                <div class="col">
                                    <a href="#">
                                        <h6 class="m-b-5">
                                            New order received
                                            <span class="text-muted float-end f-14">4 hours ago</span>
                                        </h6>
                                    </a>
                                </div>
                            </div>
                            <div class="row m-b-25 align-items-center">
                                <div class="col-auto p-r-0">
                                    <i class="feather icon-shopping-cart badge-light-danger feed-icon"></i>
                                </div>
                                <div class="col">
                                    <a href="#">
                                        <h6 class="m-b-5">
                                            New order Done
                                            <span class="text-muted float-end f-14">Just Now</span>
                                        </h6>
                                    </a>
                                </div>
                            </div>
                            <div class="row m-b-25 align-items-center">
                                <div class="col-auto p-r-0">
                                    <i class="feather icon-file-text badge-light-success feed-icon"></i>
                                </div>
                                <div class="col">
                                    <a href="#">
                                        <h6 class="m-b-5">
                                            You have 5 pending tasks.
                                            <span class="text-muted float-end f-14">5 hours ago</span>
                                        </h6>
                                    </a>
                                </div>
                            </div>
                            <div class="row m-b-0 align-items-center">
                                <div class="col-auto p-r-0">
                                    <i class="feather icon-bell badge-light-primary feed-icon"></i>
                                </div>
                                <div class="col">
                                    <a href="#">
                                        <h6 class="m-b-5">
                                            You have 4 tasks Done.
                                            <span class="text-muted float-end f-14">2 hours ago</span>
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-12">
                <div class="card table-card">
                    <div class="card-header">
                        <h5>New Products</h5>
                        <div class="card-header-right">
                            <div class="btn-group card-option">
                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-horizontal"></i>
                                </button>
                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-end">
                                    <li class="dropdown-item full-card">
                                        <a href="#"><span><i class="feather icon-maximize"></i>
                                                maximize</span><span style="display: none"><i
                                                    class="feather icon-minimize"></i> Restore</span></a>
                                    </li>
                                    <li class="dropdown-item minimize-card">
                                        <a href="#"><span><i class="feather icon-minus"></i> collapse</span><span
                                                style="display: none"><i class="feather icon-plus"></i>
                                                expand</span></a>
                                    </li>
                                    <li class="dropdown-item reload-card">
                                        <a href="#"><i class="feather icon-refresh-cw"></i> reload</a>
                                    </li>
                                    <li class="dropdown-item close-card">
                                        <a href="#"><i class="feather icon-trash"></i> remove</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="pro-scroll" style="height: 345px; position: relative">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover m-b-0">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>HeadPhone</td>
                                            <td>
                                                <img src="../assets/images/widget/p1.jpg" alt="" class="img-20" />
                                            </td>
                                            <td>
                                                <div>
                                                    <label class="badge bg-warning">Pending</label>
                                                </div>
                                            </td>
                                            <td>$10</td>
                                            <td>
                                                <a href="#"><i
                                                        class="icon feather icon-edit f-16 text-c-green"></i></a><a
                                                    href="#"><i
                                                        class="feather icon-trash-2 ms-3 f-16 text-c-red"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Iphone 6</td>
                                            <td>
                                                <img src="../assets/images/widget/p2.jpg" alt="" class="img-20" />
                                            </td>
                                            <td>
                                                <div>
                                                    <label class="badge bg-danger">Cancel</label>
                                                </div>
                                            </td>
                                            <td>$20</td>
                                            <td>
                                                <a href="#"><i
                                                        class="icon feather icon-edit f-16 text-c-green"></i></a><a
                                                    href="#"><i
                                                        class="feather icon-trash-2 ms-3 f-16 text-c-red"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jacket</td>
                                            <td>
                                                <img src="../assets/images/widget/p3.jpg" alt="" class="img-20" />
                                            </td>
                                            <td>
                                                <div>
                                                    <label class="badge bg-success">Success</label>
                                                </div>
                                            </td>
                                            <td>$35</td>
                                            <td>
                                                <a href="#"><i
                                                        class="icon feather icon-edit f-16 text-c-green"></i></a><a
                                                    href="#"><i
                                                        class="feather icon-trash-2 ms-3 f-16 text-c-red"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sofa</td>
                                            <td>
                                                <img src="../assets/images/widget/p4.jpg" alt="" class="img-20" />
                                            </td>
                                            <td>
                                                <div>
                                                    <label class="badge bg-danger">Cancel</label>
                                                </div>
                                            </td>
                                            <td>$85</td>
                                            <td>
                                                <a href="#"><i
                                                        class="icon feather icon-edit f-16 text-c-green"></i></a><a
                                                    href="#"><i
                                                        class="feather icon-trash-2 ms-3 f-16 text-c-red"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Iphone 6</td>
                                            <td>
                                                <img src="../assets/images/widget/p2.jpg" alt="" class="img-20" />
                                            </td>
                                            <td>
                                                <div>
                                                    <label class="badge bg-success">Success</label>
                                                </div>
                                            </td>
                                            <td>$20</td>
                                            <td>
                                                <a href="#"><i
                                                        class="icon feather icon-edit f-16 text-c-green"></i></a><a
                                                    href="#"><i
                                                        class="feather icon-trash-2 ms-3 f-16 text-c-red"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>HeadPhone</td>
                                            <td>
                                                <img src="../assets/images/widget/p1.jpg" alt="" class="img-20" />
                                            </td>
                                            <td>
                                                <div>
                                                    <label class="badge bg-warning">Pending</label>
                                                </div>
                                            </td>
                                            <td>$50</td>
                                            <td>
                                                <a href="#"><i
                                                        class="icon feather icon-edit f-16 text-c-green"></i></a><a
                                                    href="#"><i
                                                        class="feather icon-trash-2 ms-3 f-16 text-c-red"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Iphone 6</td>
                                            <td>
                                                <img src="../assets/images/widget/p2.jpg" alt="" class="img-20" />
                                            </td>
                                            <td>
                                                <div>
                                                    <label class="badge bg-danger">Cancel</label>
                                                </div>
                                            </td>
                                            <td>$30</td>
                                            <td>
                                                <a href="#"><i
                                                        class="icon feather icon-edit f-16 text-c-green"></i></a><a
                                                    href="#"><i
                                                        class="feather icon-trash-2 ms-3 f-16 text-c-red"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6>Customer Satisfaction</h6>
                        <span>It takes continuous effort to maintain high customer
                            satisfaction levels.Internal and external quality measures are
                            often tied together.,as the opinion...</span>
                        <span class="text-c-blue d-block">Learn more..</span>
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col">
                                <div id="satisfaction-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection