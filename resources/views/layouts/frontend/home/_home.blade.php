<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Peta yang di lengkapi dengan keterangan secara rinci mengenai pemanfaatan suatu persil">
    <meta name="keywords" content="tegal, peta, krk, Kota Surakarta, kabupaten tegal, Sistem Pertanahan">
    <meta name="author" content="phicos">
    <title>Beranda | Sistem Pertanahan</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('img/logo-kota-surakarta.png') }}">
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">
    <link rel="preload" href="{{ asset('front/assets/css/fonts/thicccboi.css') }}" as="style"
        onload="this.rel='stylesheet'">
    <link rel="stylesheet" href="{{ asset('front/assets/css/custom.css') }}">

</head>

<body>
    <div class="content-wrapper">
        <div class="bg-krk-gradient-primary krk-br-btm position-relative">
            <div class="img-bg" style="background: url({{ asset('front/assets/img/bg/taman-pancasila.jpeg') }});"></div>
            @include('layouts.frontend.home._header')
            <!-- /header -->

            <!-- /section -->
        </div>
        @yield('contents')
    </div>
    <!-- /.content-wrapper -->

    <!-- footer -->
    @include('layouts.frontend.home._footer')
    @include('layouts.frontend.home._script')
</body>

</html>
