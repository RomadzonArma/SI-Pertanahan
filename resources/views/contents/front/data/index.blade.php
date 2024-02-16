@extends('layouts.frontend.home.home')

@php
$plugins = ['swal'];
@endphp

@section('contents')
    <!-- Hero Start -->
    <section class="bg-home bg-primary d-flex align-items-center"
        style="background: url('{{ asset('img/hero-background.png') }}') center; height: auto; height: 30vh; background-repeat: no-repeat; opacity: 2.2;"
        id="home">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center mt-0 pt-0">
                    <div class="title-heading">
                        <h2 class="title text-white title-dark m-0 p-0 text-uppercase">
                            Data
                        </h2>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div class="position-breadcrumb">
                <nav aria-label="breadcrumb" class="d-inline-block">
                    <ul class="breadcrumb rounded shadow mb-0 px-4 py-2">
                        <li class="breadcrumb-item"><a href="{{ route('/') }}">Beranda</a></li>
                        <!-- <li class="breadcrumb-item"><a href="#">Menu</a></li> -->
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ul>
                </nav>
            </div>
        </div>
        <!--end container-->
    </section>
    <!--end section-->

    <div class="position-relative">
        <div class="shape overflow-hidden text-color-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>

    <div class="section">
        <div class="container">
            {{-- <form id="multiInsertForm" action="{{ route('data-isi') }}" method="post">
                @csrf
                <table id="table_data_multi" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th style="border-top-left-radius: 8px">FID</th>
                            <th>Nama Jalan</th>
                            <th>Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id="col0"><input type="text" class="form-control" name="FID[]"
                                    placeholder="Enter FID" required>
                            </td>
                            <td id="col1"><input type="text" class="form-control" name="Nama_Jalan[]"
                                    placeholder="Enter Nama Jalan" required></td>
                            <td id="col2"><input type="text" class="form-control" name="Kategori[]"
                                    placeholder="Enter Kategori" required></td>
                        </tr>
                        <!-- Add more rows dynamically using JavaScript -->
                    </tbody>
                </table>
                <div class="d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn btn-success" onclick="addRows()">Tambah Baru</button>
                        <button type="button" class="btn btn-danger" onclick="deleteRows()">Hapus Baris Terakhir</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    <div>
                        <a class="btn btn-danger ml-auto" id="truncateTableBtn">Kosongkan Tabel</a>
                    </div>
                </div>
            </form> --}}
            <br>
            <table id="table_data" class="table table-striped table-bordered" style="width: 100%">
                <thead>
                    <tr>
                        <th scope="col" style="border-top-left-radius: 8px">FID</th>
                        <th scope="col">Nama Jalan</th>
                        <th scope="col">Kategori</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                    <tr>
                        <th style="border-bottom-left-radius: 8px">FID</th>
                        <th>Nama Jalan</th>
                        <th>Kategori</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table_data').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('data-isi') }}",
                columns: [{
                        data: 'FID',
                        name: 'FID'
                    },
                    {
                        data: 'Nama_Jalan',
                        name: 'Nama_Jalan'
                    },
                    {
                        data: 'Kategori',
                        name: 'Kategori'
                    },
                ]
            });
        });

        function addRows() {
            var table = document.getElementById('table_data_multi');
            var rowCount = table.rows.length;
            var cellCount = table.rows[0].cells.length;
            var row = table.insertRow(rowCount);
            for (var i = 0; i <= cellCount; i++) {
                var cell = 'cell' + i;
                cell = row.insertCell(i);
                var copycel = document.getElementById('col' + i).innerHTML;
                cell.innerHTML = copycel;
            }
        }

        function deleteRows() {
            var table = document.getElementById('table_data_multi');
            var rowCount = table.rows.length;
            if (rowCount > '2') {
                var row = table.deleteRow(rowCount - 1);
                rowCount--;
            } else {
                alert('Setidaknya harus ada satu baris');
            }
        }

        document.getElementById('truncateTableBtn').addEventListener('click', function() {
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Anda yakin ingin mengosongkan tabel?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Kosongkan!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('truncate-table') }}";
                }
            });
        });
    </script>
@endpush
