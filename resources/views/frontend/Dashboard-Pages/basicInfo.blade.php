
         <style>
            .image-form {
                position: relative;
            }

            .upload-image-slaut {
                width: 100%;
                height: auto;
                cursor: pointer;
            }

            .hidden-file-input {
                display: none;
            }
        </style>
       <div class="tab-pane fade show active" id="pills-one" role="tabpanel" aria-labelledby="pills-one-tab">
        <div class="px-3 py-3 form-main-parent">
            <p class="form-main-heading">Basic information</p>
            <hr />
            <div class="mt-5">
                <form action="{{ route('profile.update') }}" id="userForm" method="POST" enctype="multipart/form-data" class="edit-profile-form profile-form mb-60">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
                            <div class="image-form">
                                <img class="upload-image-slaut" id="imagePreview" src="https://imgs.search.brave.com/N4IAKlOYK8no1Hw-SPBOdkn_Pc_E9iTmZhJFlzdK_zY/rs:fit:860:0:0/g:ce/aHR0cHM6Ly90My5m/dGNkbi5uZXQvanBn/LzA3LzU0LzMxLzcy/LzM2MF9GXzc1NDMx/NzI2MF9adE5ZcmJN/QzE4Unc1NWY0dGlH/ZEh6aUtmWElLakFO/Ti5qcGc" alt="Image Preview" onclick="document.getElementById('fileInput').click();" />
                                <input type="file" name="profile_image" id="fileInput" class="hidden-file-input" accept="image/*" onchange="previewImage(event)" />
                            </div>
                        </div>
                        <div class="col-md-9 d-flex flex-column justify-content-center align-items-center">
                            <div class="row d-flex justify-content-center align-items-center">
                                <div class="col-md-6 col-sm-12 col-12 pb-2">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" class="form-control form-inputs-parent" id="first_name" name="first_name" value="{{ old('first_name', Auth::user()->name) }}" placeholder="Enter first name" />
                                    <span class="text-danger" id="first_name_error"></span>
                                </div>
                                <div class="col-md-6 col-sm-12 col-12 pb-2">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control form-inputs-parent" id="last_name" name="last_name" value="{{ old('last_name', Auth::user()->last_name) }}" placeholder="Enter last name" />
                                    <span class="text-danger" id="last_name_error"></span>
                                </div>
                                <div class="col-md-6 col-sm-12 col-12 pb-2">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control form-inputs-parent" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" placeholder="Enter email" />
                                    <span class="text-danger" id="email_error"></span>
                                </div>
                                <div class="col-md-6 col-sm-12 col-12 pb-2">
                                    <label for="mobile" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control form-inputs-parent" id="mobile" name="mobile" placeholder="Enter phone number" value="{{ old('mobile', Auth::user()->mobile) }}" />
                                    <span class="text-danger" id="mobile_error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <p class="form-main-heading-two">Job information</p>
                            <hr />
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6 col-sm-12 col-12">
                            <label for="job_place" class="form-label">Current Job Place</label>
                            <input type="text" class="form-control form-inputs-parent" id="job_place" name="job_place" placeholder="Enter current job place" value="{{ old('job_place', Auth::user()->job_place) }}" />
                            <span class="text-danger" id="job_place_error"></span>
                        </div>
                        <div class="col-md-6 col-sm-12 col-12">
                            <label for="desigation" class="form-label">Designation</label>
                            <input type="text" class="form-control form-inputs-parent" id="desigation" name="desigation" value="{{ old('desigation', Auth::user()->desigation) }}" placeholder="Enter designation" />
                            <span class="text-danger" id="desigation_error"></span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6 col-sm-12 col-12">
                            <label for="experiences" class="form-label">Years of Experience</label>
                            <input type="number" class="form-control form-inputs-parent" id="experiences" name="experiences" placeholder="Enter years of experience" value="{{ old('experiences', Auth::user()->experiences) }}" />
                            <span class="text-danger" id="experiences_error"></span>
                        </div>
                        <div class="col-md-6 col-sm-12 col-12">
                            <label for="qualification" class="form-label">Qualification</label>
                            <div class="dropdown-wrapper">
                                <select class="form-control form-inputs-parent" id="qualification" name="qualification">
                                    <option value="">Select Qualification</option>
                                    <option @if (Auth::user()->qualification == 1) selected @endif value="1">Team Manager</option>
                                    <option @if (Auth::user()->qualification == 2) selected @endif value="2">Project Manager</option>
                                    <option @if (Auth::user()->qualification == 3) selected @endif value="3">Team Leader</option>
                                    <option @if (Auth::user()->qualification == 4) selected @endif value="4">Programmer</option>
                                    <option @if (Auth::user()->qualification == 5) selected @endif value="5">Intern</option>
                                </select>
                                <span class="text-danger" id="qualification_error"></span>
                                <span class="dropdown-icon">&#8964;</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6 col-sm-12 col-12">
                            <label for="website" class="form-label">Website Link</label>
                            <input type="url" class="form-control form-inputs-parent" id="website" name="website" value="{{ old('website', Auth::user()->website) }}" placeholder="Enter website link" />
                            <span class="text-danger" id="website_error"></span>
                        </div>

                        @php 
                            $language =  Auth::user()->language ? explode(',',Auth::user()->language) : [];
                        @endphp
                        <div class="col-md-6 col-sm-12 col-12">
                            <label for="language" class="form-label">Languages Known</label>
                            <div class="dropdown-wrapper">
                                <select class="form-control form-inputs-parent select2" multiple id="language" name="language[]">
                            
                                    <option value="hindi" @if (in_array('hindi',$language)) selected @endif>Hindi</option>
                                    <option value="english" @if (in_array('english',$language)) selected @endif>English</option>
                                    <option value="spanish" @if (in_array('spanish',$language)) selected @endif>Spanish</option>
                                    <option value="french" @if (in_array('french',$language)) selected @endif>French</option>
                                    <option value="german" @if (in_array('german',$language)) selected @endif>German</option>
                                    <option value="chinese" @if (in_array('chinese',$language)) selected @endif>Chinese</option>
                                    <option value="japanese" @if (in_array('japanese',$language)) selected @endif>Japanese</option>
                                    <option value="other" @if (in_array('other',$language)) selected @endif>Other</option>
                                </select>
                                <span class="text-danger" id="language_error"></span>
                                <span class="dropdown-icon">&#8964;</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 col-sm-12 col-12">
                            <label for="career_objective" class="form-label">Career Objective</label>
                            <textarea class="form-control form-text-area-parent" id="career_objective" name="career_objective" placeholder="Enter career objective" rows="3" required>{{ old('career_objective', Auth::user()->career_objective) }}</textarea>
                            <span class="text-danger" id="career_objective_error"></span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 text-start">
                            <button type="submit" class="btn btn-form-submit">
                                Update & Next
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@include('frontend.dashboard-pages.scripts.basicinfo')

