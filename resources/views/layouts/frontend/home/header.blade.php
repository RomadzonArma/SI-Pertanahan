<div id="header-holder" class="main-header">
    <div class="bg-animation">
        <div class="graphic-show">
            <img class="fix-size" src="{{asset('pemakaman')}}/assets/images/graphic1.png" alt="">
            <img class="img img1" src="{{asset('pemakaman')}}/assets/images/graphic1.png" alt="">
            <img class="img img2" src="{{asset('pemakaman')}}/assets/images/graphic2.png" alt="">
            <img class="img img3" src="{{asset('pemakaman')}}/assets/images/graphic3.png" alt="">
        </div>
    </div>
    <nav id="nav" class="navbar navbar-default navbar-full">
        <div class="container-fluid">
            <div class="container container-nav">
                <div class="row">
                    <div class="col-md-12">
                        <div class="navbar-header">
                            <button aria-expanded="false" type="button" class="navbar-toggle collapsed"
                                data-toggle="collapse" data-target="#bs">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="logo-holder" href="index.html">
                                <!-- <div class="logo" style="width:100px;height:200px"></div> -->
                                <img src="{{asset('pemakaman')}}/assets/images/custom/logo-txt-light-sm.png"
                                    style="width:auto;height:50px">
                            </a>
                        </div>
                        <div style="height: 1px;" role="main" aria-expanded="false"
                            class="navbar-collapse collapse" id="bs">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="peta.html">Peta</a></li>
                                <!-- <li><a class="login-button" href="signin.html">Login</a></li> -->
                                <li class="support-button-holder support-dropdown">
                                    <a class="support-button py-3 px-4" href="#"><i class="fa fa-cog"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('login')}}"><i class="fas fa-sign-in-alt"></i>Login</a></li>
                                        <!-- <li><a href="#"><i class="fas fa-comments"></i>Start a Live Chat</a></li>
                                  <li><a href="#"><i class="fas fa-ticket-alt"></i>Open a ticket</a></li>
                                  <li><a href="#"><i class="fas fa-book"></i>Knowledge base</a></li> -->
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div id="top-content" class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div id="main-slider">
                        <div class="slide">
                            <div class="spacer"></div>
                            <div class="big-title">Portal Basis Data <span>Pemakaman</span><br>Kota Surakarta.</div>
                            <p>
                                Dinas Perumahan dan Kawasan Permukiman
                            </p>
                            <!-- <div class="btn-holder">
                            <a href="signup.html" class="ybtn ybtn-header-color">Register</a>
                            <a href="peta.html" class="ybtn ybtn-white ybtn-shadow">Lihat Peta</a>
                        </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img class="header-graphic" src="{{asset('pemakaman')}}/assets/images/graphic1.png" alt="" />
                </div>
            </div>
        </div>
    </div>
</div>
