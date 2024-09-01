<div class="tab-pane fade active show" id="pills-one{{ $item['id'] }}" role="tabpanel"
    aria-labelledby="pills-one-tab{{ $item['id'] }}">

    <form id="availablityForm" method="POST" action="{{ route('availablity.store', ['schedule_id' => $item['id']]) }}">
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

            {{-- <div class="form-group p-2">
                <label for=""> <strong> Schedule Name : </strong> </label>
                <input type="text" value="{{ $item['schedule_name'] }}" class="form-control"
                    name="schedule_name[{{ $item['id'] }}]" id="schedule_name{{ $item['id'] }}">
            </div> --}}

            @foreach ($item['schedules'] as $days => $schedules)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button style="{{ $days == 'Monday' ? 'color:#0c63e4!important' : 'color:black!important' }}"
                            class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne{{ $item['id'] }}{{ $days }}" aria-expanded="true"
                            aria-controls="collapseOne{{ $item['id'] }}{{ $days }}">
                            {{ $days }}
                        </button>
                    </h2>
                    <div id="collapseOne{{ $item['id'] }}{{ $days }}"
                        class="accordion-collapse collapse {{ $days == 'Monday' ? 'show' : '' }} "
                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body p-0">
                            <div class="accordion-body">
                                <div id="schedules{{ $days }}{{ $item['id'] }}" class="schedulesParent">
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
            <button type="submit" class="btn float-right btn-outline-success"> <i class="fa fa-plus"></i> Save</button>
        </div>
    </form>
</div>
