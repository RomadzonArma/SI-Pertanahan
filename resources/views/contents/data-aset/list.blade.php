@extends('layouts.app')

@php
    $plugins = ['datatable', 'swal', 'select2'];
@endphp

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (rbacCheck('data_aset', 3))
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <div class="text-sm-right">
                                    <button type="button" class="btn btn-success btn-rounded waves-effect waves-light btn-sync-tanah"><i class="bx bx-sync mr-1 font-size-16"></i> Sinkron Data Tanah</button>
                                    <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light btn-sync-jalan"><i class="bx bx-sync mr-1 font-size-16"></i> Sinkron Data Jalan</button>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table class="table table-striped" id="table-data" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th>Sumber Data</th>
                                    <th>Nama Aset</th>
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
    <script src="{{ asset('js/page/data-aset/list.js?q=' . Str::random(5)) }}"></script>
@endpush
