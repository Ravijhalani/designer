@extends('auth.master')

@push('css')
<style>
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

.errors{
    color:red;
}
/* em values are used to adjust button values such as padding, radius etc. based on font-size */
</style>
@endpush

@push('title')
    Login
@endpush

@section('content')
    <form method="POST" action="{{ route('send.otp') }}" id="login-form">
        @csrf
        <h3 class="display-4">
            <a href="{{ route('home') }}"><img alt="image" src="{{ asset('assets/images/header1-logo.svg') }}"></a>
        </h3>
        <p class="text-muted mb-4">Enter a mobile number to login in your account</p>

        <div class="row">
            <div class="col-lg-12">
                <div class="form-inner mb-25">
                    <label for="mobile">Mobile Number*</label>
                    <div class="input-area">
                        <img src="assets/images/icon/lock-2.svg" alt>
                        <input type="text" name="mobile" id="mobile" placeholder="Enter Mobile Number" />
                    </div>
                    <div class="text-danger" id="errors"></div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="form-inner">
                    <button class="action-btn" id="submitBtn">Send Otp</button>
                    {{-- <button class="primry-btn-2" type="submit">Send Otp</button> --}}
                </div>
            </div>
            <h6>Don’t have an account? <a href="{{ route('register') }}">Sign Up</a></h6>
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
        $('#login-form').validate({
            rules: {
                "mobile": {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    pattern: /^[0-9]{10,15}$/
                },
            },
            messages: {
                "mobile": {
                    required: "Please enter mobile number."
                },
            },
            errorPlacement : function( error, element ){

                error.appendTo('#errors');
            },
            submitHandler: function(form) {
                removeErrors();
                submitAjax(form,loginSuccess);
            }
        })

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

        function loginSuccess(formObj,output){
            if (output.status==0) {
                $.each(output.errors, function(fieldName, field) {
                    $.each(field, function(index, msg) {
                        errorDiv = $('#' + formObj.id + ' #' + fieldName).parent('div').parent('div');
                        errorDiv.append('<div class="errors">' + msg + '</div>');
                    });
                });
            }
            else if(output.status==1){
                $("#login-form").hide();
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
