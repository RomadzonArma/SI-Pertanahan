@extends('layouts.frontend.home.home')


@section('contents')
    <!-- Hero Start -->
    <section class="bg-home bg-primary d-flex align-items-center"
        style="background: url('{{ asset('img/hero-background.png') }}') center; height: auto; height: 30vh; background-repeat: no-repeat; opacity: 2.2;"
        id="home">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center mt-0 pt-0">
                    <div class="title-heading">
                        <h2 class="title text-white title-dark m-0 p-0 text-uppercase">PETA PRODA</h2>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="position-breadcrumb">
                <nav aria-label="breadcrumb" class="d-inline-block">
                    <ul class="breadcrumb rounded shadow mb-0 px-4 py-2">
                        <li class="breadcrumb-item"><a href="{{ route('/') }}">Beranda</a></li>
                        <!-- <li class="breadcrumb-item"><a href="#">Menu</a></li> -->
                        <li class="breadcrumb-item active" aria-current="page">Peta</li>
                    </ul>
                </nav>
            </div>

        </div><!--end container-->
    </section><!--end section-->

    <div class="position-relative">
        <div class="shape overflow-hidden text-color-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>

    <!-- <div class="position-relative">
                        <div class="shape integration-hero overflow-hidden text-light"></div>
                    </div> -->
    <!-- Hero End -->

    <!-- Start -->
    <section class="section bg-light">
        <div class="container pb-lg-4 mb-md-5 mb-4">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="section-title mb-4 text-center">
                        <h4 class="title mb-4 text-danger">Data Tanah Proda</h4>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body bg-soft-secondary text-dark">
                    <div class="row p-0 m-0">
                        <div class="col-12 col-md-6 p-0 m-0">
                            <div class="row">
                                <div class="flex-1 py-1">
                                    <h6 class="text-primary mb-0">Nama Pemohon :</h6>
                                    <a href="javascript:void(0)" class="text-muted">Pemohon 1</a>
                                </div>

                                <div class="flex-1 py-1">
                                    <h6 class="text-primary mb-0">Kecamatan :</h6>
                                    <a href="javascript:void(0)" class="text-muted">Jebres</a>
                                </div>

                                <div class="flex-1 py-1">
                                    <h6 class="text-primary mb-0">Letak Tanah :</h6>
                                    <a href="javascript:void(0)" class="text-muted">Jebres Tengah Rt 2, Rw 25 jebres,
                                        Surakarta</a>
                                </div>

                                <div class="flex-1 py-1">
                                    <h6 class="text-primary mb-0">Luas m<sup>2</sup> Per Bagian :</h6>
                                    <a href="javascript:void(0)" class="text-muted">100</a>
                                </div>

                                <div class="flex-1 py-1">
                                    <h6 class="text-primary mb-0">Penggunaan Tanah :</h6>
                                    <a href="javascript:void(0)" class="text-muted">Perumahan</a>
                                </div>

                                <div class="flex-1 py-1">
                                    <h6 class="text-primary mb-0">Perolehan :</h6>
                                    <a href="javascript:void(0)" class="text-muted">TN</a>
                                </div>
                                <!-- <a href="tanah-lahan-detail.html" class="btn btn-primary btn-md flex-grow-1">Lihat
                                                    Sertifikat</a> -->

                            </div>
                        </div>

                        <div class="col-12 col-md-6 p-0 m-0">
                            <div
                                class="card border-0 work-container work-primary work-modern position-relative d-block overflow-hidden rounded">
                                <div class="portfolio-box-img position-relative overflow-hidden">
                                    {{-- <img class="item-container img-fluid mx-auto" src="assets/image/Screenshot_11.jpg" --}}
                                    <img class="item-container img-fluid mx-auto" src="{{ asset('img/Screenshot_11.jpg') }}"
                                        alt="1" />
                                    <div class="overlay-work"></div>
                                    <div class="content">
                                        <h5 class="mb-0"><a href="portfolio-detail-one.html"
                                                class="text-white title">Mockup box with paints</a></h5>
                                        <h6 class="text-white-50 tag mt-1 mb-0">Photography</h6>
                                    </div>
                                    <div class="icons text-center">
                                        <a href="{{ asset('img/Screenshot_11.jpg') }}"
                                            class="work-icon bg-white d-inline-flex rounded-pill" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal"><i data-feather="camera"
                                                class="fea icon-sm image-icon"></i></a>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen border-0">
                                    <div class="modal-content">
                                        <div class="modal-header bg-dark border-0">
                                            <!-- <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1> -->
                                            <button type="button" class="btn-close text-light" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body bg-dark">
                                            <img class="item-container img-fluid mx-auto w-100 h-100"
                                                src="{{ asset('img/Screenshot_11.jpg') }}" alt="1" />
                                        </div>
                                        <div class="modal-footer bg-dark border-0">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
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
    </section><!--end section-->
    <!-- End -->
@endsection

@push('scripts')
    <!-- Leaflet JS -->
    <script src="{{ asset('assets\libs\leaflet\leaflet.js') }}"></script>
    <script>
        // Inisialisasi peta Leaflet
        var map = L.map('map').setView([51.505, -0.09], 13);

        // Tambahkan layer peta dari Leaflet
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: ''
        }).addTo(map);

        // Tambahkan marker
        L.marker([51.5, -0.09]).addTo(map)
            .bindPopup('Lokasi')
            .openPopup();
    </script>
@endpush
