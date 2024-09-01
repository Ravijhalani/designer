<script>

$(document).ready(function () {
    // Initialize Datepickers
    // $('#start_date').datepicker({

    //     format: 'dd-mm-yyyy',
    //     autoclose: true,
    //     todayHighlight: true
    // });

    // $('#end_date').datepicker({
    //     format: 'dd-mm-yyyy',
    //     autoclose: true,
    //     todayHighlight: true
    // });

        const startDateTimeInput = document.getElementById('start_date');
        const endDateTimeInput = document.getElementById('end_date');
     


        // Initialize the start date/time picker
        flatpickr(startDateTimeInput, {
            enableTime: false,
            dateFormat: 'd-m-Y',
            minuteIncrement: 1,
            onChange: function(selectedDates, dateStr, instance) {
                // Update the end date/time picker's minDate to the selected start date/time
                endDateTimePicker.set('minDate', dateStr);
            },
        });

        // Initialize the end date/time picker
        const endDateTimePicker = flatpickr(endDateTimeInput, {
            enableTime: false,
            dateFormat: 'd-m-Y',
            minuteIncrement: 1,
        });

    // Validation to ensure end date is greater than start date
    // $('#end_date').on('change', function () {
    //     var startDate = $('#start_date').datepicker('getDate');
    //     var endDate = $('#end_date').datepicker('getDate');

    //     if (endDate && startDate && endDate < startDate) {
    //         $('#error-end_date').text('End date must be greater than start date.');
    //         $('#end_date').val('');
    //     } else {
    //         $('#error-end_date').text('');
    //     }
    // });

    // $('#start_date').on('change', function () {
    //      $('#end_date').val('');
    //     $('#end_date').datepicker('setStartDate', $('#start_date').datepicker('getDate'));
    // });
});



 // Validation to ensure end date is greater than start date
    // $('#end_date').on('change', function () {
    //     var startDate = $('#start_date').datepicker('getDate');
    //     var endDate = $('#end_date').datepicker('getDate');

    //     if (endDate && startDate && endDate < startDate) {
    //         $('#error-end_date').text('End date must be greater than start date.');
    //         $('#end_date').val('');
    //     } else {
    //         $('#error-end_date').text('');
    //     }
    // });

    // $('#start_date').on('change', function () {
    //      $('#end_date').val('');
    //     $('#end_date').datepicker('setStartDate', $('#start_date').datepicker('getDate'));
    // });

$(document).ready(function () {
    // Hide end date field if checkbox is checked on page load (optional)
    toggleEndDate();

    // Toggle end date field on checkbox change
    $('#currently_working').change(function () {
        toggleEndDate();
    });

    function toggleEndDate() {
        if ($('#currently_working').is(':checked')) {
            $('#end_date').closest('.col-md-6').hide(); // Hide the end date field
            $('#end_date').val(''); // Clear the value of the end date field
        } else {
            $('#end_date').closest('.col-md-6').show(); // Show the end date field
        }
    }
});

</script>
