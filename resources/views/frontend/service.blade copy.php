@extends('frontend.layout.header')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.18.0/tagify.css"
        integrity="sha512-SNbSEpyK7jz5R7yjTrilJOlK4sgtHMfZoNtERAd8VF6jj6fk0LdW4HT3RwOLYhZmKn4GRtsNCZfA8lJ/FmYfhw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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

        .tagify__dropdown {
            z-index: 9999 !important;
        }
    </style>

    @include('frontend.custom-assets.service.tabs-css')
@endpush

@section('content')



@section('content')
    <div class="dashboard-area pt-120 mb-120">
        <div class="container">
            <div class="row g-lg-4 gy-5 mb-90">
                <div class="col-lg-3">
                    <div class="dashboard-sidebar">
                        @include('frontend.dashboard-slider')
                    </div>
                </div>
                <div class="col-lg-9">

                    <div class="card category-listing-area pt-22">
                        <div class="card-body container">
                            <div class="row">
                                <div class="col-md-10" >
                                    <p class="show-item"><b>Services</b></p>
                                </div>
                                
                                <div class="col-md-2">
                                    <a href="{{route('service.add')}}" style="color: #fff;
                                    background-color: #00A7AC;
                                    border-color: #00A7AC;
                                    border-radius: 3px;" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
                                </div>
                            </div>

                            <div class="row g-lg-6">

                                <div class="col-lg-12 mt-4">

                                    <!-- Existing Category Section -->
                                    <div
                                        class="row row-cols-xxl-3 row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 g-3 cf mb-7">
                                        <!-- Category Box 1 -->

                                        @include('frontend.partials.service-tabs', ['data' => $service])

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card-body service-data">

                            @foreach ($data as $key=>$item)

                            <div class="col-lg-12 mb-30">
                                <div class="job-listing-card">
                                    <div class="job-top">
                                        <div class="job-list-content">
                                            <div class="company-area">
                                                <div class="company-details">
                                                    <div class="name-location">
                                                        <h5><a href="{{route('service.edit',['service_id'=>$item['id']])}}">{{ $item['title'] }}</a></h5>
                                                        <p><a href="javascript:void(0)">{{ isset($item['company']['name']) ? $item['company']['name'] : "N/A" }}</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="job-discription">
                                                <ul>
                                                    <li>
                                                        <p><span class="title">Designation :</span> {{ isset($item['designation']['name']) ? $item['designation']['name'] : "N/A" }}</p>
                                                    </li>
                                                    <li>
                                                        <p><span class="title">Experience :</span> {{ isset($item['experience_years']) ? $item['experience_years'].' Years' : "N/A" }}</p>
                                                    </li>
                                                    <li>
                                                        <p><span class="title">Description :</span> {{ $item['description'] ?? "N/A" }}</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="job-type-apply">
                                        <div class="job-type">
                                            <span class="light-green">{{ $item['job_location_type'] ?? "N/A" }}</span>
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


    <!-- Button trigger modal -->

    @include('frontend.partials.service-modal')
@endsection

@push('js')
    @include('frontend.custom-assets.service.tabs-js')
@endpush
