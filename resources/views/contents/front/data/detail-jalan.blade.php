@extends('layouts.frontend.home.home')


@section('contents')
    <section class="bg-home bg-primary d-flex align-items-center"
        style="background: url('{{ asset('img/hero-background.png') }}') center; height: auto; height: 30vh; background-repeat: no-repeat; opacity: 2.2;"
        id="home">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center mt-0 pt-0">
                    <div class="title-heading">
                        <h2 class="title text-white title-dark m-0 p-0 text-uppercase">
                            Detail Jalan
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
                                        <h6 class="text-primary mb-0">FID :</h6>
                                        <a href="javascript:void(0)" class="text-muted">{{ $list->FID }}</a>
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
                                        <h6 class="text-primary mb-0">Nama Jalan :</h6>
                                        <a href="javascript:void(0)" class="text-muted">{{ $list->Nama_Jalan }}</a>
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="flex-1 py-1">
                                        <h6 class="text-primary mb-0">Kategori :</h6>
                                        <a href="javascript:void(0)" class="text-muted">{{ $list->Kategori }}</a>
                                    </div>
                                    <div class="flex-1 py-1">
                                        <h6 class="text-primary mb-0">Panjang jalan :</h6>
                                        <a href="javascript:void(0)" class="text-muted">{{ $list->Pjg_Jln }} m</a>
                                    </div>

                                    <div class="flex-1 py-1">
                                        <h6 class="text-primary mb-0">Lebar jalan :</h6>
                                        <a href="javascript:void(0)" class="text-muted">{{ $list->Lbr_Perk }} m</a>
                                    </div>

                                    <div class="flex-1 py-1">
                                        <h6 class="text-primary mb-0">Jenis :</h6>
                                        <a href="javascript:void(0)" class="text-muted">{{ $list->Jenis_Perk }}</a>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
