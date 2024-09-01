@extends('layouts.app')

@section('title')
    YouAsk | Search
@endsection

@section('content')
    <div class="hero6">
        <div class="hero-wapper">
            <div class="scroll-btn">
                <a href="#home6-category-area"><img src="assets/images/icon/home6-scroll-icon.svg" alt="" /></a>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hero-content">
                        <h1>1020+ <span>Category</span> Job’s Here</h1>
                            <p>
                                Jobs are available on your skills, perfect jobs to make bright
                                future & get your choose jobs become a strong.
                            </p>
                            <div class="job-search-area">
                                <form>
                                    <div class="form-inner job-title">
                                        <input name="search" value="{{(isset($_GET['search']) ? $_GET['search']: '' )}}" type="text" placeholder="What jobs are you looking for ? " />
                                    </div>
                                    <div class="form-inner location">
                                        <select name="service_category" class="select1">
                                            <option value="">Select Category</option>
                                            <option @if(isset($_GET['service_category'])) @if($_GET['service_category'] == "JOB_REFERRAL")  selected @endif @endif value="JOB_REFERRAL">Job & Referal</option>
                                            <option @if(isset($_GET['service_category'])) @if($_GET['service_category'] == "JOB_POSITION_GUIDANCE")  selected @endif @endif value="JOB_POSITION_GUIDANCE">Job Position Guidance</option>
                                            <option @if(isset($_GET['service_category'])) @if($_GET['service_category'] == "TECH_EXPERT")  selected @endif @endif value="TECH_EXPERT">Tech Expert</option>
                                            <option @if(isset($_GET['service_category'])) @if($_GET['service_category'] == "CAREER_GUIDANCE")  selected @endif @endif value="CAREER_GUIDANCE">Career Guidance</option>
                                            <option @if(isset($_GET['service_category'])) @if($_GET['service_category'] == "RESUME_REVIEW")  selected @endif @endif  value="RESUME_REVIEW">Resume Review</option>
                                            <option @if(isset($_GET['service_category'])) @if($_GET['service_category'] == "MOCK_INTERVIEW")  selected @endif @endif value="MOCK_INTERVIEW">Mock Interview</option>
                                        </select>
                                    </div>
                                    <div class="form-inner">
                                        <button type="submit" class="primry-btn-5">Search</button>
                                    </div>
                                </form>
                            </div>

                            @if(count($experienceSkillList) > 0)
                            <div class="suggest-tag">
                                <h6><i class="bi bi-bookmark-fill"></i>Suggested Tag:</h6>
                                <ul>
                                    @foreach ($experienceSkillList as $item)
                                    <li><a href="javascript:void(0)">{{$item['name']}},</a>  </li>                                        
                                    @endforeach
                                </ul>
                            </div>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="job-listing-area pt-120 mb-120">
        <div class="container">
            <div class="row g-lg-4 gy-5">
                <div class="col-lg-4 order-lg-1 order-2">
                    <div class="job-sidebar">
                        <div class="job-widget style-1 mb-20">
                            <div class="check-box-item">
                                <h5 class="job-widget-title">Company Lists</h5>
                                <div class="checkbox-container">
                                    <ul>
                                        @foreach ($companyList as $key=>$item)
                                        <li>
                                            <label class="containerss">
                                                <input data-operator="eq" name="company__name[]" value="{{$item['value']}}" class="company__name filtersData" type="checkbox" />
                                                <span class="checkmark"></span>
                                                <span class="text">{{$item['value']}}</span>
                                                <span class="qty">({{$item['value_count']}})</span>
                                            </label>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="job-widget mb-20">
                            <div class="check-box-item">
                                <h5 class="job-widget-title">Type of Designations</h5>
                                <div class="checkbox-container">
                                    <ul>
                                        @foreach ($designationList as $item)
                                        <li>
                                            <label class="containerss">
                                                <input data-operator="eq" name="designation__name[]" value="{{$item['value']}}"  class="designation__name filtersData" type="checkbox" />
                                                <span class="checkmark"></span>
                                                <span class="text">{{$item['value']}}</span>
                                                <span class="qty">({{$item['value_count']}})</span>
                                            </label>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="job-widget mb-20">
                            <div class="check-box-item">
                                <h5 class="job-widget-title">Job Location Type</h5>
                                <div class="checkbox-container">
                                    <ul>
                                        @foreach ($jobLocationType as $item)
                                        <li>
                                            <label class="containerss">
                                                <input data-operator="eq" name="job_location_type[]" value="{{$item['value']}}"  class="job_location_type filtersData" type="checkbox" />
                                                <span class="checkmark"></span>
                                                <span class="text">{{$item['value']}}</span>
                                                <span class="qty">({{$item['value_count']}})</span>
                                            </label>
                                        </li>
                                        @endforeach
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>

                        {{--<div class="job-widget mb-20">
                            <div class="check-box-item">
                                <h5 class="job-widget-title mb-15">Salary Range</h5>
                                <div class="range-wrap">
                                    <div class="slider-labels">
                                        <div class="caption">
                                            <span id="slider-range-value1"></span>K
                                        </div>
                                        -
                                        <div class="text-right caption">
                                            <span id="slider-range-value2"></span>K
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <form>
                                                <input type="hidden" name="min-value" value="" />
                                                <input type="hidden" name="max-value" value="" />
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div id="slider-range"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="salary-container">
                                    <ul>
                                        <li>
                                            <input class="form-check-input" type="radio" id="salary-1"
                                                name="showInputBox" value="salary-1" />
                                            <div class="content">
                                                <span class="text">$5K-$15K</span>
                                                <span class="qty">(80)</span>
                                            </div>
                                        </li>
                                        <li>
                                            <input class="form-check-input" type="radio" id="salary-2"
                                                name="showInputBox" value="salary-2" />
                                            <div class="content">
                                                <span class="text">$20K-$30K</span>
                                                <span class="qty">(100)</span>
                                            </div>
                                        </li>
                                        <li>
                                            <input class="form-check-input" type="radio" id="salary-3"
                                                name="showInputBox" value="salary-3" />
                                            <div class="content">
                                                <span class="text">$35K-$50K</span>
                                                <span class="qty">(100)</span>
                                            </div>
                                        </li>
                                        <li>
                                            <input class="form-check-input" type="radio" id="salary-4"
                                                name="showInputBox" value="salary-4" />
                                            <div class="content">
                                                <span class="text">$55K-$70K</span>
                                                <span class="qty">(120)</span>
                                            </div>
                                        </li>
                                        <li>
                                            <input class="form-check-input" type="radio" id="salary-5"
                                                name="showInputBox" value="salary-5" />
                                            <div class="content">
                                                <span class="text">$75K-$100K</span>
                                                <span class="qty">(30)</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>--}}

                        {{--<div class="job-widget mb-20">
                            <div class="check-box-item">
                                <h5 class="job-widget-title mb-10">Date of Post</h5>
                                <ul class="tags">
                                    <li><a href="job-listing1.html">Technology,</a></li>
                                    <li><a href="job-listing1.html">Marketing,</a></li>
                                    <li><a href="job-listing1.html">Sales,</a></li>
                                    <li><a href="job-listing1.html">Transport,</a></li>
                                    <li><a href="job-listing1.html">Medical,</a></li>
                                    <li><a href="job-listing1.html">Design,</a></li>
                                    <li><a href="job-listing1.html">Data Analyst,</a></li>
                                    <li><a href="job-listing1.html">Development,</a></li>
                                    <li><a href="job-listing1.html">Non-Profit,</a></li>
                                    <li><a href="job-listing1.html">Manager,</a></li>
                                    <li><a href="job-listing1.html">Health,</a></li>
                                </ul>
                            </div>
                        </div>--}}

                        {{--<div class="job-widget-btn">
                            <a class="primry-btn-2 lg-btn text-center" href="#">Go to Job Alert</a>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-8 order-lg-2 order-1">
                    <div class="job-listing-wrrap">
                        <div class="row g-4 mb-25">
                            <div class="col-lg-6 d-flex align-items-center">
                                <p class="show-item">Showing results {{count($services)}} jobs list</p>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center justify-content-lg-end">
                                <div class="grid-select-area">
                                    <div class="select-area">
                                        <select class="select1">
                                            <option value="0">Sort By(Default)</option>
                                            <option value="1">Full Time</option>
                                            <option value="2">Part Time</option>
                                            <option value="3">Remote</option>
                                            <option value="3">Internship</option>
                                            <option value="3">Freelance</option>
                                        </select>
                                    </div>
                                    {{-- <div class="grid-area">
                                        <ul>
                                            <li>
                                                <a href="job-listing2.html">
                                                    <svg width="16" height="16" viewbox="0 0 16 16"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M6.26106 6.95674H0.695674C0.311464 6.95674 0 6.64527 0 6.26106V0.695674C0 0.311464 0.311464 0 0.695674 0H6.26106C6.64527 0 6.95674 0.311464 6.95674 0.695674V6.26106C6.95674 6.64527 6.64527 6.95674 6.26106 6.95674Z">
                                                        </path>
                                                        <path
                                                            d="M15.304 6.95674H9.73864C9.35443 6.95674 9.04297 6.64527 9.04297 6.26106V0.695674C9.04297 0.311464 9.35443 0 9.73864 0H15.304C15.6882 0 15.9997 0.311464 15.9997 0.695674V6.26106C15.9997 6.64527 15.6882 6.95674 15.304 6.95674Z">
                                                        </path>
                                                        <path
                                                            d="M6.26106 16.0004H0.695674C0.311464 16.0004 0 15.689 0 15.3048V9.73937C0 9.35517 0.311464 9.0437 0.695674 9.0437H6.26106C6.64527 9.0437 6.95674 9.35517 6.95674 9.73937V15.3048C6.95674 15.689 6.64527 16.0004 6.26106 16.0004Z">
                                                        </path>
                                                        <path
                                                            d="M15.304 16.0004H9.73864C9.35443 16.0004 9.04297 15.689 9.04297 15.3048V9.73937C9.04297 9.35517 9.35443 9.0437 9.73864 9.0437H15.304C15.6882 9.0437 15.9997 9.35517 15.9997 9.73937V15.3048C15.9997 15.689 15.6882 16.0004 15.304 16.0004Z">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="active" href="job-listing1.html">
                                                    <svg width="22" height="16" viewbox="0 0 22 16"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M1.91313 0C0.856731 0 0 0.893707 0 1.99656C0 3.09861 0.856731 3.99157 1.91313 3.99157C2.96953 3.99157 3.82626 3.09861 3.82626 1.99656C3.82626 0.893707 2.96953 0 1.91313 0Z">
                                                        </path>
                                                        <path
                                                            d="M1.91313 6.00464C0.856731 6.00464 0 6.8976 0 8.00045C0 9.1025 0.856731 9.99621 1.91313 9.99621C2.96953 9.99621 3.82626 9.1025 3.82626 8.00045C3.82626 6.8976 2.96953 6.00464 1.91313 6.00464Z">
                                                        </path>
                                                        <path
                                                            d="M1.91313 12.0085C0.856731 12.0085 0 12.9023 0 14.0043C0 15.1064 0.856731 16.0001 1.91313 16.0001C2.96953 16.0001 3.82626 15.1064 3.82626 14.0043C3.82626 12.9023 2.96953 12.0085 1.91313 12.0085Z">
                                                        </path>
                                                        <path
                                                            d="M20.561 0.495117H6.95229C6.15787 0.495117 5.51367 1.16716 5.51367 1.99665C5.51367 2.82545 6.15782 3.49744 6.95229 3.49744H20.561C21.3554 3.49744 21.9996 2.82545 21.9996 1.99665C21.9996 1.16716 21.3554 0.495117 20.561 0.495117Z">
                                                        </path>
                                                        <path
                                                            d="M20.561 6.49878H6.95229C6.15787 6.49878 5.51367 7.17077 5.51367 8.00032C5.51367 8.82911 6.15782 9.5011 6.95229 9.5011H20.561C21.3554 9.5011 21.9996 8.82911 21.9996 8.00032C21.9996 7.17077 21.3554 6.49878 20.561 6.49878Z">
                                                        </path>
                                                        <path
                                                            d="M20.561 12.5034H6.95229C6.15787 12.5034 5.51367 13.1754 5.51367 14.0042C5.51367 14.833 6.15782 15.5049 6.95229 15.5049H20.561C21.3554 15.5049 21.9996 14.833 21.9996 14.0042C21.9996 13.1754 21.3554 12.5034 20.561 12.5034Z">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </li>
                                        </ul>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="row" id="serviceListData">
                            @foreach($services as $k=>$v)
                            <div class="col-lg-12 mb-30">
                                <div class="job-listing-card">
                                    <div class="job-top">
                                        <div class="job-list-content">
                                            <div class="company-area">
                                                <div class="logo">
                                                    <img src="assets/images/bg/company-logo/company-01.png"
                                                        alt="" />
                                                </div>
                                                <div class="company-details">
                                                    <div class="name-location">
                                                        <h5>
                                                            <a href="job-details.html">{{$v['title']}}</a>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="job-discription">
                                                <ul>
                                                    <li>
                                                        <p>
                                                            <span class="title">Amount : {{$v['amount']}}</span>  
                                                           
                                                        </p>
                                                        
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <span class="time">Experience Years : {{$v['experience_years']}} </span>
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <span class="title">Category:</span> {{$v['service_category']}} 
                                                        </p>
                                                    </li>


                                                </ul>
                                            </div>
                                        </div>
                                        <div class="bookmark">
                                            <i class="bi bi-bookmark-fill"></i>
                                        </div>
                                    </div>
                                    <div class="job-type-apply">
                                        <div class="job-type">
                                            <span class="light-green"> {{$v['job_location_type']}}</span>
                                           
                                        </div>
                                        <div class="apply-btn">
                                            <a href="job-details.html"><span><img
                                                        src="assets/images/icon/apply-ellipse.svg"
                                                        alt="" /></span>Apply Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
       $(document).on('change','.filtersData',function(){

            var company__name = { values: [] };
            var designation__name = { values: [] };
            var job_location_type = { values: [] };


            $('.company__name:checked').each(function() {
                var value = $(this).val();
                var operator = $(this).attr('data-operator'); // Assuming the operator is always "eq"                
                company__name.values.push({ value: value, operator: operator });
            })

            $('.designation__name:checked').each(function() {
                var value = $(this).val();
                var operator = $(this).attr('data-operator'); // Assuming the operator is always "eq"                
                designation__name.values.push({ value: value, operator: operator });
            })

            $('.job_location_type:checked').each(function() {
                var value = $(this).val();
                var operator = $(this).attr('data-operator'); // Assuming the operator is always "eq"                
                job_location_type.values.push({ value: value, operator: operator });
            })
            



        $.ajax({
                url: '{{route('post.search')}}',
                type: 'POST',
                dataType:"json",
                data: {_token:'{{csrf_token()}}',company__name:company__name,designation__name:designation__name,job_location_type:job_location_type},
                beforeSend: function() {

                },
                success:function(data){

                    html = "";

                    $.each(data.data,function(key,value){

                        html+= `
                    
                    <div class="col-lg-12 mb-30">
                                <div class="job-listing-card">
                                    <div class="job-top">
                                        <div class="job-list-content">
                                            <div class="company-area">
                                                <div class="logo">
                                                    <img src="assets/images/bg/company-logo/company-01.png" alt="" />
                                                </div>
                                                <div class="company-details">
                                                    <div class="name-location">
                                                        <h5>
                                                            <a href="job-details.html">${value.title}</a>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="job-discription">
                                                <ul>
                                                    <li>
                                                        <p>
                                                            <span class="title">Amount : ${value.amount}</span>  
                                                           
                                                        </p>
                                                        
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <span class="time">Experience Years : ${value.experience_years} </span>
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <span class="title">Category:</span>  ${value.service_category}
                                                        </p>
                                                    </li>


                                                </ul>
                                            </div>
                                        </div>
                                        <div class="bookmark">
                                            <i class="bi bi-bookmark-fill"></i>
                                        </div>
                                    </div>
                                    <div class="job-type-apply">
                                        <div class="job-type">
                                            <span class="light-green">  ${value.job_location_type} </span>
                                           
                                        </div>
                                        <div class="apply-btn">
                                            <a href="job-details.html"><span><img
                                                        src="assets/images/icon/apply-ellipse.svg"
                                                        alt="" /></span>Apply Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    `;

                    $("#serviceListData").html(html);

                    })

                    

                } 
            }).done(function (data) {
               
            });


       })



    </script>
@endpush
