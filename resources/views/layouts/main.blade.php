<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Jobes</title>
    <link rel="stylesheet" href="{{ asset('allAssets/dashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('allAssets/style.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('new/styles.css') }}" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
</head>

<body>

    @include('Layouts.sidebar');

    <div id="main-left-panel">

        @include('Layouts.navbar')

        @yield('content')


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script src="{{ asset('allAssets/index.js') }}"></script>
        {{-- <script src="{{ asset('new/index.js') }}"></script> --}}
</body>

</html>
