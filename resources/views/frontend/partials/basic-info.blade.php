<div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
    <form action="{{ route('profile.update') }}" id="profileForm" method="POST"
        enctype="multipart/form-data" class="edit-profile-form profile-form  mb-60">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-inner mb-25">
                    <label for="first_name">First Name <span class="required"> * </span>
                    </label>
                    <div class="input-area">
                        <img src="assets/images/icon/user-2-2.svg" alt="">
                        <input type="text" value="{{ Auth()->user()->first_name }}"
                            id="first_name" name="first_name" placeholder="Mrs. Jacoline">
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="form-inner mb-25">
                    <label for="last_name">Last Name<span class="required"> * </span>
                    </label>
                    <div class="input-area">
                        <img src="assets/images/icon/user-2-2.svg" alt="">
                        <input type="text" value="{{ Auth()->user()->last_name }}"
                            id="last_name" name="last_name" placeholder="Frankly">
                    </div>
                </div>
            </div>
            <div class="col-xxl-2 col-lg-12 position-relative">
                <div class="drag-area">
                    <p>Upload Images</p>
                    <button type="button" class="upload-btn"><i
                            class="bi bi-plus-lg"></i></button>
                    <input type="file" hidden="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-inner mb-25">
                    <label for="job_place">Current Job Place<span class="required"> *
                        </span> </label>
                    <div class="input-area">
                        <img src="assets/images/icon/company-2-2.svg" alt="">
                        <input value="{{ Auth()->user()->job_place }}" type="text"
                            id="job_place" name="job_place" placeholder="Company Name">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-inner mb-25">
                    <label for="desigation">Designation<span class="required"> * </span>
                    </label>
                    <div class="input-area">
                        <img src="assets/images/icon/designation-2-2.svg" alt="">
                        <input value="{{ Auth()->user()->desigation }}" type="text"
                            id="desigation" name="desigation"
                            placeholder="UI/UX Engineer">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-inner mb-25">
                    <label for="experiences">Year of Experiences<span class="required"> *
                        </span> </label>
                    <div class="input-area">
                        <img src="assets/images/icon/experiences-2-2.svg" alt="">
                        <input value="{{ Auth()->user()->experiences }}" type="text"
                            id="experiences" name="experiences" placeholder="3.5 Years">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-inner mb-25">
                    <label>Qualification<span class="required"> * </span> </label>
                    <div class="input-area">
                        <img src="assets/images/icon/qualification-2-2.svg"
                            alt="">
                        <select required class="qualification select1" id="qualification"
                            name="qualification">
                            <option value="">Select Qualification</option>
                            <option @if (Auth()->user()->qualification == 1) selected @endif
                                value="1">Team Manager</option>
                            <option @if (Auth()->user()->qualification == 2) selected @endif
                                value="2">Project Manager</option>
                            <option @if (Auth()->user()->qualification == 3) selected @endif
                                value="3">Team Leader</option>
                            <option @if (Auth()->user()->qualification == 4) selected @endif
                                value="4">Programmer</option>
                            <option @if (Auth()->user()->qualification == 5) selected @endif
                                value="5">Interen</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-inner mb-25">
                    <label for="email">Email<span class="required"> * </span> </label>
                    <div class="input-area">
                        <img src="assets/images/icon/email-2-2.svg" alt="">
                        <input type="text" id="email"
                            value="{{ Auth()->user()->email }}" name="email"
                            placeholder="info@example.com">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-inner mb-25">
                    <label for="mobile">Phone Number<span class="required"> * </span>
                    </label>
                    <div class="input-area">
                        <img src="assets/images/icon/phone-2-2.svg" alt="">
                        <input type="text" id="mobile" name="mobile"
                            value="{{ Auth()->user()->mobile }}" readonly>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-inner mb-25">
                    <label for="website">Website Link</label>
                    <div class="input-area">
                        <img src="assets/images/icon/website-2-2.svg" alt="">
                        <input type="text" value="{{ Auth()->user()->website }}"
                            id="website" name="website"
                            placeholder="https://example.com">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-inner mb-25">
                    <label for="language">Language<span class="required"> * </span>
                    </label>
                    <div class="input-area">
                        <img src="assets/images/icon/language-2-2.svg" alt="">
                        <input type="text" value="{{ Auth()->user()->language }}"
                            id="language" name="language"
                            placeholder="Bangla, English, Hindi">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-inner mb-50">
                    <label for="career_objective">Career Objective </label>
                    <textarea name="career_objective" id="career_objective" placeholder="Something Write Yourself....">{{ Auth()->user()->career_objective }}</textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-inner">
                    <button class="primry-btn-2 lg-btn w-unset action-btn" id="submitBtn"
                        type="submit">Update Resume</button>
                </div>
            </div>
        </div>
    </form>
</div>

@push('js')

<script>

$('#profileForm').validate({
    rules: {
        "first_name": {
            required: true
        },
        "last_name": {
            required: true
        },
        "job_place": {
            required: true
        },
        "desigation": {
            required: true
        },
        "experiences": {
            required: true
        },
        "email": {
            required: true
        },
    },
    messages: {
        "mobile": {
            required: "Please enter mobile number."
        },
    },
    errorPlacement: function(error, element) {
        $(element).parent('div').parent('div').append(error);
    },
    submitHandler: function(form) {
        removeErrors();
        submitAjax(form, loginSuccess);
    }
})


function loginSuccess(formObj, output) {
    if (output.status == 0) {
        $.each(output.errors, function(fieldName, field) {
            $.each(field, function(index, msg) {
                errorDiv = $('#' + formObj.id + ' #' + fieldName).parent('div').parent('div');
                errorDiv.append('<div class="errors">' + msg + '</div>');
            });
        });
    } else if (output.status == 1) {

        popupMsg(output.title, output.message, 'success');

    } else if (output.status == 2) {

    }
}

</script>


@endpush

