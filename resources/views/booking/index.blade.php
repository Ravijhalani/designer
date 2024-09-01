<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $booking['title'] }} | Booking</title>
    <link rel="stylesheet" href="{{ asset('assets/booking/styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/booking/step-form-styles.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"
        rel="stylesheet">


</head>

<style>
    .loading-container {
        position: relative;
        height: 5rem;
        width: 5rem;
        margin-top: 165px;
    }

    .loading-progress {
        position: absolute;
        height: 100%;
        width: 100%;
        border-radius: 50%;
        border: 5px solid #ACCAFF36;
        border-radius: 50%;

        &::before {
            content: "";
            position: absolute;
            height: 100%;
            width: 100%;
            border-radius: 50%;
            border: 5px solid transparent;
            border-top-color: #ACCAFF;
            top: -5px;
            left: -5px;
            animation: spin 1s linear infinite;
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

<body>
    <div class="main-parent">
        <div class="white-bg-parent">

            <div class="row">
                <div class="col-md-5 col-sm-12 col-12 border-right-parent">
                    <div class="left-main-parent">
                        <div role="button" class="backButton d-flex justify-content-start align-items-center gap-2"
                            style="display: none!important">
                            <i class="uil uil-arrow-left fs-3"></i>
                            <p class="m-0">Back</p>
                        </div>
                        <div class="d-flex flex-row align-items-center flex-wrap justify-content-start gap-2">
                            <img src="{{ $userInfo['picture'] }}" class="img m-2" alt="" />
                            <div class="d-flex flex-column justify-content-start flex-wrap w-100 align-items-start">
                                <p class="m-0 fs-5 fw-bold">{{ $userInfo['first_name'] }} {{ $userInfo['last_name'] }}
                                </p>
                                <p class="m-0 fs-7 fw-lighter truncate w-75 text-secondary">
                                    {{ $userInfo['desigation'] }}
                                </p>
                                <div class="d-flex justify-content-center align-items-center flex-wrap">
                                    <div class="d-flex flex justify-content-center align-items-center gap-2 pe-3 mt-2"
                                        style="border-right: 1px solid rgb(204, 204, 204);">
                                        <svg style="color: #F2A93B;" xmlns="http://www.w3.org/2000/svg" width="1em"
                                            height="1em" viewBox="0 0 15 15">
                                            <path fill="currentColor"
                                                d="M7.948.779a.5.5 0 0 0-.896 0L5.005 4.926l-4.577.665a.5.5 0 0 0-.277.853l3.312 3.228l-.782 4.559a.5.5 0 0 0 .725.527L7.5 12.605l4.094 2.153a.5.5 0 0 0 .725-.527l-.782-4.56l3.312-3.227a.5.5 0 0 0-.277-.853l-4.577-.665z" />
                                        </svg>
                                        <p class="text-secondary fw-bold mb-0">4.5</p>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center gap-2 pe-3 mt-2"
                                        style="color: #1D60FC;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor" fill-rule="evenodd"
                                                d="M15.418 5.643a1.25 1.25 0 0 0-1.34-.555l-1.798.413a1.25 1.25 0 0 1-.56 0l-1.798-.413a1.25 1.25 0 0 0-1.34.555l-.98 1.564c-.1.16-.235.295-.395.396l-1.564.98a1.25 1.25 0 0 0-.555 1.338l.413 1.8a1.25 1.25 0 0 1 0 .559l-.413 1.799a1.25 1.25 0 0 0 .555 1.339l1.564.98c.16.1.295.235.396.395l.98 1.564c.282.451.82.674 1.339.555l1.798-.413a1.25 1.25 0 0 1 .56 0l1.799.413a1.25 1.25 0 0 0 1.339-.555l.98-1.564c.1-.16.235-.295.395-.395l1.565-.98a1.25 1.25 0 0 0 .554-1.34L18.5 12.28a1.25 1.25 0 0 1 0-.56l.413-1.799a1.25 1.25 0 0 0-.554-1.339l-1.565-.98a1.25 1.25 0 0 1-.395-.395zm-.503 4.127a.5.5 0 0 0-.86-.509l-2.615 4.426l-1.579-1.512a.5.5 0 1 0-.691.722l2.034 1.949a.5.5 0 0 0 .776-.107z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <p class="fw-bold mb-0">Verified</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div>
                            <p class="fs-5 fw-bold">Strategy Session</p>
                            <p class="fs-6 fw-normal text-secondary mt-4 mb-0">Price</p>
                            <p class="fs-5 fw-bold">₹ {{ $booking['amount'] }}</p>
                            <p class="fs-6 fw-normal text-secondary mt-4 mb-0">
                                Session duration
                            </p>
                            <p class="fs-6 fw-light">1 session x 60 mins</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-12 col-12" id="">
                    <div id="stepFormsWrapper"></div>

                    <center>
                        <div class="loading-container">
                            <div class="loading-progress"></div>
                        </div>
                    </center>

                </div>



            </div>

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
        var today = new Date();
        var nextWeek = new Date();
        nextWeek.setDate(today.getDate() + 7);


        $(document).on('submit', '#step-1-form', function() {

            event.preventDefault();
            if ($("#datepickerInput").val() == "") {
                alert("Please select a date");
                return false;
            }

            $("#stepFormsWrapper").html('');
            $(this).prop('disabled', true);

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                processData: false, // Important!
                contentType: false,
                cache: false,
                data: new FormData($(this)[0]),
                beforeSend: function(data) {
                    $(".loading-container").show();
                },
                success: function(data) {
                    console.log("data",data);
                    $(".loading-container").hide();
                    $(this).prop('false', true);

                    if (data.data) {
                        $(".backButton").show();
                        $('#stepFormsWrapper').html(data.data);

                    } else {
                        alert(data.message);
                    }

                },
                error: function(data) {
                    console.log('Error:', data);
                }
            })

        });

        $(document).on('submit', '#step-2-form', function() {

            $(this).prop('disabled', true);
            event.preventDefault();
            if ($("#start_time").val() == "") {
                alert("Please select a time")
            }

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                processData: false, // Important!
                contentType: false,
                cache: false,
                data: new FormData($(this)[0]),
                beforeSend: function(data) {
                    $(".loading-container").show();
                },
                success: function(data) {
                    $(".loading-container").hide();
                    $(this).prop('false', true);

                    if (data.status) {

                        location.href = data.url;

                    } else {
                        alert(data.message)
                    }


                },
                error: function(data) {
                    console.log('Error:', data);
                }
            })

        });




        $(document).on('click', '.time-text-parent', function() {
            $('.time-text-parent').removeClass('active');
            $('.time-text-parent').removeClass('bg-primary');
            $('.time-text-parent').removeClass('text-white');

            $(this).addClass('active');
            $(this).addClass('bg-primary');
            $(this).addClass('text-white');

            $("#start_time").val($(this).attr('data-start_time'))
            $("#end_time").val($(this).attr('data-end_time'))
        });

        $(document).on('click', '.backButton', function() {

            getStepForm();
        })

        $(document).on('click', '.changeButton', function() {

            getStepForm();
        })




        function getStepForm() {

            $("#stepFormsWrapper").html('');
            $.ajax({
                url: '{{ route('get-step-forms') }}',
                method: $(this).attr('method'),
                data: {

                    service: '{{ $booking['id'] }}',
                },
                beforeSend: function(data) {
                    $(".loading-container").show();
                },
                success: function(data) {
                    $(".loading-container").hide();

                    if (data.data) {
                        $(".backButton").attr('style', 'display:none!important');
                        $('#stepFormsWrapper').html(data.data);

                    } else {
                        alert(data.message);
                    }

                    $('#datepicker').datepicker({
                        format: 'yyyy-mm-dd',
                        todayHighlight: true,
                        autoclose: true,
                        startDate: today,
                        endDate: nextWeek,
                    }).on('changeDate', function(e) {
                        var selectedDate = e.format();
                        $("#datepickerInput").val(selectedDate);
                    });


                },
                error: function(data) {

                }
            })

        }

        getStepForm();
    </script>

    {{-- <script src="{{asset('assets/booking/index.js')}}"></script> --}}
</body>

</html>
