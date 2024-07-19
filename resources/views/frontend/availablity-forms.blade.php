<form action="{{ route('availablity.store', ['schedule_id' => $schedule_id]) }}" id="availablityForm" method="POST">
    @csrf
    <div class="ma-row availability-tabs-s2">
        <div class="add-slots-main">
            <div class="ma-row add-slots-main-inner">
                <div class="add-slots">
                    <div class="ma-row">
                        <div class="add-slots-header-section">
                            <div class="slots-header">
                                <span>Default</span>
                            </div>
                            <div class="m-a-space-item ">
                                <button type="submit" class="btn btn-dark m-a-btn m-a-btn-default btn-dark">
                                    <span>Save</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- start -->






                    @foreach ($days as $day => $item)
                        <div class="ma-row slot-item">
                            <div class="day-t">
                                <label class="checkbox-wrapper slots-title">
                                    <span class="m-a-checkbox m-a-wave-target">
                                        <input class="m-a-checkbox-input"
                                            @if (isset($slotsForDay[$item])) checked @endif type="checkbox"
                                            name="days[]" value="{{ $item }}" />
                                        <span class="m-a-checkbox-inner">
                                        </span>
                                    </span>
                                    <span class="day-of-week">{{ $item }}</span>
                                </label>
                            </div>
                            <div class="day-time-main">
                                <div class="day-time @if (!isset($slotsForDay[$item])) d-none @endif ">
                                    <div class="day-time-inner-1">
                                        @if (isset($slotsForDay[$item]))
                                            @foreach ($slotsForDay[$item] as $key => $item1)
                                                <div class="day-time-inner p-2">
                                                    <div class="time-1">
                                                        <input type="time" name="start_time[{{ $item }}][]"
                                                            value="{{ $item1['start_time'] }}" />
                                                    </div>

                                                    <div class="time sprater">
                                                        <span>-</span>
                                                    </div>
                                                    <div class="time-2">
                                                        <input type="time" name="end_time[{{ $item }}][]"
                                                            value="{{ $item1['end_time'] }}" />
                                                    </div>


                                                    <div class="day-time-add">
                                                        <a class="add-new-time-m">
                                                            <span>
                                                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                            </span>
                                                        </a> &nbsp;
                                                    </div>

                                                    <div class="day-time-add">
                                                        <a class="delete-new-time-m">
                                                            <span>
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </span>
                                                        </a>
                                                    </div>



                                                </div>
                                            @endforeach
                                        @else
                                            <div onblur="setValidation(this)" class="day-time-inner p-2">
                                                <div class="time-1">
                                                    <input  type="time" name="start_time[{{ $item }}][]" />
                                                </div>
                                                <div class="time sprater">
                                                    <span>-</span>
                                                </div>
                                                <div class="time-2">
                                                    <input  type="time" name="end_time[{{ $item }}][]" />
                                                </div>

                                                <div class="day-time-add">
                                                    <a class="add-new-time-m">
                                                        <span>
                                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                        </span>
                                                    </a> &nbsp;
                                                </div>

                                                <div class="day-time-add">
                                                    <a class="delete-new-time-m">
                                                        <span>
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </span>
                                                    </a>
                                                </div>

                                            </div>
                                        @endif


                                    </div>

                                </div>
                            </div>
                            <div class="day-t-unavailable @if (isset($slotsForDay[$item])) d-none @endif ">
                                <div class="m-a-typography slots-unavailable">
                                    Unavailable
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
        <div class="block-dates-main">
            <div class="ma-row block-dates-main-add-slots">
                <div class="block-dates-main-d1">
                    <div class="block-dates-main-d1-inner">
                        <div class="m-a-space-item">
                            <div class="m-a-typography unavailable-modal-header">
                                Block dates
                            </div>
                        </div>
                        <div class="m-a-space-item">
                            <div class="m-a-typography block-dates-discription">
                                Add dates when you will be unavailable to
                                take
                                calls
                            </div>
                        </div>
                        <div class="m-a-space-item">
                            <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->
                            <button type="button" class="m-a-btn" data-toggle="modal" data-target="#myModal">
                                <div class="m-a-typography question-button-text">
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

</form>
<script>
   
</script>
