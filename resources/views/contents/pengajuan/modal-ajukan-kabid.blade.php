<style>
    .select2-selection__rendered {
        line-height: 31px !important;
    }

    .select2-container .select2-selection--single {
        height: 35px !important;
    }

    .select2-selection__arrow {
        height: 34px !important;
    }
</style>
<div class="modal-header">
    <h5 class="modal-title mt-0">{{ $title }}</h5>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-striped mb-0" style="width: 100%">
                    <thead>
                        <tr>
                            <th colspan="3">Detail Pemohon</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" style="width: 25%;">Nama Lengkap</th>
                            <td style="width: 5%;">:</td>
                            <td>{{ $edit->nama ?? '' }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 25%;">Pekerjaan</th>
                            <td style="width: 5%;">:</td>
                            <td>{{ $edit->pekerjaan ?? '' }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 25%;">Alamat</th>
                            <td style="width: 5%;">:</td>
                            <td>{{ $edit->alamat ?? '' }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 25%;">Tanggal Pengajuan</th>
                            <td style="width: 5%;">:</td>
                            <td>{{ $edit->tanggal_pengajuan ?? '' }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 25%;">Selaku</th>
                            <td style="width: 5%;">:</td>
                            <td>{{ $edit->selaku ?? '' }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 25%;">Bukti Kepemilikan Tanah</th>
                            <td style="width: 5%;">:</td>
                            @if ($edit->bukti_kepemilikan_tanah_file)
                                <td>
                                    <div class="btn-group">
                                        <a target="_blank"
                                            href="{{ asset('storage' . $edit->bukti_kepemilikan_tanah_path) }}"
                                            class="btn btn-success btn-sm"><i class="fa fa-file"></i> Dok</a>
                                    </div>
                                </td>
                            @else
                                <td>
                                    <div class="btn-group">
                                        <a href="javascript:void(0);" class="btn btn-danger btn-sm"><i
                                                class="fa fa-file"></i>
                                            Belum Ada</a>
                                    </div>
                                </td>
                            @endif
                        </tr>
                        <tr>
                            <th scope="row" style="width: 25%;">Status</th>
                            <td style="width: 5%;">:</td>
                            <td>{{ $edit->nama_status ?? '' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-sm-12">
            <form id="form-ajukan-kabid" action="{{ route('pengajuan.send_ajukan_kabid') }}" method="post"
                enctype="multipart/form-data">
                <div class="form-group row">
                    <input type="hidden" name="id" id="id" value="{{ encrypt($edit->id) }}"
                        class="form-control">
                    <div class="col-sm-4">
                        <label for="text" class="col-form-label">Verifikasi</label>
                    </div>
                    <div class="col-sm-6">
                        <select name="status" id="status" class="form-control select2" required>
                            <option value="" selected>Pilih Salah Satu</option>
                            <option value="1000">Verifikasi ditolak Kepala Bidang</option>
                            <option value="1100">Verifikasi diterima Kepala Bidang</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-9">
                        <div id="error-status"></div>
                    </div>
                </div>
                <div class="fieldalasan" style="display: none">
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="text" class="col-form-label">Alasan</label>
                        </div>
                        <div class="col-sm-6">
                            <textarea name="alasan" id="alasan" class="form-control" rows="3" placeholder="Masukkan Alasan" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-9">
                            <div id="error-alasan"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="submit" form="form-ajukan-kabid" class="btn btn-primary">Verifikasi</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

<script>
    $('.select2').select2({
        width: "100%"
    });

    $(document).ready(function() {
        function toggleRequired(element, isRequired) {
            if (isRequired) {
                element.prop('required', true);
            } else {
                element.removeAttr('required');
            }
        }

        $('#status').change(function() {
            var selectedValue = $(this).val();
            if (selectedValue === '1000') {
                $('.fieldalasan').show();
                toggleRequired($('#alasan'), true);
            } else if (selectedValue === '1100') {
                $('.fieldalasan').hide();
                toggleRequired($('#alasan'), false);
            }
        });
    });

    $('#form-ajukan-kabid').submit(function(e) {
        e.preventDefault();
        let data = new FormData(this);
        let url = $(this).attr('action');
        let post = $.ajax({
            url: url,
            type: 'POST',
            data: data,
            dataType: 'JSON',
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                Swal.fire({
                    title: 'Mohon Tunggu',
                    allowOutsideClick: false,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                    },
                    showConfirmButton: false,
                    showCancelButton: false,
                });
            },
        });
        post.done(function(respon) {
            if (respon.status == true) {
                swal.close();
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: 'Berhasil Menyimpan Data',
                    showConfirmButton: false,
                }, 2000);
                $('#modal_ajukankabid').modal('hide');
                location.reload();
            } else {
                swal.close();
                toastr.error('Periksa Inputan Anda', {
                    timeOut: 2000,
                    fadeOut: 2000
                });
            }
        });
        post.fail(function(respon) {
            swal.close();
            toastr.error('Ada inputan yang belum terisi', 'Gagal', {
                timeOut: 2000,
                fadeOut: 2000
            });
        });
    });
</script>
