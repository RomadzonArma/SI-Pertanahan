@extends('layouts.app')

@php
    $plugins = ['swal', 'select2'];
@endphp

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('jalan-lingkungan.store') }}" method="POST" enctype="multipart/form-data" id="form-update" onsubmit="return false;">
                        @csrf
                        <input type="hidden" name="jalan_lingkungan_id" value="{{ @$jalan->id }}">
                        <div class="form-group">
                            <label for="nomor_sertifikat">Nomor Sertifikat</label>
                            <input class="form-control" type="text" name="nomor_sertifikat" id="nomor_sertifikat" value="{{ @$data_update->nomor_sertifikat }}" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="nama_sertifikat">Nama Sertifikat</label>
                            <input class="form-control" type="text" name="nama_sertifikat" id="nama_sertifikat" value="{{ @$data_update->nama_sertifikat }}">
                        </div>
                        <div class="form-group">
                            <label for="penggunaan_saat_ini">Penggunaan Saat Ini</label>
                            <input class="form-control" type="text" name="penggunaan_saat_ini" id="penggunaan_saat_ini" value="{{ @$data_update->penggunaan_saat_ini }}">
                        </div>
                        <div class="form-group">
                            <label for="sertifikat">File sertifikat (pdf maksimal 2Mb)</label>
                            <input class="form-control" type="file" name="sertifikat" id="sertifikat" accept="image/jpeg,image/gif,image/png,application/pdf">
                        </div>

                        <a href="{{ route('jalan-lingkungan') }}" class="btn btn-default">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/page/jalan-lingkungan/update.js?q=' . Str::random(5)) }}"></script>
@endpush
