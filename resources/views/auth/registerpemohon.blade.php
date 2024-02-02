<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Keterangan Rencana Kota - Tegal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Skote" name="description" />
    <meta content="alief" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="{{ config('app.theme') }}assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <link href="{{ config('app.theme') }}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ config('app.theme') }}assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ config('app.theme') }}assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ config('app.theme') }}assets/libs/toastr/build/toastr.min.css">
</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
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
                            </script> Keterangan Rencana Kota - Tegal
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ config('app.theme') }}assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ config('app.theme') }}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ config('app.theme') }}assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ config('app.theme') }}assets/libs/node-waves/waves.min.js"></script>
    <script src="{{ config('app.theme') }}assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <script src="{{ config('app.theme') }}assets/libs/toastr/build/toastr.min.js"></script>
    <!-- App js -->
    <script src="{{ config('app.theme') }}assets/js/app.js"></script>

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
