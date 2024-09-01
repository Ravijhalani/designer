<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Jobes</title>
 
    <link rel="stylesheet" href="{{ asset('allAssets/home.css') }}" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body>
    <div class="main-parent">
        <!-- section one navbar is here  -->

        <div class="section-one">
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: white">
                <div class="container py-1 nav-content-parent">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('/youAsk.png')}}" alt=""  style="height:85px;">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav w-100 d-flex flex-row justify-content-center align-items-center">
                            <li class="nav-item nav-item-parent px-4">
                                <a class="nav-link nav-link-text m-0" aria-current="page" href="#">About</a>
                            </li>
                            <li class="nav-item px-4">
                                <a class="nav-link nav-link-text m-0" aria-current="page" href="#">Companies</a>
                            </li>
                            <li class="nav-item px-4">
                                <a class="nav-link nav-link-text m-0" aria-current="page" href="#">Services</a>
                            </li>
                        </ul>
                        @if(isset(auth()->user()->id))
                        <button class="btn-login-navbar m-0" type="submit">Join Now</button>
                        @else
                       <a href="{{ route('login') }}"><button class="btn-login-navbar m-0" type="submit">Login</button></a>

                        @endif
                    </div>
                </div>
            </nav>
        </div>

        <!-- section two is here  -->

        <div class="second-two">
            <div class="w-100 hero-bg-image d-flex flex-column justify-content-center align-items-center py-5">
                <div class="d-flex flex-column justify-content-center align-items-center hero-content-section">
                    <div class="d-flex justify-content-center align-items-center px-3 py-0 hero-section-text-one">
                        <p class="m-0">Guaranteed monthly leads offered</p>
                        <i class="uil uil-arrow-right fs-3"></i>
                    </div>
                    <div>
                        <p class="tag-line-one pt-3">
                            Get the best jobs suiting your profile
                        </p>
                        <p class="tag-line-two">
                            This is the right place where you can add your business and also
                            you can find the right services provider for your projects.
                        </p>
                    </div>
                    <div class="bg-white px-2 py-2 d-flex justify-content-center align-items-center search-bar-parent"
                        style="border-radius: 100px">
                        <div class="px-3 search-input" style="border-right: 1px solid black">
                            <input class="form-control me-2" style="border: transparent; width: 250px" type="search"
                                placeholder="What are you looking for?" aria-label="Search" />
                        </div>
                        <div class="px-3">
                            <div class="dropdown">
                                <button class="btn text-secondary dropdown-toggle" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Location
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li>
                                        <a class="dropdown-item" href="#">Another action</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="hero-search">
                            <i class="uil uil-search"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- section three is here  -->

        <div>
            <div class="container mt-5 py-5">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="second-section-bg-image"
                            style="
                  border-radius: 12px !important;
                  box-shadow: 0px 0px 100px 15px black inset;
                ">
                            <img src="https://static.vecteezy.com/system/resources/thumbnails/018/971/605/small_2x/3d-video-play-button-isolated-on-transparent-background-file-format-png.png"
                                style="width: 200px" class="play-button-image" alt="" />
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="h-100 d-flex flex-column justify-content-center align-items-start px-4">
                            <p class="second-text-one">
                                Let us guide you from where you are, to where you want to be.
                            </p>
                            <p class="second-text-two mt-4">
                                We are a leading career and recruitment platform dedicated to
                                connecting job seekers with top employers.
                            </p>
                            <p class="second-text-two mt-4">
                                Our mission is to empower individuals with the tools and
                                resources needed to achieve their professional goals.
                            </p>
                            <button class="btn-login-navbar mt-3 w-auto" type="submit">
                                Start your amazing journey
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- section four is here  -->

        <div>
            <div class="mt-5 mb-5 pb-5 d-flex justify-content-center align-items-center flex-column">
                <div class="container four-background-image">
                    <div class="row section-four-row">
                        <div class="col-lg-3 col-md-6 col-12">
                            <div
                                class="white-background-card d-flex justify-content-center align-items-center flex-column card-one">
                                <i class="uil uil-book-open card-icons"></i>
                                <p class="card-text-one-white mt-4">Select the Program</p>
                                <p class="card-text-two-white m-0">
                                    Pick from a range of coding courses tailored to your child's
                                    grade and interests.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div
                                class="white-background-card d-flex justify-content-center align-items-center flex-column card-two">
                                <i class="uil uil-desktop card-icons"></i>
                                <p class="card-text-one-white mt-4">Begin the Journey</p>
                                <p class="card-text-two-white m-0">
                                    Enroll in the course and get instant access to engaging and
                                    interactive lessons.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div
                                class="white-background-card d-flex justify-content-center align-items-center flex-column card-one">
                                <i class="uil uil-smile card-icons"></i>
                                <p class="card-text-one-white mt-4">Hands-On Learning</p>
                                <p class="card-text-two-white m-0">
                                    Complete exercises and projects to apply coding concepts and
                                    build real-world skills.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div
                                class="white-background-card d-flex justify-content-center align-items-center flex-column card-two">
                                <i class="uil uil-users-alt card-icons"></i>
                                <p class="card-text-one-white mt-4">Expert Guidance</p>
                                <p class="card-text-two-white m-0">
                                    Receive support and feedback from experienced instructors to
                                    ensure smooth learning.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- section five is here  -->

        <div class="five-main-parent py-4 pb-5">
            <div class="container pb-5">
                <div class="pt-5">
                    <p class="five-main-heading">Comprehensive services</p>
                </div>
                <div>
                    <div class="row pt-5">
                        <!-- column one is here  -->
                        <div
                            class="col-lg-6 col-md-12 col-12 pb-3 d-flex justify-content-center align-items-center flex-column ">
                            <div class="white-background-card-two p-0 my-3">
                                <img src="{{ asset('/allAssets/Images/Rectangle 128.png')}}" class="w-100"
                                    style="object-fit: cover; border-radius: 16px 16px 0px 0px" alt="" />
                                <div class="py-4 px-5">
                                    <p class="blue-text mb-2">Expert Guidance</p>
                                    <p class="five-text-one">Career Advice</p>
                                    <p class="five-text-two">
                                        Access tips, articles, and advice from industry experts to
                                        navigate your career path. Learn about interview
                                        techniques, salary negotiation, and professional
                                        development.
                                    </p>
                                    <p class="five-text-two">
                                        Access tips, articles, and advice from industry experts to
                                        navigate your career path.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="white-background-card-two p-0 my-3 h-100 d-flex justify-content-start align-items-center">
                                <div class="py-4 px-5">
                                    <p class="five-main-heading text-start w-75">
                                        Be a part of the community.
                                    </p>
                                    <p class="five-text-two">
                                        Signup now and create your free account.
                                    </p>
                                    <button class="btn btn-outline">
                                        Start your amazing journey
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- column Two is here  -->
                        <div class="col-lg-6 col-md-12 col-12 pb-3">
                            <div class="d-flex flex-row gap-4 justify-content-center align-items-start gallery-cards">
                                <div class="white-background-card-three p-0 my-3 h-100"
                                    style="height: 100% !important">
                                    <div class="py-5 px-3 h-100" style="height: 100% !important">
                                        <p class="blue-text mb-2">Hire the Best</p>
                                        <p class="five-text-one">Employer Services</p>
                                        <p class="five-text-two">
                                            Post job openings and search our extensive database for
                                            qualified candidates. Utilize our advanced filtering
                                            options to find the best talent for your company.
                                        </p>
                                    </div>
                                </div>
                                <div class="white-background-card-three p-0 my-3 h-100">
                                    <div class="py-5 px-3 h-100">
                                        <p class="blue-text mb-2">Find Your Next Job</p>
                                        <p class="five-text-one">Job Listings</p>
                                        <p class="five-text-two">
                                            Explore thousands of job listings across various
                                            industries and locations. Filter by job type, location,
                                            and experience level to find the perfect match.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row gap-4 justify-content-center align-items-start">
                                <div class="white-background-card-three p-0 my-2 h-100"
                                    style="height: 100% !important">
                                    <div class="py-5 px-3 h-100" style="height: 100% !important">
                                        <p class="blue-text mb-2">Craft Your Resume</p>
                                        <p class="five-text-one">Resume Building</p>
                                        <p class="five-text-two">
                                            Use our intuitive tools and templates to create a
                                            standout professional resume that highlights your skills
                                            and experience. Get tips for each section to make your
                                            resume shine.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-row gap-4 justify-content-center align-items-start gallery-cards">
                                <div class="white-background-card-three py-4 mb-2 my-3 h-100"
                                    style="height: 100% !important">
                                    <img src="{{ asset('/allAssets/Images/Rectangle 129.png')}}" class="w-100"
                                        style="
                        object-fit: cover;
                        border-radius: 16px 16px 0px 0px;
                      "
                                        alt="" />
                                    <div class="pt-3">
                                        <p class="blue-text mb-2">Build Connections</p>
                                        <p class="five-text-one">Networking Opportunities</p>
                                        <p class="five-text-two m-0">
                                            Connect with professionals and grow your network.
                                        </p>
                                    </div>
                                </div>
                                <div class="white-background-card-three py-4 mb-2 my-3 h-100"
                                    style="height: 100% !important">
                                    <img src="{{ asset('/allAssets/Images/Rectangle 130.png')}}" class="w-100"
                                        style="
                        object-fit: cover;
                        border-radius: 16px 16px 0px 0px;
                      "
                                        alt="" />
                                    <div class="pt-3">
                                        <p class="blue-text mb-2">Enhance Skills</p>
                                        <p class="five-text-one">New Skill Development</p>
                                        <p class="five-text-two m-0">
                                            Take courses to improve and expand your skill set.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- section six is here  -->

        <div class="key-feature-main-parent">
            <div class="container py-5 my-5">
                <div class="row section-six-row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div>
                            <div class="tab-content mt-3" id="myTabContent">
                                <div class="tab-pane fade show active" id="tab1" role="tabpanel"
                                    aria-labelledby="tab1-tab">
                                    <div class="tabs-main-parent-current">
                                        <div class="image-div-one">
                                            <img src="{{ asset('/allAssets/Images/Rectangle 127.png')}}" alt="" />
                                        </div>
                                        <div class="p-3 stroke-main-div">
                                            <p class="stoke-text">01</p>
                                            <p class="stroke-text-two">Engaging Content</p>
                                            <p class="stroke-text-three">
                                                Learn coding through interactive and engaging lessons
                                                designed to keep students motivated.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab2" role="tabpanel"
                                    aria-labelledby="tab2-tab">
                                    <div class="tabs-main-parent-current">
                                        <div class="image-div-one">
                                            <img src="{{ asset('/allAssets/Images/Rectangle 127.png')}}" alt="" />
                                        </div>
                                        <div class="p-3 stroke-main-div">
                                            <p class="stoke-text">02</p>
                                            <p class="stroke-text-two">Engaging Content</p>
                                            <p class="stroke-text-three">
                                                Learn coding through interactive and engaging lessons
                                                designed to keep students motivated.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab3" role="tabpanel"
                                    aria-labelledby="tab3-tab">
                                    <div class="tabs-main-parent-current">
                                        <div class="image-div-one">
                                            <img src="{{ asset('/allAssets/Images/Rectangle 127.png')}}" alt="" />
                                        </div>
                                        <div class="p-3 stroke-main-div">
                                            <p class="stoke-text">03</p>
                                            <p class="stroke-text-two">Engaging Content</p>
                                            <p class="stroke-text-three">
                                                Learn coding through interactive and engaging lessons
                                                designed to keep students motivated.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab4" role="tabpanel"
                                    aria-labelledby="tab4-tab">
                                    <div class="tabs-main-parent-current">
                                        <div class="image-div-one">
                                            <img src="{{ asset('/allAssets/Images/Rectangle 127.png')}}" alt="" />
                                        </div>
                                        <div class="p-3 stroke-main-div">
                                            <p class="stoke-text">04</p>
                                            <p class="stroke-text-two">Engaging Content</p>
                                            <p class="stroke-text-three">
                                                Learn coding through interactive and engaging lessons
                                                designed to keep students motivated.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-lg-6 col-md-12 col-12 d-flex justify-content-center align-items-center h-100 button-tabs-here">
                        <div>
                            <div>
                                <p class="feature-text-one">
                                    Key Features for Effective Learning
                                </p>
                                <p class="feature-text-two">
                                    Our platform offers engaging lessons, real-world projects,
                                    personalized learning paths, and progress tracking to ensure
                                    comprehensive coding education.
                                </p>
                            </div>
                            <ul class="nav nav-button-tabs d-flex flex-column justify-content-center align-items-center gap-3 mt-4"
                                id="myTab" role="tablist">
                                <li class="nav-item w-100" role="presentation">
                                    <button
                                        class="nav-link w-100 d-flex flex-row gap-3 px-4 justify-content-start align-items-center active"
                                        id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1" type="button"
                                        role="tab" aria-controls="tab1" aria-selected="true">
                                        <p class="m-0 tabs-text">01</p>
                                        <p class="m-0 tabs-text">Engaging Content</p>
                                    </button>
                                </li>
                                <li class="nav-item w-100" role="presentation">
                                    <button
                                        class="nav-link w-100 d-flex flex-row gap-3 px-4 justify-content-start align-items-center"
                                        id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2" type="button"
                                        role="tab" aria-controls="tab2" aria-selected="false">
                                        <p class="m-0 tabs-text">02</p>
                                        <p class="m-0 tabs-text">Engaging Content</p>
                                    </button>
                                </li>
                                <li class="nav-item w-100" role="presentation">
                                    <button
                                        class="nav-link w-100 d-flex flex-row gap-3 px-4 justify-content-start align-items-center"
                                        id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3" type="button"
                                        role="tab" aria-controls="tab3" aria-selected="false">
                                        <p class="m-0 tabs-text">03</p>
                                        <p class="m-0 tabs-text">Engaging Content</p>
                                    </button>
                                </li>
                                <li class="nav-item w-100" role="presentation">
                                    <button
                                        class="nav-link w-100 d-flex flex-row gap-3 px-4 justify-content-start align-items-center"
                                        id="tab4-tab" data-bs-toggle="tab" data-bs-target="#tab4" type="button"
                                        role="tab" aria-controls="tab4" aria-selected="false">
                                        <p class="m-0 tabs-text">04</p>
                                        <p class="m-0 tabs-text">Engaging Content</p>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- section seven is here  -->

        <div class="section-seven-main-div">
            <div class="container py-3">
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-12">
                        <p class="seven-heading">Get answers to your questions</p>
                    </div>
                    <div class="col-md-8 col-sm-12 col-12">
                        <div class="accordion-main-parent">
                            <div class="accordion border-0" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            <div class="d-flex justify-content-start align-items-center gap-3">
                                                <p class="m-0">01</p>
                                                <p class="m-0">Engaging Content</p>
                                            </div>
                                            <i class="icon float-end"></i>
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>It is shown by default, until the collapse plugin adds
                                                the appropriate classes that we use to style each
                                                element. These classes control the overall appearance,
                                                as well as the showing and hiding via CSS transitions.
                                                You can modify any of this with custom CSS or overriding
                                                our default variables. It's also worth noting that just
                                                about any HTML can go within the</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            <div class="d-flex justify-content-start align-items-center gap-3">
                                                <p class="m-0">02</p>
                                                <p class="m-0">Engaging Content</p>
                                            </div>
                                            <i class="icon float-end"></i>
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>It is shown by default, until the collapse plugin adds
                                                the appropriate classes that we use to style each
                                                element. These classes control the overall appearance,
                                                as well as the showing and hiding via CSS transitions.
                                                You can modify any of this with custom CSS or overriding
                                                our default variables. It's also worth noting that just
                                                about any HTML can go within the</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            <div class="d-flex justify-content-start align-items-center gap-3">
                                                <p class="m-0">03</p>
                                                <p class="m-0">Engaging Content</p>
                                            </div>
                                            <i class="icon float-end"></i>
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>It is shown by default, until the collapse plugin adds
                                                the appropriate classes that we use to style each
                                                element. These classes control the overall appearance,
                                                as well as the showing and hiding via CSS transitions.
                                                You can modify any of this with custom CSS or overriding
                                                our default variables. It's also worth noting that just
                                                about any HTML can go within the</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                            aria-expanded="false" aria-controls="collapseFour">
                                            <div class="d-flex justify-content-start align-items-center gap-3">
                                                <p class="m-0">04</p>
                                                <p class="m-0">Engaging Content</p>
                                            </div>
                                            <i class="icon float-end"></i>
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse"
                                        aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>It is shown by default, until the collapse plugin adds
                                                the appropriate classes that we use to style each
                                                element. These classes control the overall appearance,
                                                as well as the showing and hiding via CSS transitions.
                                                You can modify any of this with custom CSS or overriding
                                                our default variables. It's also worth noting that just
                                                about any HTML can go within the</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- section eight is here  -->


        <div class="eight-main-div py-5">
            <div class="container banner-gredient my-5">
                <p class="banner-text-one">Get started for free</p>
                <p class="banner-text-two pt-3">Sign up now and access our basic features at no cost. Start exploring
                    job listings, building your resume, and accessing career advice immediately.</p>
                <button class="btn-banner-white mt-3">Start your amazing journey</button>
            </div>
        </div>



        <!-- section footer is here  -->

        <div class="footer-main-parent">
            <footer class="text-white">
                <div class="container d-flex justify-content-center align-items-center">
                    <div class="row w-100 footer-row pt-5">
                        <!-- Column 1 -->
                        <div class="col-lg-4 col-md-12 col-12 mx-auto mb-4">
                            <img src="{{ asset('/allAssets/Images/Jobes-logo.png')}}" alt="" />
                        </div>

                        <!-- Column 2 -->
                        <div class="col-lg-2 col-sm-6 col-6 mx-auto mb-4">
                            <h6 class="footer-heading">Information</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto"
                                style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p><a href="#" class="footer-text-link">About Us</a></p>
                            <p><a href="#" class="footer-text-link">Our Blogs</a></p>
                            <p><a href="#" class="footer-text-link">Features</a></p>
                            <p><a href="#" class="footer-text-link">Teams</a></p>
                        </div>

                        <!-- Column 3 -->
                        <div class="col-lg-2 col-sm-6 col-6 mx-auto mb-4">
                            <h6 class="footer-heading">Useful Links</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto"
                                style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p><a href="#" class="footer-text-link">My Account</a></p>
                            <p><a href="#" class="footer-text-link">Shipping</a></p>
                            <p><a href="#" class="footer-text-link">Contact & Support</a></p>
                            <p><a href="#" class="footer-text-link">All Products</a></p>
                        </div>

                        <!-- Column 4 -->
                        <div class="col-lg-2 col-sm-6 col-6 mx-auto mb-4">
                            <h6 class="footer-heading">Inspirations</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto"
                                style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p><a href="#" class="footer-text-link">My Account</a></p>
                            <p><a href="#" class="footer-text-link">Shipping</a></p>
                            <p><a href="#" class="footer-text-link">Contact & Support</a></p>
                            <p><a href="#" class="footer-text-link">All Products</a></p>
                        </div>

                        <!-- Column 5 -->
                        <div class="col-lg-2 col-sm-6 col-6 mx-auto mb-4">
                            <h6 class="footer-heading">Industries</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto"
                                style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p><a href="#" class="footer-text-link">My Account</a></p>
                            <p><a href="#" class="footer-text-link">Shipping</a></p>
                            <p><a href="#" class="footer-text-link">Contact & Support</a></p>
                            <p><a href="#" class="footer-text-link">All Products</a></p>
                        </div>
                    </div>
                </div>

                <div class="container py-5 d-flex flex-wrap justify-content-between align-items-center">
                    <div class="d-flex flex-row justify-content-center align-items-center">
                        <p class="text-dark footer-text-bottom px-3 m-0">Terms & Conditions</p>
                        <p class="text-dark footer-text-bottom px-3 m-0 border-0">Privacy Policy</p>
                    </div>
                    <img src="{{ asset('/allAssets/Images/last-image.png')}}" style="width: 25vw;" alt=""
                        class="footer-banner-image px-3">
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    {{-- <script src="./index.js"></script> --}}
    <script src="{{ asset('allAssets/home.js') }}"></script>

</body>

</html>
