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
                <a href="{{ route('service.index') }}" class="form-main-heading text-dark text-decoration-none mb-3"><span>
                        <i class="uil uil-angle-left"></i></span> Add new service</a>

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
                                    <p class="form-main-heading-two mt-1 pb-3 mb-0">Select type</p>
                                </div>
                            </div>
                        </button>
                    </h2>

                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body p-0">
                            <div>
                                <div class="row mb-3">

                                    @foreach ($service as $key => $item)
                                        <div class="col-md-4 col-sm-6 col-12 pt-3">
                                            <div class="custom-form-check h-100 card-container"
                                                onclick="toggleCheckbox(event)">
                                                <div class="checkbox-text-parent w-75">
                                                    <label class="custom-form-check-label tabs-main-heading"
                                                        for="customCheckDefault">
                                                        {{ $item['title'] }}
                                                    </label>
                                                    <div class="popup-icon">
                                                        <i class="uil uil-question-circle"></i>
                                                        <div class="popup-description">
                                                            {{ $item['description'] }}
                                                        </div>
                                                    </div>
                                                </div>

                                                <input
                                                    @if (isset($edit['service_category'])) @if ($item['code'] == $edit['service_category']) checked @endif
                                                @else @if ($key == 0) checked @endif @endif data-code="{{ $item['code'] }}"
                                                data-id="{{ $item['id'] }}" id="service{{ $key }}"
                                                value="{{ $item['code'] }}" name="service_category"
                                                class="form-check-input checkbox-input serviceModal" type="checkbox"
                                                id="flexCheckDefault"/>

                                            </div>
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
            <p class="form-main-heading-two m-0">Job details</p>
            <hr />

            <div class="w-100 p-0">
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-12 pb-2">
                        <label for="title" class="form-label">Title *</label>
                        <input type="text" class="form-control form-inputs-parent" id="title" name="title"
                            placeholder="Title" required />
                    </div>
                    <div class="col-md-4 col-sm-12 col-12 pb-2">
                        <label for="duration" class="form-label">Duration (mins) *</label>
                        <input type="text" class="form-control form-inputs-parent" id="duration" name="duration"
                            placeholder="Duration (mins)" required />
                    </div>
                    <div class="col-md-4 col-sm-12 col-12 pb-2">
                        <label for="jobLocationType" class="form-label">Job Location Type *</label>
                        <div class="dropdown-wrapper">


                            <select name="jobLocationType" class="form-control form-inputs-parent" id="jobLocationType">
                                <option value="">Select</option>
                                <option value="ONSITE"
                                    {{ isset($data['job_location_type']) && $data['job_location_type'] == 'ONSITE' ? 'selected' : '' }}>
                                    ONSITE</option>
                                <option value="HYBRID"
                                    {{ isset($data['job_location_type']) && $data['job_location_type'] == 'HYBRID' ? 'selected' : '' }}>
                                    HYBRID</option>
                                <option value="REMOTE"
                                    {{ isset($data['job_location_type']) && $data['job_location_type'] == 'REMOTE' ? 'selected' : '' }}>
                                    REMOTE</option>
                            </select>

                            <span class="dropdown-icon">&#8964;</span>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-12 pb-2">
                        <label for="amount" class="form-label">Amount (₹)</label>
                        <input type="text" class="form-control form-inputs-parent" id="amount" name="amount"
                            placeholder="Amount (₹)" required />
                    </div>
                    <div class="col-md-6 col-sm-12 col-12 pb-2">
                        <label for="experience" class="form-label">Experience (Years)</label>
                        <input type="text" class="form-control form-inputs-parent" id="experience" name="experience"
                            placeholder="Experience (Years)" required />
                    </div>

                    <div id="conditionalFields">


                    </div>


                </div>
                <div class="row mt-3">
                    <div class="col-md-12 text-start">
                        <button type="submit" class="btn btn-form-submit">Save Changes</button>
                    </div>
                </div>
            </div>
            <div class="saved-details-parent"></div>

        </div>

        </form>

    </div>
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



        @if (isset($data['service_category']))
            $("#conditionalFields").html(getFormFields("{{ $data['service_category'] }}", response = null));
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

                <div class="row g-lg-4 mb-1">
                    <div class="col-lg-14 mb-3">
                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            <input type="text" class="form-control form-inputs-parent" value="{{ isset($data['company_name']) ? $data['company_name'] : '' }}" name="company_name" id="company_name" placeholder="">
                        </div>
                    </div>

                    <div class="col-lg-14 mb-3">
                        <div class="form-group">
                            <label for="designation_name">Position for Job</label>
                            <input type="text" class="form-control form-inputs-parent" value="{{ isset($data['designation_name']) ? $data['designation_name'] : '' }}" id="designation_name" name="designation_name" placeholder="">
                        </div>
                    </div>
                </div>
                `;
                    break;

                case 'JOB_POSITION_GUIDANCE':


                    html = `
                <div class="row g-lg-4 mb-1">
                        <div class="col-lg-14 mb-3">
                            <div class="form-group">
                                <label for="company_name">Company Name</label>
                                <input type="text" class="form-control form-inputs-parent" value="{{ isset($data['company_name']) ? $data['company_name'] : '' }}" name="company_name" id="company_name" placeholder="">
                            </div>
                        </div>

                        <div class="col-lg-14 mb-3">
                            <div class="form-group">
                                <label for="designation_name">Position for Job</label>
                                <input type="text" class="form-control form-inputs-parent" value="{{ isset($data['designation_name']) ? $data['designation_name'] : '' }}" id="designation_name" name="designation_name" placeholder="">
                            </div>
                        </div>
                    </div>
                        `

                    break;




                case 'TECH_EXPERT':


                    html = `
                        <div class="row g-lg-4 mb-1">
                            <div class="col-lg-14 mb-3">
                                <div class="form-group">
                                    <label for="skills">Skills (in tags)</label>
                                    <input type="text" class="form-control form-inputs-parent" value="{{ isset($data['skills']) ? $data['skills'] : '' }}" id="skills" name="skills" placeholder="">
                                </div>
                            </div>
                          </div>
                        `

                    break;



                case 'CAREER_GUIDANCE':


                    html = `
                        <div class="row g-lg-4 mb-1">
                            <div class="col-lg-14 mb-3">
                                <div class="form-group">
                                    <label for="designation_name">Position for Job</label>
                                    <input type="text" class="form-control form-inputs-parent" value="{{ isset($data['designation_name']) ? $data['designation_name'] : '' }}" id="designation_name" name="designation_name" placeholder="">
                                </div>
                            </div>

                            <div class="col-lg-14 mb-3">
                                <div class="form-group">
                                    <label for="skills">Skills (in tags)</label>
                                    <input type="text" class="form-control form-inputs-parent" value="{{ isset($data['skills']) ? $data['skills'] : '' }}" id="skills" name="skills" placeholder="">
                                </div>
                            </div>
                        </div>
                    `



                case 'RESUME_REVIEW':

                    html = `
                        <div class="row g-lg-4 mb-1">
                            <div class="col-lg-14 mb-3">
                                <div class="form-group">
                                    <label for="designation_name">Position for Job</label>
                                    <input type="text" class="form-control form-inputs-parent" value="{{ isset($data['designation_name']) ? $data['designation_name'] : '' }}" id="designation_name" name="designation_name" placeholder="">
                                </div>
                            </div>

                            <div class="col-lg-14 mb-3">
                                <div class="form-group">
                                    <label for="skills">Skills (in tags)</label>
                                    <input type="text" class="form-control form-inputs-parent" value="{{ isset($data['skills']) ? $data['skills'] : '' }}" id="skills" name="skills" placeholder="">
                                </div>
                            </div>
                        </div>

                        `

                    break;



                case 'MOCK_INTERVIEW':

                    html = `
                        <div class="row g-lg-4 mb-1">
                            <div class="col-lg-14 mb-3">
                                <div class="form-group">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" class="form-control form-inputs-parent" value="{{ isset($data['company_name']) ? $data['company_name'] : '' }}" name="company_name" id="company_name" placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="row g-lg-4 mb-1">
                            <div class="col-lg-14 mb-3">
                                <div class="form-group">
                                    <label for="designation_name">Position for Job</label>
                                    <input type="text" class="form-control form-inputs-parent" value="{{ isset($data['designation_name']) ? $data['designation_name'] : '' }}" id="designation_name" name="designation_name" placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="row g-lg-4 mb-1">
                            <div class="col-lg-14 mb-3">
                                <div class="form-group">
                                    <label for="skills">Skills (in tags)</label>
                                    <input type="text" class="form-control form-inputs-parent" value="{{ isset($data['skills']) ? $data['skills'] : '' }}" id="skills" name="skills" placeholder="">
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
                amount: {
                    required: true,
                    number: true
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
                            return $('input[name=service_category]:checked').val() === "MOCK_INTERVIEW";
                        }
                    }
                }
            },
            messages: {

            },
            errorPlacement: function(error, element) {
                $(element).parent().append(error);
            },
            submitHandler: function(form) {
                event.preventDefault();
                removeErrors();
                console.log("form", form.action);
                submitAjax(form, sucessMethod)
            }
        });





        function sucessMethod(formObj, response) {

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
