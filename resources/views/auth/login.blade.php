<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Keterangan Rencana Kota - Tegal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Peta yang di lengkapi dengan keterangan secara rinci mengenai pemanfaatan suatu persil">
    <meta name="keywords" content="tegal, peta, krk, kota tegal, kabupaten tegal, krk kota tegal">
    <meta name="author" content="phicos">
    {{-- <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" /> --}}

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('front/assets/img/favicon.png') }}">
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">
    <link rel="preload" href="{{ asset('front/assets/css/fonts/thicccboi.css') }}" as="style"
        onload="this.rel='stylesheet'">
    <link rel="stylesheet" href="{{ asset('front/assets/css/custom.css') }}">
</head>

<body>

    <section class="bg-krk-primary vh-100 w-100 d-flex align-items-center">
        <div class="container">
            <div class="card login-page shadow mx-auto">
                <div class="card-body p-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-6 mt-10">
                            <img class="card-title w-10 mx-auto d-block mb-3"
                                src="{{ asset('front/assets/img/favicon.png') }}" alt="" srcset="">
                            <h3 class="display-5 mb-2 text-center">Login</h3>
                            <p class="lead fs-14 lh-sm mx-auto mb-5 desc-500 text-center">Silahkan Login Terlebih Dahulu
                            </p>
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
                            <form class="login-form mt-4 p-4" action="{{ route('login') }}" autocomplete="off"
                                method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <div class="form-floating mb-4">
                                                <input type="text"
                                                    class="form-control @error('username') is-invalid @enderror"
                                                    id="username" name="username" value="{{ old('username') }}"
                                                    placeholder="Masukkan Username" autofocus>
                                                @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <label for="loginEmail"><i class="uil uil-user pe-2"></i>
                                                    Username</label>
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <div class="form-floating password-field mb-4">
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="password" name="password" value="{{ old('password') }}"
                                                    placeholder="Masukkan Kata Sandi">
                                                <span class="password-toggle"><i class="uil uil-eye"></i></span>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <label for="loginPassword"><i class="uil uil-lock-alt pe-2"></i>
                                                    Password</label>
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-lg-12">
                                        <div class="row align-items-center">
                                            <div class="col-md-6 mb-3 text-center">
                                                <div id="captcha" class="captcha"></div>
                                                <button id="refreshBtn" class="btn btn-primary refresh-btn"
                                                    onclick="refreshCaptcha()"><i class="uil uil-refresh"></i></button>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <input class="form-control" type="text" id="inputCaptcha"
                                                    placeholder="Tulis Captcha">
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-lg-12 mb-0">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Masuk</button>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-12 text-center">
                                        <p class="mb-0 mt-3"><small class="text-dark me-2">Belum mempunyai akun /
                                                Kembali Beranda ?</small> <a href="{{ route('register-pemohon') }}"
                                                class="text-primary fw-bold">Registrasi</a> / <a
                                                href="{{ route('/') }}" class="text-primary fw-bold">Beranda</a></p>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </form>
                        </div><!--end col-->
                        <div class="col-lg-6 col-md-6">
                            <div class="img-login d-none d-md-block p-3"
                                style="background: linear-gradient(180deg, rgb(42 59 140 / 70%) 50%, rgb(37 52 129 / 45%) 100%), url({{ asset('front/assets/img/bg/taman-pancasila.jpeg') }})">
                                <h2 class="display-1 ls-krk-12 title mb-2 text-center">KRK</h2>
                                <h3 class="display-5 title mb-3 text-center">(Keterangan Rencana Kota) <br>Kota Tegal
                                </h3>
                            </div>
                        </div>
                    </div><!--end row-->
                </div>
            </div>
        </div> <!--end container-->
    </section><!--end section-->

    {{-- <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-soft-primary">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Selamat Datang !</h5>
                                        <p>Masuk untuk melanjutkan.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{ asset('assets/images/profile-img.png') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <a href="">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{ asset('assets/images/logo.svg') }}" alt=""
                                                class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
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
                                <form class="form-horizontal" action="{{ route('login') }}" autocomplete="off"
                                    method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text"
                                            class="form-control @error('username') is-invalid @enderror"
                                            id="username" name="username" value="{{ old('username') }}"
                                            placeholder="Masukkan Username" autofocus>
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Kata Sandi</label>
                                        <div class="input-group">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="password" name="password" value="{{ old('password') }}"
                                                placeholder="Masukkan Kata Sandi">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-primary" id="show"><i
                                                        class="bx bx-show"></i></button>
                                            </div>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <button class="btn btn-primary btn-block waves-effect waves-light"
                                            type="submit">Masuk</button>
                                    </div>
                                    <div class="mt-3">
                                        <p class="mb-0">Belum mempunyai akun ?<a
                                                href="{{ route('register-pemohon') }}" class="hover"> Daftar</a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 mt-md-5 text-center">
                        <p class="mb-0">©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Keterangan Rencana Kota - Tegal
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- JAVASCRIPT -->
    <script src="{{ config('app.theme') }}assets/libs/jquery/jquery.min.js"></script>
    {{-- <script src="{{ config('app.theme') }}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ config('app.theme') }}assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ config('app.theme') }}assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ config('app.theme') }}assets/libs/node-waves/waves.min.js"></script> --}}

    <!-- App js -->
    {{-- <script src="{{ config('app.theme') }}assets/js/app.js"></script>

    <script src="{{ asset('front/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('front/assets/js/theme.js') }}"></script> --}}

    <script>
        let show = false;
        $('#show').on('click', function() {
            if (show == false) {
                $('#password').attr('type', 'text');
                show = true;
            } else {
                $('#password').attr('type', 'password');
                show = false;
            }
        })
    </script>


    <!-- captcha -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            refreshCaptcha();
        });

        function generateCaptcha() {
            let characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            let captcha = '';
            for (let i = 0; i < 6; i++) {
                let index = Math.floor(Math.random() * characters.length);
                captcha += characters.charAt(index);
            }
            return captcha;
        }

        function refreshCaptcha() {
            let captchaElement = document.getElementById('captcha');
            let captcha = generateCaptcha();
            captchaElement.textContent = captcha;
        }

        function validateCaptcha() {
            let userInput = document.getElementById('inputCaptcha').value;
            let captchaElement = document.getElementById('captcha');
            let captcha = captchaElement.textContent;

            if (userInput === captcha) {
                alert('Captcha is valid!');
                // Additional action on successful validation
                refreshCaptcha();
            } else {
                alert('Captcha is invalid. Please try again.');
                // Additional action on validation failure
            }
        }
    </script>
</body>

</html>
