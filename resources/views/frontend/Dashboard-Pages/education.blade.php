<div class="tab-pane fade all-overflow-class" id="pills-two" role="tabpanel" aria-labelledby="pills-two-tab">
    <div class="px-3 py-3 form-main-parent">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item p-0 m-0">
                <h2 class="accordion-header p-0 m-0" id="flush-headingOne">
                    <button class="accordion-button collapsed p-0 m-0" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        <div class="w-100">
                            <div class="p-0 m-0 d-flex w-100 justify-content-between align-items-center">
                                <p class="form-main-heading mb-3">Educational qualifications</p>
                                <a href="#" class="add-more-button mb-3">Add more +</a>
                            </div>
                            <hr class="p-0 m-0" />
                        </div>
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body p-0">
                        <div class="mt-4">
                            <form id="education_qualification" method="POST" action="{{ route('profile.education') }}"
                                class="edit-profile-form profile-form">
                                @csrf
                                <div class="w-100 p-0">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 col-12 pb-2">
                                            <label for="school_id" class="form-label">Education level</label>
                                            {{-- <input type="text" class="form-control form-inputs-parent" name="school_id" id="school_id" placeholder="Highest education level" /> --}}

                                            <div class="dropdown-wrapper">
                                                <select class="form-control form-inputs-parent" name="degree_name"
                                                    id="degree_name">
                                                    <option value="" disabled selected>Select Level</option>
                                                    @foreach (educationLevels() as $item)
                                                        <option value="{{ $item }}">{{ $item }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="dropdown-icon">&#8964;</span>
                                            </div>


                                            <span class="text-danger" id="error-degree"></span>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-12 pb-2">
                                            <label for="degree_id" class="form-label">School Name</label>
                                            <input type="text" class="form-control form-inputs-parent"
                                                name="school_name" id="school_name" placeholder="Major in subject" />
                                            <span class="text-danger" id="error-school_name"></span>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-12 pb-2">
                                            <label for="field_of_study" class="form-label">Field of study</label>
                                            <input type="text" class="form-control form-field_of_study-parent"
                                                name="field_of_study" id="field_of_study" placeholder="Your field" />
                                            <span class="text-danger" id="error-field_of_study"></span>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-12 pb-2">
                                            <label for="languages" class="form-label">Percentage scored/CGPA * </label>
                                            <div class="dropdown-wrapper">

                                                <input type="text" class="form-control form-inputs-parent"
                                                    name="grade" id="grade"
                                                    placeholder="Percentage scored/CGPA" />

                                            </div>
                                            <span class="text-danger" id="error-grade"></span>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-12 pb-2">
                                            <label for="start_date" class="form-label">Starting period</label>
                                            <input type="date" class="form-control form-inputs-parent"
                                                name="start_date" id="start_date" />
                                            <span class="text-danger" id="error-start_date"></span>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-12 pb-2">
                                            <label for="end_date" class="form-label">Ending period</label>
                                            <input type="date" class="form-control form-inputs-parent"
                                                name="end_date" id="end_date" />
                                            <span class="text-danger" id="error-end_date"></span>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-12">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control form-text-area-parent" name="description" id="description"
                                                placeholder="Other details/achievements in college" rows="3"></textarea>
                                            <span class="text-danger" id="error-description"></span>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12 text-start">
                                            <button type="submit" id="save_education"
                                                class="btn btn-form-submit">Add Details</button>
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

    @foreach ($profileEducation['educations'] as $education)
        <div class="mt-3 px-3 py-3 form-main-parent border-here">
            <div class="p-0 m-0  align-items-center">
                <p class="form-main-heading mb-0">{{ $education['school']['name'] ?? 'Degree Name' }}
                    <a href="#" style="float: right"
                        form-url="{{ route('profile.education.update', ['id' => $education['id']]) }}"
                        data-url="{{ route('profile.education.edit', $education['id']) }}"
                        class="editButton add-more-button float-right">Edit ✎
                    </a>&nbsp;&nbsp;&nbsp;

                    <a href="#" style="float: right"
                        data-url="{{ route('delete.profile.education', $education['id']) }}"
                        class="deleteButton add-more-button float-right">Delete <i class="fa fa-trash"></i>
                    </a>
                </p>
            </div>
            <hr />
            <div class="text-start">
                <p class="details-text-one mb-0">Course Name</p>
                <p class="details-text-two">{{ $education['degree']['name'] ?? 'N/A' }}</p>
            </div>


            <div class="d-flex gap-5">
                <div class="text-start me-5">
                    <p class="details-text-one mb-0">Field of study</p>
                    <p class="details-text-two">{{ $education['field_of_study']['name'] ?? 'N/A' }}</p>
                </div>
                <div class="text-start ms-5">
                    <p class="details-text-one mb-0">Percentage scored/CGPA * </p>
                    <p class="details-text-two">{{ $education['grade'] ?? 'N/A' }}</p>
                </div>
            </div>

            <div class="d-flex gap-5">
                <div class="text-start me-5">
                    <p class="details-text-one mb-0">Start date</p>
                    <p class="details-text-two">{{ $education['start_date'] ?? 'N/A' }}</p>
                </div>
                <div class="text-start ms-5">
                    <p class="details-text-one mb-0">End date</p>
                    <p class="details-text-two">{{ $education['end_date'] ?? 'N/A' }}</p>
                </div>
            </div>
            <div class="text-start">
                <p class="details-text-one mb-0">Description</p>
                <p class="details-text-two">{{ $education['description'] ?? 'N/A' }}</p>
            </div>
        </div>
    @endforeach
</div>




<div class="modal" id="susbc-form">
    <div class="modal-dialog  modal-dialog-centered ">
        <div class="modal-content sub-bg">
            <div class="modal-header subs-header">
                <h4 class="modal-title">Update Education</h4>
                <button type="button" class="btn btn-default close" data-dismiss="modal"
                    aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" id="education-update-form">
                            @csrf
                            <div class="col-md-12">

                                <div class="row">

                                    <div id="education-form-data">

                                    </div>

                                    <div class="col-md-2 mt-2">
                                        <button type="submit" class="btn btn-success primry-btn-2">Update</button>
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

@push('education-js')
    <script>
        $(document).ready(function() {
            $('#education_qualification').on('submit', function(e) {
                e.preventDefault();

                // Clear previous error messages
                $('.text-danger').text('');

                var formData = new FormData(this);

                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        if (!response.status) {
                            var errors = response.errors;
                            $.each(errors, function(key, value) {
                                var fieldKey = key.replace(/\.\d+/,
                                ''); // remove .0, .1 etc.
                                $('#error-' + fieldKey).text(value[0]);
                            });
                            toastr.error('Please correct the errors and try again.');
                        } else {
                            toastr.success(response.message);
                            // You can redirect or perform other actions on success
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                var fieldKey = key.replace(/\.\d+/,
                                ''); // remove .0, .1 etc.
                                $('#error-' + fieldKey).text(value[0]);
                            });
                        } else {
                            toastr.error('An error occurred. Please try again.');
                        }
                    }
                });
            });
        });


        //edit method for show detail of education in popup
        $(document).on('click', '.editButton', function() {
            $('#susbc-form').modal('show');
            $("#education-update-form").attr('action', $(this).attr('form-url'));
            $.ajax({
                url: $(this).attr('data-url'),
                method: 'GET',
                data: {
                    id: $(this).data('id')
                },
                success: function(data) {
                    $('#education-form-data').html(data);
                    Autoomplete("education-update-form #school_id0", {!! $schools !!})
                    Autoomplete("education-update-form #degree_id0", {!! $schools_degree !!})
                    Autoomplete("education-update-form #field_of_study_id0", {!! $schools_fields !!})
                    $('#education-update-form #grade0').niceSelect();
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            })
        })


        //update validation method
        $('#education-update-form').validate({
            rules: {
                'degree_name': {
                    required: true
                },
                'school_name': {
                    required: true
                },
                'field_of_study': {
                    required: true
                },
                'grade': {
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
            },
            messages: {

            },
            errorPlacement: function(error, element) {
                $(element).parent('div').parent('div').append(error);
            },
            submitHandler: function(form) {
                removeErrors();
                submitAjax(form, sucessMethod);
            }
        });


        function sucessMethod(formObj, response) {

            if (response.status) {
                $('#susbc-form').modal('hide');

                toastr.success(response.message);
                //popupMsg('Success', response.message, 'success');
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


        $(document).on('click', '.deleteButton', function() {

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
