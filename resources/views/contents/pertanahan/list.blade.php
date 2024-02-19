@extends('layouts.app')

@php
$plugins = ['datatable', 'swal', 'select2'];
@endphp

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                {{-- @if (rbacCheck('pertanahan', 2))
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="text-sm-right">
                            <button type="button"
                                class="btn btn-success btn-rounded waves-effect waves-light btn-tambah"><i
                                    class="bx bx-plus-circle mr-1"></i> Tambah</button>
                        </div>
                    </div>
                </div>
                @endif --}}
                <div class="table-responsive" data-pattern="priority-columns">
                    <table class="table table-striped" id="table-data" style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="width: 5%;">#</th>
                                <th>Penggunaan Sekarang</th>
                                <th>Penggunaan Sertifikat</th>
                                <th>Nomor Hak Pakai</th>
                                <th>Luas</th>
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

<!-- sample modal content -->
{{-- <div id="modal-pertanahan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-pertanahanLabel"
    aria-hidden="true">
    <form action="{{ route('users.store') }}" method="post" id="form-pertanahan" autocomplete="off">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="modal-pertanahanLabel">Form Pertanahan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">Nama pertanahan</label>
                        <input type="text" name="username" id="username" class="form-control"
                            placeholder="Masukkan Nama pertanahan" required>
                        <div id="error-username"></div>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="Masukkan Nama Lengkap" required>
                        <div id="error-name"></div>
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan</label>
                        <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" placeholder="Masukkan Pekerjaan" required>
                        <div id="error-pekerjaan"></div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email" required>
                        <div id="error-email"></div>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No Telp / HP</label>
                        <input type="number" name="no_telp" id="no_telp" class="form-control" placeholder="Masukkan No Telp / HP" required>
                        <div id="error-no_telp"></div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea type="number" name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat" required></textarea>
                        <div id="error-alamat"></div>
                    </div>
                    <div class="form-group">
                        <label for="password">Kata Sandi</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Masukkan Kata Sandi" required>
                        <div id="error-password"></div>
                    </div>
                    <div class="form-group">
                        <label for="confirmation_password">Konfirmasi Kata Sandi</label>
                        <input type="password" name="confirmation_password" id="confirmation_password"
                            class="form-control" placeholder="Masukkan Konfirmasi Kata Sandi" required>
                        <div id="error-confirmation_password"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </form>
</div> --}}
<!-- /.modal -->

<!-- sample modal content -->
<div id="modal-pertanahan-update" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="modal-pertanahan-updateLabel" aria-hidden="true">
    <form action="{{-- {{ route('users.update') }} --}}" method="post" id="form-pertanahan-update" autocomplete="off">
        @method('PATCH')
        <input type="hidden" name="id" id="update-id">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="modal-pertanahan-updateLabel">Form Pertanahan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="update-no_sertif">Nomor Sertifikat</label>
                        <input type="text" name="no_sertif" id="update-no_sertif" class="form-control"
                            placeholder="Masukkan Nomor Sertifikat" required>
                        <div id="error-update-no_sertif"></div>
                    </div>
                    <div class="form-group">
                        <label for="update-no_sertif">Nama Sertifikat</label>
                        <input type="text" name="no_sertif" id="update-no_sertif" class="form-control"
                            placeholder="Masukkan Nama Sertifikat" required>
                        <div id="error-update-no_sertif"></div>
                    </div>
                    <div class="form-group">
                        <label for="update-pengg_seka">Penggunaan Saat Ini</label>
                        <input type="text" name="pengg_seka" id="update-pengg_seka" class="form-control"
                            placeholder="Masukkan Penggunaan Saat Ini" required>
                        <div id="error-update-pengg_seka"></div>
                    </div>
                    <div class="form-group">
                        <label for="file_sertif">Upload Sertifikat</label>
                        <input type="file" name="file_sertif" id="file_sertif" class="form-control" accept="application/pdf" required>
                        <div id="error-file_sertif"></div>
                    </div>
                    <div class="form-group">
                        <label for="no_sertif">Foto (Multiple)</label>
                        <input type="file" name="foto[]" id="no_sertif" class="form-control" multiple accept="image/*" required>
                        <div id="error-no_sertif"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </form>
</div>
<!-- /.modal -->

@endsection

@push('scripts')
<script src="{{ asset('js/page/pertanahan/list.js?q='.Str::random(5)) }}"></script>
@endpush
