@extends('layouts.app')

@php
    $plugins = ['datatable', 'swal', 'select2'];
@endphp

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-success alert-dismissible" style="display: none;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="icon fa fa-check"></i> Perubahan berhasil disimpan
                    </div>
                    <form action="{{ route('custom-front.update') }}" method="post" class="form-update-custom"
                        id="form-update-custom" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="id" value="1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">

                                    <label for="logo_header">Logo Dark </label>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="logo_header" name="logo_header"
                                            onchange="preview('.tampil-logo-header', this.files[0])">
                                    <label class="custom-file-label
                                            image_label" for="upload_image"> Silahkan Pilih file </label>
                                        <div style="font-size: 11px; line-height: 13px; font-style: Italic; margin-top: 5px; margin-bottom: 5px; text-align: left;"
                                            class="text-info">
                                            (Format image .png & Ukuran terbaik-nya 165 x 45 pixel)
                                        </div>
                                    </div>
                                    <div id="image_preview">
                                        <div id="tampil-logo-header" class="tampil-logo-header">

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Logo Light </label>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="logo_footer" name="logo_footer"
                                            value="{{ $list->logo_footer }}"
                                            onchange="preview('.tampil-logo-footer', this.files[0])">
                                    <label class="custom-file-label
                                            image_label" for="upload_image"> Silahkan Pilih file </label>
                                        <div style="font-size: 11px; line-height: 13px; font-style: Italic; margin-top: 5px; margin-bottom: 5px; text-align: left;"
                                            class="text-info">
                                            (Format image .png & Ukuran terbaik-nya 165 x 45 pixel)
                                        </div>
                                    </div>
                                    <div id="image_preview">
                                        <div id="tampil-logo-footer" class="tampil-logo-footer">

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row mb-1">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="update-name">Judul</label>
                                    <input type="text" name="judul" id="update-judul" class="form-control"
                                        placeholder="Masukkan Nama custom">

                                </div>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="update-link">Title</label>
                                    <textarea name="title_header" id="title_header" class="form-control" rows="5"></textarea>

                                </div>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> Footer </label>
                                    <input type="text" name="footer" id="update-footer"autocomplete="off"
                                        placeholder="Footer" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" rows="5" class="form-control"></textarea>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="update-name"> Email </label>
                                    <input type="text" name="email" id="update-email" autocomplete="off"
                                        placeholder="Email " class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="update-name">Telepone</label>
                                    <input type="text" name="telp" id="update-telp" class="form-control"
                                        placeholder="Masukkan Telpone ">

                                </div>
                            </div>

                        </div>
                        <div class="row mb-1">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary waves-effect waves-light ">
                                    <i class="mdi mdi-check-circle-outline mr-1"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    {{-- <script src="{{ asset('js/page/custom-front/list.js?q=' . Str::random(5)) }}"></script> --}}
    <script>
        $(function() {
            showData();
            $('.form-update-custom').on('submit', function(e) {
                if (!e.preventDefault()) {
                    $.ajax({
                            url: $('.form-update-custom').attr('action'),
                            type: $('.form-update-custom').attr('method'),
                            data: new FormData($('.form-update-custom')[0]),
                            async: false,
                            processData: false,
                            contentType: false
                        })
                        .done(response => {
                            showData();
                            $('.alert').fadeIn();

                            setTimeout(() => {
                                $('.alert').fadeOut();
                            }, 3000);
                        })
                        .fail(errors => {
                            alert('Tidak dapat menyimpan data');
                            return;
                        });
                }
            });
        });

        function showData() {
            $.get('{{ route('custom-front.show') }}')
                .done(response => {
                    $('[name=judul]').val(response.judul);
                    $('[name=title_header]').val(response.title_header);
                    $('[name=footer]').val(response.footer);
                    $('[name=alamat]').val(response.alamat);
                    $('[name=email]').val(response.email);
                    $('[name=telp]').val(response.telp);
                    $('.tampil-logo-header').html(
                        `<img src="/logo-header/${response.logo_header}" width="300">`);
                    $('.tampil-logo-footer').html(
                        `<img src="/logo-footer/${response.logo_footer}" width="300">`);
                })
                .fail(errors => {
                    alert('Tidak dapat menampilkan data');
                    return;
                });
        }

        function preview(selector, temporaryFile, width = 200) {
            $(selector).empty();
            $(selector).append(`<img src="${window.URL.createObjectURL(temporaryFile)}" width="${width}">`);
        }
    </script>
@endpush
