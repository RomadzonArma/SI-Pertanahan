

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
    <title>Aplikasi Database Pemakaman</title>
    <link rel="icon" href="{{asset('pemakaman')}}/assets/images/custom/logo-solo-sq.png">
    <link rel="stylesheet" type="text/css" href="{{asset('pemakaman')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('pemakaman')}}/assets/css/bootstrap-slider.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('pemakaman')}}/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('pemakaman')}}/assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="{{asset('pemakaman')}}/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{asset('pemakaman')}}/assets/css/custom.css">
</head>

<body>
    @include('layouts.frontend.home.header')

    {{-- @yield('contents') --}}


    <div id="info" class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="info-text">adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                        commodo consequat. Duis aute irure.</div>

                    <a href="signup.html" class="ybtn ybtn-accent-color ybtn-shadow">Lihat Persebaran Makam</a>
                </div>
            </div>
        </div>
    </div>
    <div id="services" class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-5">
                    <div class="row-title">Data Persebaran Pemakaman</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="service-box">
                        <div class="service-icon">
                            <img src="{{asset('pemakaman')}}/assets/images/service-icon1.svg" alt="">
                        </div>
                        <div class="service-title"><a href="#">Data Dummy</a></div>
                        <div class="service-details">
                            <div class="number-data pl-5">
                                153421
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="service-box">
                        <div class="service-icon">
                            <img src="{{asset('pemakaman')}}/assets/images/service-icon2.svg" alt="">
                        </div>
                        <div class="service-title"><a href="#">Data Dummy 2</a></div>
                        <div class="service-details">
                            <div class="number-data pl-5">
                                153421
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="service-box">
                        <div class="service-icon">
                            <img src="{{asset('pemakaman')}}/assets/images/service-icon3.svg" alt="">
                        </div>
                        <div class="service-title"><a href="#">Data Dummy 3</a></div>
                        <div class="service-details">
                            <div class="number-data pl-5">
                                153421
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="features" class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row-title">Grafik</div>
                </div>
            </div>
            <div class="row rtl-cols">
                <div class="col-sm-12 col-md-6">
                    <div id="features-links-holder">
                        <div class="icons-axis">
                            <img src="{{asset('pemakaman')}}/assets/images/features-icon.png" alt="">
                        </div>
                        <div class="feature-icon-holder feature-icon-holder1 opened" data-id="1">
                            <div class="animation-holder">
                                <div class="special-gradiant"></div>
                            </div>
                            <div class="feature-icon"><i class="htfy htfy-worldwide"></i></div>
                            <div class="feature-title">%99 Uptime</div>
                        </div>
                        <div class="feature-icon-holder feature-icon-holder2" data-id="2">
                            <div class="animation-holder">
                                <div class="special-gradiant"></div>
                            </div>
                            <div class="feature-icon"><i class="htfy htfy-cogwheel"></i></div>
                            <div class="feature-title">Easy control panel</div>
                        </div>
                        <div class="feature-icon-holder feature-icon-holder3" data-id="3">
                            <div class="animation-holder">
                                <div class="special-gradiant"></div>
                            </div>
                            <div class="feature-icon"><i class="htfy htfy-location"></i></div>
                            <div class="feature-title">Email Marketing</div>
                        </div>
                        <div class="feature-icon-holder feature-icon-holder4" data-id="4">
                            <div class="animation-holder">
                                <div class="special-gradiant"></div>
                            </div>
                            <div class="feature-icon"><i class="htfy htfy-download"></i></div>
                            <div class="feature-title">1CLICK Script Installs</div>
                        </div>
                        <div class="feature-icon-holder feature-icon-holder5" data-id="5">
                            <div class="animation-holder">
                                <div class="special-gradiant"></div>
                            </div>
                            <div class="feature-icon"><i class="htfy htfy-like"></i></div>
                            <div class="feature-title">7/24 Support</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div id="features-holder">
                        <div class="feature-box feature-d1 show-details">
                            <div class="feature-title-holder">
                                <span class="feature-icon"><i class="htfy htfy-worldwide"></i></span>
                                <span class="feature-title">Grafik Pertama</span>
                            </div>
                            <div class="feature-details">

                                <div id="pie1" style="height: 250px;"></div>

                            </div>
                        </div>
                        <div class="feature-box feature-d2">
                            <div class="feature-title-holder">
                                <span class="feature-icon"><i class="htfy htfy-cogwheel"></i></span>
                                <span class="feature-title">Grafik Kedua</span>
                            </div>
                            <div class="feature-details">

                                <div id="bar1" style="height: 250px;"></div>

                            </div>
                        </div>
                        <div class="feature-box feature-d3">
                            <div class="feature-title-holder">
                                <span class="feature-icon"><i class="htfy htfy-location"></i></span>
                                <span class="feature-title">Grafik Ketiga</span>
                            </div>
                            <div class="feature-details">

                                <div id="pie2" style="height: 250px;"></div>

                            </div>
                        </div>
                        <div class="feature-box feature-d4">
                            <div class="feature-title-holder">
                                <span class="feature-icon"><i class="htfy htfy-download"></i></span>
                                <span class="feature-title">Grafik Keempat</span>
                            </div>
                            <div class="feature-details">

                                <div id="bar2" style="height: 250px;"></div>

                            </div>
                        </div>
                        <div class="feature-box feature-d5">
                            <div class="feature-title-holder">
                                <span class="feature-icon"><i class="htfy htfy-like"></i></span>
                                <span class="feature-title">Grafik Kelima</span>
                            </div>
                            <div class="feature-details">

                                <div id="pie3" style="height: 250px;"></div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.frontend.home.footer')

    @include('layouts.frontend.home.script')

</body>

</html>
