<form id="step-2-form" action="{{ route('booking.service.save', ['service' => $service]) }}" method="POST">
    @csrf
    <div class="right-side-parent">
        <div>
            <div>
                <p class="fs-5 fw-light text-secondary mt-2">STEP 2 of 2</p>
                <p class="fs-5 fw-bold">Select date</p>

                <div class="dropdown">
                    <button class="btn dropdown-toggle border-down-here truncate w-100" type="button"
                        id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false" disabled>
                        In your local timezone (Asia/Calcutta)
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark disabled-dropdown"
                        aria-labelledby="dropdownMenuButton2">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                    </ul>
                </div>

            </div>
            <div class="mt-3 d-flex justify-content-start align-items-center gap-3 flex-wrap">
                <p class="fs-6 fw-normal"><span class="fs-7 fw-lighter text-secondary">Date:</span>
                    {{ date('D, d M Y', strtotime($slotDate)) }}
                </p>
                <p class="text-primary changeButton" role="button">Change</p>
            </div>
            <div class="calendar-header">
                <p class="text-dark m-0">Available time slots</p>
                <div class="flex-nowrap d-flex justify-content-center align-items-center">
                    <button type="button" id="prev-month">
                        <i class="uil uil-angle-left fs-4"></i>
                    </button>
                    <button type="button" id="next-month">
                        <i class="uil uil-angle-right-b fs-4"></i>
                    </button>
                </div>
            </div>
            <div class="mt-4 d-flex justify-content-start gap-3 align-items-center  flex-wrap">
                @php
                    $start_time = '';
                    $end_time = '';

                @endphp
                @foreach ($availableSlots['available_slots'] as $key => $item)
                    @if (count($item['schedule_slots']) > 0)
                        @foreach ($item['schedule_slots'] as $key2 => $item2)
                            @if ($key2 == 0)
                                @php 
                                    $startTimeUTC = getIST($item2['slot_start_time']);
                                    $endTimeUTC = getIST($item2['slot_end_time']);
                                    
                                @endphp
                            @endif
                            <button data-start_time="{{ date('H:i', strtotime($item2['slot_start_time'])) }}"
                                    data-end_time="{{ date('H:i', strtotime($item2['slot_end_time'])) }}" type="button"
                                class="py-2 px-3 m-0 time-text-parent {{ $key2 == 0 ? 'active' : '' }} ">
                                    {{ $startTimeUTC->format('H:i') }}
                                -   {{ $endTimeUTC->format('H:i') }}
                            </button>
                        @endforeach
                    @else
                        <h4>No Slots found</h4>
                    @endif
                @endforeach

            </div>
        </div>
        <div class="mt-4">
            @if (count($item['schedule_slots']) > 0)
                <button type="submit" style="width: 100%;" class=" btn-custom w-full">Confirm Booking</button>
            @endif
        </div>
    </div>

    <input type="hidden" name="service_id" value="{{ $service }}" />
    <input type="hidden" name="slot_date" value="{{ $slotDate }}" />

    <input type="hidden" name="start_time" id="start_time" value="{{ date('H:i', strtotime($start_time)) }}" />
    <input type="hidden" name="end_time" id="end_time" value="{{ date('H:i', strtotime($end_time)) }}" />

</form>
