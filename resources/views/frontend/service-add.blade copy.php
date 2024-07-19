@extends('frontend.layout.header')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.18.0/tagify.css"
        integrity="sha512-SNbSEpyK7jz5R7yjTrilJOlK4sgtHMfZoNtERAd8VF6jj6fk0LdW4HT3RwOLYhZmKn4GRtsNCZfA8lJ/FmYfhw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
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

    @include('frontend.custom-assets.service.cards-css')
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
                                    <p class="show-item"><b>Add New Service</b></p>
                                </div>
                                
                                <div class="col-md-2">
                                    <a href="{{route('service.index')}}" style="color: #fff;
                                    background-color: #00A7AC;
                                    border-color: #00A7AC;
                                    border-radius: 3px;" class="btn btn-success"><i class="fa fa-arrow-left"></i> Back</a>
                                </div>
                            </div>

                            <div class="row g-lg-6">

                                <div class="col-lg-14 mt-4">

                                        
                                        @php
                                           
                                        @endphp

                                       
                                    
                                    @if(isset($service_id))
                                    <form method="POST" id="serviceForm" action="{{route('service.update',['service_id'=>$service_id])}}">
                                    @else
                                    <form method="POST" id="serviceForm" action="{{route('service.store')}}">
                                    @endif

                                    @csrf
                                        <div class="row g-lg-4 mb-1">
                                            @if(!isset($service_id))
                                            <h6> <strong> Select type </strong></h6>
                                            <div class="col-lg-12 ">
                                                @include('frontend.partials.services-type-cards', ['data' => $service,'edit'=>(isset($data))?$data:[]])
                                            </div>
                                            @else
                                            <input type="hidden" name="service_category" value="@if(isset($data['service_category'])) {{$data['service_category']}} @endif ">
                                            @endif
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <h6><strong>Title</strong></h6>
                                                    <input type="text" class="form-control" id="title" name="title" required value="{{ isset($data['title']) ? $data['title'] : '' }}">
                                                </div>
                                            </div>
                                            
                                           
                                            
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="duration"><h6><strong>Duration (mins)</strong></h6></label>
                                                    <input type="text" class="form-control" id="duration" required name="duration" value="{{ isset($data['duration']) ? $data['duration'] : '' }}">
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="job_location_type"><h6><strong>Job Location Type</strong></h6></label>
                                                    <select name="job_location_type" class="form-control" id="job_location_type">
                                                        <option value="">Select</option>
                                                        <option value="ONSITE" {{ isset($data['job_location_type']) && $data['job_location_type'] == 'ONSITE' ? 'selected' : '' }}>ONSITE</option>
                                                        <option value="HYBRID" {{ isset($data['job_location_type']) && $data['job_location_type'] == 'HYBRID' ? 'selected' : '' }}>HYBRID</option>
                                                        <option value="REMOTE" {{ isset($data['job_location_type']) && $data['job_location_type'] == 'REMOTE' ? 'selected' : '' }}>REMOTE</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="amount"><h6><strong>Amount (₹)</strong></h6></label>
                                                    <input type="text" class="form-control" id="amount" required name="amount" value="{{ isset($data['amount']) ? $data['amount'] : '' }}">
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="experience_years"><h6><strong>Experience (Years) (optional)</strong></h6></label>
                                                    <input type="text" class="form-control" id="experience_years" name="experience_years" value="{{ isset($data['experience_years']) ? $data['experience_years'] : '' }}">
                                                </div>
                                            </div>
                                            
                                            

                                            <div id="conditionalFields">


                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="description"><h6><strong>Description (optional)</strong></h6></label>
                                                    <textarea type="text" class="form-control" id="description" name="description" value="">{{ isset($data['description']) ? $data['description'] : '' }}</textarea>
                                                </div>
                                            </div>

                                            <button type="submit" id="submitBtn" class="action-btn">Save changes</button>

                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>

                        

                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Button trigger modal -->





@endsection



@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.18.0/tagify.min.js"
        integrity="sha512-5nCDZEtBxUHHT96BzDe7Xd4OfruObns6OD9HEjZvznYJtzrobCAyOLKdA+sfcLC3z9UEhbYgsYFeJcbSEEPiDA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>

        $(document).ready(function(){

            var input1 = document.getElementById('skills');
            new Tagify(input1, {
                whitelist: webTechnologies,
                dropdown: {
                    maxItems: Infinity,
                    enabled: 0,               // Always show suggestions dropdown
                    closeOnSelect: false     // Do not close the dropdown when an item is selected
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
                    enabled: 0,               // Always show suggestions dropdown
                    closeOnSelect: false     // Do not close the dropdown when an item is selected
                }
                // blacklist : ["fuck", "shit"]
            });

        })

       

        @if(isset($data['service_category']))
        $("#conditionalFields").html(getFormFields("{{$data['service_category']}}",response=null));
        @else
        $("#conditionalFields").html(getFormFields('JOB_REFERRAL',response=null));
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
                                <label for="company_name"><strong>Company Name</strong></label>
                                <input type="text" class="form-control" value="{{ isset($data['company_name']) ? $data['company_name'] : '' }}" name="company_name" id="company_name" placeholder="">
                            </div>
                        </div>

                        <div class="col-lg-14 mb-3">
                            <div class="form-group">
                                <label for="designation_name"><strong>Position for Job</strong></label>
                                <input type="text" class="form-control" value="{{ isset($data['designation_name']) ? $data['designation_name'] : '' }}" id="designation_name" name="designation_name" placeholder="">
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
                                    <label for="company_name"><strong>Company Name</strong></label>
                                    <input type="text" class="form-control" value="{{ isset($data['company_name']) ? $data['company_name'] : '' }}" name="company_name" id="company_name" placeholder="">
                                </div>
                            </div>
                        
                            <div class="col-lg-14 mb-3">
                                <div class="form-group">
                                    <label for="designation_name"><strong>Position for Job</strong></label>
                                    <input type="text" class="form-control" value="{{ isset($data['designation_name']) ? $data['designation_name'] : '' }}" id="designation_name" name="designation_name" placeholder="">
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
                                        <label for="skills"><strong>Skills (in tags)</strong></label>
                                        <input type="text" class="form-control" value="{{ isset($data['skills']) ? $data['skills'] : '' }}" id="skills" name="skills" placeholder="">
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
                                        <label for="designation_name"><strong>Position for Job</strong></label>
                                        <input type="text" class="form-control" value="{{ isset($data['designation_name']) ? $data['designation_name'] : '' }}" id="designation_name" name="designation_name" placeholder="">
                                    </div>
                                </div>
                           
                                <div class="col-lg-14 mb-3">
                                    <div class="form-group">
                                        <label for="skills"><strong>Skills (in tags)</strong></label>
                                        <input type="text" class="form-control" value="{{ isset($data['skills']) ? $data['skills'] : '' }}" id="skills" name="skills" placeholder="">
                                    </div>
                                </div>
                            </div>
                        `



                case 'RESUME_REVIEW':

                    html = `
                            <div class="row g-lg-4 mb-1">
                                <div class="col-lg-14 mb-3">
                                    <div class="form-group">
                                        <label for="designation_name"><strong>Position for Job</strong></label>
                                        <input type="text" class="form-control" value="{{ isset($data['designation_name']) ? $data['designation_name'] : '' }}" id="designation_name" name="designation_name" placeholder="">
                                    </div>
                                </div>
                            
                                <div class="col-lg-14 mb-3">
                                    <div class="form-group">
                                        <label for="skills"><strong>Skills (in tags)</strong></label>
                                        <input type="text" class="form-control" value="{{ isset($data['skills']) ? $data['skills'] : '' }}" id="skills" name="skills" placeholder="">
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
                                        <label for="company_name"><strong>Company Name</strong></label>
                                        <input type="text" class="form-control" value="{{ isset($data['company_name']) ? $data['company_name'] : '' }}" name="company_name" id="company_name" placeholder="">
                                    </div>
                                </div>
                            </div>

                            <div class="row g-lg-4 mb-1">
                                <div class="col-lg-14 mb-3">
                                    <div class="form-group">
                                        <label for="designation_name"><strong>Position for Job</strong></label>
                                        <input type="text" class="form-control" value="{{ isset($data['designation_name']) ? $data['designation_name'] : '' }}" id="designation_name" name="designation_name" placeholder="">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row g-lg-4 mb-1">
                                <div class="col-lg-14 mb-3">
                                    <div class="form-group">
                                        <label for="skills"><strong>Skills (in tags)</strong></label>
                                        <input type="text" class="form-control" value="{{ isset($data['skills']) ? $data['skills'] : '' }}" id="skills" name="skills" placeholder="">
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
                        console.log("checkedOptions",checkedOptions);
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
                $(element).parent('div').parent('div').append(error);
            },
            submitHandler: function(form) {
                event.preventDefault();
                removeErrors();
                console.log("form",form.action);
                submitAjax(form,ServiceCreatesuccessMethod)
            }
        });


        function ServiceCreatesuccessMethod(data) {
            alert("Service Added successfully")
            console.log("dd", data)
            //location.reload();
        }


    </script>

    @include('frontend.custom-assets.service.tabs-js')
@endpush
