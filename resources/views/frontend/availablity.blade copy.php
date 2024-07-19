@extends('frontend.layout.header')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.18.0/tagify.css"
        integrity="sha512-SNbSEpyK7jz5R7yjTrilJOlK4sgtHMfZoNtERAd8VF6jj6fk0LdW4HT3RwOLYhZmKn4GRtsNCZfA8lJ/FmYfhw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .modal-dialog {
            max-width: 620px;
        }

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


        .radio-inputs {
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 350px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .radio-inputs>* {
            margin: 6px;
        }

        .radio-input:checked+.radio-tile .radio-icon svg,
        .radio-input.active+.radio-tile .radio-icon svg {
            fill: #00a7ac;
        }

        .radio-input:checked+.radio-tile .radio-label,
        .radio-input.active+.radio-tile .radio-label {
            color: #00a7ac;
        }

        .radio-input:focus+.radio-tile {
            border-color: #00a7ac;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1), 0 0 0 4px #b5c9fc;
        }

        .radio-input.active+.radio-tile:before {
            transform: scale(1);
            opacity: 1;
        }

        .radio-tile {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 10px;
            min-height: 60px;
            border-radius: 0.5rem;
            border: 2px solid #b5bfd9;
            background-color: #fff;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            transition: 0.15s ease;
            cursor: pointer;
            position: relative;
        }

        .radio-tile:before {
            content: "";
            position: absolute;
            display: block;
            width: 0.75rem;
            height: 0.75rem;
            border: 2px solid #b5bfd9;
            background-color: #fff;
            border-radius: 50%;
            top: 0.25rem;
            left: 0.25rem;
            opacity: 0;
            transform: scale(0);
            transition: 0.25s ease;
        }

        .radio-tile:hover {
            border-color: #00a7ac;
        }

        .radio-tile:hover:before {
            transform: scale(1);
            opacity: 1;
        }

        .radio-icon svg {
            width: 2rem;
            height: 2rem;
            fill: #494949;
        }

        .radio-label {
            color: #707070;
            transition: 0.375s ease;
            text-align: center;
            font-size: 13px;
        }

        .radio-input {
            clip: rect(0 0 0 0);
            -webkit-clip-path: inset(100%);
            clip-path: inset(100%);
            height: 1px;
            overflow: hidden;
            position: absolute;
            white-space: nowrap;
            width: 1px;
        }

        .radio-input:checked+.radio-tile:before {
            transform: scale(1);
            opacity: 1;
            background-color: #00a7ac;
            border-color: #00a7ac;
        }

        .active {
            border-color: #00a7ac;
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
                                    <h4 class="layout-header">
                                        <div class="">Availability</div>
                                    </h4>
                                </div>
                            </div>
                            <!-- Meeting Availability Top Section end -->

                            <!-- Meeting Availability Main Section  Start -->
                            <form action="{{ route('availablity.store') }}" id="availablityForm" method="POST">
                                @csrf
                                <div class=" availability-main">
                                    <div class="availability-main-inner">
                                        <div class="ma-row availability-tabs">
                                            <div class="availability-tabs-inner">
                                                <div class="ma-row availability-tabs-s1">
                                                    <div class="schedule-menu">
                                                        <div class="m-a-typography tabs-availability">
                                                            <div class="tabs-availability-inner">
                                                                <div class="radio-inputs">
                                                                    @include('components.availablity-buttons')
                                                                </div>

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
                                                <div class="ma-row availability-tabs-s2">
                                                    @foreach ($days as $day => $item)
                                                        <div class="add-slots-main">
                                                            <div class="ma-row add-slots-main-inner">
                                                                <div class="add-slots">
                                                                    <div class="ma-row">
                                                                        <div class="add-slots-header-section">
                                                                            <div class="slots-header">
                                                                                <span>Default</span>
                                                                            </div>
                                                                            <div class="m-a-space-item ">
                                                                                <button type="submit"
                                                                                    class="btn btn-primary m-a-btn m-a-btn-default btn-dark">
                                                                                    <span>Save</span>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- start -->
                                                                    <div class="ma-row slot-item">
                                                                        <div class="day-t">
                                                                            <label class="checkbox-wrapper slots-title">
                                                                                <span class="m-a-checkbox m-a-wave-target">
                                                                                    <input class="m-a-checkbox-input"
                                                                                        @if (isset($slotsForDay[$item])) checked @endif
                                                                                        type="checkbox" name="days[]"
                                                                                        value="{{ $item }}" />
                                                                                    <span class="m-a-checkbox-inner">
                                                                                    </span>
                                                                                </span>
                                                                                <span
                                                                                    class="day-of-week">{{ $item }}</span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="day-time-main">
                                                                            <div
                                                                                class="day-time @if (!isset($slotsForDay[$item])) d-none @endif ">
                                                                                <div class="day-time-inner-1">
                                                                                    @if (isset($slotsForDay[$item]))
                                                                                        @foreach ($slotsForDay[$item] as $key => $item1)
                                                                                            <div class="day-time-inner">
                                                                                                <div class="time-1">
                                                                                                    <input type="time"
                                                                                                        name="start_time[{{ $item }}][]"
                                                                                                        value="{{ $item1['start_time'] }}" />
                                                                                                </div>

                                                                                                <div class="time sprater">
                                                                                                    <span>-</span>
                                                                                                </div>
                                                                                                <div class="time-2">
                                                                                                    <input type="time"
                                                                                                        name="end_time[{{ $item }}][]"
                                                                                                        value="{{ $item1['end_time'] }}" />
                                                                                                </div>
                                                                                            </div>
                                                                                        @endforeach
                                                                                    @else
                                                                                        <div class="day-time-inner">
                                                                                            <div class="time-1">
                                                                                                <input type="time"
                                                                                                    name="start_time[{{ $item }}][]" />
                                                                                            </div>
                                                                                            <div class="time sprater">
                                                                                                <span>-</span>
                                                                                            </div>
                                                                                            <div class="time-2">
                                                                                                <input type="time"
                                                                                                    name="end_time[{{ $item }}][]" />
                                                                                            </div>
                                                                                        </div>
                                                                                    @endif


                                                                                </div>
                                                                                <div class="day-time-add">
                                                                                    <a class="add-new-time-m">
                                                                                        <span>
                                                                                            <i class="fa fa-plus-circle"
                                                                                                aria-hidden="true"></i>
                                                                                        </span>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="day-time-delete">
                                                                                    <a class="delete-new-time-m">
                                                                                        <span>
                                                                                            <i class="fa fa-trash"
                                                                                                aria-hidden="true"></i>
                                                                                        </span>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="day-t-unavailable @if (isset($slotsForDay[$item])) d-none @endif ">
                                                                            <div class="m-a-typography slots-unavailable">
                                                                                Unavailable
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                    <div class="block-dates-main">
                                                        <div class="ma-row block-dates-main-add-slots">
                                                            <div class="block-dates-main-d1">
                                                                <div class="block-dates-main-d1-inner">
                                                                    <div class="m-a-space-item">
                                                                        <div
                                                                            class="m-a-typography unavailable-modal-header">
                                                                            Block dates
                                                                        </div>
                                                                    </div>
                                                                    <div class="m-a-space-item">
                                                                        <div
                                                                            class="m-a-typography block-dates-discription">
                                                                            Add dates when you will be unavailable to take
                                                                            calls
                                                                        </div>
                                                                    </div>
                                                                    <div class="m-a-space-item">
                                                                        <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->
                                                                        <button type="button" class="m-a-btn"
                                                                            data-toggle="modal" data-target="#myModal">
                                                                            <div
                                                                                class="m-a-typography question-button-text">
                                                                                Add unavailable dates
                                                                            </div>
                                                                        </button>
                                                                    </div>
                                                                    <div class="m-a-space-item"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" id="schedule_names" name="schedule_names">
                            </form>
                            <!-- Meeting Availability Main Section  End -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Button trigger modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Schedule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="schedule_name" class="col-form-label">Schedule Name:</label>
                            <input type="text" class="form-control" id="schedule_name" name="schedule_name">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-sm btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn-sm btn btn-primary saveSchedule">Save Schedule</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
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

        $(document).on("change", '.m-a-checkbox-input', function() {
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

        $(document).on("change", '.add-new-time-m', function() {
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

        $(document).on('blur', ".day-time", function() {
            let inputs = $(this).find("input[type='time']");
            let input1 = timeToSeconds(inputs[0].value);
            let input2 = timeToSeconds(inputs[1].value);
            var dayOfWeek = $(this).closest('.slot-item').find('.day-of-week').text();
            var $rows = $(".day-time").not($(this)).filter(function() {
                return $(this).closest('.slot-item').find('.day-of-week').text() === dayOfWeek;
            });

            if (input1 === input2) {
                alert("Start time and end time cannot be equal");
                resetInputValues(inputs);
                return false;
            }

            if (input2 < input1) {
                alert("End time cannot be smaller than start time");
                resetInputValues(inputs);
                return false;
            }

            $rows.each(function() {
                var start_time = timeToSeconds($(this).find('input[name="start_time[' + dayOfWeek + '][]"]')
                    .val());
                var end_time = timeToSeconds($(this).find('input[name="end_time[' + dayOfWeek + '][]"]')
                    .val());

                if (start_time === input1) {
                    alert("Start time cannot be equal");
                    resetInputValues(inputs);
                    return false;
                }

                if (input1 < end_time && input2 > start_time) {
                    alert("Your current slot overlapped to below these slots");
                    resetInputValues(inputs);
                    return false;
                }
            });
        });

        function resetInputValues(inputs) {
            inputs[0].value = "";
            inputs[1].value = "";
        }

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


        function ServiceCreatesuccessMethod(data) {
            alert(data.message);
        }

        function toggleActive(element) {
            $('.radio-tile').removeClass('active');
            $(element).parent().find('.radio-tile').addClass('active');           
            $(".add-slots-main").hide();
            $("#schedulesData"+element.value).show();
        }

        document.addEventListener("DOMContentLoaded", function() {
            const addNewTimeLinks = document.querySelectorAll(".add-new-time-m");
            addNewTimeLinks.forEach(function(link) {
                link.addEventListener("click", function() {
                    const parentElement = link.closest(".day-time");
                    const clone = parentElement.cloneNode(true);
                    parentElement.parentNode.appendChild(clone);
                    deleteitem();
                });
            });

            function deleteitem() {
                const deleteButtons = document.querySelectorAll(".day-time-delete");
                deleteButtons.forEach(function(button) {
                    button.addEventListener("click", function() {
                        const parentElement = button.closest(".day-time");
                        if (parentElement) {
                            parentElement.remove();
                        } else {
                            console.log("Parent element not found");
                        }
                    });
                });
            }
        });







    </script>
@endpush
