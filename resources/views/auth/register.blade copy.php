@extends('auth.master')

@push('css')
<style>
.form-wrapper form .form-inner i {
    position: sticky;
    color: white
}

.btn-linkedin {
    background: #0a63bc;
    width: 100%;
    border-radius: 5px;
}
.errors{
    color:red;
}

.action-btn {
  background-color: #00a7ac;
  border: none;
  font-size: 20px;
  font-weight: 600;
  text-transform: uppercase;
  padding: 0.5em 1.25em;
  color: white;
  border-radius: 0.15em;
  transition: 0.3s;
  cursor: pointer;
  position: relative;
  display: block;
}

.action-btn:hover {
  background-color: #00a7ac;
}

.action-btn:focus {
  outline: 0.05em dashed #00a7ac; 
  outline-offset: 0.05em;
}

.action-btn::after {
  content: '';
  display: block;
  width: 1.2em;
  height: 1.2em;
  position: absolute;
  left: calc(50% - 0.75em);
  top: calc(50% - 0.75em);
  border: 0.15em solid transparent;
  border-right-color: white;
  border-radius: 50%;
  animation: button-anim 0.7s linear infinite;
  opacity: 0;
}

@keyframes button-anim {
  from {
    transform: rotate(0);
  }
  to {
    transform: rotate(360deg);
  }
}

.action-btn.loading {
  color: transparent;
}

.action-btn.loading::after {
  opacity: 1;
}

/* em values are used to adjust button values such as padding, radius etc. based on font-size */

</style>
@endpush

@push('title')
    Signup
@endpush

@section('content')
<div class="main-parent-forms w-100">
        <div class="row m-0 p-0 w-100">
            <div class="col-lg-8 col-md-6 col-sm-12 col-12 p-0">
                <div id="imageSlider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://img.freepik.com/premium-photo/we-are-hiring-collage_23-2150638218.jpg" class="d-block w-100 left-image-panel" alt="Illustration 1">
                    </div>
                    <div class="carousel-item">
                        <img src="https://img.freepik.com/premium-photo/sunny-backdrop-yellow-background-illustration-cheerful-bright-sunny-sunny-sunny-sunny-sunny-backdrop-yellow-background_191066-5955.jpg?w=1060" class="d-block w-100 left-image-panel" alt="Illustration 2">
                    </div>
                    <div class="carousel-item">
                        <img src="https://img.freepik.com/premium-vector/recruitment-join-now-banner-poster-open-vacancy-design-template-modern-concept-social-media_624773-26.jpg?w=900" class="d-block w-100 left-image-panel" alt="Illustration 3">
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <!-- login form  -->
                    <div class="d-flex flex-column justify-content-center align-items-center right-panel-forms">
                        <form method="POST" action="{{ route('registers') }}" class="mb-5" id="registration-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12 pb-2">
                                    <div>
                                        <img src="./Images/Frame 1000003431.png" alt="logo" class="logo-image">
                                        <p class="head-one mt-3 mb-0">Create new account</p>
                                        <p class="head-two">Let’s dive into your profile</p>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-12 pb-2">
                                    <label for="Name" class="form-label">Name</label>
                                    <input type="text" class="form-control form-inputs-parent" id="name"
                                        name="name" placeholder="" required />
                                </div>
                                <div class="col-md-12 col-sm-12 col-12 pb-2">
                                    <label for="Email" class="form-label">Email</label>
                                    <input type="Email" class="form-control form-inputs-parent" id="email"
                                        name="email" placeholder="" required />
                                </div>
                                <div class="container m-0">
                                    <div class="col-md-12 col-sm-12 col-12 pb-2">
                                        <label for="MobileNumber" class="form-label">Enter mobile number</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-inputs-parent"
                                                id="mobile" name="mobile" placeholder="+91" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row w-100 mt-3">
                                <div class="col-md-12 p-0 text-center">
                                    <button type="submit" class="btn btn-form-submit w-100 btn-primary">
                                        GET OTP
                                    </button>
                                    <div class="w-100 d-flex flex-row justify-content-center align-items-center my-3">
                                        <p class="sign-up-text"><span>
                                                <hr class="line-for-or mx-3" />
                                            </span>or<span>
                                                <hr class="line-for-or mx-3" />
                                            </span></p>
                                    </div>
                                   <a href="{{route('linkedin.login')}}"> <button class="btn btn-outline-primary w-100 btn-form-submit"><i
                                            class ="uil uil-linkedin"></i>Sign in with linkedIn</button></a>
                                    <p class="sign-up-text text-start pt-2">Already a user ? <span><a
                                                class="sign-up-link" href="{{}}">Login</a></span></p>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end -->
                </div>
            </div>
        </div>
    </div>



    <form  method="POST" action="{{ route('verify.otp') }}" id="otp-form" style="display:none;">
        @csrf
        <h3 class="display-4">
            <a href="{{ route('home') }}"><img alt="image" src="{{ asset('assets/images/header1-logo.svg') }}"></a>
        </h3>
        <p class="text-muted mb-4">Enter a otp  to verify your mobile number</p>

        <div class="row">
            <div class="col-lg-12">
                <div class="form-inner mb-25">
                    <label for="otp">Otp*</label>
                    <div class="input-area">
                        <img src="assets/images/icon/lock-2.svg" alt>
                        <input type="text" name="otp" id="otp" placeholder="Enter Otp" />
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="form-inner">
                    <button class="action-btn" id="submitBtn" type="submit">Verify Otp</button>
                </div>
            </div>
            <h6>Don’t have an account? <a href="{{ route('register') }}">Sign Up</a></h6>
        </div>
        <input type="hidden" name="mobile" id="mobile">
    </form>
@endsection

@push('js')
    <script>
        jQuery.validator.addMethod("email_domain", function(value, element) {
            var email = $("#email").val();
            var emailRegex = /^[a-zA-Z0-9._-]+@(?:[a-zA-Z0-9.-]+\.(?:com|in|org|io))$/;
            if (email.match(emailRegex)) {
                return true;
            } else {
                return false;
            }
        }, "Please enter a complete email address.");

        $('#registration-form').validate({
            rules: {
                "name": {
                    required: true,
                    minlength: 2,
                    maxlength: 50,
                    pattern: /^[a-zA-Z ]*$/
                },
                "mobile": {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    pattern: /^[0-9]{10,15}$/
                },
                "email": {
                    required: true,
                    maxlength: 50,
                    email: true,
                    email_domain: true
                },
            },
            messages: {
                "name": {
                    required: "Please enter  name."
                },
                "email": {
                    required: "Please enter email."
                },
                "mobile": {
                    required: "Please enter mobile number."
                },
            },
            errorPlacement: function(error, element) {
                $(element).parent('div').parent('div').append(error);
            },
            submitHandler: function(form) {
                removeErrors();
                submitAjax(form,registerSuccess);
            }
        });

        $('#otp-form').validate({
            rules: {
                "otp": {
                    required: true,
                    minlength: 4
                }
            },
            messages: {
                "otp": {
                    required: "Please enter  Otp.",
                    minlength:"Please enter atleast 4 digits"
                }
            },
            errorPlacement: function(error, element) {
                $(element).parent('div').parent('div').append(error);
            },
            submitHandler: function(form) {
                removeErrors();
                submitAjax(form,otpSuccess);
            }
        });

        function removeErrors(){
            $(".errors").remove();
        }

        function registerSuccess(formObj,output){
           
            if (output.status==0) {
                $.each(output.errors, function(fieldName, field) {
                    $.each(field, function(index, msg) {
                        errorDiv = $('#' + formObj.id + ' #' + fieldName).parent('div').parent('div');
                        errorDiv.append('<div class="errors ">' + msg + '</div>');
                    });
                });

            } else if(output.status==1){
                $("#registration-form").hide();
                $("#otp-form").show();
                $("#otp-form #mobile").val(output.mobile);
            } 
            else if(output.status==2){
                $(".alert-danger").html(output.message);
                $(".alert-danger").show();
            }
        }

        function otpSuccess(formObj,output){
           
            if (output.status==0) {
                $.each(output.errors, function(fieldName, field) {
                    $.each(field, function(index, msg) {
                        errorDiv = $('#' + formObj.id + ' #' + fieldName).parent('div').parent('div');
                        errorDiv.append('<div class="errors">' + msg + '</div>');
                    });
                });
            }
            else if(output.status==1){
                location.reload();
            }
        }

        function submitAjax(formObj,funct) {
            event.preventDefault();
            $.ajax({
                url: formObj.action,
                type: formObj.method,
                processData: false, // Important!
                contentType: false,
                cache: false,
                data: new FormData($('#' + formObj.id)[0]),
                beforeSend: function() {
                    $('#' + formObj.id + ' #submitBtn').addClass('loading');
                },
                success: funct.bind(null, formObj)
            }).done(function (data) {
                $('#' + formObj.id + ' #submitBtn').removeClass('loading');
            });

        }

        function handleInputChange(){
            $(".errors").remove();
        }

        $(document).on('click',handleInputChange);
    </script>
@endpush
