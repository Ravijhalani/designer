                    <!-- ----------------tab content form three----------------- -->
                    <div class="tab-pane fade" id="pills-three" role="tabpanel" aria-labelledby="pills-three-tab">
                        <div class="px-3 py-3 form-main-parent">
                            <!-- accordanition two-->
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item p-0 m-0">
                                    <h2 class="accordion-header p-0 m-0" id="flush-headingOne">
                                        <button class="accordion-button collapsed p-0 m-0" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseProff"
                                            aria-expanded="false" aria-controls="flush-collapseOne">
                                            <div class="w-100">
                                                <div
                                                    class="p-0 m-0 d-flex w-100 justify-content-between align-items-center">
                                                    <p class="form-main-heading mb-3">
                                                        Professional information
                                                    </p>
                                                    <a href="#" class="add-more-button mb-3">Add more +</a>
                                                </div>
                                                <hr class="p-0 m-0" />
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseProff" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body p-0">
                                            <div class="mt-4">

                                                <form id="experiences_information" method="POST"
                                                    action="{{ route('profile.experience') }}"
                                                    class="edit-profile-form profile-form">
                                                    @csrf
                                                    <div class="w-100 p-0">
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12 col-12 pb-2">
                                                                <label for="firstName" class="form-label">Designation
                                                                </label>
                                                                <input type="text"
                                                                    class="form-control form-inputs-parent"
                                                                    id="designation_name" name="designation_name"
                                                                    placeholder="Highest education level" required />
                                                            </div>
                                                            <div class="col-md-6 col-sm-12 col-12 pb-2">
                                                                <label for="lastName" class="form-label">Employment
                                                                    type</label>
                                                                <select required name="employment_type"
                                                                    id="employment_type"
                                                                    class="form-control form-inputs-parent">
                                                                    @foreach (getEmploymentType() as $key => $item)
                                                                        <option
                                                                            @if (isset($result['employment_type'])) @if ($result['employment_type'] == $item) selected @endif
                                                                            @endif
                                                                            value="{{ $item }}">{{ str_replace('_', ' ', $item) }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12 col-12 pb-2">
                                                                <label for="lastName" class="form-label">Company
                                                                    Name</label>
                                                                <input type="text"
                                                                    class="form-control form-inputs-parent"
                                                                    id="company_name" name="company_name"
                                                                    placeholder="Your field" required />
                                                            </div>
                                                            <div class="col-md-6 col-sm-12 col-12 pb-2">
                                                                <label for="phoneNumber" class="form-label">Company
                                                                    type</label>
                                                                <div class="dropdown-wrapper">

                                                                    <select required name="company_type"
                                                                        id="company_type"
                                                                        class="form-control form-inputs-parent">
                                                                        @foreach (getTypes() as $key => $item)
                                                                            <option
                                                                                @if (isset($result['company'])) @if ($result['company']['name'] == $item) selected @endif
                                                                                @endif
                                                                                value="{{ $item }}">{{ $item }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    <span class="dropdown-icon">&#8964;</span>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-sm-12 col-12 pb-2">
                                                                <label for="phoneNumber"
                                                                    class="form-label">Industry</label>
                                                                <div class="dropdown-wrapper">

                                                                    <input type="text"
                                                                        class="form-control form-inputs-parent"
                                                                        id="industry_name" name="industry_name"
                                                                        placeholder="Enter industry type" required />

                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12 col-12 pb-2">
                                                                <label for="phoneNumber" class="form-label">Location
                                                                    type</label>
                                                                <div class="dropdown-wrapper">

                                                                    <select required name="location_type"
                                                                        id="location_type"
                                                                        class="form-control form-inputs-parent">
                                                                        @foreach (getLocationType() as $key => $item)
                                                                            <option value="{{ $item }}">
                                                                                {{ $item }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <span class="dropdown-icon">&#8964;</span>
                                                                </div>
                                                            </div>
                                                            {{-- <div class="col-md-6 col-sm-12 col-12 pb-2">
                                                                <label for="phoneNumber" class="form-label">Industry</label>
                                                                <div class="dropdown-wrapper">

                                                                    <input type="checkbox"
                                                                    class="form-control form-inputs-parent" id="currently_working"
                                                                    name="currently_working" value="1" placeholder="Enter industry type" />
                                                                    <label for="currently_working">Continuing Working Here</label>

                                                                </div>
                                                            </div> --}}

                                                            <div class="col-md-6 col-sm-12 col-12 pb-2">
                                                                <label for="startDate" class="form-label ">Starting
                                                                    period</label>
                                                                <input type="date"
                                                                    class="form-control form-inputs-parent "
                                                                    id="professional_start_date" name="start_date" required />
                                                            </div>
                                                            <div class="col-md-6 col-sm-12 col-12 pb-2">
                                                                <label for="endDate" class="form-label ">Ending
                                                                    period</label>
                                                                <input type="date"
                                                                    class="form-control form-inputs-parent "
                                                                    id="professional_end_date" name="end_date" required />
                                                            </div>

                                                            <div class="col-md-12 col-sm-12 col-12">
                                                                <label for="careerObjective"
                                                                    class="form-label">Responsibility</label>
                                                                <textarea class="form-control form-text-area-parent" id="description" name="description"
                                                                    placeholder="Responsibility.." rows="3" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12 col-12 pb-2">
                                                            <label for="endDate" class="form-label">Skills
                                                            </label>
                                                            <input type="text"
                                                                class="form-control form-inputs-parent" id="skills"
                                                                name="skills" required />
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-md-12 text-start">
                                                                <button type="submit" class="btn btn-form-submit">
                                                                    Add Details
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="saved-details-parent"></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        Accordion Item #2
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                                    </div>
                                    </div> -->
                                <!-- <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                        Accordion Item #3
                                        </button>
                                    </h2>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                                    </div>
                                    </div> -->
                            </div>

                        </div>
                        {{-- @dd($profileExperience['experiences']) --}}
                        @if (count($profileExperience['experiences']) > 0)
                            @foreach ($profileExperience['experiences'] as $Experience)
                                @php

                                    $skills = [];

                                    foreach ($Experience['skills'] as $k => $skill) {
                                        $skills[] = $skill['skill']['name'];
                                    }

                                @endphp

                                <div class="mt-3 px-3 py-3 form-main-parent border-here">
                                    <div class="p-0 m-0  align-items-center">
                                        <p class="form-main-heading mb-0">
                                            {{ $Experience['company']['name'] }}

                                            <a form-url="{{ route('profile.experience.update', ['id' => $Experience['id']]) }}"
                                                data-url="{{ route('profile.experience.edit', $Experience['id']) }}"
                                                style="float:right" href="javascript:void(0)"
                                                class="experienceEditButton add-more-button  text-success btn"><i class="fa fa-pencil"></i>  </a> &nbsp;&nbsp;
                                            <a data-url="{{ route('delete.profile.experience', $Experience['id']) }}"
                                                style="float:right" href="javascript:void(0)"
                                                class="experienceDeleteButton add-more-button text-danger btn"><i class="fa fa-trash"></i> </a>

                                        </p>


                                    </div>
                                    <hr />


                                    <div class="d-flex gap-5">
                                        <div class="text-start me-5">
                                            <p class="details-text-one mb-0">Employment Type</p>
                                            <p class="details-text-two">{{ $Experience['employment_type'] }}</p>
                                        </div>
                                        <div class="text-start ms-5">
                                            <p class="details-text-one mb-0">Location Type </p>
                                            <p class="details-text-two">{{ $Experience['location_type'] ?? 'N/A' }}
                                            </p>
                                        </div>
                                    </div>


                                    <div class="d-flex gap-5">
                                        <div class="text-start me-5">
                                            <p class="details-text-one mb-0">Start date</p>
                                            <p class="details-text-two">{{ $Experience['start_date'] ?? 'N/A' }}</p>
                                        </div>
                                        <div class="text-start ms-5">
                                            <p class="details-text-one mb-0">End Date </p>
                                            <p class="details-text-two">{{ $Experience['end_date'] ?? 'N/A' }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="d-flex gap-5">
                                        <div class="text-start me-5">
                                            <p class="details-text-one mb-0">Industry Name</p>
                                            <p class="details-text-two">
                                                {{ isset($Experience['industry']) ? $Experience['industry']['name'] : 'N/A' }}
                                            </p>
                                        </div>
                                        <div class="text-start me-5">
                                            <p class="details-text-one mb-0">Skills</p>
                                            <p class="details-text-two text-capitalize">{{ implode(',', $skills) }}
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        @endif

                    </div>


                    <div class="modal" id="experience-modal-form">
                        <div class="modal-dialog modal-lg modal-dialog-centered ">
                            <div class="modal-content sub-bg">
                                <div class="modal-header subs-header">
                                    <h4 class="modal-title">Update Experience</h4>
                                    <button type="button" class="btn close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>

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



                                                    </div>


                                                    <div class="col-md-2 mt-3">
                                                        <button type="submit"
                                                            class="btn btn-success primry-btn-2">Update</button>
                                                    </div>

                                                </div>


                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @push('professional-js')
                        <script>
                            
                        const webTechnologies = {!!json_encode($skills)!!};
                        var itDesignations = {!!json_encode($designation_list)!!};


                                // $('#profession_currently_working').change(function () {
                                //     toggleEndDate();
                                // });

                                $(document).on('change','#profession_currently_working',function(){
                                    toggleEndDate();
                                })

                               

                                function toggleEndDate() {
                                    if ($('#profession_currently_working').is(':checked')) {
                                        $('#edit_professional_end_date').closest('.col-md-6').hide(); // Hide the end date field
                                        $('#edit_professional_end_date').val(''); // Clear the value of the end date field
                                    } else {
                                        $('#edit_professional_end_date').closest('.col-md-6').show(); // Show the end date field
                                    }
                                }
                            

                             $(document).on('change', '#edit_professional_start_date', function() {
                                const startDateTimeInput = document.getElementById('edit_professional_start_date');
                                const endDateTimeInput = document.getElementById('edit_professional_end_date');
                                
                                // Initialize the start date/time picker
                                const startDateTimePicker = flatpickr(startDateTimeInput, {
                                    enableTime: false,
                                    dateFormat: 'd-m-Y',
                                    minuteIncrement: 1,
                                    onChange: function(selectedDates, dateStr, instance) {
                                        // Update the end date/time picker's minDate to the selected start date/time
                                        if (selectedDates.length > 0) {
                                            const selectedStartDate = selectedDates[0];
                                            
                                            // Initialize or update the end date/time picker with minDate
                                            flatpickr(endDateTimeInput, {
                                                enableTime: false,
                                                dateFormat: 'd-m-Y',
                                                minuteIncrement: 1,
                                                minDate: selectedStartDate // Set the minDate based on the start date
                                            });
                                        }
                                    },
                                });
                            });


                            const startDateTimeInput = document.getElementById('professional_start_date');
                            const endDateTimeInput = document.getElementById('professional_end_date');
                        
                            // Initialize the start date/time picker
                            flatpickr(startDateTimeInput, {
                                enableTime: false,
                                dateFormat: 'd-m-Y',
                                minuteIncrement: 1,
                                onChange: function(selectedDates, dateStr, instance) {
                                    // Update the end date/time picker's minDate to the selected start date/time
                                    endDateTimePicker.set('minDate', dateStr);
                                },
                            });

                            // Initialize the end date/time picker
                            const endDateTimePicker = flatpickr(endDateTimeInput, {
                                enableTime: false,
                                dateFormat: 'd-m-Y',
                                minuteIncrement: 1,
                            });
                            

                            // Custom method to check for special characters
                            $.validator.addMethod("noSpecialChars", function(value, element) {
                                // Regular expression to match special characters
                                var regex = /^[a-zA-Z0-9.\s]+$/;
                                return this.optional(element) || regex.test(value);
                            }, "Special characters are not allowed.");

                            $('#experiences_information').validate({
                                rules: {
                                    'designation_name': {
                                        required: true,
                                        noSpecialChars: true,
                                    },
                                    'employment_type': {
                                        required: true
                                    },
                                    'company_name': {
                                        required: true,
                                        noSpecialChars: true,
                                    },
                                    'company_type': {
                                        required: true,
                                        noSpecialChars: true,
                                    },
                                    'industry_name': {
                                        required: true,
                                        noSpecialChars: true,
                                    },
                                    'location_type': {
                                        required: true
                                    },
                                    'start_date': {
                                        required: true
                                    },
                                    'end_date': {
                                        required: true
                                    },
                                    'description': {
                                        required: true
                                    },
                                    'skills': {
                                        required: true
                                    }

                                },
                                messages: {

                                },
                                errorPlacement: function(error, element) {
                                    console.log("errorPlacement", element);
                                    $(element).parent().append(error);
                                },
                                submitHandler: function(form) {
                                    console.log("submitHandler");
                                    removeErrors();
                                    submitAjax(form, sucessMethod);
                                }
                            });

                            function sucessMethod(formObj, response) {

                                if (response.status) {
                                    $('#susbc-form').modal('hide');

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

                                        autoComplete("#experience-update-form #industry_name", {!! $industry !!})
                                        autoComplete("#experience-update-form #designation_name", itDesignations)
                                        autoComplete("#experience-update-form #company_name", {!! $company !!})

                                        $('#experience-update-form #employment_type').niceSelect();
                                        $('#experience-update-form #company_type').niceSelect();
                                        $('#experience-update-form #location_type').niceSelect();


                                         const startDateTimeInput = document.getElementById('edit_professional_start_date');
                                        const endDateTimeInput = document.getElementById('edit_professional_end_date');
                                    
                                        // Initialize the start date/time picker
                                        flatpickr(startDateTimeInput, {
                                            enableTime: false,
                                            dateFormat: 'd-m-Y',
                                            minuteIncrement: 1,
                                            onChange: function(selectedDates, dateStr, instance) {
                                                // Update the end date/time picker's minDate to the selected start date/time
                                                endDateTimePicker.set('minDate', dateStr);
                                            },
                                        });

                                        // Initialize the end date/time picker
                                        const endDateTimePicker = flatpickr(endDateTimeInput, {
                                            enableTime: false,
                                            dateFormat: 'd-m-Y',
                                            minuteIncrement: 1,
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
                                    'designation_name': {
                                        required: true,
                                        noSpecialChars: true,
                                    },
                                    'employment_type': {
                                        required: true
                                    },
                                    'company_name': {
                                        required: true,
                                        noSpecialChars: true,
                                    },
                                    'company_type': {
                                        required: true,
                                        noSpecialChars: true,
                                    },
                                    'industry_name': {
                                        required: true,
                                        noSpecialChars: true,
                                    },
                                    'location_type': {
                                        required: true
                                    },
                                    'start_date': {
                                        required: true
                                    },
                                    'end_date': {
                                        required: true
                                    },
                                    'description': {
                                        required: true
                                    },
                                    'skills': {
                                        required: true
                                    }

                                },
                                messages: {

                                },
                                errorPlacement: function(error, element) {
                                    console.log("errorPlacement", element);
                                    $(element).closest('.form-inner').append(error);
                                },
                                submitHandler: function(form) {
                                    console.log("submitHandler");
                                    removeErrors();
                                    submitAjax(form, sucessMethod);
                                }
                            });


                            Autoomplete("industry_name", {!! $industry !!})
                            Autoomplete("designation_name", itDesignations)
                            Autoomplete("company_name", {!! $company !!})


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
                        </script>
                    @endpush
