@extends('layouts.app')

@php
    $plugins = ['swal', 'select2'];
@endphp

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <button class="btn font-weight-bold" type="button" data-toggle="collapse"
                        data-target="#collapseDetails" aria-expanded="false" aria-controls="collapseDetails"
                        style="font-size: 16px;">
                        Detail Tanah <i class="fa fa-chevron-down" style="font-size: 14px;"></i>
                    </button>
                    <div id="collapseDetails" class="collapse">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table mb-0 dataTable no-footer" role="grid">
                                        <tbody>
                                            <tr>
                                                <td style="width: 15%; font-weight: bold;">Penggunaan Sekarang</td>
                                                <td style="width: 1%;">:</td>
                                                <td>{{ $tanah->pengg_seka }}</td>
                                            </tr>
                                            <tr>
                                                <td style="width: 15%; font-weight: bold;">Penggunaan Sertifikat</td>
                                                <td style="width: 1%;">:</td>
                                                <td>{{ $tanah->pengg_sertif }}</td>
                                            </tr>
                                            <tr>
                                                <td style="width: 15%; font-weight: bold;">Nomor Hak Pakai</td>
                                                <td>:</td>
                                                <td>{{ $tanah->no_hp }}</td>
                                            </tr>
                                            <tr>
                                                <td style="width: 15%; font-weight: bold;">Luas</td>
                                                <td>:</td>
                                                <td>{{ $tanah->luas }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('pertanahan.store') }}" method="POST" enctype="multipart/form-data"
                        id="form-update" onsubmit="return false;">
                        @csrf
                        <input type="hidden" name="aset_point_id" value="{{ @$tanah->id }}">
                        <div class="form-group">
                            <label for="nomor_sertifikat">Nomor Sertifikat</label>
                            <input class="form-control" type="text" name="nomor_sertifikat" id="nomor_sertifikat"
                                value="{{ @$data_update->nomor_sertifikat }}" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="nama_sertifikat">Nama Sertifikat</label>
                            <input class="form-control" type="text" name="nama_sertifikat" id="nama_sertifikat"
                                value="{{ @$data_update->nama_sertifikat }}" required>
                        </div>
                        <div class="form-group">
                            <label for="penggunaan_saat_ini">Penggunaan Saat Ini</label>
                            <input class="form-control" type="text" name="penggunaan_saat_ini" id="penggunaan_saat_ini"
                                value="{{ @$data_update->penggunaan_saat_ini }}" required>
                        </div>
                        <div class="form-group">
                            <label for="sertifikat">File sertifikat (pdf maksimal 2Mb)</label>
                            <input class="form-control" type="file" name="sertifikat" id="sertifikat"
                                accept="image/jpeg,image/gif,image/png,application/pdf">
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto (multiple, maksimal 2Mb per foto)</label>
                            <input class="form-control" type="file" name="foto[]" id="foto" accept="image/jpeg,image/gif,image/png" multiple>
                        </div>
                        <a href="{{ route('pertanahan') }}" class="btn btn-default">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/page/pertanahan/update.js?q=' . Str::random(5)) }}"></script>
@endpush
