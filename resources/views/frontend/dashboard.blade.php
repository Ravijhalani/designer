@extends('frontend.Layouts.main')
@section('content')
@push('css')
<link rel="stylesheet" href="{{ asset('allAssets/dashboard.css') }}" />

@endpush
@php
    use Carbon\Carbon;
    $date = Carbon::now()->isoFormat('D MMMM YYYY');
@endphp
    <div class="dashboard-content-parent mx-4 my-3">
        <h4 style="font-weight: 600; color: #1d60fc">Hello {{ ucfirst(auth()->user()->name) }}👋</h4>
        <p style="
    font-size: 14px;
    line-height: 18px;
    font-weight: 400;
    color: #08080899;">
            {{ $date }}
        </p>

        <div class="card-white p-4">
            <div class="card-child-one">
                <p class="fs-6 mb-1 setup-guidence-text-one">Setup guide</p>
                <p class="secondary-text mb-2">
                    Use this personalized guide to get your store setup completed
                </p>
                <a href="../dummy/index.html" class="secondary-text-count px-3 py-1 text-decoration-none">0/4 completed</a>
            </div>
            <div class="card-child-two">
                <!-- -----------wizard here ------------- -->
                <div class="container mt-4">
                    <div class="stepwizard">
                        <div class="stepwizard-row setup-panel row-cols-md-4 row-cols-sm-2 row-cols-1 row">
                            <div class="stepwizard-step col pb-4">
                                <a href="javascript:void(0)" type="button" 
                                
                                @if(auth()->user()->current_profile_fill_step != 0 )  
                                    style="background-color: #f4f7f9" 
                                @endif
                                
                                {{ auth()->user()->current_profile_fill_step == 0 ? '':'disabled' }}
                                 
                                class="btn {{ auth()->user()->current_profile_fill_step == 0 ? 'btn-primary':'btn-default' }}  btn-circle btn-wizard-active"
                                 
                                 >1</a>
                                <p class="mb-1">Basic information</p>
                                <p class="secondary-text">Fill up your basic details</p>
                                
                                @if(auth()->user()->current_profile_fill_step == 0 )  
                                    <a href="{{ route('basicinfo').'#basic-information' }}" class="btn btn-form-submit">Fill details</a>
                                @endif

                            </div>
                            <div class="stepwizard-step col pb-4">
                                
                                <a href="javascript:void(0)" type="button" 
                                    @if(auth()->user()->current_profile_fill_step != 1 )  
                                        style="background-color: #f4f7f9" 
                                    @endif
                                    {{ auth()->user()->current_profile_fill_step == 1 ? 'disabled':'' }}
                                    class="btn {{ auth()->user()->current_profile_fill_step == 1 ? 'btn-primary':'btn-default' }}  btn-circle btn-wizard-active"
                                >
                                2
                                </a>


                                <p class="mb-1">Education</p>
                                <p class="secondary-text">
                                    Complete your education details
                                </p>

                                @if(auth()->user()->current_profile_fill_step == 1 )  
                                    <a href="{{ route('basicinfo').'#education-information' }}" class="btn btn-form-submit">Fill details</a>
                                @endif

                            </div>
                            <div class="stepwizard-step col pb-4">
                                {{-- <a href="#step-3" type="button" class="btn btn-default btn-circle btn-wizard"
                                    disabled="disabled" style="background-color: #f4f7f9">3</a> --}}


                                <a href="javascript:void(0)" type="button" 
                                    @if(auth()->user()->current_profile_fill_step != 2 )  
                                        style="background-color: #f4f7f9" 
                                    @endif
                                    {{ auth()->user()->current_profile_fill_step == 2 ? 'disabled':'' }}
                                    class="btn {{ auth()->user()->current_profile_fill_step == 2 ? 'btn-primary':'btn-default' }}  btn-circle btn-wizard-active"
                                >
                                3
                                </a>

                                <p class="mb-1">Professional info</p>
                                <p class="secondary-text">
                                    Complete your professional details

                                </p>

                                @if(auth()->user()->current_profile_fill_step == 2 )  
                                    <a href="{{ route('basicinfo').'#professional-information' }}" class="btn btn-form-submit">Fill details</a>
                                @endif

                            </div>
                            <div class="stepwizard-step col pb-4">
                                {{-- <a href="#step-4" type="button" class="btn btn-default btn-circle btn-wizard"
                                    disabled="disabled" style="background-color: #f4f7f9">4</a> --}}


                                    <a href="{{ route('basicinfo').'#review-information' }}" type="button" 
                                    @if(auth()->user()->current_profile_fill_step != 3 )  
                                        style="background-color: #f4f7f9" 
                                    @endif
                                    {{ auth()->user()->current_profile_fill_step == 3 ? 'disabled':'' }}
                                    class="btn {{ auth()->user()->current_profile_fill_step == 3 ? 'btn-primary':'btn-default' }}  btn-circle btn-wizard-active"
                                >
                                4
                                </a>

                                <p class="mb-1">Information review</p>
                                <p class="secondary-text">Review your information</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>

        function reviewTab() {

            $.ajax({
                url: "{{ route('profile.review') }}",
                method: 'GET',
                beforeSend: function(data) {
                    $('#review-forms').html(
                        '<center><i class="fa fa-spinner fa-spin" style="font-size:84px"></i></center>');
                },
                success: function(data) {
                    $('#review-forms').html(data);
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            })

        }
console.log("{{auth()->user()->id}}")

    </script>
    <script src="{{ asset('allAssets/index.js') }}"></script>

    @stack('inlinejs')
@endpush
