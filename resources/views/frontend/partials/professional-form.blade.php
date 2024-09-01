<div class="container">
    <div class="row">
        <!-- Designation -->
        <div class="col-md-6 col-sm-12 mb-3">
            <div class="form-group">
                <label for="designation_name">Designation <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="designation_name" name="designation_name" required
                    value="{{ isset($result['designation']) ? $result['designation']['name'] : '' }}"
                    placeholder="Type here">
            </div>
        </div>

        <!-- Employment Type -->
        <div class="col-md-6 col-sm-12 mb-3">
            <div class="form-group" style="display: grid">
                <label for="employment_type">Employment Type <span class="text-danger">*</span></label>
                <select class="custom-select" id="employment_type" name="employment_type" required>
                    @foreach (getEmploymentType() as $key => $item)
                        <option value="{{ $item }}" @if (isset($result['employment_type']) && $result['employment_type'] == $item) selected @endif>
                            {{ str_replace('_', ' ', $item) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Company Name -->
        <div class="col-md-6 col-sm-12 mb-3">
            <div class="form-group">
                <label for="company_name">Company Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="company_name" name="company_name" required
                    value="{{ isset($result['company']) ? $result['company']['name'] : '' }}" placeholder="Type here">
            </div>
        </div>

        <!-- Company Type -->
        <div class="col-md-6 col-sm-12 mb-3">
            <div class="form-group"  style="display: grid">
                <label for="company_type">Company Type <span class="text-danger">*</span></label>
                <select class="custom-select" id="company_type" name="company_type" required>
                    @foreach (getTypes() as $key => $item)
                        <option value="{{ $item }}" @if (isset($result['company']) && $result['company']['name'] == $item) selected @endif>
                            {{ $item }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Industry -->
        <div class="col-md-6 col-sm-12 mb-3">
            <div class="form-group">
                <label for="industry_name">Industry <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="industry_name" name="industry_name" required
                    value="{{ isset($result['industry']) ? $result['industry']['name'] : '' }}" placeholder="Type here">
            </div>
        </div>

        <!-- Location Type -->
        <div class="col-md-6 col-sm-12 mb-3">
            <div class="form-group"  style="display: grid">
                <label for="location_type">Location Type <span class="text-danger">*</span></label>
                <select class="custom-select" id="location_type" name="location_type" required>
                    @foreach (getLocationType() as $key => $item)
                        <option value="{{ $item }}" @if (isset($result['location_type']) && $result['location_type'] == $item) selected @endif>
                            {{ $item }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Currently Working -->
        <div class="col-md-12 mb-3">
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="profession_currently_working" name="currently_working" value="1"
                    @if (isset($result['currently_working']) && $result['currently_working'] == true) checked @endif>
                <label class="form-check-label" for="currently_working">Continuing Working Here</label>
            </div>
        </div>

        <!-- Start Date -->
        <div class="col-md-6 col-sm-12 mb-3">
            <div class="form-group">
                <label for="edit_professional_start_date">Starting Period <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="edit_professional_start_date" name="start_date" required
                    value="{{ date('d-m-Y',strtotime($result['start_date'])) }}" placeholder="DD-MM-YY">
            </div>
        </div>

        <!-- End Date -->
        <div class="col-md-6 col-sm-12 mb-3">
            <div class="form-group">
                <label for="edit_professional_end_date">Ending Period <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="edit_professional_end_date" name="end_date" required
                    value="{{ date('d-m-Y',strtotime($result['end_date']))}}" placeholder="DD-MM-YY">
            </div>
        </div>

        <!-- Responsibility -->
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="description">Responsibility <span class="text-danger">*</span></label>
                <textarea class="form-control" id="description" name="description" required placeholder="Write Your Responsibility...">{{ isset($result['description']) ? $result['description'] : '' }}</textarea>
            </div>
        </div>

        <!-- Skills -->
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="skills">Skills <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="skills" name="skills" required
                    value="{{ isset($result['skills']) ? implode(',', array_column($result['skills'], 'skill.name')) : '' }}">
            </div>
        </div>
    </div>
</div>
