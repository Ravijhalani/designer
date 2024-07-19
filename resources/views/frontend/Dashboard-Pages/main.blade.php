@extends('frontend.Layouts.main')

@section('content')
    @push('css')
        <link rel="stylesheet" href="{{ asset('allAssets/dashboard.css') }}" />
        <link rel="stylesheet" href="{{ asset('allAssets/style.css') }}" />

        <style>
            .action-btn.loading {
                color: transparent;
            }

            .action-btn.loading::after {
                opacity: 1;
            }

            .error,
            .errors,
            .required {
                color: red !important;
            }

            .primry-btn-2 {
                height: 100%;
                padding: 15px 30px;
            }

            .awesomplete {
                display: block !important;
            }


            .nice-select {
                width: 100%;
            }
        </style>
    @endpush
    <div class="mx-4 pt-3">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 col-12 over-flow-class-all" style="overflow: auto">
                <!-- tabs for form here  -->
                <ul class="nav nav-pills mb-3 d-flex flex-column" id="pills-tab" role="tablist">
                    <!-- ----------tab one----------- -->
                    <li class="nav-item" role="presentation">
                        <a href="#basic-information" class="nav-link active w-100 tab-parent-inner my-2" id="pills-one-tab"
                            data-bs-toggle="pill" data-bs-target="#pills-one" role="tab" aria-controls="pills-one"
                            aria-selected="true" onclick="activateTab(this)">
                            <div class="d-flex flex-row justify-content-start gap-3 align-items-center py-2 px-3">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <p class="text-white px-3 py-2 rounded m-0 count-tabs-number">
                                        1
                                    </p>
                                </div>
                                <div class="text-start">
                                    <p class="mb-0 tabs-text-one">Basic Information</p>
                                    <p class="mb-0 tabs-text-two">
                                        Enter your basic information
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <!-- -------------tab two ----------------- -->
                    <li class="nav-item" role="presentation">
                        <a href="#education-information" class="nav-link w-100 tab-parent-inner my-2" id="pills-two-tab"
                            data-bs-toggle="pill" data-bs-target="#pills-two" role="tab" aria-controls="pills-two"
                            aria-selected="false" onclick="activateTab(this)">
                            <div class="d-flex flex-row justify-content-start gap-3 align-items-center py-2 px-3">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <p class="text-white px-3 py-2 rounded m-0 count-tabs-number">
                                        2
                                    </p>
                                </div>
                                <div class="text-start">
                                    <p class="mb-0 tabs-text-one">Education</p>
                                    <p class="mb-0 tabs-text-two">
                                        Enter your education qualification
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <!-- --------------tab three------------- -->
                    <li class="nav-item" role="presentation">
                        <a href="#professional-information" class="nav-link w-100 tab-parent-inner my-2"
                            id="pills-three-tab" data-bs-toggle="pill" data-bs-target="#pills-three" role="tab"
                            aria-controls="pills-three" aria-selected="false" onclick="activateTab(this)">
                            <div class="d-flex flex-row justify-content-start gap-3 align-items-center py-2 px-3">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <p class="text-white px-3 py-2 rounded m-0 count-tabs-number">
                                        3
                                    </p>
                                </div>
                                <div class="text-start">
                                    <p class="mb-0 tabs-text-one">Professional information</p>
                                    <p class="mb-0 tabs-text-two">
                                        Enter your job information
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <!-- ----------------tab four ---------------- -->
                    <li class="nav-item" role="presentation">
                        <a href="#review-information" class="nav-link w-100 tab-parent-inner my-2" id="pills-foure-tab"
                            data-bs-toggle="pill" data-bs-target="#pills-four" role="tab" aria-controls="pills-four"
                            aria-selected="false" onclick="activateTab(this)">
                            <div class="d-flex flex-row justify-content-start gap-3 align-items-center py-2 px-3">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <p class="text-white px-3 py-2 rounded m-0 count-tabs-number">
                                        4
                                    </p>
                                </div>
                                <div class="text-start">
                                    <p class="mb-0 tabs-text-one">Review information</p>
                                    <p class="mb-0 tabs-text-two">
                                        Review all your information entered
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>


                </ul>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 col-12 p-0 over-flow-class-all" style="overflow: auto">
                <div class="tab-content my-2" id="pills-tabContent">

                    @include('frontend.dashboard-pages.basicInfo')
                    @include('frontend.dashboard-pages.education')
                    @include('frontend.dashboard-pages.professional')
                    @include('frontend.dashboard-pages.review')




                    <!-- ----------------tab content form four----------------- -->
                    <div class="tab-pane fade" id="pills-four" role="tabpanel" aria-labelledby="pills-three-tab">
                        This is Blank!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('allAssets/index.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <script>
        $(document).ready(function() {
            function activateTabFromHash() {
                var hash = window.location.hash;
                if (hash) {
                    $('.nav-link[href="' + hash + '"]').tab('show');
                }
            }

            // Activate tab on page load based on URL hash
            activateTabFromHash();

            // Activate tab on hash change
            window.addEventListener('hashchange', function() {
                activateTabFromHash();
            });

            // Change URL hash when tab is clicked
            $('a[data-bs-toggle="pill"]').on('shown.bs.tab', function(e) {
                var hash = $(e.target).attr('href');
                if (history.pushState) {
                    history.pushState(null, null, hash);
                } else {
                    window.location.hash = hash;
                }
            });
        });
    </script>

    @stack('education-js')
    @stack('professional-js')
@endpush
