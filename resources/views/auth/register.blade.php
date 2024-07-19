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
    <form method="POST" action="{{ route('registers') }}" class="mb-5" id="registration-form">
        @csrf
        <h3 class="display-4">
            <a href="{{ route('home') }}"><img alt="image" src="{{ asset('assets/images/header1-logo.svg') }}"></a>
        </h3>
        <p class="text-muted mb-4">Create a sign up account.</p>
        
        <div class="alert alert-danger" style="display: none"></div>

        <div class="row">
            <div class="col-lg-12">
                <div class="form-inner mb-25">
                    <label for="email">Name*</label>
                    <div class="input-area">
                        <img src="assets/images/icon/person-2.svg" alt>
                        <input type="text" id="name" name="name" placeholder="Enter a name">
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-inner mb-25">
                    <label for="password">E-mail*</label>
                    <div class="input-area">
                        <img src="assets/images/icon/email-2.svg" alt>
                        <input type="email" name="email" id="email" placeholder="Enter E-mail" />

                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="form-inner mb-25">
                    <label for="password">Mobile Number*</label>
                    <div class="input-area">
                        <img src="assets/images/icon/lock-2.svg" alt>
                        <input type="text" name="mobile" id="mobile" placeholder="Enter Mobile Number" />

                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="form-inner">
                    <button id="submitBtn" class="action-btn" type="submit">Send OTP</button>
                    <h4 class="text-center pt-3"><strong>OR</strong></h4>
                    <a href="{{route('linkedin.login')}}" title="LinkedIn" class="btn btn-linkedin btn-lg"> Linked<i
                            class="fa fa-linkedin fa-fw"></i></a>
                </div>
            </div>
            <h6>Already have an account? <a href="{{ route('login') }}">Sign in</a></h6>
        </div>
    </form>



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
        <input type="hidden" name="encoded_mobile_number" id="encoded_mobile_number">
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
                $("#encoded_mobile_number").val(output.encoded_mobile_number);
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
