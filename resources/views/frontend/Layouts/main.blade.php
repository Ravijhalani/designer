<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Jobes</title>
    @stack('css')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.18.0/tagify.css"
        integrity="sha512-SNbSEpyK7jz5R7yjTrilJOlK4sgtHMfZoNtERAd8VF6jj6fk0LdW4HT3RwOLYhZmKn4GRtsNCZfA8lJ/FmYfhw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/awesomplete/1.1.3/awesomplete.min.css" />

    <!-- Include Toastr CSS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
    {{-- <script src="{{ asset('assets/js/main-2.js') }}"></script> --}}
</head>
<style>
    .ui-datepicker {
        z-index: 99999 !important;
    }

    .tagify__dropdown {
        z-index: 99999 !important;
    }
</style>

<body>

    @include('frontend.Layouts.sidebar');

    <div id="main-left-panel">

        @include('frontend.Layouts.navbar')

        @yield('content')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>


        <!-- Include Toastr JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"
            integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/additional-methods.min.js"
            integrity="sha512-TiQST7x/0aMjgVTcep29gi+q5Lk5gVTUPE9XgN0g96rwtjEjLpod4mlBRKWHeBcvGBAEvJBmfDqh2hfMMmg+5A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('assets/js/jquery.nice-select.js') }}"></script>
        <script src="{{ asset('assets/js/select2.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"
            integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.18.0/tagify.min.js"
            integrity="sha512-5nCDZEtBxUHHT96BzDe7Xd4OfruObns6OD9HEjZvznYJtzrobCAyOLKdA+sfcLC3z9UEhbYgsYFeJcbSEEPiDA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/awesomplete/1.1.3/awesomplete.min.js"></script>

        <script src="{{ asset('assets/js/custom.js') }}"></script>
        @stack('js')



</body>
<script>
    function popupMsg(title, message, type) {
        Swal.fire({
            title: title,
            text: message,
            icon: type //"success|error|warning|info
        }).then((result) => {
            if (result.isConfirmed) {
                location.reload();
            }
        });
    }

    function errorMsg(title, message, type) {
        Swal.fire({
            title: title,
            text: message,
            icon: type //"success|error|warning|info
        });
    }


    function submitAjax(formObj, funct) {
        console.log("formObj", formObj);
        event.preventDefault();
        $.ajax({
            url: formObj.action,
            type: formObj.method,
            processData: false, // Important!
            contentType: false,
            cache: false,
            data: new FormData($('#' + formObj.id)[0]),
            beforeSend: function() {
                $('#' + formObj.id + ' #submitBtn').addClass('loading');
                $('#' + formObj.id + ' #submitBtn').attr('disabled', 'disabled');
            },
            success: funct.bind(null, formObj)
        }).done(function(data) {
            $('#' + formObj.id + ' #submitBtn').removeClass('loading');
            $('#' + formObj.id + ' #submitBtn').removeAttr('disabled');
        });

    }

    $(document).ready(function() {
        // Function to refresh the user's token
        function refreshUserToken() {
            $.ajax({
                url: '{{ route('refresh.token') }}', // Replace with your Laravel route for token refresh
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    // Update the user's token with the new token (if needed)

                    console.log('Token refreshed successfully');
                },
                error: function(error) {
                    console.error('Token refresh failed:', error);
                },
                complete: function() {
                    // Schedule the next refresh after 10 minutes
                    setTimeout(refreshUserToken, 15 * 60 * 1000);
                }
            });
        }

        // Initial call to start the refresh process
        refreshUserToken();
    });
</script>

</html>
