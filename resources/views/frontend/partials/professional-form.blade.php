<div class="w-100 p-0">
    <div class="row">

        <div class="col-md-6 col-sm-12 col-12 pb-3">
            <div class="form-inner mb-25">
                <label for="designation_name">Designation<span class="required"> *
                    </span> </label>
                <div class="input-area">


                    <input type="text" required name="designation_name"
                        value="{{ isset($result['designation']) ? $result['designation']['name'] : '' }}"
                        id="designation_name" class="form-control  form-inputs-parent designation_name"
                        placeholder="Type here">
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-12 col-12 pb-3">
            <div class="form-inner mb-25">
                <label for="employment_type">Employment type<span class="required"> * </span>
                </label>
                <div class="input-area">

                    <select required name="employment_type" id="employment_type"
                        class="form-control  form-inputs-parent w-100 employment_type select1">
                        @foreach (getEmploymentType() as $key => $item)
                            <option @if (isset($result['employment_type'])) @if ($result['employment_type'] == $item) selected @endif
                                @endif
                                value="{{ $item }}">{{ str_replace('_', ' ', $item) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>


        <div class="col-md-6 col-sm-12 col-12 pb-3">
            <div class="form-inner mb-25">
                <label for="company_name">Company Name<span class="required"> *
                    </span> </label>
                <div class="input-area">

                    <input type="text" value="{{ isset($result['company']) ? $result['company']['name'] : '' }}"
                        required name="company_name" id="company_name"
                        class="form-control  form-inputs-parent company_name" placeholder="Type here">
                </div>
            </div>
        </div>



        <div class="col-md-6 col-sm-12 col-12 pb-3">
            <div class="form-inner mb-25">
                <label for="company_type">Company type<span class="required"> * </span> </label>
                <div class="input-area">

                    <select required name="company_type" id="company_type"
                        class="form-control  form-inputs-parent company_type  w-100  select1">
                        @foreach (getTypes() as $key => $item)
                            <option @if (isset($result['company'])) @if ($result['company']['name'] == $item) selected @endif
                                @endif value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>


        <div class="col-md-6 col-sm-12 col-12 pb-3">
            <div class="form-inner mb-25">
                <label for="industry_name">Industry<span class="required"> * </span> </label>
                <div class="input-area">

                    <input type="text" value="{{ isset($result['industry']) ? $result['industry']['name'] : '' }}"
                        required name="industry_name" id="industry_name"
                        class="form-control form-control  form-inputs-parent industry_name" placeholder="Type here">
                </div>
            </div>
        </div>





        <div class="col-md-6 col-sm-12 col-12 pb-3">
            <div class="form-inner mb-25">
                <label for="location_type">Location type<span class="required"> * </span> </label>
                <div class="input-area">

                    <select required name="location_type" id="location_type"
                        class="form-control  location_type  w-100  select1">
                        @foreach (getLocationType() as $key => $item)
                            <option @if (isset($result['location_type'])) @if ($result['location_type'] == $item) selected @endif
                                @endif value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>




        <div class="col-md-12 col-sm-12 col-12">
            <div class="form-agreement employment-check form-inner d-flex justify-content-between flex-wrap p-0">
                <div class="form-group two">
                    <input @if (isset($result['currently_working'])) @if ($result['currently_working'] == true) selected @endif
                        @endif type="checkbox" id="currently_working" value="1"
                    name="currently_working">
                    <label for="currently_working">Continuing Working Here</label>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-12 col-12 pb-3">
            <div class="form-inner mb-20">
                <label for="datepicker6">Starting Period<span class="required"> * </span> </label>
                <div class="input-area">

                    <input value="{{ $result['start_date'] }}" required type="date" class="form-control  "
                        name="start_date" placeholder="DD-MM-YY">
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-12 col-12 pb-3">
            <div class="form-inner mb-20">
                <label for="datepicker7">Ending Period<span class="required">
                        * </span> </label>
                <div class="input-area">

                    <input required value="{{ $result['end_date'] }}" type="date" class="form-control  "
                        name="end_date" placeholder="DD-MM-YY">
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12 col-12">
            <div class="form-inner mb-20">
                <label for="description">Responsibility*<span class="required"> * </span> </label>
                <textarea required name="description" id="description" class="form-control " placeholder="Write Your Responsibility...">{{ isset($result['description']) ? $result['description'] : '' }}</textarea>
            </div>
        </div>

        @if (isset($result['description']))

            @php

                $skills = [];

                foreach ($result['skills'] as $k => $skill) {
                    $skills[] = $skill['skill']['name'];
                }

            @endphp

            <div class="col-md-12 col-sm-12 col-12">
                <div class="form-group form-inner mb-25">
                    <label>Skills<span class="required"> * </span> </label>
                    <input type="text" value="{{ implode(',', $skills) }}" required name="skills"
                        id="skills" class="form-control skills" />
                </div>
            </div>
        @else
            <div class="col-md-12 col-sm-12 col-12">
                <div class="form-group form-inner mb-25">
                    <label>Skills<span class="required"> * </span> </label>
                    <input type="text" required name="skills" id="skills" class="form-control skills" />
                </div>
            </div>

        @endif





    </div>
</div>
