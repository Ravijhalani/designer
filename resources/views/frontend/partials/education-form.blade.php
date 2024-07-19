<div class="w-100 p-0">
    <div class="row">
        <div class="col-md-6 col-sm-12 col-12 pb-2">
            <label for="school_id" class="form-label">Education level</label>
            {{-- <input type="text" class="form-control form-inputs-parent" name="school_id" id="school_id" placeholder="Highest education level" /> --}}

            <div class="dropdown-wrapper">
                <select class="form-control form-inputs-parent" name="degree_name" id="degree_name">
                    <option value="" disabled selected>Select Level</option>
                    @foreach (educationLevels() as $item)
                        <option @if($result['degree']['name'] == $item) selected @endif value="{{ $item }}">{{ $item }}</option>
                    @endforeach
                </select>
                <span class="dropdown-icon">&#8964;</span>
            </div>


            <span class="text-danger" id="error-degree"></span>
        </div>
        <div class="col-md-6 col-sm-12 col-12 pb-2">
            <label for="degree_id" class="form-label">School Name</label>
            <input type="text" value="{{(isset($result['school']))?$result['school']['name']:""}}" class="form-control form-inputs-parent" name="school_name" id="school_name" placeholder="Major in subject" />
            <span class="text-danger" id="error-school_name"></span>
        </div>
        <div class="col-md-6 col-sm-12 col-12 pb-2">
            <label for="field_of_study" class="form-label">Field of study</label>
            <input type="text" value="{{(isset($result['field_of_study']))?$result['field_of_study']['name']:""}}" class="form-control form-field_of_study-parent" name="field_of_study" id="field_of_study" placeholder="Your field" />
            <span class="text-danger" id="error-field_of_study"></span>
        </div>

        <div class="col-md-6 col-sm-12 col-12 pb-2">
            <label for="languages" class="form-label">Percentage scored/CGPA * </label>
            <div class="dropdown-wrapper">

                <select  name="grade" id="grade"
                    class="form-control form-inputs-parent">
                    <option value="">Select</option>
                    @foreach (getGrade() as $key => $item)
                        <option @if(isset($result['grade'])) @if($result['grade'] == $item) selected @endif @endif value="{{ $item }}">{{ $item }}</option>
                    @endforeach
                </select>


            </div>
            <span class="text-danger" id="error-grade"></span>
        </div>

        <div class="col-md-6 col-sm-12 col-12 pb-2">
            <label for="start_date" class="form-label">Starting period</label>
            <input type="date" class="form-control form-inputs-parent" value="{{(isset($result['start_date']))? $result['start_date'] :""}}" name="start_date" id="start_date" />
            <span class="text-danger" id="error-start_date"></span>
        </div>
        <div class="col-md-6 col-sm-12 col-12 pb-2">
            <label for="end_date" class="form-label">Ending period</label>
            <input type="date" class="form-control form-inputs-parent" value="{{(isset($result['end_date']))? $result['end_date'] :""}}" name="end_date" id="end_date" />
            <span class="text-danger" id="error-end_date"></span>
        </div>
        <div class="col-md-12 col-sm-12 col-12">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control form-text-area-parent" name="description" id="description" placeholder="Other details/achievements in college" rows="3">{{(isset($result['description']))?$result['description']:""}}</textarea>
            <span class="text-danger" id="error-description"></span>
        </div>
    </div>
</div>