@extends('frontend.Layouts.main')

@section('content')
    @push('css')
        <link rel="stylesheet" href="{{ asset('allAssets/profileDetailed.css') }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @endpush
    <style>
.reviews-container {
    max-height: 400px; /* Adjust the height as needed */
    overflow-y: auto;
}
        </style>
    <div class="inner-panel-parent d-flex flex-column mt-3 pt-3 over-flow-class">
        <div class="m-4 mt-1 inner-panel-content w-100 px-3">
            <div class="top-head">
                <div class="mt-4 d-flex justify-content-start align-items-center">
                    <i class="uil uil-angle-left fs-4 m-0 p-0"></i>
                    <p class="fs-5 fw-bold m-0">Jobs</p>
                </div>
                <hr class="mt-3" />
            </div>

            <div>
                <div class="img-container">
                    <img class="w-100" style="height: 237px; border-radius: 8px;"
                        src="https://services.businesswire.com/hs-fs/hubfs/request-demo-header-min.jpg?width=1600&name=request-demo-header-min.jpg"
                        alt="">
                </div>
                <div style="width: 100%;" class="d-flex justify-content-center align-items-center">
                    <div class="card-white px-3 py-3" style="width: 90%;">
                        <div class="d-flex flex-row justify-content-between align-items-center flex-wrap">
                            <div class="d-flex justify-content-center align-items-center gap-2 mt-2">
                                <div class="image-div">
                                    <img src="https://static.vecteezy.com/system/resources/previews/004/991/321/original/picture-profile-icon-male-icon-human-or-people-sign-and-symbol-vector.jpg"
                                        style="height: 100px;;" alt="company-logos">
                                </div>

                                <div>
                                    <p class="cards-main-heading m-0">
                                        {{ ucfirst($mentorDetails['first_name']) ?? '' . ' ' . ucfirst($mentorDetails['last_name']) ?? '' }}</p>
                                    <div class="d-flex justify-content-start align-items-center flex-wrap my-1 mb-2">
                                        <div class="d-flex justify-content-start align-items-center gap-2 border-end pe-2">
                                            <i class="uil  uil-location-point cards-main-heading fs-5"></i>
                                            <p class="job-tipe m-0">{{ $mentorDetails['job_place'] ?? 'N/A' }}</p>
                                        </div>
                                        <div class="d-flex justify-content-start align-items-center gap-2 px-2">
                                            <i class="uil uil-cube cards-main-heading fs-5"></i>
                                            <p class="job-tipe m-0">{{ $mentorDetails['desigation'] ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center gap-3">
                                <div class="d-flex justify-content-center align-items-center flex-wrap">
                                    <div class="d-flex flex justify-content-center align-items-center gap-2 pe-3 mt-2"
                                        style="border-right: 1px solid rgb(204, 204, 204);">
                                        <svg style="color: #F2A93B;" xmlns="http://www.w3.org/2000/svg" width="1em"
                                            height="1em" viewBox="0 0 15 15">
                                            <path fill="currentColor"
                                                d="M7.948.779a.5.5 0 0 0-.896 0L5.005 4.926l-4.577.665a.5.5 0 0 0-.277.853l3.312 3.228l-.782 4.559a.5.5 0 0 0 .725.527L7.5 12.605l4.094 2.153a.5.5 0 0 0 .725-.527l-.782-4.56l3.312-3.227a.5.5 0 0 0-.277-.853l-4.577-.665z" />
                                        </svg>
                                        <p class="text-secondary fw-bold mb-0">4.5</p>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center gap-2 pe-3 mt-2"
                                        style="color: #1D60FC;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor" fill-rule="evenodd"
                                                d="M15.418 5.643a1.25 1.25 0 0 0-1.34-.555l-1.798.413a1.25 1.25 0 0 1-.56 0l-1.798-.413a1.25 1.25 0 0 0-1.34.555l-.98 1.564c-.1.16-.235.295-.395.396l-1.564.98a1.25 1.25 0 0 0-.555 1.338l.413 1.8a1.25 1.25 0 0 1 0 .559l-.413 1.799a1.25 1.25 0 0 0 .555 1.339l1.564.98c.16.1.295.235.396.395l.98 1.564c.282.451.82.674 1.339.555l1.798-.413a1.25 1.25 0 0 1 .56 0l1.799.413a1.25 1.25 0 0 0 1.339-.555l.98-1.564c.1-.16.235-.295.395-.395l1.565-.98a1.25 1.25 0 0 0 .554-1.34L18.5 12.28a1.25 1.25 0 0 1 0-.56l.413-1.799a1.25 1.25 0 0 0-.554-1.339l-1.565-.98a1.25 1.25 0 0 1-.395-.395zm-.503 4.127a.5.5 0 0 0-.86-.509l-2.615 4.426l-1.579-1.512a.5.5 0 1 0-.691.722l2.034 1.949a.5.5 0 0 0 .776-.107z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <p class="fw-bold mb-0">Verified</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-8 col-sm-12 border-end">
                        <div>
                            <p class="fs-5 fw-bold mb-2">About {{ $mentorDetails['first_name'] ?? '' }}</p>
                            <p class="fs-6 fw-light text-secondary">{{ $mentorDetails['career_objective'] ?? '' }}.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <p class="fs-5 fw-bold mb-2">Company overview</p>

                        <div class="d-flex justify-content-between align-items-center">
                            <p class="fs-6 text-secondary">Member since</p>
                            <p class="fs-6">April 2024</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="fs-6 text-secondary">Member size</p>
                            <p class="fs-6">1000-1500</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="fs-6 text-secondary">Completed jobs</p>
                            <p class="fs-6">100+</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="fs-6 text-secondary">Last job posted</p>
                            <p class="fs-6">10 days ago</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <i class="uil  uil-globe cards-main-heading fs-5"></i>
                                <p class="job-tipe m-0">Jaipur, Rajasthan</p>
                            </div>
                            <div class="d-flex justify-content-center align-items-center gap-2 me-4">
                                <p class="job-tipe cards-main-heading fs-6 fw-normal m-0">www.metacube.com</p>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <i class="uil uil-share-alt cards-main-heading fs-5"></i>
                                <p class="job-tipe m-0">Social profiles</p>
                            </div>
                            <div class="d-flex justify-content-center align-items-center gap-2 me-4">
                                <i class="uil uil-facebook-f fs-6 fw-lighter cards-down-icon-social"></i>
                                <i class="uil uil-instagram fs-6 fw-lighter cards-down-icon-social"></i>
                                <i class="uil uil-twitter-alt fs-6 fw-lighter cards-down-icon-social"></i>
                                <i class="uil uil-youtube fs-6 fw-lighter cards-down-icon-social"></i>
                                <!-- <i class="uil uil-twitter-alt fs-5 fw-lighter cards-down-icon-social"></i> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="m-4 pb-4 pt-3 inner-panel-content w-100 px-3">
            <div class="mt-3">
                <p class="fs-5 fw-bold mb-2">Specializations</p>
            </div>



            @php

                $uniqueSkills = [];

                foreach ($mentorDetails['professional_experiences'] as $experience) {
                    foreach ($experience['skills'] as $skill) {
                        $skillName = $skill['skill']['name'];

                        if (!in_array($skillName, $uniqueSkills)) {
                            $uniqueSkills[] = $skillName;
                        }
                    }
                }

                sort($uniqueSkills);

            @endphp




            <div class="row">
                @foreach ($uniqueSkills as $skills)
                    <div class="col-md-3 col-sm-6 col-12 pt-3">
                        <div class="d-flex gap-2">
                            <div>
                                <i class="uil uil-puzzle-piece fs-4 fw-lighter cards-down-icon"></i>
                            </div>
                            <div>
                                <p class="cards-main-heading fs-5 m-0">{{ $skills }}</p>
                                <p class="fs-7 text-secondary fw-light">Creative design is a process that involves creating
                                    cool designs</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>



        <div class="w-100">
            <div class="row mx-2 row-cols-md-2">
                <div class="col my-2">
                    <div class="inner-panel-content-two w-100 p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="fs-5 fw-bold mb-2">Education</p>
                            <i class="uil uil-edit text-primary fs-5"></i>
                        </div>

                        @foreach ($mentorDetails['educations'] as $value)
                            <div class="mt-3 d-flex justify-content-start align-items-center gap-3">
                                <div class="singleDot mx-3"></div>
                                <div>
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVLOZAQuYyKgCakRUkGS_JO4DfPUuf_j82qQ&s"
                                        class="logo-image" alt="">
                                </div>
                                <div>
                                    <p class="cards-main-heading fs-5 m-0">{{ $value['degree']['name'] }}</p>
                                    <div class="d-flex justify-content-start align-items-center">
                                        {{-- <i class="uil uil-edit text-primary fs-5"></i> --}}
                                        <p class="m-0 gap-2">{{ $value['school']['name'] }}</p>
                                    </div>
                                    <p class="fs-7 text-secondary fw-light m-0">{{ $value['start_date'] }} -
                                        {{ $value['end_date'] }} || {{ $value['field_of_study']['name'] }}</p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="col my-2">
                    <div class="inner-panel-content-two w-100 p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="fs-5 fw-bold mb-2">Profession</p>
                            <i class="uil uil-edit text-primary fs-5"></i>
                        </div>
                        @foreach ($mentorDetails['professional_experiences'] as $value)
                            <div class="mt-3 d-flex justify-content-start align-items-center gap-3">
                                <div class="singleDot mx-3"></div>
                                <div>
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVLOZAQuYyKgCakRUkGS_JO4DfPUuf_j82qQ&s"
                                        class="logo-image" alt="">
                                </div>
                                <div>
                                    <p class="cards-main-heading fs-5 m-0">{{ $value['company']['name'] }}</p>
                                    <div class="d-flex justify-content-start align-items-center">

                                        <p class="m-0 gap-2">{{ $value['designation']['name'] }}</p>
                                    </div>
                                    <p class="fs-7 text-secondary fw-light m-0">{{ $value['start_date'] }} -
                                        {{ $value['end_date'] }} || {{ $value['employment_type'] }}</p>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>



            </div>
        </div>

        <div class="m-4 mt-4 pb-4 pt-3 inner-panel-content w-100 px-3">
            <div class="mt-3">
                <p class="fs-5 fw-bold mb-2">Services offered</p>
            </div>
            <div class="row">
                @foreach ($mentorDetails['services'] as $value)
                    <div class="col-md-6 col-sm-6 col-12 pt-3">
                        <!-- card -->
                        <div class="white-background-card px-3 py-3">
                            <div class="d-flex flex-row justify-content-between align-items-center flex-wrap">
                                <div class="d-flex justify-content-start align-items-start gap-2 mt-2">
                                    <div class="image-div">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR5zHNiL1--BcZmbBLoTKT08ri5488_Th6hYQ&s"
                                            alt="company-logos" style="height:50px;">
                                    </div>
                                    <div>
                                        <p class="cards-main-heading m-0">
                                            {{ str_replace('_', ' ', $value['service_category']) }}</p>
                                        <p class="cards-main-heading-two">{{ $value['company']['name'] ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="cards-down-icon">
                                    <i class="uil uil-bookmark-full fs-5 fw-lighter"></i>
                                    <p class="job-position m-0 fw-lighter">Save</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start align-items-center flex-wrap my-3">
                                <div class="d-flex justify-content-start align-items-center gap-2 border-end px-2">
                                    <i class="uil uil-clock"></i>
                                    <p class="job-tipe m-0">{{ $value['duration'] }} Minutes</p>
                                </div>
                                <div class="d-flex justify-content-start align-items-center gap-2 border-end px-2">
                                    <i class="uil uil-apps"></i>
                                    <p class="job-tipe m-0">{{ str_replace('_', ' ', $value['service_category']) }}</p>
                                </div>
                                <div class="d-flex justify-content-start align-items-center gap-2 border-end px-2">
                                    <i class="uil uil-bag"></i>
                                    <p class="job-tipe m-0">{{ $value['job_location_type'] }}</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start align-items-center my-3">
                                <div class="d-flex justify-content-start align-items-center gap-2 px-2">
                                    <p class="job-tipe m-0">{{ $value['description'] ?? '' }}</p>
                                </div>
                            </div>
                            <div class="text-warning mb-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <div class="d-flex justify-content-start align-items-center my-3 flex-wrap gap-2">
                                <!-- Review, Details, and Share Buttons -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#reviewModal{{ $value['id'] }}">Review</button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#detailsModal{{ $value['id'] }}">Details</button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#shareModal{{ $value['id'] }}">Share</button>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-4 mb-2">
                                <div class="d-flex justify-content-between w-100 align-items-center gap-2 px-2">
                                    <p class="job-tipe m-0 fw-lighter">1 Day Ago</p>
                                    <a href="{{route('booking.service',['service'=>base64_encode($value['id'])])}}" class="btn btn-primary text-decoration-none">Price:
                                        ₹ {{ number_format($value['amount'], 2) }}</a>
                                </div>
                            </div>
                        </div>
                        <!-- card  -->
                    </div>

                    <!-- Review Modal -->
                    <div class="modal fade bd-example-modal-lg" id="reviewModal{{ $value['id'] }}" tabindex="-1"
                        aria-labelledby="reviewModalLabel" aria-hidden="true">

                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="reviewModalLabel">Users Reviews</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Reviews Container -->
                                    <div class="reviews-container">
                                        <!-- Review 1 -->
                                        <div class="review-item d-flex align-items-start mb-4 p-3 border rounded shadow-sm">
                                            <!-- User Image -->
                                            <img src="https://static.vecteezy.com/system/resources/previews/004/991/321/original/picture-profile-icon-male-icon-human-or-people-sign-and-symbol-vector.jpg"
                                                alt="John Doe" class="rounded-circle me-3"
                                                style="width: 70px; height: 70px; object-fit: cover;">
                                            <div>
                                                <!-- User Name and Rating -->
                                                <h5 class="mb-1 text-dark">John Doe</h5>
                                                <div class="text-warning mb-2">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                                <!-- Review Description -->
                                                <p class="mb-0 text-muted">"Great service! Highly recommended. The staff was very friendly and the process was smooth and efficient."</p>
                                            </div>
                                        </div>

                                        <!-- Review 2 -->
                                        <div class="review-item d-flex align-items-start mb-4 p-3 border rounded shadow-sm">
                                            <!-- User Image -->
                                            <img src="https://static.vecteezy.com/system/resources/previews/004/991/321/original/picture-profile-icon-male-icon-human-or-people-sign-and-symbol-vector.jpg"
                                                alt="Jane Smith" class="rounded-circle me-3"
                                                style="width: 70px; height: 70px; object-fit: cover;">
                                            <div>
                                                <!-- User Name and Rating -->
                                                <h5 class="mb-1 text-dark">Jane Smith</h5>
                                                <div class="text-warning mb-2">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <!-- Review Description -->
                                                <p class="mb-0 text-muted">"Good experience overall, but there’s room for improvement in customer support."</p>
                                            </div>
                                        </div>

                                        <!-- Review 3 -->
                                        <div class="review-item d-flex align-items-start mb-4 p-3 border rounded shadow-sm">
                                            <!-- User Image -->
                                            <img src="https://static.vecteezy.com/system/resources/previews/004/991/321/original/picture-profile-icon-male-icon-human-or-people-sign-and-symbol-vector.jpg"
                                                alt="Jane Smith" class="rounded-circle me-3"
                                                style="width: 70px; height: 70px; object-fit: cover;">
                                            <div>
                                                <!-- User Name and Rating -->
                                                <h5 class="mb-1 text-dark">Jane Smith</h5>
                                                <div class="text-warning mb-2">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <!-- Review Description -->
                                                <p class="mb-0 text-muted">"Good experience overall, but there’s room for improvement in customer support."</p>
                                            </div>
                                        </div>

                                        <!-- Review 4 -->
                                        <div class="review-item d-flex align-items-start mb-4 p-3 border rounded shadow-sm">
                                            <!-- User Image -->
                                            <img src="https://static.vecteezy.com/system/resources/previews/004/991/321/original/picture-profile-icon-male-icon-human-or-people-sign-and-symbol-vector.jpg"
                                                alt="Jane Smith" class="rounded-circle me-3"
                                                style="width: 70px; height: 70px; object-fit: cover;">
                                            <div>
                                                <!-- User Name and Rating -->
                                                <h5 class="mb-1 text-dark">Jane Smith</h5>
                                                <div class="text-warning mb-2">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <!-- Review Description -->
                                                <p class="mb-0 text-muted">"Good experience overall, but there’s room for improvement in customer support."</p>
                                            </div>
                                        </div>

                                        <!-- Review 5 -->
                                        <div class="review-item d-flex align-items-start mb-4 p-3 border rounded shadow-sm">
                                            <!-- User Image -->
                                            <img src="https://static.vecteezy.com/system/resources/previews/004/991/321/original/picture-profile-icon-male-icon-human-or-people-sign-and-symbol-vector.jpg"
                                                alt="Jane Smith" class="rounded-circle me-3"
                                                style="width: 70px; height: 70px; object-fit: cover;">
                                            <div>
                                                <!-- User Name and Rating -->
                                                <h5 class="mb-1 text-dark">Jane Smith</h5>
                                                <div class="text-warning mb-2">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <!-- Review Description -->
                                                <p class="mb-0 text-muted">"Good experience overall, but there’s room for improvement in customer support."</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <!-- Job Details Modal -->
                    <div class="modal fade bd-example-modal-lg" id="detailsModal{{ $value['id'] }}" tabindex="-1"
                        aria-labelledby="detailsModalLabel" aria-hidden="true">

                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="detailsModalLabel">Job Details</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Job Title -->
                                    <h4 class="text-dark mb-3"> {{ str_replace('_', ' ', $value['service_category']) }}</h4>


                                    <div class="mb-3">
                                        <strong>Company:</strong> <span class="text-muted">Tech Innovators Ltd.</span>
                                    </div>


                                    <div class="mb-3">
                                        <strong>Location:</strong> <span class="text-muted">New York, NY</span>
                                    </div>

                                    <!-- Salary -->
                                    <div class="mb-3">
                                        <strong>Salary:</strong> <span class="text-muted">$120,000 - $150,000 per
                                            year</span>
                                    </div>

                                    <!-- Job Description -->
                                    <div class="mb-3">
                                        <strong>Description:</strong>
                                        <p class="text-muted">
                                            We are looking for a skilled Senior Software Engineer to join our team. You will
                                            work on exciting projects, collaborate with a dynamic team, and contribute to
                                            innovative solutions.
                                        </p>
                                    </div>

                                    <!-- Requirements -->
                                    <div class="mb-3">
                                        <strong>Requirements:</strong>
                                        <ul class="text-muted">
                                            <li>5+ years of experience in software development</li>
                                            <li>Proficiency in JavaScript, Python, or Java</li>
                                            <li>Experience with cloud platforms like AWS or Azure</li>
                                            <li>Strong problem-solving skills</li>
                                        </ul>
                                    </div>

                                    <!-- Application Deadline -->
                                    <div class="mb-3">
                                        <strong>Application Deadline:</strong> <span class="text-muted">August 31,
                                            2024</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Share Modal -->
                    <div class="modal fade" id="shareModal{{ $value['id'] }}" tabindex="-1"
                        aria-labelledby="shareModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="shareModalLabel">Share</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Content for share options goes here -->
                                    <p>Here are the share options for the service.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('allAssets/profileDetailed.js') }}"></script>
@endpush
