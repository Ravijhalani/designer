<form id="step-1-form" action="{{ route('booking.service-step-2', ['service' => $service]) }}" method="POST">
    @csrf
    <div class="right-side-parent">
        <div>
            <p class="fs-5 fw-light text-secondary mt-2">STEP 1 of 2</p>
            <p class="fs-5 fw-bold">Select date</p>

            <div class="dropdown">
                <button class="btn dropdown-toggle border-down-here truncate w-100" type="button" id="dropdownMenuButton2"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    In your local timezone (Asia/Calcutta)
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                    <li><a class="dropdown-item active" href="#">Action</a></li>
                    <li>
                        <a class="dropdown-item" href="#">Another action</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center flex-column">
            <div class="calendar">
                <div class="container mx-auto">
                    <div class="">
                        <div class="w-full ">
                            <input type="hidden" id="datepickerInput" name="slot_date" />
                            <div id="datepicker" class="datepicker datepicker-flex"></div>
                        </div>
                    </div>
                </div>

                <button type="submit" class=" btn-custom w-full" style="width: 100%;">Continue</button>

            </div>

            <!-- ends here  -->
        </div>
    </div>
</form>
