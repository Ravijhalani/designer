<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Jobes</title>
    <link rel="stylesheet" href="{{ asset('allAssets/otp.css') }}" />
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
  </head>
  <body>
    <div class="main-parent-forms w-100">
      <div class="row m-0 p-0 w-100">
        <div class="col-lg-8 col-md-6 col-sm-12 col-12 p-0">
          <div>
            <img src="{{ asset('allAssets/Images/illustration.png') }}" alt="" class="left-image-panel" />
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
          <div class="d-flex flex-column justify-content-center align-items-start">
            <!-- login form  -->
            <div class="d-flex flex-column justify-content-center align-items-start right-panel-forms">
              <form method="POST" action="{{ route('verify.otp') }}" class="form-class d-flex flex-column justify-content-center align-items-center p-3" id="otp-form">
                @csrf
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-12 pb-2">
                    <div>
                      <img src="{{ asset('allAssets/Images/Frame 1000003431.png') }}" alt="logo" class="logo-image" />
                      <p class="head-one mt-3 mb-0">Login to your Account</p>
                      <p class="head-two">Let’s dive into your profile</p>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-12 pb-2">
                    <label for="MobileNumber" class="form-label">Enter OTP</label>
                    <div class="otpCont flex spaceBetween w-100">
                      <input class="otSc" type="text" maxlength="1" id="otp1" name="otp1" required />
                      <input class="otSc" type="text" maxlength="1" id="otp2" name="otp2" required />
                      <input class="otSc" type="text" maxlength="1" id="otp3" name="otp3" required />
                      <input class="otSc" type="text" maxlength="1" id="otp4" name="otp4" required />
                    </div>
                    <input type="hidden" id="otp" name="otp" />
                    <input type="hidden" name="encoded_mobile_number" id="encoded_mobile_number" value="{{ $mobile_number }}">
                    <input type="hidden" name="mobile" id="mobile" value="{{ $mobile_number }}">
                  </div>
                </div>
                <div class="row w-100 mt-3">
                  <div class="col-md-12 p-0 text-center">
                    <button id="submitBtn" type="submit" class="btn btn-form-submit w-100 btn-primary">Submit</button>
                    <p class="sign-up-text text-start pt-2">
                      Didn’t get an OTP? <span><a class="sign-up-link" href="">Resend after 00:59</a></span>
                    </p>
                  </div>
                </div>
              </form>
            </div>
            <!-- end -->
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('allAssets/otp.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#otp-form').on('submit', function(event) {
          event.preventDefault(); // Prevent the default form submission
          var otp = '';
          for (var i = 1; i <= 4; i++) {
            otp += $('#otp' + i).val();
          }
          $('#otp').val(otp);

          $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: $(this).serialize(),
            success: function(response) {
              toastr.success('OTP verified successfully!');
              window.location.href = '{{ route("dashboard") }}';
            },
            error: function(xhr) {
              toastr.error('Failed to verify OTP. Please try again.');
            }
          });
        });
      });
    </script>
  </body>
</html>
