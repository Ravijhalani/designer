@extends('frontend.layout.header')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.18.0/tagify.css"
        integrity="sha512-SNbSEpyK7jz5R7yjTrilJOlK4sgtHMfZoNtERAd8VF6jj6fk0LdW4HT3RwOLYhZmKn4GRtsNCZfA8lJ/FmYfhw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .action-btn.loading {
            color: transparent;
        }

        .action-btn.loading::after {
            opacity: 1;
        }

        .error,
        .errors,
        .required {
            color: red !important;
        }

        .tagify__dropdown {
            z-index: 9999 !important;
        }
    </style>

    @include('frontend.custom-assets.service.tabs-css')
@endpush

@section('content')



@section('content')
    <div class="dashboard-area pt-120 mb-120">
        <div class="container">
            <div class="row g-lg-4 gy-5 mb-90">
                <div class="col-lg-3">
                    <div class="dashboard-sidebar">
                        @include('frontend.dashboard-slider')
                    </div>
                </div>
                <div class="col-lg-9 card">
                   
                    <div class="meeting-availability-area ">
                        <div class="container">
                            <!-- Meeting Availability Top Section  Start -->

                           

                            <div class="availability-title-section ma-row">
                                <div class="header-section">
                                    
                                    @if(Session::has('success'))
                                        <div class="alert alert-success">{{Session::get('success')}}</div>
                                    @endif

                                    <h4 class="layout-header">
                                        <div class="">Availability</div>
                                    </h4>
                                </div>
                            </div>
                            <!-- Meeting Availability Top Section end -->

                            <!-- Meeting Availability Main Section  Start -->
                            
                                <div class=" availability-main">
                                    <div class="availability-main-inner">
                                        <div class="ma-row availability-tabs">
                                            <div class="availability-tabs-inner">
                                                <div class="ma-row availability-tabs-s1">
                                                    <div class="schedule-menu">
                                                        <div class="m-a-typography tabs-availability">
                                                            <div class="tabs-availability-inner">
                                                            
                                                                @foreach ($data as $item)
                                                                    <div class="m-a-item schedule_div">
                                                                        <a onclick="getScheduleForms(this)" data-url="{{route('schedules.forms',['schedule_id'=>$item['id']])}}" href="javascript:void(0)"
                                                                            class="schedulesForm p-2 btn btn-sm {{ ($item['is_primary']) ?'btn-dark' : 'btn-outline-dark' }}">
                                                                            <span>{{ $item['schedule_name'] }}</span>
                                                                        </a>
                                                                    </div>
                                                                @endforeach


                                                                <div class="m-a-item">
                                                                    <button data-bs-toggle="modal"
                                                                        data-bs-target="#exampleModal" type="button"
                                                                        class="btn-new-schedule serviceScheduleRef">
                                                                        <span>+ New Schedule</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="scheduleData">
                                                    
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Meeting Availability Main Section  End -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Button trigger modal -->
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg">
            
                <div class="modal-content">
                    <form id="saveSchedules" action="{{ route('save.schedules') }}" method="POST">
                        @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Schedule</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="schedule_name" class="col-form-label">Schedule Name:</label>
                            <input type="text" class="form-control" id="schedule_name" name="schedule_name">
                        </div>

                        <div class="mb-3">
                            <label for="is_primary" class="col-form-label">Is Default:</label>
                            <input type="checkbox" id="is_primary" name="is_primary">
                        </div>


                        <button type="submit" class="btn-sm btn btn-primary">Save Schedule</button>
                        <button type="button" class="btn-sm btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                    
                </form>

                </div>
        </div>

    </div>

@endsection

@push('js')
    <script>

        function getScheduleForms(formObj){
            
            $.ajax({
                url: $(formObj).attr('data-url'),
                type: 'GET',
                beforeSend: function() {

                },
                success: function(data){
                    $("#scheduleData").html(data);
                }

            }).done(function (data) {
                $('#submitBtn').removeClass('loading');
            });

        }


        $(document).on("click", '.serviceScheduleRef', function() {

            $("#schedule_name").val('');


            var existingNames = $('.schedule_div button span').map(function() {
                return $(this).text().trim();
            }).get();
            $(".error").remove();
            $('.saveSchedule').off('click').on('click', function() {
                var scheduleName = $('#schedule_name').val().trim();
                if (existingNames.includes(scheduleName)) {
                    $("#schedule_name").parent('div').append(
                        `<p class="error">schedule name already exists</p>`)
                } else {
                    $(".schedule_div").append(
                        `<button type="button" class="schedulebtn"><span>${$("#schedule_name").val()}</span></button>`
                    );
                    $("#schedule_names").val($("#schedule_name").val());
                    // Proceed with saving the schedule or whatever you want to do
                    // For now, let's just close the modal
                    $('#exampleModal').modal('hide');
                }
            });


            $("#exampleModal").modal("hide");
        })

      
           
       
    </script>

    <script>









        $('#availablityForm').validate({
            rules: {
                // schedule_names:{
                //     required:true
                // }
            },
            messages: {

            },
            errorPlacement: function(error, element) {
                //alert("Please add atleast one schedule");
                //$(element).parent('div').parent('div').append(error);
            },
            submitHandler: function(form) {
                event.preventDefault();
                removeErrors();
                console.log("form", form.action);

                if ($("#schedule_names").val() == "") {
                    alert("Please add atleast one schedule");
                    return false;
                }

                submitAjax(form, ServiceCreatesuccessMethod)
            }
        });


        $('#saveSchedules').validate({
            rules: {
                schedule_name:{
                    required:true
                }
            },
            messages: {

            },
            errorPlacement: function(error, element) {
                //alert("Please add atleast one schedule");
                $(element).parent('div').append(error);
            },
            submitHandler: function(form) {
                event.preventDefault();
                removeErrors();
                submitAjax(form, ServiceCreatesuccessMethod)
            }
        });


        


        function ServiceCreatesuccessMethod(data) {
            // alert(data.message);
            popupMsg('Success', data.message, 'success');
        }



    $(document).on('change', ".m-a-checkbox-input", function() {
        var parentRow = $(this).closest(".slot-item");
        var dayTimeDiv = parentRow.find(".day-time");
        var dayTimeDivMain = parentRow.find(".day-time-main");
        var unavailableDiv = parentRow.find(".day-t-unavailable");

        if ($(this).prop("checked")) {
            dayTimeDiv.removeClass("d-none");
            dayTimeDivMain.removeClass("d-none");
            unavailableDiv.addClass("d-none");
        } else {
            dayTimeDiv.addClass("d-none");
            dayTimeDivMain.addClass("d-none");
            unavailableDiv.removeClass("d-none");
        }
    });

    // $(document).on('blur', ".day-time", function() {
    //     let inputs = $(this).find(".day-time-inner input[type='time']");
    //     let input1 = timeToSeconds(inputs[0].value);
    //     let input2 = timeToSeconds(inputs[1].value);
    //     var dayOfWeek =  $(this).closest('.slot-item').find('.day-of-week').text();
    //     var $rows = $('.day-time').find('.day-time-inner').filter(function() {
    //                     return $(this).closest('.slot-item').find('.day-of-week').text() === dayOfWeek;
    //                 });
    //                 // .not($(this)).filter(function() {
    //                 //     return $(this).closest('.slot-item').find('.day-of-week').text() === dayOfWeek;
    //                 // });

    //     console.log("$rows",$rows);
    //     if (input1 === input2) {
    //         alert("Start time and end time cannot be equal");
    //         resetInputValues(inputs);
    //         return false;
    //     }

    //     if (input2 < input1) {
    //         alert("End time cannot be smaller than start time");
    //         resetInputValues(inputs);
    //         return false;
    //     }

    //     $rows.each(function() {
    //         var start_time = timeToSeconds($(this).find('input[name="start_time[' + dayOfWeek + '][]"]')
    //             .val());
    //         var end_time = timeToSeconds($(this).find('input[name="end_time[' + dayOfWeek + '][]"]')
    //             .val());

    //         if (start_time === input1) {
    //             alert("Start time cannot be equal");
    //             resetInputValues(inputs);
    //             return false;
    //         }

    //         if (input1 < end_time && input2 > start_time) {
    //             alert("Your current slot overlapped to below these slots");
    //             resetInputValues(inputs);
    //             return false;
    //         }
    //     });
    // });

    // function setValidation(thisObj){

    //   var $rows =   $(thisObj).closest('.slot-item').find('.day-time-inner').not( $(thisObj) )
    //   var dayOfWeek =  $(thisObj).closest('.slot-item').find('.day-of-week').text();
    //   var input1 = $(thisObj).find('input[name="start_time[' + dayOfWeek + '][]"]').val();
    //   var input2 = $(thisObj).find('input[name="end_time[' + dayOfWeek + '][]"]').val();

    //     console.log({"input1":input1,"input2":input2,"dayOfWeek":dayOfWeek,"$rows":$rows});
    //     if($rows.length > 0){

    //              $rows.each(function() {

    //                 // console.log($(this).find('input[name="start_time[' + dayOfWeek + '][]"]').val())
    //                 var start_time = timeToSeconds($(this).find('input[name="start_time[' + dayOfWeek + '][]"]').val());
    //                 var end_time = timeToSeconds($(this).find('input[name="end_time[' + dayOfWeek + '][]"]').val());

    //                 if (start_time === input1) {
    //                     alert("Start time cannot be equal");
    //                     resetInputValues(inputs);
    //                     return false;
    //                 }

    //                 if (input1 < end_time && input2 > start_time) {
    //                     alert("Your current slot overlapped to below these slots");
    //                     resetInputValues(inputs);
    //                     return false;
    //                 }
    //             });
            

    //     }

    // }

    function resetInputValues(inputs) {
        inputs[0].value = "";
        inputs[1].value = "";
    }

    $(document).on('click', ".add-new-time-m", function() {
        var parentElement = $(this).closest(".day-time-inner");
        var clone = parentElement.clone();
        clone.find('input').val('')

        parentElement.parent().append(clone);
        deleteitem();
    });

    function deleteitem() {
        $(".day-time-delete").on("click", function() {
            var parentElement = $(this).closest(".day-time");
            if (parentElement) {
                parentElement.remove();
            } else {
                console.log("Parent element not found");
            }
        });
    }


        function timeToSeconds(timeString) {
            const [minutes, seconds] = timeString.split(":");
            return parseInt(minutes) * 60 + parseInt(seconds);
        }


   
            // const addNewTimeLinks = document.querySelectorAll(".add-new-time-m");
            // addNewTimeLinks.forEach(function (link) {
            //     link.addEventListener("click", function () {
            //         const parentElement = link.closest(".day-time");
            //         const clone = parentElement.cloneNode(true);
            //         parentElement.parentNode.appendChild(clone);
            //         deleteitem();
            //     });
            // });

            // function deleteitem() {
            //     const deleteButtons = document.querySelectorAll(".day-time-delete");
            //     deleteButtons.forEach(function (button) {
            //         button.addEventListener("click", function () {
            //             const parentElement = button.closest(".day-time");
            //             if (parentElement) {
            //                 parentElement.remove();
            //             } else {
            //                 console.log("Parent element not found");
            //             }
            //         });
            //     });
            // }
       
        
    </script>
@endpush
