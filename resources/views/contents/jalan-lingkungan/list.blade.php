@extends('layouts.app')

@php
    $plugins = ['datatable', 'swal', 'select2'];
@endphp

@push('styles')
    @if (rbacCheck('jalan_lingkungan', 3))
    <link rel="stylesheet" type="text/css" href="{{ asset('js/plugin/dropzone/5/dropzone.min.css?q=' . Str::random(5)) }}">
    @endif
@endpush

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
                    <div class="row mb-2">
                        <!-- <div class="col-sm-12"> -->
                            <div class="col-4 form-group">
                                <label for="filter-kec">Kecamatan</label>
                                <select class="form-control" id="filter-kec">
                                    <option value="">Semua Kecamatan</option>
                                    @foreach ($ref_kec as $row)
                                    <option value="{{ $row->id_kecamatan }}">{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-4 form-group">
                                <label for="filter-kel">Kelurahan</label>
                                <select class="form-control" id="filter-kel"></select>
                            </div>

                            @if (rbacCheck('jalan_lingkungan', 3))
                            <div class="col-4 form-group">
                                <div class="text-sm-right">
                                    <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light btn-sync-jalan mt-4"><i class="bx bx-sync mr-1 font-size-16"></i> Sinkron Data Jalan</button>
                                </div>
                            </div>
                            @endif
                        <!-- </div> -->
                    </div>
                    
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table class="table table-striped" id="table-data" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 20%;">Nama Jalan</th>
                                    <th style="width: 15%;">Kecamatan</th>
                                    <th style="width: 20%;">Kelurahan</th>
                                    <th style="width: 15%;">RW</th>
                                    <th style="width: 15%;">Panjang Jalan (meter)</th>
                                    <th style="width: 10%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (rbacCheck('jalan_lingkungan', 3))
    <div id="modal-foto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-fotoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="modal-fotoLabel">Update Foto Jalan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="form-upload-foto" class="dropzone-foto my-3 col-md-12" action="{{ route('jalan-lingkungan.store-foto') }}" method="post" enctype="multipart/form-data" onsubmit="return false">
                        @csrf
                        <div class="form-group">
                            <label for="file-upload-foto" class="col-md-3">Upload Foto</label>
                            <div class="form-group">
                                <div class="col-md-9" id="file-upload-foto"></div>
                            </div>
                        </div>
                    </form>
                    <button class="btn btn-primary" type="submit" id="btn-submit-upload-foto">Simpan</button>

                    <div class="table-responsive mt-4" data-pattern="priority-columns">
                        <table class="table table-striped" id="table-foto" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 50%;">Foto</th>
                                    <th style="width: 40%;">Waktu Upload</th>
                                    <th style="width: 5%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection

@push('scripts')
    <script>
        window.ref_kec = <?= json_encode($ref_kec); ?>;
        window.ref_kel = <?= json_encode($ref_kel); ?>;
    </script>
    <script src="{{ asset('js/page/jalan-lingkungan/list.js?q=' . Str::random(5)) }}"></script>
    @if (rbacCheck('jalan_lingkungan', 3))
    <script src="{{ asset('js/plugin/dropzone/5/dropzone.min.js?q=' . Str::random(5)) }}"></script>
    <script src="{{ asset('js/page/jalan-lingkungan/foto.js?q=' . Str::random(5)) }}"></script>
    <!-- <script src="{{ asset('js/page/data-aset/sync-data-sijali.js?q=' . Str::random(5)) }}"></script> -->
    @endif
@endpush
