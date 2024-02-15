<header class="wrapper">
    <nav class="navbar navbar-expand-lg fancy navbar-light navbar-bg-light caret-none">
        <div class="container flex-lg-row flex-nowrap align-items-center navbar-collapse-wrapper bg-white">
            <div class="navbar-brand w-100">
                <a href="{{ route('/') }}">
                    <img src="{{ asset('front/assets/img/logo-krk-kota-tegal-dark.png') }}"
                        srcset="{{ asset('front/assets/img/logo-krk-kota-tegal-dark.png') }}" height="45"
                        alt="">
                </a>
            </div>
            <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
                <div class="offcanvas-header d-lg-none">
                    <h3 class="text-white fs-30 mb-0">Sistem Pertanahan</h3>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('/') }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tentang.html">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="persyaratan.html">Persyaratan</a>
                        </li>
                    </ul>
                    <!-- /.navbar-nav -->
                    <div class="offcanvas-footer d-lg-none">
                        <div>
                            <a href="mailto:dpukotategal@gmail.com" class="link-inverse">dpukotategal@gmail.com</a>
                            <br> (0283) 356353 <br>
                            <nav class="nav social social-white mt-4">
                                <a href="#"><i class="uil uil-twitter"></i></a>
                                <a href="#"><i class="uil uil-facebook-f"></i></a>
                                <a href="#"><i class="uil uil-instagram"></i></a>
                            </nav>
                            <!-- /.social -->
                        </div>
                    </div>
                    <!-- /.offcanvas-footer -->
                </div>
                <!-- /.offcanvas-body -->
            </div>
            <!-- /.navbar-collapse -->
            <div class="navbar-other ms-lg-4">
                <ul class="navbar-nav flex-row align-items-center ms-auto">
                    <li class="nav-item d-none d-md-block">
                        <a href="{{ route('login') }}" class="btn btn-sm btn-primary rounded-pill">Login</a>
                    </li>
                    <li class="nav-item d-lg-none">
                        <button class="hamburger offcanvas-nav-btn"><span></span></button>
                    </li>
                </ul>
                <!-- /.navbar-nav -->
            </div>
            <!-- /.navbar-other -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- navbar ends -->
</header>

<section class="wrapper">
    <div class="container py-14 pt-md-15 pb-md-18">
        <div class="row text-center">
            <div class="col-lg-9 col-xxl-7 mx-auto" data-cues="zoomIn" data-group="welcome" data-interval="-200">
                <h2 class="display-1 ls-krk-12 title mb-2">KRK</h2>
                <h3 class="display-5 title mb-3">(Sistem Pertanahan) <br>Kota Surakarta</h3>
                <p class="lead fs-24 lh-sm px-md-5 px-xl-15 px-xxl-10 mb-5 desc-200">Peta yang di lengkapi
                    dengan keterangan secara rinci mengenai pemanfaatan suatu persil</p>
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
        <div class="d-flex justify-content-center" data-cues="slideInDown" data-group="join" data-delay="900">
            <span><a href="{{ route('register-pemohon') }}" class="btn btn-lg btn-primary rounded-pill mx-1">Registrasi
                    KRK</a></span>
            <span><a href="javascript:void(0);" class="btn btn-lg btn-outline-primary rounded-pill mx-1">Alur
                    KRK</a></span>
        </div>
    </div>
    <!-- /.container -->
</section>
