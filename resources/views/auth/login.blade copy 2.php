<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Jobes</title>
    <link rel="stylesheet" href="{{ asset('allAssets/login.css') }}" />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"
    />
    <link
        rel="stylesheet"
        href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />
    <style>
        .carousel-item {
            display: none;
            transition: opacity 1.5s ease;
        }
        .carousel-item.active {
            display: block;
            opacity: 1;
        }
        .carousel-fade .carousel-item {
            opacity: 0;
            transition: opacity 1.5s ease;
        }
        .carousel-fade .carousel-item.active {
            opacity: 1;
        }
    </style>
</head>
<body>
    <div class="main-parent-forms w-100">
        <div class="row m-0 p-0 w-100">
            <div class="col-lg-8 col-md-6 col-sm-12 col-12 p-0">
                <div id="imageSlider" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://img.freepik.com/premium-photo/we-are-hiring-collage_23-2150638218.jpg" class="d-block w-100 left-image-panel" alt="Illustration 1">
                    </div>
                    <div class="carousel-item">
                        <img src="https://img.freepik.com/premium-photo/sunny-backdrop-yellow-background-illustration-cheerful-bright-sunny-sunny-sunny-sunny-sunny-backdrop-yellow-background_191066-5955.jpg?w=1060" class="d-block w-100 left-image-panel" alt="Illustration 2">
                    </div>
                    <div class="carousel-item">
                        <img src="https://img.freepik.com/premium-vector/recruitment-join-now-banner-poster-open-vacancy-design-template-modern-concept-social-media_624773-26.jpg?w=900" class="d-block w-100 left-image-panel" alt="Illustration 3">
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <!-- login form  -->
                    <div class="d-flex flex-column justify-content-center align-items-center right-panel-forms">
                        <form method="POST" action="{{ route('send.otp') }}" id="login-form" class="form-class d-flex flex-column justify-content-center align-items-center p-3">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12 pb-2">
                                    <div>
                                        <img src="{{ asset('allAssets/Images/Frame 1000003431.png') }}" alt="Logo" class="logo-image">
                                        <p class="head-one mt-3 mb-0">Login to your Account</p>
                                        <p class="head-two">Let’s dive into your profile</p>
                                    </div>
                                </div>
                                <div class="container m-0">
                                    <div class="col-md-12 col-sm-12 col-12 pb-2">
                                        <label for="MobileNumber" class="form-label">Enter mobile number</label>
                                        <div class="input-group">
                                            <input
                                                type="text"
                                                class="form-control form-inputs-parent"
                                                id="MobileNumber"
                                                name="mobile"
                                                required
                                            />
                                        </div>
                                        <div class="text-danger" id="errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row w-100 mt-3">
                                <div class="col-md-12 p-0 text-center">
                                    <button id="submitBtn" class="btn btn-form-submit w-100 btn-primary action-btn">
                                        GET OTP
                                    </button>
                                    <p class="sign-up-text text-start pt-2">Don’t have an account? <span><a class="sign-up-link" href="{{ route('register') }}">Signup</a></span></p>
                                    <a href="../OTP/index.html">for otp page</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end -->
                </div>
            </div>
        </div>
    </div>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"
    ></script>
    <script src="{{ asset('allAssets/login.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
