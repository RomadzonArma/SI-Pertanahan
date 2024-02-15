<!doctype html>
<html lang="en" dir="ltr">


<!-- Mirrored from shreethemes.in/landrick/landing/index-integration.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Nov 2022 02:48:00 GMT -->

<head>
    <meta charset="utf-8" />
    {{-- <title>Sistem Informasi Pertanahan Surakarta | Disperum Kota Surakarta</title> --}}
    <title>{{ $title ?? config('app.name') }} | Disperum Kota Surakarta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Informasi Pertanahan Surakarta" />
    <meta name="keywords" content="Saas, Software, multi-uses, HTML, Clean, Modern" />
    <meta name="author" content="pemkot surakarta" />
    <meta name="email" content="disperumkpp@gmail.com" />
    <meta name="website" content="https://ministry.phicos.co.id/front/2024/sip-surakarta/data.html" />
    <meta name="Version" content="v1.0.0" />

    <!-- favicon -->
    <!-- <link rel="shortcut icon" href="assets/images/favicon.ico" /> -->
    <link rel="shortcut icon" href="https://solodata.surakarta.go.id/assets/portal/images/logo-ska-favicon-new.png">

    <!-- Css -->
    <!-- Bootstrap Css -->
    <link href="{{ asset('front/assets/css/bootstrap.min.css') }}" id="bootstrap-style" class="theme-opt"
        rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('front/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('front/assets/css/line.css') }}" type="text/css" rel="stylesheet" />

    <!-- Style Css-->
    <link href="{{ asset('front/assets/css/style.min.css') }}" id="color-opt" class="theme-opt" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="{{ asset('front/assets/css/_custom.css') }}">

    <link rel="stylesheet" href="{{ asset('front/assets/css/custom-login.css') }}">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="{{ asset('assets\libs\leaflet\leaflet.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets\libs\datatables.net\css\dataTables.bootstrap5.min.css') }}" />
</head>
<style>
    #map {
        position: relative;
        border-radius: 8px;
        height: 400px;
        /* or as desired */
        width: 100vw;
        /* This means "100% of the width of its container", the .col-md-8 */
    }
</style>

<body>

    @include('layouts.frontend.home.header')

    @yield('contents')

    @include('layouts.frontend.home.footer')

    <!-- Back to top -->
    <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fs-5 bg-primary"><i
            data-feather="arrow-up" class="fea icon-sm icons align-middle"></i></a>
    <!-- Back to top -->

    @include('layouts.frontend.home.script')
</body>

<!-- Mirrored from shreethemes.in/landrick/landing/index-integration.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Nov 2022 02:48:02 GMT -->

</html>
