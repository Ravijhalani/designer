@extends('frontend.Layouts.main')

@section('content')
    @push('css')
        <link rel="stylesheet" href="{{ asset('allAssets/services.css') }}" />
    @endpush
    <!---------------------content starts from here------------------>
    <div class="m-4 form-main-parent px-3 py-3 over-flow-class-all">
        <div class="p-0 m-0 d-flex justify-content-between align-items-center">
            <p class="form-main-heading mb-3">Services</p>
            <a href="{{ route('service.add') }}" class="add-more-button mb-3">Add more +</a>
        </div>
        <hr class="p-0 m-0" />
        <div>
            <p class="form-main-heading-two">Categories</p>

            <!-- drop down for mobile section -->
            <div class="dropdown">
                <p>
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        All Categories
                    </button>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <div class="container p-0 m-0">
                            <ul class="nav nav-tabs gap-2" id="myTab" role="tablist">
                                <li class="crousel-text-parent my-0 nav-item" role="presentation">
                                    <button class="crousel-text nav-link active my-1 btn" id="tab-one"
                                        data-bs-toggle="tab" data-bs-target="#one" type="button" role="tab"
                                        aria-controls="one" aria-selected="true">Job & Referral</button>
                                </li>
                                <li class="crousel-text-parent my-0 nav-item" role="presentation">
                                    <button class="crousel-text nav-link my-0 btn" id="tab-two" data-bs-toggle="tab"
                                        data-bs-target="#two" type="button" role="tab" aria-controls="two"
                                        aria-selected="false">Profile</button>
                                </li>
                                <li class="crousel-text-parent my-0 nav-item" role="presentation">
                                    <button class="crousel-text nav-link my-0 btn" id="tab-three" data-bs-toggle="tab"
                                        data-bs-target="#three" type="button" role="tab" aria-controls="three"
                                        aria-selected="false">Contact</button>
                                </li>
                                <li class="crousel-text-parent my-0 nav-item" role="presentation">
                                    <button disabled class="crousel-text nav-link my-0 btn" id="tab-three"
                                        data-bs-toggle="tab" data-bs-target="#three" type="button" role="tab"
                                        aria-controls="three" aria-selected="false">Contact</button>
                                </li>
                                <li class="crousel-text-parent my-0 nav-item" role="presentation">
                                    <button disabled class="crousel-text nav-link my-0 btn" id="tab-three"
                                        data-bs-toggle="tab" data-bs-target="#three" type="button" role="tab"
                                        aria-controls="three" aria-selected="false">Contact</button>
                                </li>
                                <li class="crousel-text-parent my-0 nav-item" role="presentation">
                                    <button disabled class="crousel-text nav-link my-0 btn" id="tab-three"
                                        data-bs-toggle="tab" data-bs-target="#three" type="button" role="tab"
                                        aria-controls="three" aria-selected="false">Contact</button>
                                </li>
                                <li class="crousel-text-parent my-0 nav-item" role="presentation">
                                    <button disabled class="crousel-text nav-link my-0 btn" id="tab-three"
                                        data-bs-toggle="tab" data-bs-target="#three" type="button" role="tab"
                                        aria-controls="three" aria-selected="false">Contact</button>
                                </li>
                                <li class="crousel-text-parent my-0 nav-item" role="presentation">
                                    <button disabled class="crousel-text nav-link my-0 btn" id="tab-three"
                                        data-bs-toggle="tab" data-bs-target="#three" type="button" role="tab"
                                        aria-controls="three" aria-selected="false">Contact</button>
                                </li>
                                <li class="crousel-text-parent my-0 nav-item" role="presentation">
                                    <button class="crousel-text nav-link my-1 btn" id="tab-four" data-bs-toggle="tab"
                                        data-bs-target="#four" type="button" role="tab" aria-controls="four"
                                        aria-selected="true">Job & Referral</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- --------------------crousel from here------------------ -->

            <div id="carouselExampleControls" class="carousel slide crousel-main-parent">
                <div class="carousel-inner px-3">
                    <div class="carousel-item active">
                        <div class="d-flex gap-3 flex-wrap">
                            <div class="container">
                                <ul class="nav nav-tabs gap-3" id="myTab" role="tablist">
                                    <li class="crousel-text-parent my-0 nav-item" role="presentation">
                                        <button class="crousel-text nav-link active my-1 btn" id="tab-one"
                                            data-bs-toggle="tab" data-bs-target="#one" type="button" role="tab"
                                            aria-controls="one" aria-selected="true">Job & Referral</button>
                                    </li>
                                    <li class="crousel-text-parent my-0 nav-item" role="presentation">
                                        <button class="crousel-text nav-link my-0 btn" id="tab-two"
                                            data-bs-toggle="tab" data-bs-target="#two" type="button" role="tab"
                                            aria-controls="two" aria-selected="false">Profile</button>
                                    </li>
                                    <li class="crousel-text-parent my-0 nav-item" role="presentation">
                                        <button class="crousel-text nav-link my-0 btn" id="tab-three"
                                            data-bs-toggle="tab" data-bs-target="#three" type="button" role="tab"
                                            aria-controls="three" aria-selected="false">Contact</button>
                                    </li>
                                    <li class="crousel-text-parent my-0 nav-item" role="presentation">
                                        <button disabled class="crousel-text nav-link my-0 btn" id="tab-three"
                                            data-bs-toggle="tab" data-bs-target="#three" type="button" role="tab"
                                            aria-controls="three" aria-selected="false">Contact</button>
                                    </li>
                                    <li class="crousel-text-parent my-0 nav-item" role="presentation">
                                        <button disabled class="crousel-text nav-link my-0 btn" id="tab-three"
                                            data-bs-toggle="tab" data-bs-target="#three" type="button" role="tab"
                                            aria-controls="three" aria-selected="false">Contact</button>
                                    </li>
                                    <li class="crousel-text-parent my-0 nav-item" role="presentation">
                                        <button disabled class="crousel-text nav-link my-0 btn" id="tab-three"
                                            data-bs-toggle="tab" data-bs-target="#three" type="button" role="tab"
                                            aria-controls="three" aria-selected="false">Contact</button>
                                    </li>
                                    <li class="crousel-text-parent my-0 nav-item" role="presentation">
                                        <button disabled class="crousel-text nav-link my-0 btn" id="tab-three"
                                            data-bs-toggle="tab" data-bs-target="#three" type="button" role="tab"
                                            aria-controls="three" aria-selected="false">Contact</button>
                                    </li>
                                    <li class="crousel-text-parent my-0 nav-item" role="presentation">
                                        <button disabled class="crousel-text nav-link my-0 btn" id="tab-three"
                                            data-bs-toggle="tab" data-bs-target="#three" type="button" role="tab"
                                            aria-controls="three" aria-selected="false">Contact</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-flex gap-3 flex-wrap">
                            <div class="container">
                                <ul class="nav nav-tabs gap-3" id="myTab" role="tablist">
                                    <li class="crousel-text-parent my-0 nav-item" role="presentation">
                                        <button class="crousel-text nav-link my-1 btn" id="tab-four"
                                            data-bs-toggle="tab" data-bs-target="#four" type="button" role="tab"
                                            aria-controls="four" aria-selected="true">Job & Referral</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev d-flex justify-content-start" type="button"
                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="crousel-icon" aria-hidden="true">◀︎</span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next d-flex justify-content-end" type="button"
                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="crousel-icon" aria-hidden="true">►</span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <!-- --------------------ends here------------------ -->
        </div>
        <div class="row">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="one" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        @forelse ($data as $key=>$item)
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12 pt-3">
                                <div class="card-white px-3 py-3">
                                    <div class="d-flex flex-row justify-content-between align-items-start flex-wrap">
                                        <div>
                                            <p class="cards-main-heading m-0">Information Technology</p>
                                            <p class="cards-main-heading-two">{{ $item['company']['name'] }}</p>
                                        </div>
                                        <div class="d-flex justify-content-end align-items-start gap-2 flex-wrap mt-2">
                                            <p class="status-text m-0">{{ $item['job_location_type'] }}</p>
                                            <i class="uil uil-ellipsis-v"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                            <p class="cards-main-heading-two">Designation</p>
                                            <p class="cards-main-heading m-0">{{ $item['designation']['name'] }}</p>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                            <p class="cards-main-heading-two">Experience</p>
                                            <p class="cards-main-heading m-0">{{ $item['experience_years'] }} Years</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div
                                            class="d-flex flex-column justify-content-center align-items-start w-100 mt-4">
                                            <p class="cards-main-heading-two">Description</p>
                                            <p class="cards-main-heading m-0">{{ $item['description'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No service available</p>
                        @endforelse

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('allAssets/servicesList.js') }}"></script>
@endpush
