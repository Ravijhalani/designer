{{-- <div class="col-lg-12">
    <div class="single-information-area">
        <div class="section-title">
            <h6>Personal Information</h6>
            <div class="dash"></div>
        </div>
        <div class="row g-4">
            <div class="col-lg-6 devaider1 position-relative">
                <div class="informations">
                    <ul>
                        <li>
                            <span>Father’s Name:</span> Mr. Norman Frankly
                        </li>
                        <li><span>Date of Birth:</span> 03 January,1998</li>
                        <li><span>Nationality:</span> Bangladeshi</li>
                        <li><span>Marital Status:</span> Unmarried</li>
                        <li><span>Height:</span> 5’ 5’’</li>
                        <li><span>Blood Group:</span> O ve+</li>
                        <li>
                            <span>Permanent Address:</span> Village: Mirpur-12
                            Block-C, Thana: Pallavi, District: Dhaka, Division:
                            Dhaka
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 pl-40">
                <div class="informations d-flex justify-content-end">
                    <ul>
                        <li>
                            <span>Mother’s Name:</span> Mrs. Macoline Frankly
                        </li>
                        <li><span>National ID:</span> 88 9919 6712 8762</li>
                        <li><span>Religion:</span> Islam</li>
                        <li><span>Gender:</span> Male</li>
                        <li><span>Weight:</span> 75 KG</li>
                        <li><span>Height:</span> 5’ 5’’</li>
                        <li>
                            <span>Present Address:</span> Village: Mirpur DOSH,
                            Block-C, Avenue-02, Thana: Pallavi, District: Dhaka,
                            Division: Dhaka.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="col-lg-12">
    <div class="single-information-area">
        <div class="section-title">
            <h6>Educational Qualification</h6>
            <div class="dash"></div>
        </div>
        @foreach ($profileEducation['educations'] as $key=>$item)
        <div class="educational-qualification mb-30">
            <div class="passing-year">
                <p>
                    <span>{{++$key}}.</span>{{date('M , Y',strtotime($item['start_date']))}}  - {{date('M , Y',strtotime($item['end_date']))}}
                </p>
                <span></span>
            </div>
            <div class="education-dt">
                <h6>{{$item['school']['name']}}</h6>
                <ul>
                    <li><span>Education Level:</span> {{$item['school']['name']}}</li>
                    <li><span>My Major:       </span>  {{$item['degree']['name']}}</li>
                    <li><span>Result/GPA:     </span> &nbsp;&nbsp;{{$item['grade']}}</li>
                </ul>
            </div>
        </div>
        @endforeach
    </div>
</div>
{{-- <div class="col-lg-12">
    <div class="single-information-area">
        <div class="section-title">
            <h6>Career Application</h6>
            <div class="dash"></div>
        </div>
        <div class="row g-4">
            <div class="col-lg-6 devaider1 position-relative">
                <div class="informations">
                    <ul>
                        <li>
                            <span>Current Job Place:</span> Norland Tech of
                            Industry
                        </li>
                        <li><span>Position:</span> UI/UX Engineer</li>
                        <li><span>Experiences:</span> 3 Years</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 pl-40">
                <div class="informations">
                    <ul>
                        <li><span>Current Salary:</span> 30000/=</li>
                        <li><span>Expected Salary:</span> 40000/=</li>
                        <li><span>Available:</span> Full Time</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="col-lg-12">
    <div class="single-information-area">
        <div class="section-title">
            <h6>Professionals Information</h6>
            <div class="dash"></div>
        </div>

        @foreach ($profileExperience['experiences'] as $key=>$item)
        <div class="educational-qualification mb-30">
            <div class="passing-year">
                <p><span>{{++$key}}.</span>{{date('M , Y',strtotime($item['start_date']))}}  - {{date('M , Y',strtotime($item['end_date']))}}</p>
                <span></span>
            </div>
            <div class="education-dt">
                <h6>{{$item['company']['name']}}</h6>
                <p class="position">
                    <span>Position:</span> {{$item['designation']['name']}} ( {{$item['employment_type']}} )
                </p>
                <div class="responsibility">
                    <h6>Responsibility:</h6>
                    <ul>
                        <li> {{$item['description']}} </li>
                        
                    </ul>
                </div>

                <div class="responsibility">
                    <h6>Skills:</h6>
                    <ul>
                        @foreach ($item['skills'] as $k => $skill) 
                        <li>{{$skill['skill']['name']}},</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endforeach

      
    </div>
</div>
