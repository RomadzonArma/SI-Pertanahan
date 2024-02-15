<!doctype html>
<html lang="en">

<head>
    {{-- <meta charset="utf-8" />
    <title>Sistem Pertanahan - Surakarta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Skote" name="description" />
    <meta content="alief" name="author" />
    <link rel="shortcut icon" href="{{ asset('img/logo-kota-surakarta.png') }}">
    <link href="{{ config('app.theme') }}assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <link href="{{ config('app.theme') }}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ config('app.theme') }}assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ config('app.theme') }}assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ config('app.theme') }}assets/libs/toastr/build/toastr.min.css"> --}}

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Peta yang di lengkapi dengan keterangan secara rinci mengenai pemanfaatan suatu persil">
    <meta name="keywords" content="tegal, peta, krk, Kota Surakarta, kabupaten tegal, Sistem Pertanahan">
    <meta name="author" content="phicos">
    <title>Registrasi | Sistem Pertanahan</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('img/logo-kota-surakarta.png') }}">
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">
    <link rel="preload" href="{{ asset('front/assets/css/fonts/thicccboi.css') }}" as="style"
        onload="this.rel='stylesheet'">
    <link rel="stylesheet" href="{{ asset('front/assets/css/custom.css') }}">
    <link href="{{ config('app.theme') }}assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <section class="bg-krk-primary vh-100 w-100 d-flex align-items-center">
        <div class="h-100 mx-auto">
            <div class="container pt-10 pb-10">
                <div class="card login-page shadow mx-auto">
                    <div class="card-body p-4">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 col-md-8">
                                <img class="card-title w-10 mx-auto d-block mb-3"
                                    src="{{ asset('img/logo-kota-surakarta.png') }}">
                                <h3 class="display-5 mb-2 text-center">Registrasi</h3>
                                <p class="lead fs-14 lh-sm mx-auto mb-5 desc-500 text-center">Silakan Melengkapi Data
                                    Terlebih Dahulu</p>
                                <form class="login-form mt-4 p-4" id="form-register"
                                    action="{{ route('store-register') }}" enctype="multipart/form-data"
                                    autocomplete="off" method="post">
                                    @csrf
                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="nama"
                                                        name="nama" placeholder="Masukan nama lengkap">
                                                    <label for="nama"><i class="uil uil-user pe-2"></i> Masukkan
                                                        Nama Lengkap</label>
                                                </div>
                                                <div id="error-nama"></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <div class="form-floating mb-3">
                                                    <input type="email" class="form-control" id="email"
                                                        name="email" placeholder="Masukkan email">
                                                    <label for="email"><i class="uil uil-envelope pe-2"></i>
                                                        Masukkan Email</label>
                                                </div>
                                                <div id="error-email"></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="pekerjaan"
                                                        name="pekerjaan" placeholder="Masukan pekerjaan">
                                                    <label for="pekerjaan"><i class="uil uil-bag-alt pe-2"></i> Masukkan
                                                        Pekerjaan</label>
                                                </div>
                                                <div id="error-pekerjaan"></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="no_telp"
                                                        name="no_telp" placeholder="Masukkan no telp / hp">
                                                    <label for="telepon"><i class="uil uil-phone-alt pe-2"></i>
                                                        Masukkan No Telp / HP</label>
                                                </div>
                                                <div id="error-no_telp"></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="alamat"
                                                        id="alamat" placeholder="Masukkan alamat">
                                                    <label for="address"><i class="uil uil-location-point pe-2"></i>
                                                        Masukkan Alamat</label>
                                                </div>
                                                <div id="error-alamat"></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <div class="form-floating mb-4">
                                                    <input type="text" class="form-control" id="username"
                                                        name="username" placeholder="Masukkan Username">
                                                    <label for="username"><i class="uil uil-user pe-2"></i>
                                                        Username</label>
                                                </div>
                                                <div id="error-username"></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <div class="form-floating password-field mb-4">
                                                    <input type="password" class="form-control" id="password"
                                                        name="password" placeholder="Masukkan Kata Sandi">
                                                    <span class="password-toggle"><i class="uil uil-eye"></i></span>
                                                    <label for="password"><i class="uil uil-lock-alt pe-2"></i>
                                                        Password</label>
                                                </div>
                                                <div id="error-password"></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="row align-items-center">
                                                <div class="col-md-6 mb-3 text-center">
                                                    <div id="captcha" class="captcha"></div>
                                                    <button id="refreshBtn" class="btn btn-primary refresh-btn"
                                                        onclick="refreshCaptcha()"><i
                                                            class="uil uil-refresh"></i></button>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <input class="form-control" type="text" id="inputCaptcha"
                                                        placeholder="Tulis Captcha" name="captcha">
                                                    <div id="error-captcha"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mb-0">
                                            <div class="d-grid">
                                                <button class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>

                                        <div class="col-12 text-center">
                                            <p class="mb-0 mt-3"><small class="text-dark me-2">Sudah mempunyai akun
                                                    ?</small> <a href="{{ route('login') }}"
                                                    class="text-primary fw-bold">Login</a></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="img-login d-none d-md-block p-3"
                                    style="background: linear-gradient(180deg, rgb(42 59 140 / 70%) 50%, rgb(37 52 129 / 45%) 100%), url({{ asset('front/assets/img/bg/taman-pancasila.jpeg') }})">
                                    <h2 class="display-1 ls-krk-12 title mb-2 text-center">KRK</h2>
                                    <h3 class="display-5 title mb-3 text-center">(Sistem Pertanahan) <br>Kota
                                        Surakarta</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-8 col-xl-8">
                    <div class="card overflow-hidden">
                        <div class="bg-soft-primary">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Pendaftaran Akun</h5>
                                        <p>Silakan melengkapi data.</p>
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
                                <form id="form-register" action="{{ route('store-register') }}"
                                    enctype="multipart/form-data" class="form-horizontal" autocomplete="off"
                                    method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            placeholder="Masukan nama lengkap">
                                        <div id="error-nama"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="pekerjaan">Pekerjaan</label>
                                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                                            placeholder="Masukan pekerjaan">
                                        <div id="error-pekerjaan"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Masukkan email">
                                        <div id="error-email"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_telp">No Telp / HP</label>
                                        <input type="number" class="form-control" id="no_telp" name="no_telp"
                                            placeholder="Masukkan no telp / hp">
                                        <div id="error-no_telp"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" class="form-control" id="alamat" rows="3" placeholder="Masukkan alamat"></textarea>
                                        <div id="error-alamat"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            placeholder="Masukkan Username">
                                        <div id="error-username"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Kata Sandi</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="password"
                                                name="password" placeholder="Masukkan Kata Sandi">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-primary" id="show"><i
                                                        class="bx bx-show"></i></button>
                                            </div>
                                        </div>
                                        <div id="error-password"></div>
                                    </div>
                                    <div class="mt-3">
                                        <button form="form-register"
                                            class="btn btn-primary btn-block waves-effect waves-light"
                                            type="submit">Simpan</button>
                                    </div>
                                </form>
                                <div class="mt-3">
                                    <p class="mb-0">Sudah mempunyai akun ?<a href="{{ route('login') }}"
                                            class="hover"> Login</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 mt-md-5 text-center">
                        <p class="mb-0">©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Sistem Pertanahan - Surakarta
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- javascript -->
    <script src="{{ asset('front/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('front/assets/js/theme.js') }}"></script>

    <!-- JAVASCRIPT -->
    <script src="{{ config('app.theme') }}assets/libs/jquery/jquery.min.js"></script>
    {{-- <script src="{{ config('app.theme') }}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ config('app.theme') }}assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ config('app.theme') }}assets/libs/node-waves/waves.min.js"></script> --}}
    <script src="{{ config('app.theme') }}assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <script src="{{ config('app.theme') }}assets/libs/toastr/build/toastr.min.js"></script>
    <!-- App js -->
    {{-- <script src="{{ config('app.theme') }}assets/js/app.js"></script> --}}

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

    <script>
        $(() => {
            $("#form-register").on("submit", function(e) {
                e.preventDefault();

                var data = new FormData(this);

                $.ajax({
                    url: $(this).attr("action"),
                    type: $(this).attr("method"),
                    data: data,
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    beforeSend: () => {
                        Swal.fire({
                            title: "Loading...",
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            showCancelButton: false,
                            onBeforeOpen: () => {
                                Swal.showLoading();
                            },
                        });
                    },
                    success: (res) => {
                        swal.close();
                        Swal.fire({
                            icon: "success",
                            title: "Sukses",
                            text: "Data Berhasil Disimpan",
                        });
                        setTimeout(() => {
                            window.location.href = "{{ route('login') }}";
                        }, 1000);
                    },
                    error: ({
                        status,
                        responseJSON
                    }) => {
                        if (status == 422) {
                            swal.close();
                            generateErrorMessage(responseJSON);
                            return false;
                        }
                        showErrorToastr("oops", responseJSON.msg);
                    },
                });
            });
        });

        const generateErrorMessage = (res, is_update = false) => {
            for (const key in res.errors) {
                $("#" + key).addClass("is-invalid");

                if (Object.hasOwnProperty.call(res.errors, key)) {
                    const element = res.errors[key];

                    let error_container = $("#error-" + key);
                    if (is_update) {
                        error_container = $("#error-update-" + key);
                    }

                    error_container.empty();

                    for (const item of element) {
                        error_container.append(
                            $("<li>", {
                                class: "text-danger",
                                text: item,
                            }).prop("outerHTML")
                        );
                    }
                }
            }
        };
    </script>
</body>

</html>
