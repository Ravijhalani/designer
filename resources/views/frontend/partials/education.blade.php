<div class="tab-pane fade " id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <form id="education_qualification" method="POST" action="{{ route('profile.education') }}"
        class="edit-profile-form profile-form">
        @csrf
        <div class="section-title2">
            <h5>Educational Qualification:</h5>
        </div>
        <div class="education-row">
            <div class="education-child-row">

                @include('frontend.partials.education-form')

                <div class="add-remove-btn d-flex align-items-center justify-content-between mb-50">
                    <div class="add-row">
                        <button type="button" class="add-education-row">Add Education+</button>
                    </div>
                </div>
            </div>

            <div class="education-parent-row">

            </div>

        </div>

        <div class="col-md-12 mb-4">
            <div class="form-inner">
                <button class="primry-btn-2 lg-btn w-unset" id="submitBtn" type="submit">Update Change</button>
            </div>
        </div>



        <div class="col-md-12">
            <div class="row">

                @foreach ($profileEducation['educations'] as $education)
                    <div class="col-xl-6 col-sm-6 col-12">

                        <div class="card"
                            style="border:0;-webkit-box-shadow: -4px 6px 19px -4px rgba(0,0,0,0.62);-moz-box-shadow: -4px 6px 19px -4px rgba(0,0,0,0.62);box-shadow: -4px 6px 19px -4px rgba(0,0,0,0.62);">
                            <div class="card-content">


                                <div class="card-title p-2">
                                    <h5 class="text-center"><strong>Education Details</strong></h5>
                                </div>
                                <div class="card-body">

                                    <p> <strong>School Name </strong> : {{ $education['school']['name'] }}</p>
                                    <p><strong>Degree Name </strong>: {{ $education['degree']['name'] }}</p>
                                    <p><strong>Field of Study </strong>: {{ $education['field_of_study']['name'] }}</p>
                                    <p><strong>Start Date </strong> : {{ $education['start_date'] }}</p>
                                    <p><strong>End Date </strong> : {{ $education['end_date'] }}</p>
                                    <p><strong>Grade </strong>: {{ $education['grade'] }}</p>
                                    <p><strong>Description </strong> : {{ $education['description'] }}</p>
                                </div>
                                <div class="card-footer d-flex">
                                    <button form-url="{{ route('profile.education.update', ['id' => $education['id']]) }}"
                                        data-url="{{ route('profile.education.edit', $education['id']) }}" type="button"
                                        class="editButton primry-btn-2 p-4 orenge-btn-3 ">
                                        <i class="fa fa-edit "></i>
                                    </button>

                                    &nbsp;

                                    <button data-url="{{ route('delete.profile.education', $education['id']) }}"
                                        type="button" class="deleteButton primry-btn-2 p-4 orenge-btn-3 ">
                                        <i class="fa fa-trash"></i>
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </form>


</div>


<div class="modal" id="susbc-form">
    <div class="modal-dialog  modal-dialog-centered ">
        <div class="modal-content sub-bg">
            <div class="modal-header subs-header">
                <h4 class="modal-title">Update Education</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

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

        datepicker("start_date0","end_date0","dd-mm-yy");
        datepicker("end_date0","start_date0","dd-mm-yy");
        
        Autoomplete("school_id0",{!! $schools !!})
        Autoomplete("degree_id0",{!! $schools_degree !!})
        Autoomplete("field_of_study_id0",{!! $schools_fields !!})

        var counter = 0;
        $(document).on('click', '.add-education-row', function() {
            counter++;
            var newRow = '';
            var newRow = `<div class="row addEducation">
                    <div class="col-lg-12">
                        <div class="info-title">
                            <h6>Academic Information:</h6>
                            <div class="dash"></div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-25">
                            <label>Education Level<span class="required"> * </span></label>
                            <input type="text"  name="school_id[]" id="school_id${counter}" class="awesomplete form-control school_id" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-25">
                            <label>My Major<span class="required"> * </span></label>
                            <input type="text"  name="degree_id[]" id="degree_id${counter}" class="form-control degree_id" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-25">
                            <label>Field of Study<span class="required"> * </span></label>
                            <input type="text"  name="field_of_study_id[]" id="field_of_study_id${counter}" class="form-control field_of_study_id" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-inner mb-30">
                            <label for="grade${counter}">Result/GPA*<span class="required"> * </span> </label>
                            <div class="input-area">
                                <img src="assets/images/icon/gpa-2-2.svg" alt="">
                                <select required name="grade[]" id="grade${counter}" class="grade select1">    
                                    <option value="">Select</option>
                                    @foreach (getGrade() as $key => $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-inner mb-20">
                            <label for="start_date${counter}">Starting Period<span class="required"> * </span> </label>
                            <div class="input-area">
                                <img src="assets/images/icon/calender2-2.svg" alt="">
                                <input required type="text" id="start_date${counter}"  class="start_date"  readonly name="start_date[]" placeholder="DD/MM/YY">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-inner mb-20">
                            <label for="end_date${counter}">Ending Period<span class="required"> * </span> </label>
                            <div class="input-area">
                                <img src="assets/images/icon/calender2-2.svg" alt="">
                                <input required type="text" id="end_date${counter}" class="end_date"  readonly name="end_date[]" placeholder="DD/MM/YY">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-inner mb-20">
                            <label for="description${counter}">Description<span class="required"> * </span> </label>
                            <textarea required name="description[]" id="description${counter}"  class="description" cols="30" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="add-row">
                        <button type="button" class="remove-education-row remove mb-1">Remove  - </button><br />
                        
                    </div>


                </div>
                
                
            </div> `

            $('.education-parent-row').prepend(newRow);
            $('#grade' + counter).niceSelect();
            Autoomplete("school_id" + counter, {!! $schools !!})
            Autoomplete("degree_id" + counter, {!! $schools_degree !!})
            Autoomplete("field_of_study_id" + counter, {!! $schools_fields !!})
            datepicker("start_date"+ counter,"end_date"+ counter,"dd-mm-yy");
            datepicker("end_date"+ counter,"start_date"+ counter,"dd-mm-yy");

        });

        $(document).on('click', '.remove-education-row', function() {

            Swal.fire({
                title: "Delete",
                text: "Are you sure want to delete this education record !",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).parents('.addEducation').remove();
                }
            });

        })

        $('#education_qualification').validate({
            rules: {
                'school_id[]': {
                    required: true
                },
                'degree_id[]': {
                    required: true
                },
                'field_of_study_id[]': {
                    required: true
                },
                'grade[]': {
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
                'school_id[]': {
                    required: true
                },
                'degree_id[]': {
                    required: true
                },
                'field_of_study_id[]': {
                    required: true
                },
                'grade[]': {
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
