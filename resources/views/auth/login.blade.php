<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title>Login | Sistem Infromasi Pertanahan Surakarta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Informasi Pertanahan Surakarta" />
    <meta name="keywords" content="pertanahan, surakarta, pemerintah kota" />
    <meta name="author" content="pemkot surakarta" />
    <meta name="email" content="disperumkpp@gmail.com" />
    <meta name="website" content="" />
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
</head>

<body>

    <!-- header start -->
    <section class="bg-half-100 bg-primary d-table w-100"
        style="background: url('https://shreethemes.in/landrick/landing/assets/images/bg.png') center;">
        <div class="bg-overlay bg-overlay-white"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center mb-5">
                    <img src="{{ asset('img/logo-surakarta.png') }}" height="75" class="mb-3">
                    <div class="title-heading">
                        <h3 class="text-white title-dark mb-1">Selamat Datang di Halaman Login</h3>
                        <h4 class="text-white title-dark">Disperumkimtan Kota Surakarta</h4>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div> <!--end container-->
    </section>
    <!-- header ends -->

    <div class="position-relative">
        <div class="shape overflow-hidden text-color-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>

    <!-- form login start -->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-absolute">
                        <div class="card login-page border-0 shadow" style="z-index: 1">
                            <div class="card-body p-3 p-md-5">
                                <p class="para-desc mx-auto text-center">Silahkan Login terlebih dahulu</p>
                                @if (Session::has('error-msg'))
                                    <div class="alert alert-danger" role="alert">
                                        @php
                                            Session::get('error-msg', 'default');
                                        @endphp
                                    </div>
                                @endif
                                @if (session('message'))
                                    <div class="alert alert-danger">{{ session('message') }}</div>
                                @endif
                                <form class="login-form mt-2" action="{{ route('login') }}" autocomplete="off"
                                    method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Username <span
                                                        class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-user fea icon-sm icons">
                                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                        <circle cx="12" cy="7" r="4"></circle>
                                                    </svg>
                                                    <input type="text"
                                                        class="form-control ps-5 @error('username') is-invalid @enderror"
                                                        id="username" name="username" value="{{ old('username') }}"
                                                        placeholder="Masukkan Username" autofocus>
                                                    @error('username')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Password <span
                                                        class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-key fea icon-sm icons">
                                                        <path
                                                            d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4">
                                                        </path>
                                                    </svg>
                                                    <input type="password"
                                                        class="form-control ps-5 @error('password') is-invalid @enderror"
                                                        id="password" name="password" value="{{ old('password') }}"
                                                        placeholder="Masukkan Password">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <button type="button" class="btn-view-password"
                                                        id="toggle-password" onclick="myFunction('password')">
                                                        <i id="eye" class="mdi mdi-eye"
                                                            style="display: none;"></i>
                                                        <i id="eye-slash" class="mdi mdi-eye-off"
                                                            style="display: block;"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-12">
                                            <div class="d-flex justify-content-between">
                                                <div class="mb-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="" id="flexCheckDefault">
                                                        <label class="form-check-label"
                                                            for="flexCheckDefault">Ingatkan saya</label>
                                                    </div>
                                                </div>
                                                <p class="forgot-pass mb-0"><a href="auth-cover-re-password.html"
                                                        class="text-dark fw-bold">Lupa password ?</a></p>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-12 mb-0">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary" role="button">
                                                    Login
                                                </button>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-12 text-center">
                                            <p class="mb-0 mt-3"><small class="text-dark me-2">Belum memiliki akun
                                                    ?</small> <a href="{{ route('register-pemohon') }}"
                                                    class="text-dark fw-bold">Buat Akun</a></p>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end row-->
        </div><!--end container-->
    </section>
    <!-- form login ends -->

    @include('layouts.frontend.home.footer')

    <!-- Back to top -->
    <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fs-5 bg-primary"><i
            data-feather="arrow-up" class="fea icon-sm icons align-middle"></i></a>
    <!-- Back to top -->

    @include('layouts.frontend.home.script')
    <script>
        function myFunction(passwordId) {
            var x = document.getElementById(passwordId);
            var eye = document.getElementById('eye');
            var eyeSlash = document.getElementById('eye-slash');

            if (x.type === "password") {
                x.type = "text";
                eye.style.display = 'block';
                eyeSlash.style.display = 'none';
            } else {
                x.type = "password";
                eye.style.display = 'none';
                eyeSlash.style.display = 'block';
            }
        }
    </script>
</body>


</html>
