<div class="tab-pane fade   " id="professional" role="tabpanel" aria-labelledby="professional-tab">

    {{-- @dd($respond) --}}

    <form id="experiences_information" method="POST" action="{{ route('profile.experience') }}"
        class="edit-profile-form profile-form">
        @csrf
        @php $record1 = count($profileExperience['experiences']) == 0; @endphp
        <div class="section-title2">
            <h5>Employment Information:</h5>
        </div>



        <div class="experiences-row">

            @include('frontend.partials.professional-form')
            <div class="add-remove-btn d-flex align-items-center justify-content-between mb-50">
                <div class="add-row">
                    <button type="button" class="add-experiences-row">Add New+
                    </button>
                </div>
            </div>

            <div class="experiences-parent-row">

            </div>

            <div class="col-md-12">
                <div class="form-inner">
                    <button class="primry-btn-2 lg-btn w-unset" type="submit"><i class="fa fa-plus"></i> Add Experience</button>
                </div>
            </div>

        </div>



        <div class="col-md-12 mt-4">
            <div class="row">
                @if (count($profileExperience['experiences']) > 0)
                    @foreach ($profileExperience['experiences'] as $Experience)
                        <div class="col-xl-6 col-sm-6 col-12">

                            <div class="card"
                                style="border:0;-webkit-box-shadow: -4px 6px 19px -4px rgba(0,0,0,0.62);-moz-box-shadow: -4px 6px 19px -4px rgba(0,0,0,0.62);box-shadow: -4px 6px 19px -4px rgba(0,0,0,0.62);">
                                <div class="card-content">
                                    @php

                                        $skills = [];

                                        foreach ($Experience['skills'] as $k => $skill) {
                                            $skills[] = $skill['skill']['name'];
                                        }

                                    @endphp

                                    <div class="card-title p-2">
                                        <h5 class="text-center"><strong>Experience Details</strong></h5>
                                    </div>
                                    <div class="card-body">

                                        <p> <strong>Designation </strong> : {{ $Experience['designation']['name'] }}</p>
                                        <p><strong>Employment Type </strong>: {{ $Experience['employment_type'] }}</p>
                                        <p><strong>Company Name </strong>: {{ $Experience['company']['name'] }}</p>
                                        <p><strong>Location Type </strong> : {{ $Experience['start_date'] }}</p>
                                        <p><strong>Currently Working </strong> : {{ $Experience['end_date'] }}</p>
                                        <p><strong>Start Date </strong> : {{ $Experience['start_date'] }}</p>
                                        <p><strong>End Date </strong> : {{ $Experience['end_date'] }}</p>

                                        <p><strong>Skills </strong>: {{ implode(',', $skills) }} </p>
                                        <p><strong>Description </strong> : {{ $Experience['description'] }}</p>
                                    </div>
                                    <div class="card-footer d-flex">
                                        <button
                                            form-url="{{ route('profile.experience.update', ['id' => $Experience['id']]) }}"
                                            data-url="{{ route('profile.experience.edit', $Experience['id']) }}"
                                            type="button" class="experienceEditButton primry-btn-2 p-4 orenge-btn-3 ">
                                            <i class="fa fa-edit "></i>
                                        </button>

                                        &nbsp;

                                        <button data-url="{{ route('delete.profile.experience', $Experience['id']) }}"
                                            type="button" class="experienceDeleteButton primry-btn-2 p-4 orenge-btn-3 ">
                                            <i class="fa fa-trash"></i>
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </form>
</div>

<div class="modal" id="experience-modal-form">
    <div class="modal-dialog  modal-dialog-centered ">
        <div class="modal-content sub-bg">
            <div class="modal-header subs-header">
                <h4 class="modal-title">Update Experience</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" id="experience-update-form">
                            @csrf
                            <div class="col-md-12">

                                <div class="row">

                                    <div id="experience-form-data">

                                    </div>

                                    <div class="col-md-2">
                                        <button type="submit" class="primry-btn-2">Update</button>
                                    </div>

                                </div>

                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@push('inlinejs')
    <script>

        $(".professional_start_date").datepicker({    
            dateFormat: 'dd-mm-yy',
            onSelect: function(selectedDate) {
                $(".professional_end_date").datepicker("option", "minDate", selectedDate);
            }
        });

        $(".professional_end_date").datepicker({    
            dateFormat: 'dd-mm-yy',
            onSelect: function(selectedDate) {
                $(".professional_start_date").datepicker("option", "minDate", selectedDate);
            }
        });

        var itDesignations = [
            "Software Engineer",
            "Senior Software Engineer",
            "Software Developer",
            "Web Developer",
            "Frontend Developer",
            "Backend Developer",
            "Full Stack Developer",
            "DevOps Engineer",
            "System Administrator",
            "Network Administrator",
            "Database Administrator",
            "IT Manager",
            "IT Director",
            "Chief Technology Officer (CTO)",
            "Data Scientist",
            "Data Analyst",
            "Business Analyst",
            "Quality Assurance Engineer",
            "UI/UX Designer",
            "Security Analyst",
            "Technical Support Specialist",
            "Systems Analyst",
            "Network Engineer",
            "Cloud Solutions Architect",
            "Product Manager",
            "Project Manager",
            "Scrum Master",
            "IT Consultant",
            "Technical Writer",
            "IT Trainer",
            "Cybersecurity Specialist",
            "Machine Learning Engineer",
            "Artificial Intelligence (AI) Engineer",
            "Blockchain Developer",
            "Software Architect",
            "Technical Lead",
            "Release Manager",
            "IT Auditor",
            "IT Compliance Analyst",
            "Business Intelligence Analyst",
            "ERP Consultant",
            "Database Developer",
            "Network Security Engineer",
            "IT Support Specialist",
            "User Interface (UI) Developer",
            "User Experience (UX) Researcher",
            "Mobile App Developer",
            "Systems Administrator",
            "Desktop Support Technician"
        ];

const webTechnologies = [
            "HTML",
            "CSS",
            "JavaScript",
            "React",
            "Angular",
            "Vue.js",
            "Node.js",
            "Express.js",
            "Django",
            "Flask",
            "Ruby on Rails",
            "ASP.NET",
            "JavaServer Faces (JSF)",
            "Spring Framework",
            "jQuery",
            "Bootstrap",
            "Sass",
            "Less",
            "TypeScript",
            "RESTful API",
            "WebSocket",
            "JSON",
            "XML",
            "Webpack",
            "Babel",
            "Docker",
            "Kubernetes",
            "Git",
            "MongoDB",
            "MySQL",
            "PostgreSQL",
            "Firebase",
            "OAuth",
            "JWT (JSON Web Tokens)",
            "SSL/TLS",
            "HTTP/2",
            "WebSockets",
            "Service Workers",
            "Progressive Web Apps (PWAs)",
            "Responsive Web Design",
            "WebAssembly",
            "WebRTC",
            "Canvas API",
            "WebGL",
            "WebSockets",
            "IndexedDB",
            "LocalStorage",
            "Cookies",
            "Web Workers",
            "Server-Sent Events (SSE)",
            "Microservices",
            "Serverless Architecture",
            "Single Page Applications (SPAs)",
            "Content Delivery Network (CDN)",
            "Static Site Generators (SSG)",
            "Jamstack",
            "API Gateway",
            "GraphQL",
            "OpenAPI (Swagger)",
            "Web Accessibility (A11y)",
            "Search Engine Optimization (SEO)",
            "WebAssembly",
            "WebVR",
            "Augmented Reality (AR) on the Web",
            "Virtual Reality (VR) on the Web",
            "Node.js",
            "Django (Python)",
            "Flask (Python)",
            "Ruby on Rails",
            ".NET",
            "Spring Framework (Java)",
            "Express.js",
            "ASP.NET",
            "Laravel (PHP)",
            "Symfony (PHP)",
            "Ruby on Rails",
            "Phoenix (Elixir)",
            "FastAPI (Python)",
            "Koa.js",
            "Hapi.js",
            "ASP.NET Core",
            "Grails (Groovy)",
            "Adonis.js",
            "NestJS",
            "Meteor.js",
            "Actix (Rust)",
            "Gin (Go)",
            "Play Framework (Scala/Java)",
            "CakePHP (PHP)",
            "Slim (PHP)",
            "Sails.js",
            "Feathers.js",
        ];

        var counter_exp = 0;

        $(document).on('click', '.add-experiences-row', function() {
            counter_exp++;
            var newRow = '';
            var newRow = `<div class="row addExperience mt-3">
                        <div class="col-lg-12">
                            <div class="info-title">
                                <h6>Add Your Experiences</h6>
                                <div class="dash"></div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label for="designation_name${counter_exp}">Designation<span class="required"> * </span> </label>
                                <div class="input-area">
                                    <img src="assets/images/icon/designation-2-2.svg" alt="" />
                                    <input type="text" name="designation_name[${counter_exp}]" id="designation_name${counter_exp}" class="designation_name" placeholder="Type here">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label for="employment_type${counter_exp}">Employment type<span class="required"> * </span> </label>
                                <div class="input-area">
                                    <img src="assets/images/icon/qualification-2-2.svg"  alt="">
                                    <select required name="employment_type[${counter_exp}]" id="employment_type${counter_exp}" class="employment_type select1">
                                        @foreach (getEmploymentType() as $key => $item)
                                            <option  value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label for="company_name${counter_exp}">Company<span class="required"> * </span> </label>
                                <div class="input-area">
                                    <img src="assets/images/icon/company-2-2.svg" alt="">
                                    <input type="text"  name="company_name[${counter_exp}]" class="company_name" id="company_name${counter_exp}" placeholder="Type here" />
                                </div>
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label for="company_type${counter_exp}">Company type<span class="required"> * </span> </label>
                                <div class="input-area">
                                    <img src="assets/images/icon/qualification-2-2.svg"  alt="">
                                    <select required name="company_type[${counter_exp}]" id="company_type${counter_exp}" class="company_type select1">
                                        
                                        @foreach (getTypes() as $key => $item)
                                            <option  value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label>Industry<span class="required"> * </span> </label>
                                <div class="input-area">
                                    <img src="assets/images/icon/qualification-2-2.svg"  alt="">
                                    <input type="text" required name="industry_name[${counter_exp}]" id="industry_name${counter_exp}" class="industry_name select1" placeholder="Type here">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-inner mb-25">
                                <label>Location type<span class="required"> * </span> </label>
                                <div class="input-area">
                                    <img src="assets/images/icon/qualification-2-2.svg"  alt="">
                                    <select required name="location_type[${counter_exp}]" id="location_type${counter_exp}" class="location_type select1">
                                        
                                        @foreach (getLocationType() as $key => $item)
                                            <option  value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div
                                class="form-agreement employment-check form-inner d-flex justify-content-between flex-wrap p-0">
                                <div class="form-group two">
                                    <input required type="checkbox" value="1" id="currently_working${counter_exp}" name="currently_working[${counter_exp}]">
                                    <label for="currently_working${counter_exp}">Continuing Working Here</label>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-inner mb-20">
                                <label for="start_date${counter_exp}">Starting Period<span class="required"> * </span> </label>
                                <div class="input-area">
                                    <img src="assets/images/icon/calender2-2.svg" alt="">
                                    <input type="text" required id="start_date${counter_exp}" name="start_date[${counter_exp}]" placeholder="DD-MM-YY">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-20">
                                <label for="end_date${counter_exp}">Ending Period<span class="required"> * </span> </label>
                                <div class="input-area">
                                    <img src="assets/images/icon/calender2-2.svg" alt="">
                                    <input required type="text" id="end_date${counter_exp}" name="end_date[${counter_exp}]"  placeholder="DD-MM-YY">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-inner mb-20">
                                <label for="description${counter_exp}">Responsibility*<span class="required"> * </span> </label>
                                <textarea required name="description[${counter_exp}]" id="description${counter_exp}" placeholder="Write Your Responsibility..."></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group mb-25">
                                <label for="skills${counter_exp}">Skills<span class="required"> * </span> </label>
                                <input type="text" required class="form-control" name="skills[${counter_exp}]" id="skills${counter_exp}" />
                            </div>
                        </div>

                        

                        <div class="add-remove-btn d-flex align-items-center justify-content-between mb-50">
                            <div class="add-row">
                                <button type="button" class="remove-experiences-row remove mb-1">Remove  - </button>
                                <button type="button" class="add-experiences-row">Add New + </button>
                            </div>
                        </div>

                    </div>
                    `;


            $('.experiences-parent-row').append(newRow);


           
            Autoomplete("industry_name" + counter_exp,{!! $industry !!},)
            Autoomplete("industry_name" + counter_exp,itDesignations,)
            Autoomplete("company_name" + counter_exp,{!! $company !!},)
            datepicker("start_date"+ counter_exp,"end_date"+ counter_exp,"dd-mm-yy");
            datepicker("end_date"+ counter_exp,"start_date"+ counter_exp,"dd-mm-yy");
           

            $('#employment_type' + counter_exp).niceSelect();
            $('#company_type' + counter_exp).niceSelect();
            $('#location_type' + counter_exp).niceSelect();


            var input1 = document.getElementById('skills' + counter_exp);
            new Tagify(input1, {
                whitelist: webTechnologies,
                dropdown: {
                    maxItems: Infinity,
                    enabled: 0, // Always show suggestions dropdown
                    closeOnSelect: false // Do not close the dropdown when an item is selected
                }
            });
        });

        $(document).on('click', '.remove-experiences-row', function() {

            Swal.fire({
                title: "Delete",
                text: "Are you sure want to delete this experiences record !",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).parents('.addExperience').remove();
                }
            });

        });

        // Custom method to check for special characters
        $.validator.addMethod("noSpecialChars", function(value, element) {
            // Regular expression to match special characters
            var regex = /^[a-zA-Z0-9.\s]+$/;
            return this.optional(element) || regex.test(value);
        }, "Special characters are not allowed.");

        $('#experiences_information').validate({
            rules: {
                'designation_name[]': {
                    required: true,
                    noSpecialChars:true,
                },
                'employment_type[]': {
                    required: true
                },
                'company_name': {
                    required: true,
                    noSpecialChars:true,
                },
                'company_type[]': {
                    required: true,
                    noSpecialChars:true,
                },
                'industry_name[]': {
                    required: true,
                    noSpecialChars:true,
                },
                'location_type[]': {
                    required: true
                },
                'start_date[]': {
                    required: true
                },
                'end_date[]': {
                    required: true
                },
                'description[]': {
                    required: true
                },
                'skills[]': {
                    required: true
                }
                
            },
            messages: {

            },
            errorPlacement: function(error, element) {
                console.log("errorPlacement",element);
                $(element).closest('.form-inner').append(error);
            },
            submitHandler: function(form) {
                console.log("submitHandler");
                removeErrors();
                submitAjax(form, sucessMethod);
            }
        });

        //edit method for show detail of experience in popup
        $(document).on('click', '.experienceEditButton', function() {
            $('#experience-modal-form').modal('show');
            $("#experience-update-form").attr('action', $(this).attr('form-url'));
            $.ajax({
                url: $(this).attr('data-url'),
                method: 'GET',
                data: {
                    id: $(this).data('id')
                },
                success: function(data) {
                    $('#experience-form-data').html(data);

                    Autoomplete("experience-update-form #industry_name",{!! $industry !!})
                    Autoomplete("experience-update-form #designation_name",itDesignations)
                    Autoomplete("experience-update-form #company_name",{!! $company !!})

                    $('#experience-update-form #employment_type').niceSelect();
                    $('#experience-update-form #company_type').niceSelect();
                    $('#experience-update-form #location_type').niceSelect();

                    $("#experience-update-form .professional_start_date").datepicker({    
                        dateFormat: 'dd-mm-yy',
                        onSelect: function(selectedDate) {
                            $("#experience-update-form .professional_end_date").datepicker("option", "minDate", selectedDate);
                        }
                    });

                    $("#experience-update-form .professional_end_date").datepicker({    
                        dateFormat: 'dd-mm-yy',
                        onSelect: function(selectedDate) {
                            $("#experience-update-form .professional_start_date").datepicker("option", "minDate", selectedDate);
                        }
                    });

                   
                        tagify1 = new Tagify($("#experience-update-form #skills")[0], {
                            whitelist: webTechnologies,
                            dropdown: {
                                maxItems: Infinity,
                                enabled: 0, // Always show suggestions dropdown
                                closeOnSelect: false // Do not close the dropdown when an item is selected
                            }
                            // blacklist : ["fuck", "shit"]
                        });
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            })
        })

        //update validation method
        $('#experience-update-form').validate({
            rules: {
                'designation_name[]': {
                    required: true,
                    noSpecialChars:true,
                },
                'employment_type[]': {
                    required: true
                },
                'company_name': {
                    required: true,
                    noSpecialChars:true,
                },
                'company_type[]': {
                    required: true,
                    noSpecialChars:true,
                },
                'industry_name[]': {
                    required: true,
                    noSpecialChars:true,
                },
                'location_type[]': {
                    required: true
                },
                'start_date[]': {
                    required: true
                },
                'end_date[]': {
                    required: true
                },
                'description[]': {
                    required: true
                },
                'skills[]': {
                    required: true
                }
                
            },
            messages: {

            },
            errorPlacement: function(error, element) {
                console.log("errorPlacement",element);
                $(element).closest('.form-inner').append(error);
            },
            submitHandler: function(form) {
                console.log("submitHandler");
                removeErrors();
                submitAjax(form, sucessMethod);
            }
        });


        function sucessMethod(formObj, response) {

            if (response.status) {
                $('#experience-modal-form').modal('hide');
                popupMsg('Success', response.message, 'success');
            } else {

                if (response.isValidationError) {

                    $(".invalid-feedback").remove();
                    console.log("formObj.id",formObj.id);
                    $.each(response.errors, function(fieldName, field) {
                        $.each(field, function(index, msg) {

                            fieldName = fieldName.replace('.', '', msg);
                            console.log("fieldName",fieldName);
                            $('#'+formObj.id + " #"+fieldName).addClass('is-invalid state-invalid');
                            errorDiv = $('#'+formObj.id + " #"+fieldName).parent('div').parent('div');
                            errorDiv.append('<div class="invalid-feedback d-block">' + msg + '</div>');

                        });
                    });


                }

                errorMsg('Error', response.message, 'error');
            }
        }

        $(document).on('click', '.experienceDeleteButton', function() {

            Swal.fire({
                title: "Delete",
                text: "Are you sure ?",
                icon: "warning",
                showCancelButton: true,
            }).then((result) => {

                if (result.isConfirmed) {

                    $.ajax({
                        url: $(this).attr('data-url'),
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {


                            if (data.status) {
                                popupMsg('Success', data.message, 'success');
                            } else {
                                errorMsg('Error', data.message, 'error');
                            }

                        },
                        error: function(data) {
                            console.log('Error:', data);
                        }
                    })

                }

            });

        })



       

        Autoomplete("industry_name",{!! $industry !!})
        Autoomplete("designation_name",itDesignations)
        Autoomplete("company_name",{!! $company !!})



    
        var input1 = document.getElementById('skills')
        tagify1 = new Tagify(input1, {
            whitelist: webTechnologies,
            dropdown: {
                maxItems: Infinity,
                enabled: 0, // Always show suggestions dropdown
                closeOnSelect: false // Do not close the dropdown when an item is selected
            }
            // blacklist : ["fuck", "shit"]
        });
    </script>
@endpush
