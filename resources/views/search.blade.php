@extends('frontend.Layouts.main')
@section('content')
    @push('css')
        <link rel="stylesheet" href="{{ asset('allAssets/dashboard.css') }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="{{ asset('assets/search/styles.css') }}" />
    @endpush
    <style>
        /* Right-Side Full-Screen Modal with Increased Width */
        .modal-dialog-right {
            position: fixed;
            top: 0;
            right: 0;
            margin: 0;
            width: 100%;
            max-width: 600px;
            /* Increased width */
            height: 100%;
            /* Full-screen height */
            border-radius: 0;
            transform: translateX(100%);
            transition: transform 0.3s ease-in-out;
        }

        .modal-dialog-right.show {
            transform: translateX(0);
        }

        /* Optional: Style the modal content */
        .modal-content {
            height: 100%;
            overflow-y: auto;
            /* Allows scrolling if content overflows */
        }
    </style>
    <!---------------------content starts from here------------------>
    <div class="inner-panel-parent">
        <div class="m-4 mt-2 inner-panel-content w-100">
            <div class="top-head">
                <div class="mt-4 d-flex justify-content-between align-items-center">
                    <p class="filter-text-one m-0">Jobs</p>
                    <p class="filter-text-two m-0 text-secondary">Showing results {{ count($services) }} of
                        {{ $limits }}</p>
                </div>
                <hr class="mt-3" />
            </div>
            <div class="top-grid-panel">
                <div class="d-flex justify-content-between align-items-center flex-wrap my-4">
                    <div class="search-bar-parent">
                        <div class="left-panel-header w-100" id="searchBox">
                            <div class="input-box">
                                <i class="uil uil-search"></i>
                                <input type="text" placeholder="Search here..."
                                    style="border: 1px solid #00000033; border-radius: 8px; background-color: white;" />
                            </div>
                        </div>
                    </div>
                    <div class="filter-buttons gap-3">
                        <div>
                            <p class="cards-main-short-text m-0">Sort by:</p>
                        </div>
                        <div class="btn-group bg-white" style="width: 20vw;">
                            <button type="button"
                                class="btn btn-outline dropdown-toggle w-100 d-flex justify-content-between align-items-center"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Default
                            </button>
                            <ul class="dropdown-menu w-100">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Separated link</a></li>
                            </ul>
                        </div>
                        <div class="d-flex flex-row flex-wrap justify-content-center align-items-center gap-3">
                            <div class="grid-view-button button-class-border"><i class="uil uil-th-large active px-2 py-2 "
                                    aria-hidden="true"></i></div>
                            <div class="list-view-button button-class-border"><i class="uil uil-list-ul px-2 py-2 "
                                    aria-hidden="true"></i></div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-4 for-left-row-height pt-3">
                        <div class="accordion accordion-flush " id="accordionFlushExample">
                            <div class="accordion-item p-0 m-0 white-background-card">
                                <h2 class="accordion-header p-0 m-0" id="flush-headingOne">
                                    <button class="custom-accordion-button p-0 m-0" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="true"
                                        aria-controls="flush-collapseOne">
                                        <div class="p-3 w-100">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="filter-text-one">Filter jobs</p>
                                                <p class="filter-text-two">Reset</p>
                                            </div>
                                            <hr class="p-0 m-0" />
                                        </div>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body p-0">
                                        <div class="p-3">
                                            <div class="d-flex flex-column gap-3">
                                                <div class="btn-group w-100">
                                                    <select name="company__name[]"
                                                        class="company__name filtersData form-control">
                                                        <option value="">Select company</option>
                                                        @foreach ($companyList as $key => $item)
                                                            <option data-operator="eq" value="{{ $item['value'] }}">
                                                                {{ $item['value'] }}
                                                                ({{ $item['value_count'] }})
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="btn-group w-100">
                                                    <select name="designation__name[]"
                                                        class="designation__name filtersData form-control">
                                                        <option value="">Select Designation</option>
                                                        @foreach ($designationList as $key => $item)
                                                            <option data-operator="eq" value="{{ $item['value'] }}">
                                                                {{ $item['value'] }}
                                                                ({{ $item['value_count'] }})
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="btn-group w-100">
                                                    <select name="job_location_type[]"
                                                        class="job_location_type filtersData form-control">
                                                        <option value="">Select Job Location Type</option>
                                                        @foreach ($jobLocationType as $item)
                                                            <option data-operator="eq" value="{{ $item['value'] }}">
                                                                {{ $item['value'] }}
                                                                ({{ $item['value_count'] }})
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-8 mt-3">
                        <div class="over-flow-class for-row-height">
                            <ol class="list list-view-filter" id="serviceListData">

                                
                                @foreach ($services as $k => $v)
                                    <li class="list-content">
                                        <div>
                                            <!-- card -->
                                            <div class="white-background-card px-3 py-3">
                                                <div
                                                    class="d-flex flex-row justify-content-between align-items-center flex-wrap">
                                                    <div class="d-flex justify-content-start align-items-start gap-2 mt-2">
                                                        <div class="image-div">
                                                            <img src="{{ asset('assets/search/Images/Ellipse.png') }}"
                                                                alt="company-logos">
                                                        </div>
                                                        <div>
                                                            <a href="{{ route('user.detail', $v['users']['id']) }}">
                                                                <p class="cards-main-heading m-0">
                                                                    {{ ucwords(strtolower($v['users']['first_name'])) . ' ' . ucwords(strtolower($v['users']['last_name'])) }}

                                                                </p>
                                                            </a>
                                                            <p class="cards-main-heading-two">{{ $v['title'] }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="cards-down-icon">
                                                        <i class="uil uil-bookmark-full fs-5 fw-lighter"></i>
                                                        <p class="job-position m-0 fw-lighter">Save</p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="d-flex justify-content-start align-items-center flex-wrap my-3">
                                                    <div
                                                        class="d-flex justify-content-start align-items-center gap-2 border-end px-2">
                                                        <i class="uil uil-bag"></i>
                                                        <p class="job-tipe m-0">{{ $v['service_category'] }}</p>
                                                    </div>

                                                </div>
                                                <div class="d-flex justify-content-start align-items-center my-3">
                                                    <div
                                                        class="d-flex justify-content-start align-items-center gap-2 px-2">
                                                        <i class="uil uil-bag"></i>
                                                        <p class="job-tipe m-0">Bachlor's of degree in computer science,
                                                            computer enginnering or similar Working Knowl.....</p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="d-flex justify-content-start align-items-center my-3 flex-wrap gap-2">
                                                    @if (isset($v['service_skills']) > 0)
                                                        @foreach ($v['service_skills'] as $k => $skill)
                                                            <div
                                                                class="status-text-parent d-flex justify-content-center align-items-center gap-2 px-3 py-2 flex-wrap mt-2">
                                                                <p class="status-text m-0">{{ $skill['skill']['name'] }}
                                                                </p>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mt-4 mb-2">
                                                    <div
                                                        class="d-flex justify-content-between w-100 align-items-center gap-2 px-2">
                                                        <p class="job-tipe m-0 fw-lighter">
                                                            {{ \Carbon\Carbon::parse($v['created_at'])->diffForHumans() }}
                                                        </p>
                                                        <a href="#"
                                                            class="status-text m-0 fs-6 fw-bold text-decoration-none"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#detailsModal{{ $v['id'] }}">
                                                            View Details →
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </li>

                                    <!-- Full-Screen Height Right-Side Modal -->
                                    <div class="modal" id="detailsModal{{ $v['id'] }}" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-right modal-fullscreen-height">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary text-white">
                                                    <h5 class="modal-title" id="detailsModalLabel">
                                                        {{ str_replace('_', ' ', $v['service_category']) }}</h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Service Details Content -->
                                                    <div class="mb-4">
                                                        <div class="border p-3 rounded shadow-sm">
                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <strong class="d-block">Title:</strong>
                                                                    <span class="text-muted">{{ $v['title'] }}</span>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <strong class="d-block">Status:</strong>
                                                                    <span class="text-muted">{{ $v['status'] }}</span>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <strong class="d-block">Amount:</strong>
                                                                    <span class="text-muted">₹
                                                                        {{ number_format($v['amount'], 2) }}</span>
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <strong class="d-block">Description:</strong>
                                                                    <p class="text-muted">
                                                                        {{ $v['description'] ?? 'Not Available' }}.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                @endforeach


                                <!-- if you want to add more then you can use these  -->
                            </ol>

                            <div class="w-100 d-flex justify-content-center align-items-center mt-4">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script> --}}
    <script src="{{ asset('assets/search/index.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>


    <script>
        function reviewTab() {

            $.ajax({
                url: "{{ route('profile.review') }}",
                method: 'GET',
                beforeSend: function(data) {
                    $('#review-forms').html(
                        '<center><i class="fa fa-spinner fa-spin" style="font-size:84px"></i></center>');
                },
                success: function(data) {
                    $('#review-forms').html(data);
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            })

        }


        $(document).on('change', '.filtersData', function() {

            var company__name = {
                values: []
            };
            var designation__name = {
                values: []
            };
            var job_location_type = {
                values: []
            };


            if ($('.company__name option:selected').val() !== "") {
                company__name.values.push({
                    value: $('.company__name option:selected').val(),
                    operator: $('.company__name option:selected').attr('data-operator')
                });
            }

            if ($('.designation__name option:selected').val() !== "") {

                designation__name.values.push({
                    value: $('.designation__name option:selected').val(),
                    operator: $('.designation__name option:selected').attr('data-operator')
                });
            }

            if ($('.job_location_type option:selected').val() !== "") {
                job_location_type.values.push({
                    value: $('.job_location_type option:selected').val(),
                    operator: $('.job_location_type option:selected').attr('data-operator')
                });
            }


            console.log({
                "designation__name": designation__name,
                "company__name": company__name,
                "job_location_type": job_location_type
            });


            $.ajax({
                url: '{{ route('post.search') }}',
                type: 'POST',
                dataType: "json",
                data: {
                    _token: '{{ csrf_token() }}',
                    company__name: company__name,
                    designation__name: designation__name,
                    job_location_type: job_location_type
                },
                beforeSend: function() {

                },
                success: function(data) {

                    var items = data.data.items;
                    html = "";

                    $.each(items, function(key, value) {

                        html += `

                                        <li class="list-content">
                                            <div >

                                    <div class="white-background-card px-3 py-3">
                                        <div class="d-flex flex-row justify-content-between align-items-center flex-wrap">
                                        <div class="d-flex justify-content-start align-items-start gap-2 mt-2">
                                            <div class="image-div">
                                            <img src="{{ asset('assets/search/Images/Ellipse.png') }}" alt="company-logos">
                                            </div>
                                            <div>

                                            <a href="profile/details/${value.users.id}">
                                                <p class="cards-main-heading m-0 text-capitalize">${value.users.first_name+' '+value.users.last_name}</p>
                                            </a>

                                            <p class="cards-main-heading-two">${value.title}</p>
                                            </div>
                                        </div>
                                        <div class="cards-down-icon">
                                            <i class="uil uil-bookmark-full fs-5 fw-lighter"></i>
                                            <p class="job-position m-0 fw-lighter">Save</p>
                                        </div>
                                        </div>
                                        <div class="d-flex justify-content-start align-items-center flex-wrap my-3">
                                        <div class="d-flex justify-content-start align-items-center gap-2 border-end px-2">
                                            <i class="uil uil-bag"></i>
                                            <p class="job-tipe m-0">${value.service_category}</p>
                                        </div>

                                        </div>
                                        <div class="d-flex justify-content-start align-items-center my-3">
                                        <div class="d-flex justify-content-start align-items-center gap-2 px-2">
                                            <i class="uil uil-bag"></i>
                                            <p class="job-tipe m-0">Bachlor's of degree in computer science, computer enginnering or similar Working Knowl.....</p>
                                        </div>
                                        </div>
                                        <div class="d-flex justify-content-start align-items-center my-3 flex-wrap gap-2">
                                            @if (isset($v['service_skills']) > 0)
                                                @foreach ($v['service_skills'] as $k => $skill)
                                                    <div class="status-text-parent d-flex justify-content-center align-items-center gap-2 px-3 py-2 flex-wrap mt-2">
                                                        <p class="status-text m-0">{{ $skill['skill']['name'] }}</p>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center mt-4 mb-2">
                                        <div class="d-flex justify-content-between w-100 align-items-center gap-2 px-2">
                                            <p class="job-tipe m-0 fw-lighter">${moment(value.created_at).fromNow()}</p>
                                            <a href="../Search-page-inner/index.html" class="status-text m-0 fs-6 fw-bold text-decoration-none">Apply Now →</a>
                                        </div>
                                        </div>
                                        </div>

                                    </div>
                                </li>

                        `;



                    })

                    $("#serviceListData").html(html);

                }
            }).done(function(data) {

            });


        })
    </script>
    {{-- <script src="{{ asset('allAssets/index.js') }}"></script> --}}

    @stack('inlinejs')
@endpush
