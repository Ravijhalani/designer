@extends('frontend.Layouts.main')

@push('css')
    <link rel="stylesheet" href="{{ asset('availablities/styles.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pickr/dist/themes/nano.min.css">

    <style>
        .custom-time-input {
            cursor: pointer;
            width: 200px;
            height: 40px;
            padding: 10px;
            font-size: 16px;
        }
    </style>
@endpush

@section('content')
    <!---------------------content starts from here------------------>
    <div class="w-100 d-flex justify-content-center align-items-center">
        <div class="m-4 over-flow-class-all">
            <div class="bg-white p-3">
                <div class="top-head">
                    <div class="mt-2 d-flex justify-content-start align-items-center">
                        <i class="uil uil-angle-left fs-4 m-0 p-0"></i>
                        <p class="fs-5 fw-bold m-0">Availability</p>
                    </div>
                    <hr class="mt-3" />

                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif

                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 over-flow-class-all-panel">
                        <!-- tabs for form here  -->
                        <ul class="nav nav-pills mb-3 d-flex flex-column" id="pills-tab" role="tablist">
                            <!-- ----------------tab four ---------------- -->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link w-100 tab-parent-inner m-0 py-0 disabled" id="pills-three-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-four" type="button" role="tab"
                                    aria-controls="pills-four" aria-selected="false" onclick="activateTab(this)">
                                    <div class="text-start background-color-active">
                                        <p class="m-0 background-color-active-text">Schedule</p>
                                    </div>
                                </button>
                            </li>
                            @php
                                $isPrimary = false;
                            @endphp
                            <!-- ----------tab one----------- -->
                            @foreach ($data as $key => $item)
                                <li class="nav-item" role="presentation">
                                    <button data-schedule-id="{{ $item['id'] }}"
                                        class="nav-link  w-100 tab-parent-inner {{ $key == 0 ? 'active' : '' }} m-0 py-0"
                                        id="pills-one-tab{{ $item['id'] }}" data-bs-toggle="pill"
                                        data-bs-target="#pills-one{{ $item['id'] }}" type="button" role="tab"
                                        aria-controls="pills-one{{ $item['id'] }}" aria-selected="true"
                                        onclick="activateTab(this)">
                                        <div class="text-start background-color-on-active">
                                            @if ($item['is_primary'])
                                                <p class="default-value">Default</p>
                                            @endif
                                            <p class="m-0 background-color-on-active-text ">
                                                {{ $item['schedule_name'] }}
                                            </p>
                                        </div>
                                    </button>
                                </li>
                            @endforeach


                            <div class="text-start add-more-button-parent">
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#scheduleModal"
                                    class="m-0 px-3 background-color-active-text text-decoration-none">Add more
                                    +</a>
                            </div>
                        </ul>
                    </div>



                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 pe-4 over-flow-class-all-panel">


                        <div id="loader" style="display:none;">
                            <center>
                                <img src="https://res.cloudinary.com/bytesizedpieces/image/upload/v1656085547/article/a-how-to-guide-on-making-an-animated-loading-image-for-a-website/animated_loader_hghpbl.gif"
                                    alt="Loading...">
                            </center>

                        </div>

                        <div class="tab-content" id="pills-tabContent">



                            <!-- ----------------tab content form one----------------- -->
                            {{-- @foreach ($data as $key => $item)
                            <div class="tab-pane fade {{ $item['is_primary'] ? 'show' : '' }} {{ $item['is_primary'] ? 'active' : '' }}"
                                id="pills-one{{ $item['id'] }}" role="tabpanel"
                                aria-labelledby="pills-one-tab{{ $item['id'] }}">

                                <form onsubmit="setValidation(this)" id="form{{ $item['id'] }}" method="POST"
                                    action="{{ route('availablity.store', ['schedule_id' => $item['id']]) }}">
                                    @csrf

                                    <input type="hidden" id="timeZone{{ $item['id'] }}" name="timeZone[{{ $item['id'] }}]" value="">
                                    <script>
                                        var userTimezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
                                            $("#timeZone{{ $item['id'] }}").val(userTimezone);


                                    </script>

                                    

                                    <div class="text-start background-color-active">
                                        <p class="m-0 background-color-active-text">Days</p>

                                        <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                                            <p class="switch-text m-0">Set as primary</p>

                                            <label class="switch">
                                                <input type="checkbox" name="is_primary[{{ $item['id'] }}]"
                                                    @if ($item['is_primary']) checked @endif value="1" />
                                                <span class="slider round"></span>
                                            </label>
                                        </div>

                                    </div>


                                    <!-- content should here  -->
                                    <div class="accordion" id="accordionExample">

                                        <div class="form-group p-2">
                                            <label for=""> <strong> Schedule Name : </strong> </label>
                                            <input type="text" value="{{ $item['schedule_name'] }}" class="form-control"
                                                name="schedule_name[{{ $item['id'] }}]"
                                                id="schedule_name{{ $item['id'] }}">
                                        </div>

                                        @foreach ($item['schedules'] as $days => $schedules)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOne">
                                                    <button
                                                        style="{{ $days == 'Monday' ? 'color:#0c63e4!important' : 'color:black!important' }}"
                                                        class="accordion-button" type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapseOne{{ $item['id'] }}{{ $days }}"
                                                        aria-expanded="true"
                                                        aria-controls="collapseOne{{ $item['id'] }}{{ $days }}">
                                                        {{ $days }}
                                                    </button>
                                                </h2>
                                                <div id="collapseOne{{ $item['id'] }}{{ $days }}"
                                                    class="accordion-collapse collapse {{ $days == 'Monday' ? 'show' : '' }} "
                                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body p-0">
                                                        <div class="accordion-body">
                                                            <div id="schedules{{ $days }}{{ $item['id'] }}"
                                                                class="schedulesParent">
                                                                @if (count($schedules) > 0)
                                                                    @foreach ($schedules as $key => $time)
                                                                        @php
                                                                            $rand = rand(1000, 10000);
                                                                        @endphp

                                                                        <div class="row px-2 pb-3"
                                                                            id="schedulesROW{{ $days }}{{ $rand }}">
                                                                            <div
                                                                                class="col-md-4 p-0 d-flex justify-content-center align-items-center">
                                                                                <div class="input-group">
                                                                                    <input type="time"
                                                                                        class="custom-time-input timepicker form-control form-inputs-parent"
                                                                                        id="startTime{{ $days }}{{ $rand }}"
                                                                                        name="start_time[{{ $days }}][]"
                                                                                        placeholder="HH : MM" required
                                                                                        value="{{ $time['start_time'] }}"
                                                                                        onblur="checkTime('{{ $days }}', '{{ $item['id'] }}', '{{ $rand }}')" />
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-1 p-0 text-center d-flex justify-content-center align-items-center">
                                                                                <p class="center-text m-0"> <strong>To</strong> </p>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-4 p-0 d-flex justify-content-center align-items-center">
                                                                                <div class="input-group">
                                                                                    <input type="time"
                                                                                        class="custom-time-input timepicker form-control form-inputs-parent"
                                                                                        id="endTime{{ $days }}{{ $rand }}"
                                                                                        name="end_time[{{ $days }}][]"
                                                                                        placeholder="HH : MM" required
                                                                                        value="{{ $time['end_time'] }}"
                                                                                        onblur="checkTime('{{ $days }}', '{{ $item['id'] }}', '{{ $rand }}')" />
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-2 d-flex flex-row gap-4 flex-wrap justify-content-center align-items-center">
                                                                                <i onclick="removeThis('{{ $days }}', '{{ $rand }}')"
                                                                                    class="uil uil-multiply text-danger fs-5 icons-work"></i>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                            <div class="text-start p-1 add-more-button-parent">
                                                                <a onclick="addMoreSchedules('{{ $days }}', '{{ $item['id'] }}')"
                                                                    href="javascript:void(0)"
                                                                    class="m-0 background-color-active-text text-decoration-none">Add
                                                                    more +</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                           
                                        @endforeach

                                    </div>

                                    <div class=" p-4" style="    text-align: right;">
                                     <button type="submit" class="btn float-right btn-outline-success"> <i   class="fa fa-plus"></i> Save</button>
                                    </div>
                                </form>
                            </div>
                        @endforeach --}}




                        </div>



                    </div>


                </div>
            </div>
        </div>


        <div class="modal fade" id="scheduleModal" tabindex="-1" role="dialog" aria-labelledby="scheduleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered" role="document">

                <div class="modal-content">
                    <form action="{{ route('save.schedules') }}" method="post">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="scheduleModalLabel"><strong> Add Schedule </strong></h5>
                            <button type="button" class="btn btn-danger close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">

                                <label for=""> <strong> Schedule Name : </strong></label>
                                <input type="text" name="schedule_name" id="schedule_name" required
                                    class="form-control" />
                            </div>

                            <div class=" pt-3 " style="display: grid">
                                <strong class=" m-0">Set as primary </strong>
                                <label class="switch">
                                    <input type="checkbox" name="is_primary" value="1" />
                                    <span class="slider round"></span>
                                </label>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Save changes <i class="fa fa-save"></i> </button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('availablities/index.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"
        integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        // Function to load tab content via AJAX
        function loadTabContent(scheduleId) {
            $('#loader').show(); // Show loader

            $.ajax({
                url: `/availablity/form/${scheduleId}`, // Adjust route to your needs
                type: 'GET',
                success: function(data) {
                    $('#pills-tabContent').html(
                        data); // Load the HTML content into the tabContent div
                    $('#loader').hide(); // Hide loader once the content is loaded
                },
                error: function(xhr, status, error) {
                    console.error('Error loading tab content:', error);
                    $('#loader').hide(); // Hide loader on error
                }
            });
        }

        // On tab click, load content dynamically
        $('.nav-link').on('click', function(e) {
            e.preventDefault();
            $("#pills-tabContent").html('');
            var scheduleId = $(this).attr(
                'data-schedule-id'); // Assuming you pass the ID via data attribute
            loadTabContent(scheduleId);
        });

        var firstButton = $('li.nav-item button[data-schedule-id]').first();


        if (firstButton.length > 0) {
            var firstScheduleId = firstButton.data('schedule-id');
            loadTabContent(firstScheduleId);
        } else {
            console.log('Button not found or missing data-schedule-id.');
        }






        // Initialize the form validation for dynamically loaded forms
        $(document).on('submit', '#availablityForm', function(e) {
            e.preventDefault(); // Prevent the default form submission

            var $form = $(this); // Get the form element
            var $submitButton = $form.find('button[type="submit"]'); // Get the submit button
            var loaderIcon =
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';

            // Validate the form
            $form.validate({
                rules: {
                    // Add validation rules as per the form input names
                    // 'start_time[]': {
                    //     required: true,
                    // },
                    // 'end_time[]': {
                    //     required: true,
                    // }
                },
                messages: {
                    'start_time[]': "Start time is required",
                    'end_time[]': "End time is required",
                },
                submitHandler: function() {

                    if ($(".accordion-body .row").length == 0) {

                        errorMsg('Validation error',
                            'Please add atleast 1 start & end time', 'error');
                        return false;


                    }


                    // Add loader icon and disable submit button to prevent double-clicks
                    $submitButton.prop('disabled', true).html(loaderIcon + ' Saving...');

                    // Perform AJAX submission
                    $.ajax({
                        url: $form.attr('action'), // Form action URL
                        type: $form.attr('method'), // Form method (POST)
                        processData: false, // Important!
                        contentType: false,
                        cache: false,
                        data: new FormData($('#' + $form.attr('id'))[0]),
                        success: function(response) {
                            // Handle success (e.g., show success message, reload content, etc.)
                            if (response.status) {
                                errorMsg('Success', response.message,
                                    'success');
                            } else {
                                errorMsg('Error', response.message, 'error');
                            }

                        },
                        error: function(xhr) {
                            // Handle error (e.g., show error message)
                            alert('An error occurred during form submission.');
                        },
                        complete: function() {
                            // Remove the loader icon and enable the button again
                            $submitButton.prop('disabled', false).html(
                                '<i class="fa fa-plus"></i> Save');
                        }
                    });
                }
            });
        });








        function checkTime(days, itemId, rand) {
            const schedulesParent = document.getElementById(`schedules${days}${itemId}`);
            const rows = schedulesParent.getElementsByClassName('row');

            // Convert time to minutes for easier comparison
            function timeToMinutes(time) {
                const [hours, minutes] = time.split(':').map(Number);
                return hours * 60 + minutes;
            }

            const currentRow = document.getElementById(`schedulesROW${days}${rand}`);
            const currentStartTime = currentRow.querySelector(`#startTime${days}${rand}`).value;
            const currentEndTime = currentRow.querySelector(`#endTime${days}${rand}`).value;



            if (!currentStartTime || !currentEndTime) return;

            const currentStart = timeToMinutes(currentStartTime);
            const currentEnd = timeToMinutes(currentEndTime);

            if ((currentStart > currentEnd) || currentStart == currentEnd) {
                alert("End time cannot be smaller than start time or not Equal than");
                currentRow.querySelector(`#startTime${days}${rand}`).value = '';
                currentRow.querySelector(`#endTime${days}${rand}`).value = '';
                return false;
            }

            let overlap = false;

            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                if (row.id === `schedulesROW${days}${rand}`) continue;

                const otherStartTime = row.querySelector(`#startTime${days}${row.id.split(days)[1]}`).value;
                const otherEndTime = row.querySelector(`#endTime${days}${row.id.split(days)[1]}`).value;

                if (!otherStartTime || !otherEndTime) continue;

                const otherStart = timeToMinutes(otherStartTime);
                const otherEnd = timeToMinutes(otherEndTime);

                if ((currentStart < otherEnd && currentEnd > otherStart) ||
                    (currentStart >= otherStart && currentStart < otherEnd) ||
                    (currentEnd > otherStart && currentEnd <= otherEnd)) {
                    overlap = true;
                    break;
                }
            }

            if (overlap) {
                alert('Time overlaps with another schedule.');
                currentRow.querySelector(`#startTime${days}${rand}`).value = '';
                currentRow.querySelector(`#endTime${days}${rand}`).value = '';
                return false;
            }
        }

        function addMoreSchedules(days, itemId) {
            const rand = Math.floor(Math.random() * 9000) + 1000;
            const schedulesParent = document.getElementById(`schedules${days}${itemId}`);

            const newRow = document.createElement('div');
            newRow.classList.add('row', 'px-2', 'pb-3');
            newRow.id = `schedulesROW${days}${rand}`;
            newRow.innerHTML = `
                                <div class="col-md-4 p-0 d-flex justify-content-center align-items-center">
                                    <div class="input-group">
                                        <input type="time" class="custom-time-input timepicker form-control form-inputs-parent"
                                            id="startTime${days}${rand}" name="start_time[${days}][]"
                                            placeholder="HH : MM" required onblur="checkTime('${days}', '${itemId}', '${rand}')" />
                                    </div>
                                </div>
                                <div class="col-md-1 p-0 text-center d-flex justify-content-center align-items-center">
                                    <p class="center-text m-0"><strong>To</strong></p>
                                </div>
                                <div class="col-md-4 p-0 d-flex justify-content-center align-items-center">
                                    <div class="input-group">
                                        <input type="time" class="custom-time-input timepicker form-control form-inputs-parent"
                                            id="endTime${days}${rand}" name="end_time[${days}][]"
                                            placeholder="HH : MM" required onblur="checkTime('${days}', '${itemId}', '${rand}')" />
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex flex-row gap-4 flex-wrap justify-content-center align-items-center">
                                    <i onclick="removeThis('${days}', '${rand}')" class="uil uil-multiply text-danger fs-5 icons-work"></i>
                                </div>
                            `;
            schedulesParent.appendChild(newRow);
        }

        function removeThis(days, rand) {
            const row = document.getElementById(`schedulesROW${days}${rand}`);
            if (row) {
                row.remove();
            }
        }

        $(document).on('click', '.custom-time-input', function() {
            this.showPicker(); // This opens the timepicker when any part of the input is clicked
        })
    </script>
@endpush
