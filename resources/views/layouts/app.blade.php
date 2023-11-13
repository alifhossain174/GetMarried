<!DOCTYPE html>
<html lang="en">

@php
    $logoFavicon = App\Models\LogoFavicon::where('id', 1)->first();
@endphp

<head>
    <meta charset="utf-8" />
    <title>{{ $logoFavicon->tab_title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="School CMS" name="description" />
    <meta content="Getup Ltd." name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    @if ($logoFavicon->favicon && file_exists(public_path($logoFavicon->favicon)))
        <link rel="shortcut icon" href="{{ url($logoFavicon->favicon) }}" />
    @else
        <link rel="shortcut icon" href="{{ url('frontend_assets') }}/images/favicon.svg" />
    @endif

    <!-- App css -->
    <link href="{{ url('backend_assets') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="{{ url('backend_assets') }}/css/app.min.css" rel="stylesheet" type="text/css"
        id="app-default-stylesheet" />
    <link href="{{ url('backend_assets') }}/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css"
        id="bs-dark-stylesheet" disabled />
    <link href="{{ url('backend_assets') }}/css/app-dark.min.css" rel="stylesheet" type="text/css"
        id="app-dark-stylesheet" disabled />
    <!-- icons -->
    <link href="{{ url('backend_assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg">

    <div class="account-pages my-5" style="margin-top: 5.5rem !important;">
        <div class="container">

            @yield('content')

        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- Vendor js -->
    <script src="{{ url('backend_assets') }}/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="{{ url('backend_assets') }}/js/app.min.js"></script>

</body>

</html>
