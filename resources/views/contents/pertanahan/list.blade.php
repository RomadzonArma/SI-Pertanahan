@extends('layouts.app')

@php
    $plugins = ['datatable', 'swal', 'select2'];
@endphp

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

                        @if (rbacCheck('pertanahan', 3))
                            <div class="col-4 form-group">
                                <div class="text-sm-right">
                                    <button type="button"
                                        class="btn btn-primary btn-rounded waves-effect waves-light btn-sync-tanah mt-4"><i
                                            class="bx bx-sync mr-1 font-size-16"></i> Sinkron Data Tanah</button>
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
                                    <th>Penggunaan Sekarang</th>
                                    <th>Penggunaan Sertifikat</th>
                                    <th>Nomor Hak Pakai</th>
                                    <th style="width: 15%;">Kecamatan</th>
                                    <th style="width: 20%;">Kelurahan</th>
                                    <th>Luas (m<sup>2</sup>)</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        window.ref_kec = @json($ref_kec);
        window.ref_kel = @json($ref_kel);
    </script>
    <script src="{{ asset('js/page/pertanahan/list.js?q=' . Str::random(5)) }}"></script>
@endpush
