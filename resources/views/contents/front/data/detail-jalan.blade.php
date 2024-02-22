@extends('layouts.frontend.home.home')
@php
    $plugins = ['leaflet'];
@endphp

@section('contents')
    <section class="bg-home bg-primary d-flex align-items-center"
        style="background: url('{{ asset('img/hero-background.png') }}') center; height: auto; height: 30vh; background-repeat: no-repeat; opacity: 2.2;"
        id="home">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center mt-0 pt-0">
                    <div class="title-heading">
                        <h2 class="title text-white title-dark m-0 p-0 text-uppercase">
                            {{ $title}}
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
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('data-jalan') }}"></a>Data
                            Jalan</li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Jalan</li>
                    </ul>
                </nav>
            </div>
        </div>
        <!--end container-->
    </section>

    <div class="position-relative">
        <div class="shape overflow-hidden text-color-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>

    <section class="section bg-light">
        <div class="container pb-lg-4 mb-md-5 mb-4">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="section-title mb-4 text-center">
                        <h4 class="title mb-4 text-danger">Detail Jalan </h4>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body bg-soft-secondary text-dark">
                    <div class="row p-0 m-0">
                        <div class="col-12 p-0 m-0">
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="flex-1 py-1">
                                        <h6 class="text-primary mb-0">Tahun :</h6>
                                        <a href="javascript:void(0)" class="text-muted">{{ $list->Tahun }}</a>
                                    </div>
                                    <div class="flex-1 py-1">
                                        <h6 class="text-primary mb-0">Kecamatan :</h6>
                                        <a href="javascript:void(0)" class="text-muted">{{ $list->kec->nama }}</a>
                                    </div>

                                    <div class="flex-1 py-1">
                                        <h6 class="text-primary mb-0">Kelurahan :</h6>
                                        <a href="javascript:void(0)" class="text-muted">{{ $list->kel->nama }}</a>
                                    </div>
                                    <div class="flex-1 py-1">
                                        <h6 class="text-primary mb-0">NO :</h6>
                                        <a href="javascript:void(0)" class="text-muted">{{ $list->No }}</a>
                                    </div>
                                    <div class="flex-1 py-1">
                                        <h6 class="text-primary mb-0">RW :</h6>
                                        <a href="javascript:void(0)" class="text-muted">{{ $list->RW }}</a>
                                    </div>

                                    <div class="flex-1 py-1">
                                        <h6 class="text-primary mb-0"> Jalan :</h6>
                                        <a href="javascript:void(0)" class="text-muted">
                                            <p><span class="d-inline-block" style="width: 200px; margin-top: 2px">Kategori</span> :
                                                {{ $list->Kategori }}</p>
                                            <p><span class="d-inline-block" style="width: 200px; margin-top: 2px">Panjang Jalan</span> :
                                                {{ $list->Pjg_Jln }}</p>
                                            <p><span class="d-inline-block" style="width: 200px; margin-top: 1%">Lebar Jalan</span> :
                                                {{ $list->Lbr_Perk }}</p>
                                            <p><span class="d-inline-block" style="width: 200px; margin-top: 1%">Lebar Bahu Jalan
                                                    Kanan</span> : {{ $list->L_Bh_Kn }}</p>
                                            <p><span class="d-inline-block" style="width: 200px; margin-top: 1%">Lebar Bahu Jalan
                                                    Kiri</span> : {{ $list->L_Bh_Kr }}</p>
                                            <p><span class="d-inline-block" style="width: 200px; margin-top: 1%">Jenis</span> :
                                                {{ $list->Jenis_Perk }}</p>
                                            <p><span class="d-inline-block" style="width: 200px; margin-top: 1%">Panjang Perk</span> :
                                                {{ $list->Panjang_Perkerasan }}</p>
                                        </a>
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="flex-1 py-1">
                                        <h6 class="text-primary mb-0">Drainase Kiri :</h6>
                                        <a href="javascript:void(0)" class="text-muted">
                                            <p><span class="d-inline-block" style="width: 200px">Jenis</span> :
                                                {{ $list->Jen_Drn_Kr }}</p>
                                            <p><span class="d-inline-block" style="width: 200px">Panjang</span> :
                                                {{ $list->Pjg_Drn_Kr }}</p>
                                            <p><span class="d-inline-block" style="width: 200px">Lebar</span> :
                                                {{ $list->Lbr_Drn_Kr }}</p>
                                            <p><span class="d-inline-block" style="width: 200px">Kondisi</span> :
                                                {{ $list->Knd_Drn_Kr }}</p>
                                            <p><span class="d-inline-block" style="width: 200px">Tip Drainase</span> :
                                                {{ $list->Tip_Drn_Kr }}</p>
                                        </a>
                                    </div>

                                    <div class="flex-1 py-1">
                                        <h6 class="text-primary mb-0">Drainase Kanan :</h6>
                                        <a href="javascript:void(0)" class="text-muted">
                                            <p><span class="d-inline-block" style="width: 200px">Jenis</span> :
                                                {{ $list->Jen_Drn_Kn }}</p>
                                            <p><span class="d-inline-block" style="width: 200px">Panjang</span> :
                                                {{ $list->Pjg_Drn_Kn }}</p>
                                            <p><span class="d-inline-block" style="width: 200px">Lebar</span> :
                                                {{ $list->Lbr_Drn_Kn }}</p>
                                            <p><span class="d-inline-block" style="width: 200px">Kondisi</span> :
                                                {{ $list->Knd_Drn_Kn }}</p>
                                            <p><span class="d-inline-block" style="width: 200px">Tip Drainase</span> :
                                                {{ $list->Tip_Drn_Kn }}</p>

                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="row mt-3 p-0 m-0">
                <div id="map"></div>
            </div>
        </div>
        </div>
    </section>
@endsection


@push('scripts')
    <!-- Leaflet JS -->
    <script src="{{ asset('assets\libs\leaflet\leaflet.js') }}"></script>
    <script>
        var map = L.map('map').setView([{{ $list->Koor_Ujg_Y }}, {{ $list->Koor_Ujg_X }}], 20);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: ''
        }).addTo(map);

        // Add marker for Koor_Ujg_X and Koor_Ujg_Y
        L.marker([{{ $list->Koor_Ujg_Y }}, {{ $list->Koor_Ujg_X }}]).addTo(map)
            .bindPopup('Coordinate: {{ $list->Koor_Ujg_Y }}, {{ $list->Koor_Ujg_X }}');

        L.marker([{{ $list->Koor_Pkl_Y }}, {{ $list->Koor_Pkl_X }}]).addTo(map)
            .bindPopup('Coordinate (Pokok): {{ $list->Koor_Pkl_Y }}, {{ $list->Koor_Pkl_X }}');
    </script>
@endpush
