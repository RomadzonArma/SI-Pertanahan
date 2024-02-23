<!-- Navbar Start -->

<header id="topnav" class="defaultscroll sticky">
    <div class="container">
        <!-- Logo container-->
        <a class="logo p-2" href="{{ route('/') }}">
            <span class="logo-light-mode">

                <img src="{{ asset('img/logo-sip-surakarta-dark.png') }}" class="l-dark" height="60" alt="">
                {{-- <img src="{{ asset('logo-header/' . $list->logo_footer) }}" class="l-dark" height="60" alt=""> --}}
                {{-- <img src="{{ asset('logo-header/' . $list->logo_header) }}" class="l-light" height="60" alt=""> --}}
                <img src="{{ asset('img/logo-sip-surakarta.png') }}" class="l-light" height="60" alt="">
            </span>
            {{-- <img src="{{ asset('logo-header/' . $list->logo_header) }}" height="24" class="logo-dark-mode" alt=""> --}}
        </a>

        <!-- End Logo container-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <!--Login button Start-->
        <ul class="buy-button list-inline mb-0">

            <li class="list-inline-item ps-1 mb-0">
                <a href="{{ route('login') }}">
                    <div class="login-btn-primary"><span class="btn btn-pills btn-primary">Login</span></div>
                    <div class="login-btn-light"><span class="btn btn-pills btn-light text-primary">Login</span>
                    </div>
                </a>
            </li>
        </ul>
        <!--Login button End-->

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu nav-light">
                <li><a href="{{ route('/') }}" class="sub-menu-item">Beranda</a>
                    <!-- <div class="line"></div> -->
                </li>
                <li><a href="{{ route('peta') }}" class="sub-menu-item">Peta</a></li>
                <li><a href="{{ route('data-tanah') }}" class="sub-menu-item">Data Tanah</a></li>
                <li><a href="{{ route('data-jalan') }}" class="sub-menu-item">Data Jalan</a></li>
                <!-- <li><a href="{{ route('register-pemohon') }}" class="sub-menu-item">Registrasi</a></li> -->
                <!-- <li><a href="javascript:void(0)" class="sub-menu-item">Login</a></li> -->
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
</header><!--end header-->
<!-- Navbar End -->
