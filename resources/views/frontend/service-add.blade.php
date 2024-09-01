@extends('frontend.Layouts.main')

@section('content')
    @push('css')
        <link rel="stylesheet" href="{{ asset('allAssets/addService.css') }}" />
        <style>
            .awesomplete {
                display: block !important;
            }

            .error,
            .errors,
            .required {
                color: red !important;
            }

            .tagify__dropdown {
                z-index: 9999 !important;
            }

            .action-btn {
                background-color: #00a7ac;
                border: none;
                font-size: 20px;
                font-weight: 600;
                text-transform: uppercase;
                padding: 0.5em 1.25em;
                color: white;
                border-radius: 0.15em;
                transition: 0.3s;
                cursor: pointer;
                position: relative;
                display: block;
            }

            .action-btn:hover {
                background-color: #00a7ac;
            }

            .action-btn:focus {
                outline: 0.05em dashed #00a7ac;
                outline-offset: 0.05em;
            }

            .action-btn::after {
                content: '';
                display: block;
                width: 1.2em;
                height: 1.2em;
                position: absolute;
                left: calc(50% - 0.75em);
                top: calc(50% - 0.75em);
                border: 0.15em solid transparent;
                border-right-color: white;
                border-radius: 50%;
                animation: button-anim 0.7s linear infinite;
                opacity: 0;
            }

            @keyframes button-anim {
                from {
                    transform: rotate(0);
                }

                to {
                    transform: rotate(360deg);
                }
            }

            .action-btn.loading {
                color: transparent;
            }

            .action-btn.loading::after {
                opacity: 1;
            }

            .form-label {
                font-weight: 600
            }

            .scheduling-section {
                padding: 20px;
            }

            .scheduling-title {
                font-weight: bold;
                font-size: 1.25rem;
            }

            .scheduling-subtitle {
                font-size: 0.875rem;
                color: #6c757d;
            }
        </style>
    @endpush
    <!---------------------content starts from here------------------>
    <div class="mx-4 pt-4 over-flow-class-all d-flex flex-column">
        @if (isset($service_id))
            <form method="POST" id="serviceForm" action="{{ route('service.update', ['service_id' => $service_id]) }}">
            @else
        <form method="POST" id="serviceForm" action="{{ route('service.store') }}">
        @endif
        @csrf
        <div class="form-main-parent px-4 pt-4 pb-2 d-flex flex-column justify-content-between align-items-center">
            <div class="w-100">
                <a href="{{ route('service.index') }}" class="form-main-heading text-dark text-decoration-none mb-1"><span>
                        <i class="uil uil-angle-left"></i></span>
                    @if (isset($serviceData['service_category']))
                        Edit Service
                    @else
                        Add Service
                    @endif
                </a>

                <hr />
            </div>

            <!-- accordination  -->
            <div class="accordion accordion-flush w-100" id="accordionFlushExample">
                <div class="accordion-item p-0 m-0">
                    <h2 class="accordion-header p-0 m-0" id="flush-headingOne">
                        <button class="accordion-button collapsed p-0 m-0" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <div class="w-100">
                                <div class="p-0 m-0 d-flex w-100 justify-content-between align-items-center">
                                    <p class="form-main-heading-two mt-1 pb-3 mb-0">Select Service Type</p>
                                </div>
                            </div>
                        </button>
                    </h2>

                    <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body p-0">
                            <div>
                                <div class="row mb-1">
                                    @foreach ($service as $key => $item)
                                        <div class="col-md-4 col-sm-6 col-12 pt-3">
                                            <label class="d-block custom-form-check-label tabs-main-heading"
                                                for="serviceType{{ $key }}">
                                                <div class="custom-form-check h-100 card-container"
                                                    onclick="toggleCheckbox(event)">
                                                    <div class="checkbox-text-parent w-75">

                                                        {{ $item['title'] }}

                                                        <input
                                                            @if (isset($serviceData['service_category'])) @if ($item['code'] == $serviceData['service_category']) checked @endif
                                                        @else @if ($key == 0) checked @endif
                                                            @endif data-code="{{ $item['code'] }}"
                                                        data-id="{{ $item['id'] }}"
                                                        value="{{ $item['code'] }}" name="service_category"
                                                        class="form-check-input checkbox-input serviceModal" type="checkbox"
                                                        id="serviceType{{ $key }}"/>


                                                        <div class="popup-icon">
                                                            <i class="uil uil-question-circle"></i>
                                                            <div class="popup-description">
                                                                {{ $item['description'] }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end  -->
        </div>


        <!-- form is here  -->
        <div class="form-main-parent px-4 py-4 mt-4">

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-basic-details" role="tabpanel"
                    aria-labelledby="pills-basic-details-tab">
                    <div class="w-100 p-0">


                        <div class="row mt-3">
                            <div class="col-md-4 col-sm-12 col-12 pb-2">
                                <label for="title" class="form-label"> Job Title *</label>
                                <input type="text" class="form-control form-inputs-parent"
                                    value="{{ isset($serviceData['title']) ? $serviceData['title'] : '' }}" id="title"
                                    name="title" placeholder="Title" required />
                            </div>
                            <div class="col-md-4 col-sm-12 col-12 pb-2">
                                <label for="duration" class="form-label">Duration (mins) *</label>
                               

                                <select name="duration" class="form-control form-inputs-parent" id="duration" required>
                                    <option value="">Select Duration</option>
                                    <option value="10"
                                        {{ isset($serviceData['duration']) && $serviceData['duration'] == 10 ? 'selected' : '' }}>
                                        10 minutes</option>
                                    <option value="15"
                                        {{ isset($serviceData['duration']) && $serviceData['duration'] == 15 ? 'selected' : '' }}>
                                        15 minutes</option>
                                    <option value="30"
                                        {{ isset($serviceData['duration']) && $serviceData['duration'] == 30 ? 'selected' : '' }}>
                                        30 minutes</option>
                                </select>
                            </div>
                           
                            <div class="col-md-6 col-sm-12 col-12 pb-2">
                                <label for="amount" class="form-label">Amount (₹)</label>
                                <input type="text" class="form-control form-inputs-parent"
                                    value="{{ isset($serviceData['amount']) ? $serviceData['amount'] : '' }}"
                                    id="amount" name="amount" placeholder="Amount (₹)" required />
                            </div>
                            <div class="col-md-6 col-sm-12 col-12 pb-2">
                                <label for="experience" class="form-label">Experience (Years)</label>
                                <input type="text" class="form-control form-inputs-parent"
                                    value="{{ isset($serviceData['experience_years']) ? $serviceData['experience_years'] : '' }}"
                                    id="experience" name="experience" placeholder="Experience (Years)" required />
                            </div>

                            <div id="conditionalFields">


                            </div>


                        </div>

                        <div class="card" style="margin-top:20px;">
                            <div class="card-body scheduling-section">





                                <div class="p-0 m-0 d-flex w-100 justify-content-between align-items-center">
                                    <p class="form-main-heading mb-3">Scheduling</p>

                                    <a href="{{ route('availablity.index') }}" class="add-more-button mb-3"
                                        style="float: right;">Create New Schedule</a>

                                </div>

                                <div class="form-group mt-3">
                                    <label for="schedule_id" class="d-block font-weight-bold">Schedule for this
                                        service</label>
                                    <p class="scheduling-subtitle">You can have different schedules for different services
                                    </p>
                                    @if (count($scheduling['items']) > 0)
                                        <select class="form-control" required name="schedule_id" id="schedule_id">
                                            <option value="">Select</option>
                                            @forelse ($scheduling['items'] as $item)
                                                <option
                                                    @if (isset($serviceData['schedule'])) @if ($serviceData['schedule']['id'] == $item['id'])  selected @endif
                                                    @endif

                                                    value="{{ $item['id'] }}">{{ $item['schedule_name'] }}</option>
                                            @empty
                                                <p>No Schedule found</p>
                                            @endforelse
                                            <!-- Add more options as needed -->
                                        </select>
                                    @else
                                        <p>No Schedule Found</p>

                                        <div id="popup1" class="overlay">

                                            <div class="popup">
                                                <div class="popup-header">
                                                    <h2><i class="fas fa-calendar-times"></i> Schedule Not Available</h2>
                                                    <a class="close" href="#" onclick="closePopup()"><i
                                                            class="fas fa-times"></i></a>
                                                </div>
                                                <div class="content">
                                                    <p><i class="fas fa-exclamation-circle"></i> You haven't created your
                                                        schedule yet. Please add your available timings to proceed.</p>
                                                    <p><a href="{{ route('availablity.index') }}" class="btn">Add Your Schedule</a></p>
                                                </div>
                                            </div>

                                        </div>

                                        <script>
                                            document.addEventListener("DOMContentLoaded", function() {

                                                document.getElementById("popup1").style.visibility = "visible";

                                                document.getElementById("popup1").style.opacity = "1";

                                            });


                                            function closePopup() {

                                                document.getElementById("popup1").style.visibility = "hidden";

                                                document.getElementById("popup1").style.opacity = "0";

                                            }
                                        </script>

                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12 text-start">
                                <button type="submit" class="btn btn-form-submit">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="saved-details-parent"></div>

        </div>

        </form>

    </div>
    <style>
        /* Trigger Button Styles */
        .trigger-btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            text-decoration: none;
        }

        .trigger-btn:hover {
            background-color: #0056b3;
        }

        /* Popup Overlay Styles */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            visibility: hidden;
            opacity: 0;
            transition: opacity 500ms, visibility 500ms;
        }

        .overlay:target {
            visibility: visible;
            opacity: 1;
        }

        /* Popup Styles */
        .popup {
            position: relative;
            width: 50%;
            margin: 5% auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .popup-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .popup-header h2 {
            margin: 0;
            font-size: 20px;
            color: #333;
        }

        .popup-header .close {
            font-size: 24px;
            color: #333;
            text-decoration: none;
        }

        .popup-header .close:hover {
            color: #007bff;
        }

        /* Content Styles */
        .content {
            max-height: 200px;
            overflow-y: auto;
            font-size: 16px;
        }

        .content p {
            margin: 0 0 10px;
        }

        .content i {
            margin-right: 8px;
        }

        .content .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .content .btn:hover {
            background: #0056b3;
        }
    </style>
@endsection

@push('js')
    <script>
        $(document).ready(function() {

            var input1 = document.getElementById('skills');
            new Tagify(input1, {
                whitelist: webTechnologies,
                dropdown: {
                    maxItems: Infinity,
                    enabled: 0, // Always show suggestions dropdown
                    closeOnSelect: false // Do not close the dropdown when an item is selected
                }
                // blacklist : ["fuck", "shit"]
            });

        });

        const webTechnologies = ["HTML", "CSS", "JavaScript", "React", "Angular", "Vue.js", "Node.js", "Express.js",
            "Django", "Flask", "Ruby on Rails", "ASP.NET", "JavaServer Faces (JSF)", "Spring Framework", "jQuery",
            "Bootstrap", "Sass", "Less", "TypeScript", "RESTful API", "WebSocket", "JSON", "XML", "Webpack", "Babel",
            "Docker", "Kubernetes", "Git", "MongoDB", "MySQL", "PostgreSQL", "Firebase", "OAuth",
            "JWT (JSON Web Tokens)", "SSL/TLS", "HTTP/2", "WebSockets", "Service Workers",
            "Progressive Web Apps (PWAs)", "Responsive Web Design", "WebAssembly", "WebRTC", "Canvas API", "WebGL",
            "WebSockets", "IndexedDB", "LocalStorage", "Cookies", "Web Workers", "Server-Sent Events (SSE)",
            "Microservices", "Serverless Architecture", "Single Page Applications (SPAs)",
            "Content Delivery Network (CDN)", "Static Site Generators (SSG)", "Jamstack", "API Gateway", "GraphQL",
            "OpenAPI (Swagger)", "Web Accessibility (A11y)", "Search Engine Optimization (SEO)", "WebAssembly", "WebVR",
            "Augmented Reality (AR) on the Web", "Virtual Reality (VR) on the Web", "Node.js", "Django (Python)",
            "Flask (Python)", "Ruby on Rails", ".NET", "Spring Framework (Java)", "Express.js", "ASP.NET",
            "Laravel (PHP)", "Symfony (PHP)", "Ruby on Rails", "Phoenix (Elixir)", "FastAPI (Python)", "Koa.js",
            "Hapi.js", "ASP.NET Core", "Grails (Groovy)", "Adonis.js", "NestJS", "Meteor.js", "Actix (Rust)",
            "Gin (Go)", "Play Framework (Scala/Java)", "CakePHP (PHP)", "Slim (PHP)", "Sails.js", "Feathers.js",
            "Tagify", "Popup", "Button"
        ];


        $(document).on('click', '.serviceModal', function() {

            var id = parseInt($(this).attr('data-id'));
            var code = $(this).attr('data-code');
            var getFormData = getFormFields(code, response = null);

            $("#conditionalFields").html(getFormData);
            $("#service_category").val(code);

            var input1 = document.getElementById('skills');
            new Tagify(input1, {
                whitelist: webTechnologies,
                dropdown: {
                    maxItems: Infinity,
                    enabled: 0, // Always show suggestions dropdown
                    closeOnSelect: false // Do not close the dropdown when an item is selected
                }
                // blacklist : ["fuck", "shit"]
            });

        })



        @if (isset($serviceData['service_category']))
            $("#conditionalFields").html(getFormFields("{{ $serviceData['service_category'] }}", response = null));
        @else
            $("#conditionalFields").html(getFormFields('JOB_REFERRAL', response = null));
        @endif
        function getFormFields(code, response) {
            var html = '';
            var company_name = '';
            var designation_name = '';
            var skills = '';

            if (response !== null) {
                if (response.company) {
                    company_name = response.company.name;
                }

                if (response.designation_name) {
                    designation_name = response.designation.name;
                }

                if (response.skills.length > 0) {
                    skills = response.skills.map(function(item) {
                        return item.skill.name;
                    });

                    console.log("skills", skills);
                }
            }
            switch (code) {
                case 'JOB_REFERRAL':
                    html = `

                        <div class="row g-lg-12 mb-1">
                            <div class="col-lg-4 mb-1">
                                <div class="form-group">
                                    <label class="form-label" for="company_name">Company Name</label>
                                    <input type="text" class="form-control form-inputs-parent" value="{{ isset($serviceData['company']['name']) ? $serviceData['company']['name'] : '' }}" name="company_name" id="company_name" placeholder="">
                                </div>
                            </div>

                            <div class="col-lg-4 mb-1">
                                <div class="form-group">
                                    <label class="form-label"  for="designation_name">Position for Job</label>
                                    <input type="text" class="form-control form-inputs-parent" value="{{ isset($serviceData['designation']['name']) ? $serviceData['designation']['name'] : '' }}" id="designation_name" name="designation_name" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-4 mb-1">
                                <div class="form-group">
                                    <label class="form-label" for="salary_pack">Average Package (LPA)</label>
                                    <input type="text" class="form-control form-inputs-parent" value="{{ isset($serviceData['company']['salary_pack']) ? $serviceData['company']['salary_pack'] : '' }}" name="salary_pack" id="salary_pack" placeholder="Enter average salary fro this job.">
                                </div>
                            </div>
                        </div>
                        <div class="row g-lg-12 mb-1">
                            <div class="col-lg-4 mb-1">
                                <div class="form-group">
                                    <label class="form-label"  for="designation_name">Company Type</label>
                                
                                
                                    <select name="company_type" class="form-control form-inputs-parent"
                                                id="company_type">
                                                <option value="">Select Company Type</option>
                                                <option value="service"
                                                    {{ isset($serviceData['company_type']) && $serviceData['company_type'] == 'service' ? 'selected' : '' }}>
                                                    Service Based</option>
                                                <option value="product"
                                                    {{ isset($serviceData['company_type']) && $serviceData['company_type'] == 'product' ? 'selected' : '' }}>
                                                    Product Based</option>
                                                <option value="govt"
                                                    {{ isset($serviceData['company_type']) && $serviceData['company_type'] == 'govt' ? 'selected' : '' }}>
                                                    Goverment Organination</option>
                                                <option value="other"
                                                    {{ isset($serviceData['company_type']) && $serviceData['company_type'] == 'other' ? 'selected' : '' }}>
                                                    Other</option>
                                            </select>
                                
                                
                                
                                
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-12 pb-2">
                                <label for="jobLocationType" class="form-label">Job Location Type *</label>
                                <div class="dropdown-wrapper">
                                    <select name="jobLocationType" class="form-control form-inputs-parent"
                                        id="jobLocationType">
                                        <option value="">Select</option>
                                        <option value="ONSITE"
                                            {{ isset($serviceData['job_location_type']) && $serviceData['job_location_type'] == 'ONSITE' ? 'selected' : '' }}>
                                            ONSITE</option>
                                        <option value="HYBRID"
                                            {{ isset($serviceData['job_location_type']) && $serviceData['job_location_type'] == 'HYBRID' ? 'selected' : '' }}>
                                            HYBRID</option>
                                        <option value="REMOTE"
                                            {{ isset($serviceData['job_location_type']) && $serviceData['job_location_type'] == 'REMOTE' ? 'selected' : '' }}>
                                            REMOTE</option>
                                    </select>
                                    <span class="dropdown-icon">&#8964;</span>
                                </div>
                            </div>
                              <div class="col-lg-4 mb-1">
                                <div class="form-group">
                                    <label class="form-label"  for="designation_name">Job/Comapny Link</label>
                                    <input type="text" class="form-control form-inputs-parent" value="{{ isset($serviceData['designation']['name']) ? $serviceData['designation']['name'] : '' }}" id="link" name="link" placeholder="Enter Job/Comapny Link">
                                </div>
                            </div>
                        </div>
                `;
                    break;

                case 'JOB_POSITION_GUIDANCE':


                    html = `
                <div class="row g-lg-4 mb-1">
                        <div class="col-lg-14 mb-1">
                            <div class="form-group">
                                <label class="form-label"  for="company_name">Company Name</label>
                                <input type="text" class="form-control form-inputs-parent" value="{{ isset($serviceData['company']['name']) ? $serviceData['company']['name'] : '' }}" name="company_name" id="company_name" placeholder="">
                            </div>
                        </div>

                        <div class="col-lg-14 mb-1">
                            <div class="form-group">
                                <label class="form-label"  for="designation_name">Position for Job</label>
                                <input type="text" class="form-control form-inputs-parent" value="{{ isset($serviceData['designation']['name']) ? $serviceData['designation']['name'] : '' }}" id="designation_name" name="designation_name" placeholder="">
                            </div>
                        </div>
                    </div>
                        `

                    break;




                case 'TECH_EXPERT':


                    html = `
                        <div class="row g-lg-4 mb-1">
                            <div class="col-lg-14 mb-1">
                                <div class="form-group">
                                    <label class="form-label"  for="skills">Skills (in tags)</label>
                                    <input type="text" class="form-control form-inputs-parent" value="{{ isset($serviceData['skills']) ? $serviceData['skills'] : '' }}" id="skills" name="skills" placeholder="">
                                </div>
                            </div>
                          </div>
                        `

                    break;



                case 'CAREER_GUIDANCE':


                    html = `
                        <div class="row g-lg-4 mb-1">
                            <div class="col-lg-14 mb-1">
                                <div class="form-group">
                                    <label class="form-label"  for="designation_name">Position for Job</label>
                                    <input type="text" class="form-control form-inputs-parent" value="{{ isset($serviceData['designation']['name']) ? $serviceData['designation']['name'] : '' }}" id="designation_name" name="designation_name" placeholder="">
                                </div>
                            </div>

                            <div class="col-lg-14 mb-1">
                                <div class="form-group">
                                    <label class="form-label"  for="skills">Skills (in tags)</label>
                                    <input type="text" class="form-control form-inputs-parent" value="{{ isset($serviceData['skills']) ? $serviceData['skills'] : '' }}" id="skills" name="skills" placeholder="">
                                </div>
                            </div>
                        </div>
                    `



                case 'RESUME_REVIEW':

                    html = `
                        <div class="row g-lg-4 mb-1">
                            <div class="col-lg-14 mb-1">
                                <div class="form-group">
                                    <label class="form-label"  for="designation_name">Position for Job</label>
                                    <input type="text" class="form-control form-inputs-parent" value="{{ isset($serviceData['designation']['name']) ? $serviceData['designation']['name'] : '' }}" id="designation_name" name="designation_name" placeholder="">
                                </div>
                            </div>

                            <div class="col-lg-14 mb-1">
                                <div class="form-group">
                                    <label class="form-label"  for="skills">Skills (in tags)</label>
                                    <input type="text" class="form-control form-inputs-parent" value="{{ isset($serviceData['skills']) ? $serviceData['skills'] : '' }}" id="skills" name="skills" placeholder="">
                                </div>
                            </div>
                        </div>

                        `

                    break;



                case 'MOCK_INTERVIEW':

                    html = `
                        <div class="row g-lg-4 mb-1">
                            <div class="col-lg-14 mb-1">
                                <div class="form-group">
                                    <label class="form-label"  for="company_name">Company Name</label>
                                    <input type="text" class="form-control form-inputs-parent" value="{{ isset($serviceData['company']['name']) ? $serviceData['company']['name'] : '' }}" name="company_name" id="company_name" placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="row g-lg-4 mb-1">
                            <div class="col-lg-14 mb-1">
                                <div class="form-group">
                                    <label class="form-label"  for="designation_name">Position for Job</label>
                                    <input type="text" class="form-control form-inputs-parent" value="{{ isset($serviceData['designation']['name']) ? $serviceData['designation']['name'] : '' }}" id="designation_name" name="designation_name" placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="row g-lg-4 mb-1">
                            <div class="col-lg-14 mb-1">
                                <div class="form-group">
                                    <label class="form-label"  for="skills">Skills (in tags)</label>
                                    <input type="text" class="form-control form-inputs-parent" value="{{ isset($serviceData['skills']) ? $serviceData['skills'] : '' }}" id="skills" name="skills" placeholder="">
                                </div>
                            </div>
                        </div>

                        `

                    break;


                default:
                    break;
            }
            return html;
        }


        $(function() {
            $('#serviceForm').validate({
                rules: {
                    skills: {
                        required: function(element) {
                            var checkedOptions = $('input[name=service_category]:checked');
                            console.log("checkedOptions", checkedOptions);
                            var isSkillsRequired = false;
                            checkedOptions.each(function() {
                                var optionValue = $(this).val();
                                if (optionValue === "CAREER_GUIDANCE" ||
                                    optionValue === "RESUME_REVIEW" ||
                                    optionValue === "MOCK_INTERVIEW") {
                                    isSkillsRequired = true;
                                    return false; // Exit each loop early if a required option is found
                                }
                            });
                            return isSkillsRequired;
                        }
                    },
                    experience: {
                        required: true,
                        number: true
                    },
                    title: {
                        required: true,
                    },
                    amount: {
                        required: true,
                        number: true
                    },
                    schedule_id: {
                        required: true
                    },
                    jobLocationType: {
                        required: true
                    },
                    duration: {
                        required: true,
                        number: true
                    },
                    company_name: {
                        required: {
                            depends: function(element) {
                                return $('input[name=service_category]:checked').val() ===
                                    "MOCK_INTERVIEW";
                            }
                        }
                    }
                },
                messages: {
                    experience: {
                        required: "Please enter an experience",
                        number: "Please enter a valid experience"
                    },
                    schedule_id: {
                        required: "Please select atleast one schedule",
                    }
                },
                errorPlacement: function(error, element) {
                    $(element).parent().append(error);
                },
                submitHandler: function(form) {
                    $('.btn-form-submit').prop('disabled', true);
                    event.preventDefault();
                    removeErrors();
                    console.log("form", form.action);
                    submitAjax(form, sucessMethod)
                }
            });
        })






        function sucessMethod(formObj, response) {

            $('.btn-form-submit').prop('disabled', false);

            if (response.status) {
                popupMsg('Success', response.message, 'success');
            } else {

                if (response.isValidationError) {

                    $(".invalid-feedback").remove();

                    $.each(response.errors, function(fieldName, field) {
                        $.each(field, function(index, msg) {

                            fieldName = fieldName.replace('.', '', msg);

                            $('#' + fieldName).addClass('is-invalid state-invalid');
                            errorDiv = $('#' + fieldName).parent('div').parent('div');
                            errorDiv.append('<div class="invalid-feedback d-block">' + msg + '</div>');

                        });
                    });


                }

                errorMsg('Error', response.message, 'error');
            }
        }


        Autoomplete("company_name", {!! $company !!})

        console.log("{{ auth()->user()->id }}")
    </script>

    <script src="{{ asset('allAssets/service.js') }}"></script>
@endpush
