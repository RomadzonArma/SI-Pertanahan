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
                        <tr>
                            <th scope="row" style="width: 25%;">Survey</th>
                            <td style="width: 5%;">:</td>
                            <td>
                                <h5>
                                    <span class="badge badge-secondary">{{ $edit->survey == '1' ? 'Ada' : 'Tidak Ada' }}
                                    </span>
                                </h5>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-sm-12">
            <form id="form-tidak-survey" action="{{ route('pengajuan.send_ajukan_tidak_survey') }}" method="post"
                enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="{{ encrypt($edit->id) }}"
                    class="form-control">
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="text" class="col-form-label">Mengukur</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" name="mengukur" id="mengukur" class="form-control"
                            placeholder="Masukkan ukuran">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-9">
                        <div id="error-mengukur"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="text" class="col-form-label">Surat Pernyataan <br><span
                                class="text-primary">Format
                                Dok : .pdf, .doc, .docx</span></label>
                    </div>
                    <div class="col-sm-6">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" accept=".pdf, .doc, .docx"
                                name="surat_pernyataan_gsb">
                            <label class="custom-file-label" for="customFile">Pilih Dokumen</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-6">
                        <div class="btn-group">
                            <a href="{{ asset('storage/dokumen_pendukung/surat-pernyataan-gsb.docx') }}"
                                class="btn btn-primary" target="_blank"><i class="fa fa-file"></i> Draft</a>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-9">
                        <div id="error-surat_pernyataan_gsb"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="submit" form="form-tidak-survey" class="btn btn-primary">Survey Telah Dilakukan</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

<script>
    $('.select2').select2({
        width: "100%"
    });

    $(".custom-file-input").on("change", function() {
        let fileName = $(this).val().split("\\").pop();
        $(this)
            .siblings(".custom-file-label")
            .addClass("selected")
            .html(fileName);
    });

    $('#form-tidak-survey').submit(function(e) {
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
                $('#modal_ajukanlapangan').modal('hide');
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
