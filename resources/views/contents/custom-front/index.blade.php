@extends('layouts.app')

@php
    $plugins = ['datatable', 'swal', 'select2'];
@endphp

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (rbacCheck('custom_front', 2))
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <div class="text-sm-right">
                                    <button type="button"
                                        class="btn btn-success btn-rounded waves-effect waves-light btn-tambah"><i
                                            class="bx bx-plus-circle mr-1"></i> Tambah</button>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table class="table table-striped" id="table-data" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">#</th>
                                    <th>Judul</th>
                                    <th>Title</th>
                                    <th>Alamat</th>
                                    <th>Telp</th>
                                    <th>Logo Header</th>
                                    <th>Logo Footer</th>
                                    <th>Aksi</th>
                                    <th></th>
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
    <div id="modal-custom" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-customLabel"
        aria-hidden="true">
        <form action="{{ route('custom-front.store') }}" method="post" id="form-custom" autocomplete="off" enctype="multipart/form-data">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="modal-customLabel">Form custom</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Judul</label>
                            <input type="text" name="judul" id="judul" class="form-control"
                                placeholder="Masukkan Judul custom" required>
                            <div id="error-name"></div>
                        </div>
                        <div class="form-group">
                            <label for="link">Title Header</label>
                            <input type="text" name="title_header" id="title_header" class="form-control"
                                placeholder="Masukkan Title">
                            <div id="error-link"></div>
                        </div>
                        <div class="form-group">
                            <label for="update-link">Alamat</label>
                            <textarea name="alamat" id="alamat" rows="7" class="form-control"
                            placeholder="Masukkan Alamat"></textarea>

                            <div id="error-update-link"></div>
                        </div>
                        <div class="form-group">
                            <label for="update-name">Email</label>
                            <input type="text" name="email" id="email" class="form-control"
                                placeholder="Masukkan Eamil " required>
                            <div id="error-update-name"></div>
                        </div>
                        <div class="form-group">
                            <label for="update-name">Telepone</label>
                            <input type="text" name="telp" id="telp" class="form-control"
                                placeholder="Masukkan Telpone " required>
                            <div id="error-update-name"></div>
                        </div>
                        <div class="form-group">
                            <label for="update-name">Foto Header</label>
                            <input type="file" name="foto_header" id="foto_header" class="form-control"
                                placeholder="Masukkan Foto " required>
                            <div id="error-update-name"></div>
                        </div>
                        <div class="form-group">
                            <label for="update-name">Foto Footer</label>
                            <input type="file" name="foto_footer" id="foto_footer" class="form-control"
                                placeholder="Masukkan Telpone " required>
                            <div id="error-update-name"></div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal -->

    <!-- sample modal content -->
    <div id="modal-update-custom" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="modal-update-customLabel" aria-hidden="true">
        <form action="{{ route('custom-front.update') }}" method="post" id="form-update-custom" autocomplete="off">
            <input type="hidden" name="id" id="update-id">
            @method('PATCH')
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="modal-update-customLabel">Form custom</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="update-name">Judul</label>
                            <input type="text" name="name" id="update-name" class="form-control"
                                placeholder="Masukkan Nama custom" required>
                            <div id="error-update-name"></div>
                        </div>
                        <div class="form-group">
                            <label for="update-link">Title</label>
                            <textarea name="title_header" id="update-title" rows="7" class="form-control"
                            placeholder="Masukkan Tautan"></textarea>

                            <div id="error-update-link"></div>
                        </div>
                        <div class="form-group">
                            <label for="update-link">Alamat</label>
                            <textarea name="alamat" id="update-alamat" rows="7" class="form-control"
                            placeholder="Masukkan Alamat"></textarea>

                            <div id="error-update-link"></div>
                        </div>
                        <div class="form-group">
                            <label for="update-name">Email</label>
                            <input type="text" name="email" id="update-email" class="form-control"
                                placeholder="Masukkan Eamil " required>
                            <div id="error-update-name"></div>
                        </div>
                        <div class="form-group">
                            <label for="update-name">Telepone</label>
                            <input type="text" name="telp" id="update-telp" class="form-control"
                                placeholder="Masukkan Telpone " required>
                            <div id="error-update-name"></div>
                        </div>
                        <div class="form-group">
                            <label for="update-name">Foto Header</label>
                            <input type="file" name="foto_header" id="update-fotoh" class="form-control"
                                placeholder="Masukkan Foto " required>
                            <div id="error-update-name"></div>
                        </div>
                        <div class="form-group">
                            <label for="update-name">Foto Footer</label>
                            <input type="file" name="foto_footer" id="update-fotof" class="form-control"
                                placeholder="Masukkan Telpone " required>
                            <div id="error-update-name"></div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal -->
@endsection

@push('scripts')
    <script src="{{ asset('js/page/custom-front/list.js?q=' . Str::random(5)) }}"></script>
@endpush
