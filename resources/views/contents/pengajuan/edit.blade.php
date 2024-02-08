@extends('layouts.app')

@php
    $plugins = ['swal', 'select2'];
@endphp

@section('contents')
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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Data Pengajuan</h4>
                    <form id="edit-form" action="{{ route('pengajuan.update') }}" enctype="multipart/form-data" method="POST"
                        autocomplete="off">
                        @csrf
                        <div class="form-group row mt-3">
                            <label for="example-text-input" class="col-md-2 col-form-label">Nama Lengkap</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" placeholder="Masukkan nama lengkap"
                                    id="nama" name="nama" value="{{ $edit->nama }}">
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-6">
                                <div id="error-nama"></div>
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="example-text-input" class="col-md-2 col-form-label">Alamat</label>
                            <div class="col-md-10">
                                <textarea name="alamat" id="alamat" rows="3" class="form-control" placeholder="Masukkan alamat">{{ $edit->alamat ?? '' }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-6">
                                <div id="error-alamat"></div>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="example-text-input" class="col-md-2 col-form-label">Pekerjaan</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" placeholder="Masukkan pekerjaan"
                                    id="pekerjaan"name="pekerjaan" value="{{ $edit->pekerjaan ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-6">
                                <div id="error-pekerjaan"></div>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="example-text-input" class="col-md-2 col-form-label">Tanggal Pengajuan</label>
                            <div class="col-md-6">
                                <input class="form-control" type="date" id="tanggal_pengajuan"name="tanggal_pengajuan"
                                    value="{{ $edit->tanggal_pengajuan }}">
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-6">
                                <div id="error-tanggal_pengajuan"></div>
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="example-text-input" class="col-md-2 col-form-label">Lokasi</label>
                            <div class="col-md-10">
                                <textarea name="lokasi" id="lokasi" rows="3" class="form-control" placeholder="Masukkan lokasi">{{ $edit->lokasi }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-6">
                                <div id="error-lokasi"></div>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="example-text-input" class="col-md-2 col-form-label">Selaku</label>
                            <div class="col-md-6">
                                <select name="selaku" id="selaku" class="form-control select2">
                                    <option value="" selected>Pilih Salah Satu</option>
                                    <option value="pemilik"
                                        {{ $edit->selaku == 'pemilik' ? 'selected' : '' }}>Pemilik tanah / bangunan
                                    </option>
                                    <option value="pengelola" {{ $edit->selaku == 'pengelola' ? 'selected' : '' }}>Pengelola tanah / bangunan
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-6">
                                <div id="error-selaku"></div>
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label class="col-md-2 col-form-label">Upload Dokumen <br><span class="text-primary">Bukti
                                    Kepemilikan
                                    Tanah</span><br><span class="text-primary"><b>.pdf, .png, .jpeg</b></span></label>
                            <div class="col-md-6 mt-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile"
                                        accept=".pdf, .jpg, .jpeg, .png" name="bukti_kepemilikan_tanah">
                                    <label class="custom-file-label" for="customFile">Pilih Dokumen</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-6">
                                <div id="error-bukti_kepemilikan_tanah"></div>
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="example-text-input" class="col-md-2 col-form-label">Kondisi Lapangan</label>
                            <div class="col-md-10 mt-1">
                                <div class="custom-control custom-radio custom-control-inline mb-3">
                                    <input type="radio" class="custom-control-input" id="customRadio1"
                                        name="kondisi_lapangan"
                                        {{ $edit->kondisi_lapangan == 'Ada Bangunan' ? 'checked=""' : '' }}>
                                    <label class="custom-control-label" for="customRadio1">Ada Bangunan</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline mb-3">
                                    <input type="radio" class="custom-control-input" id="customRadio2"
                                        name="kondisi_lapangan"
                                        {{ $edit->kondisi_lapangan == 'Belum Ada Bangunan' ? 'checked=""' : '' }}>
                                    <label class="custom-control-label" for="customRadio2">Belum Ada Bangunan</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-6">
                                <div id="error-kondisi_lapangan"></div>
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <div class="button-items">
                                    <button type="button" class="btn btn-secondary waves-effect waves-light"
                                        onclick="javascript:window.history.back();">Kembali</button>
                                    <button form="edit-form" type="submit"
                                        class="btn btn-primary waves-effect waves-light">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/page/pengajuan/edit.js?q=' . Str::random(5)) }}"></script>
@endpush
