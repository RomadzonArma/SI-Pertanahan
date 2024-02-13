@extends('layouts.frontend.home.home')


@section('contents')
    <!-- illustari-overlay -->
    <div class="illus-overlay-1 d-none d-md-block" style="z-index: 0;">
        <img src="{{ asset('front/assets/img/illustrations/custom-2.png') }}" class="img-fluid" alt="">
    </div>
    <!-- illustari-overlay -->

    <!-- content start -->
    <section class="wrapper bg-light pt-10 pb-10">
        <div class="container mt-15">
            <div class="row gx-lg-0 gy-10 mb-15 mb-md-15 align-items-center">
                <div class="col-lg-6">
                    <figure class="rounded mb-6"><img src="{{ asset('front/assets/img/illustrations/custom-1.png') }}"
                            srcset="{{ asset('front/assets/img/illustrations/custom-1.png') }}" alt="">
                    </figure>
                </div>
                <!-- /column -->
                <div class="col-lg-5 offset-lg-1">
                    <div class="card card-body">
                        <h2 class="display-5 mb-3">Apa itu KRK?</h2>
                        <p><strong> Rencana Kota (KRK) </strong>adalah Peta yang di lengkapi dengan keterangan
                            secara rinci mengenai pemanfaatan suatu persil.</p>
                        <p><strong> Pelayanan Penggantian Cetak Peta </strong> adalah jasa pelayanan yang diberikan
                            oleh Dinas Penataan Ruang berupa pembuatan Keterangan Rencana Kota dan Peta Keterangan
                            Rencana Kota.</p>
                    </div>
                </div>
                <!-- /column -->
            </div>
        </div>
        <!-- /.container -->
    </section>
    <!-- content ends -->

    <!-- content start -->
    <section class="wrapper bg-light">
        <div class="container pb-8 pb-lg-10 position-relative" style="z-index: 1;">
            <div class="row gx-lg-8 gx-xl-12 gy-10 mb-15 mb-md-18 align-items-center">
                <div class="col-lg-12">
                    <div class="card card-body rounded-krk bg-krk-primary">
                        <h3 class="display-5 title mb-8">Persyaratan KRK</h3>
                        <div class="row gy-3">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <ol type="1" class="ps-4 desc-200">
                                    <li>Scan Dokumen KTP Asli;</li>
                                    <li>Scan Dokumen Lunas Pembayaran PBB Tahun Terakhir Asli;</li>
                                    <li>Scan Riwayat Penguasaaan Tanah Asli Yang Sah, dapat berupa:</li>
                                    <ol type="a">
                                        <li>Sertifikat;</li>
                                        <li>Letter C/D SKPT;</li>
                                        <li>Arsip Permohonan Hak;</li>
                                        <li>Akte Jual Beli;</li>
                                        <li>Tanah Negara Dapat Berupa Surat Keterangan Penguasaan Tanah dan Surat
                                            Keterangan Tidak Sengketa Dengan Pihak Lain, Yang di Terbitkan Lurah
                                            Setempat dan diketahui Camat;</li>
                                        <li>Bila Pemohon Bukan Pemilik Tanah Dilengkapi Surat Perjanjian/Kontrak;
                                        </li>
                                    </ol>
                                    <li>Bila Pemohon Badan Hukum, dilampirkan Scan Akte Pendirian Badan Hukum Asli
                                        (PT, CV, Firma, Yayasan, dst);</li>
                                    <li>Scan Surat Kuasa Asli (Bagi Pengurusan Yang Dikuasakan);</li>
                                    <li>Scan Surat – surat Lain Yang Dianggap Perlu :</li>
                                    <ol type="a">
                                        <li>Rekom Ketinggian Bangunan Dari Instansi Teknis Terkait (Apabila bangunan
                                            ketinggian lebih dari 4 lantai);</li>
                                        <li>Persetujuan Prinsip Dari Walikota Bagi Yang Dipersyaratkan.</li>
                                    </ol>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!--/.row -->
                </div>
                <!--/column -->
            </div>
        </div>
        <!-- /.container -->
    </section>
    <!-- content ends -->

    <!-- illustari-overlay -->
    <div class="illus-overlay-2 d-none d-md-block" style="z-index: 0;">
        <img src="{{ asset('front/assets/img/illustrations/custom-3.png') }}" class="img-fluid" alt="">
    </div>
    <!-- illustari-overlay -->
@endsection
