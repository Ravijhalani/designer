<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Jobes</title>
    <link rel="stylesheet" href="{{asset('allAssets/login.css')}}" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />
  </head>
  <body>
  
    <div class="main-parent-forms w-100">
      <div class="row m-0 p-0 w-100">
        <div class="col-lg-8 col-md-6 col-sm-12 col-12 p-0">
          <div>
            <img src="{{asset('allAssets/Images/illustration.png')}}" alt="" class="left-image-panel">
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
          <div class="d-flex flex-column justify-content-center align-items-center">
            <!-- login form  -->
            <div class="d-flex flex-column justify-content-center align-items-center right-panel-forms">
              
                <form method="POST" action="{{ route('send.otp') }}" id="login-form" class="form-class d-flex flex-column justify-content-center align-items-center p-3">
                    @csrf
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-12 pb-2">
                    <div>
                      <img src="{{asset('allAssets/Images/Frame 1000003431.png')}}" alt="logo" class="logo-image">
                      <p class="head-one mt-3 mb-0">Login to your Account</p>
                      <p class="head-two">Let’s dive into your profile</p>
                    </div>
                  </div>
                  <div class="container m-0">
                    <div class="col-md-12 col-sm-12 col-12 pb-2">
                        <label for="MobileNumber" class="form-label">Enter mobile number</label>
                        <div class="input-group">
                            <input
                                type="text"
                                class="form-control form-inputs-parent"
                                id="MobileNumber"
                                name="mobile"
                                
                                required
                            />
                        </div>
                        <div class="text-danger" id="errors"></div>
                    </div>
                </div>
                </div>
                <div class="row w-100 mt-3">
                  <div class="col-md-12 p-0 text-center">
                    <button id="submitBtn" class="btn btn-form-submit w-100 btn-primary action-btn">
                      GET OTP
                    </button>
                    <p class="sign-up-text text-start pt-2">Don’t have an account? <span><a class="sign-up-link" href="{{ route('register') }}">Signup</a></span></p>
                    <a href="../OTP/index.html">for otp page</a>
                  </div>
                </div>
              </form>
            </div>
             <!-- end -->
          </div>
        </div>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <script src="{{asset('allAssets/login.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
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

  </body>
</html>
