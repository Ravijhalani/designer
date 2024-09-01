@extends('auth.master')

@push('css')
 <link rel="stylesheet" href="{{ asset('allAssets/login.css') }}" />

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
                        <form method="POST" action="{{ route('registers') }}" class="form-class  flex-column justify-content-center align-items-center p-3" id="registration-form">
                            @csrf
                            <h3 class="display-4">
                                <a href="{{ route('home') }}"><img style="height:100px;width:100px" alt="image" src="{{ asset('youAsk.png') }}"></a>
                            </h3>
                            <p class="text-muted mb-4">Create a sign up account.</p>
                            
                            <div class="alert alert-danger" style="display: none"></div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-inner mb-25">
                                        <label for="email" class="form-label">Name <span style="color:red;">*</span> </label>
                                        <div class="input-area">
                                            
                                            <input  class="form-control form-inputs-parent" type="text" id="name" name="name" placeholder="Enter a name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-inner mb-25">
                                        <label for="password" class="form-label">E-mail <span style="color:red;">*</span></label>
                                        <div class="input-area">
                                           
                                            <input  class="form-control form-inputs-parent" type="email" name="email" id="email" placeholder="Enter E-mail" />

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-inner mb-25">
                                        <label for="password" class="form-label">Mobile Number <span style="color:red;">*</span></label>
                                        <div class="input-area">
                                           
                                            <input  class="form-control form-inputs-parent" type="text" name="mobile" id="mobile" placeholder="Enter Mobile Number" />

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-inner">
                                        <button id="submitBtn" class="btn btn-form-submit w-100 btn-primary action-btn" type="submit">Send OTP</button>
                                        <h4 class="text-center pt-3"><strong>OR</strong></h4>
                                        <a href="{{route('linkedin.login')}}" title="LinkedIn" class="btn btn-linkedin btn-lg"> Linked<i
                                                class="fa fa-linkedin fa-fw"></i></a>
                                    </div>
                                </div>
                                <p class="sign-up-text text-start pt-2">Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
                            </div>
                        </form>



                        <form  method="POST" action="{{ route('verify.otp') }}" class="form-class  flex-column justify-content-center align-items-center p-3" id="otp-form" style="display:none;">
                            @csrf
                            <h3 class="display-4">
                                <a href="{{ route('home') }}"><img style="height:100px;width:100px" alt="image" src="{{ asset('youAsk.png') }}"></a>
                            </h3>
                            <p class="text-muted mb-4">Enter a otp  to verify your mobile number</p>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-inner mb-25">
                                        <label for="otp" class="form-label">Otp <span style="color:red;">*</span></label>
                                        <div class="input-area">
                                            
                                            <input  class="form-control form-inputs-parent" type="text" name="otp" id="otp" placeholder="Enter Otp" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-inner">
                                        <button class="action-btn" id="submitBtn" type="submit">Verify Otp</button>
                                    </div>
                                </div>
                                <p class="sign-up-text text-start pt-2">Don’t have an account? <a href="{{ route('register') }}">Sign Up</a></p>
                            </div>
                            <input  class="form-control form-inputs-parent" type="hidden" name="mobile" id="mobile">
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection

@push('js')
 <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"
    ></script>
<script src="{{ asset('allAssets/login.js') }}"></script>
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
