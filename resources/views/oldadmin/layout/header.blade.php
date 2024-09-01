<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gradient Able bootstrap admin template by codedthemes</title>

    <!--[if lt IE 11]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Codedthemes" />

    {{-- <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon" /> --}}

    <link rel="stylesheet" href="{{asset('admins/assets/css/style.css')}}" />
    <!-- <link rel="stylesheet" href="../assets/css/plugins/style.css" /> -->

<link rel="stylesheet" href="{{asset('admins/assets/css/style-1.css')}}" />
</head>

<body class="">
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    @include('admin.layout.Slider');



    <header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed header-blue">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse" href="#"><span></span></a>
            <a href="#" class="b-brand">
                <img src="../assets/images/logo.png" alt="" class="logo" />
                <img src="../assets/images/logo-icon.png" alt="" class="logo-thumb" />
            </a>
            <a href="#" class="mob-toggler">
                <i class="feather icon-more-vertical"></i>
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a href="#" class="pop-search"><i class="feather icon-search"></i></a>
                    <div class="search-bar">
                        <input type="text" class="form-control border-0 shadow-none" placeholder="Search here" />
                        <button type="button" class="btn-close" aria-label="Close"></button>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#" class="full-screen"
                        onclick="if (!window.__cfRLUnblockHandlers) return false; javascript:toggleFullScreen()"
                        data-cf-modified-6e4607c6e7cee81c37975dae-=""><i class="feather icon-maximize"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown"><i
                                class="icon feather icon-bell"></i><span class="badge bg-danger"><span
                                    class="sr-only"></span></span></a>
                        <div class="dropdown-menu dropdown-menu-end notification">
                            <div class="noti-head">
                                <h6 class="d-inline-block m-b-0">Notifications</h6>
                                <div class="float-end">
                                    <a href="#" class="m-r-10">mark as read</a>
                                    <a href="#">clear all</a>
                                </div>
                            </div>
                            <ul class="noti-body">
                                <li class="n-title">
                                    <p class="m-b-0">NEW</p>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="../assets/images/user/avatar-1.jpg"
                                            alt="Generic placeholder image" />
                                        <div class="media-body">
                                            <p>
                                                <strong>John Doe</strong><span class="n-time text-muted"><i
                                                        class="icon feather icon-clock m-r-10"></i>5
                                                    min</span>
                                            </p>
                                            <p>New ticket Added</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="n-title">
                                    <p class="m-b-0">EARLIER</p>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="../assets/images/user/avatar-2.jpg"
                                            alt="Generic placeholder image" />
                                        <div class="media-body">
                                            <p>
                                                <strong>Joseph William</strong><span class="n-time text-muted"><i
                                                        class="icon feather icon-clock m-r-10"></i>10
                                                    min</span>
                                            </p>
                                            <p>Prchace New Theme and make payment</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="../assets/images/user/avatar-1.jpg"
                                            alt="Generic placeholder image" />
                                        <div class="media-body">
                                            <p>
                                                <strong>Sara Soudein</strong><span class="n-time text-muted"><i
                                                        class="icon feather icon-clock m-r-10"></i>12
                                                    min</span>
                                            </p>
                                            <p>currently login</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="../assets/images/user/avatar-2.jpg"
                                            alt="Generic placeholder image" />
                                        <div class="media-body">
                                            <p>
                                                <strong>Joseph William</strong><span class="n-time text-muted"><i
                                                        class="icon feather icon-clock m-r-10"></i>30
                                                    min</span>
                                            </p>
                                            <p>Prchace New Theme and make payment</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="noti-footer">
                                <a href="#">show all</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown">
                        <a href="#" class="displayChatbox dropdown-toggle"><i class="icon feather icon-mail"></i><span
                                class="badge bg-success"><span class="sr-only"></span></span></a>
                    </div>
                </li>
                <li>
                    <div class="dropdown drp-user">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="../assets/images/user/avatar-1.jpg" class="img-radius wid-40"
                                alt="User-Profile-Image" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-end profile-notification">
                            <div class="pro-head">
                                <img src="../assets/images/user/avatar-1.jpg" class="img-radius"
                                    alt="User-Profile-Image" />
                                <span>John Doe</span>
                                <a href="auth-signin.html" class="dud-logout" title="Logout">
                                    <i class="feather icon-log-out"></i>
                                </a>
                            </div>
                            <ul class="pro-body">
                                <li>
                                    <a href="user-profile.html" class="dropdown-item"><i class="feather icon-user"></i>
                                        Profile</a>
                                </li>
                                <li>
                                    <a href="email_inbox.html" class="dropdown-item"><i class="feather icon-mail"></i>
                                        My Messages</a>
                                </li>
                                <li>
                                    <a href="auth-signin.html" class="dropdown-item"><i class="feather icon-lock"></i>
                                        Lock Screen</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>


    @yield('content')



    <script src="{{asset('admins/assets/js/plugins/popper.min.js')}}"
        type="6e4607c6e7cee81c37975dae-text/javascript"></script>
    <script src="{{asset('admins/assets/js/plugins/perfect-scrollbar.min.js')}}"
        type="6e4607c6e7cee81c37975dae-text/javascript"></script>
    <script src="{{asset('admins/assets/js/plugins/bootstrap.min.js')}}"
        type="6e4607c6e7cee81c37975dae-text/javascript"></script>
    <script src="{{asset('admins/assets/js/pcoded.js')}}" type="6e4607c6e7cee81c37975dae-text/javascript"></script>

    <script src="{{asset('admins/assets/js/plugins/apexcharts.min.js')}}"
        type="6e4607c6e7cee81c37975dae-text/javascript"></script>
    <script src="{{asset('admins/assets/js/menu-setting.js')}}"
        type="6e4607c6e7cee81c37975dae-text/javascript"></script>
        <script
      src="{{asset('admins/assets/js/plugins/bootstrap.min-1.js')}}"
      type="73eec70b7d903537c8c1004a-text/javascript"
    ></script>

    <script src="{{asset('admins/assets/js/plugins/simple-datatables.js')}}" type="73eec70b7d903537c8c1004a-text/javascript"></script>
    <script type="73eec70b7d903537c8c1004a-text/javascript">
      const dataTable = new simpleDatatables.DataTable("#pc-dt-simple");
    </script>
    <script src="{{asset('admins/assets/js/pages/dashboard-sale.js')}}"
        type="6e4607c6e7cee81c37975dae-text/javascript"></script>
    <script src="{{asset('admins/assets/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js')}}"
        data-cf-settings="6e4607c6e7cee81c37975dae-|49" defer=""></script>
</body>

</html>