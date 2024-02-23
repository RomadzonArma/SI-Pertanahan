@extends('layouts.frontend.home.home')


@section('contents')
    <!-- Hero Start -->
    <section class="bg-home bg-primary d-flex align-items-center"
        style="background: url('{{ asset('img/hero-background.png') }}') center; height: auto; height: 50vh; background-repeat: no-repeat; opacity: 2.2;"
        id="home">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center mt-0 pt-0">
                    <div class="title-heading">
                        <!-- <span class="badge rounded-pill bg-success">Integration</span> -->
                        <h4 class="heading text-white title-dark m-0 p-0 text-uppercase">{{$list->judul ?? 'DISPERUMKIMTAN KOTA SURAKARTA'}}
                        </h4>
                        <p class="mx-auto text-white">{{$list->title_header ?? 'Proda Online dan Sistem Informasi Utilitas Pertanahan'}}
                        </p>
                    </div>

                    <div class="text-center subcribe-form mt-4 pt-2">
                        <form>
                            <input type="url" id="url" class="border bg-white rounded-lg" style="opacity: 0.85;"
                                required placeholder="Masukan NIK">
                            <button type="submit" class="btn btn-pills btn-primary text-uppercase">Cek
                                Status</button>
                        </form><!--end form-->
                    </div>

                    <!-- <div class="row justify-content-center">
                            <div class="col-lg-8 col-md-10">
                                <div class="home-dashboard">
                                    <img src="assets/images/integration/hero.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div> -->
                </div><!--end col-->
            </div><!--end row-->
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
    <section class="section">
        <div class="container pb-lg-4 mb-lg-4">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12 d-flex my-lg-4 py-2 align-items-stretch">
                    <div
                        class="card text-white bg-info features feature-primary feature-full-bg rounded p-4 position-relative overflow-hidden border-0 bg-soft-danger w-100">
                        <span class="h1 icon-color p-0 m-0">
                            <!-- <i class="uil uil-newspaper"></i> -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-check text-end"
                                width="12" height="12" viewBox="0 0 24 24" stroke-width="2" stroke="#A94438"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                <path d="M9 15l2 2l4 -4" />
                            </svg>
                        </span>
                        <div class="card-body p-0 mt-2 content">
                            <h4 class="p-0 m-0">Pendaftaran Proda</h4>
                            <p class="para mb-0">Daftarkan tanah proda Anda <a href="javascript:void(0)"
                                    class="text-dark fw-bold">disini</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-12 d-flex my-lg-4 py-2 align-items-stretch">
                    <div
                        class="card text-white bg-info features feature-primary feature-full-bg rounded p-4 position-relative overflow-hidden border-0 bg-soft-danger w-100">
                        <span class="h1 icon-color p-0 m-0">
                            <!-- <i class="uil uil-newspaper"></i> -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-estate"
                                width="12" height="12" viewBox="0 0 24 24" stroke-width="2" stroke="#A94438"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 21h18" />
                                <path d="M19 21v-4" />
                                <path d="M19 17a2 2 0 0 0 2 -2v-2a2 2 0 1 0 -4 0v2a2 2 0 0 0 2 2z" />
                                <path d="M14 21v-14a3 3 0 0 0 -3 -3h-4a3 3 0 0 0 -3 3v14" />
                                <path d="M9 17v4" />
                                <path d="M8 13h2" />
                                <path d="M8 9h2" />
                            </svg>
                        </span>
                        <div class="card-body p-0 mt-2 content">
                            <h4 class="p-0 m-0">Aset Daerah</h4>
                            <p class="para mb-0">Memuat data Tanah Hak Pakai</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-12 d-flex my-lg-4 py-2 align-items-stretch">
                    <div
                        class="card text-white bg-info features feature-primary feature-full-bg rounded p-4 position-relative overflow-hidden border-0 bg-soft-danger w-100">
                        <span class="h1 icon-color p-0 m-0 text-end">
                            <!-- <i class="uil uil-newspaper"></i> -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin-2"
                                width="12" height="12" viewBox="0 0 24 24" stroke-width="2" stroke="#A94438"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 18.5l-3 -1.5l-6 3v-13l6 -3l6 3l6 -3v7" />
                                <path d="M9 4v13" />
                                <path d="M15 7v5" />
                                <path
                                    d="M21.121 20.121a3 3 0 1 0 -4.242 0c.418 .419 1.125 1.045 2.121 1.879c1.051 -.89 1.759 -1.516 2.121 -1.879z" />
                                <path d="M19 18v.01" />
                            </svg>
                        </span>
                        <div class="card-body p-0 mt-2 content">
                            <h4 class="p-0 m-0">Visualisasi GIS</h4>
                            <p class="para mb-0">Menampilkan titik lokasi Tanah Proda dan Hak Pakai</p>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div>
    </section><!--end section-->
    <!-- End -->

    <div class="position-relative">
        <div class="shape overflow-hidden text-light">
            <svg viewBox="0 0 2880 250" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M720 125L2160 0H2880V250H0V125H720Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>

    <section class="section bg-light text-danger text-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="section-title mb-4 text-center">
                        <h4 class="title mb-4">Grafik Jumlah Tanah aset setiap kecamatan</h4>
                    </div>
                    <div id="chartdiv"></div>
                </div>

                <div class="col-lg-12 col-md-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="section-title ms-lg-5">
                        <h4 class="title mb-2">Data Statistik Tanah HP Kota Surakarta dan Tanah PRODA yang Lolos</h4>

                        <p class="text-muted p-0 m-0">Aplikasi ini mengelola data utilitas Tanah HP (Hak Pakai) Kota
                            Surakarta
                            dan Pengelola pengajuan tanah PRODA (Proyek Operasi Daerah Agraria) berbasis online yang
                            dilakukan oleh DISPERUMKIMTAN yang bekerja sama dengan Kantor BON Kota Surakarta
                        </p>

                        <div class="row" id="counter">
                            <div class="col-md-6 col-sm-6">
                                <div class="counter-box text-center">
                                    <h1 class="mb-0 mt-3"><span class="counter-value" data-target="985">500</span>
                                    </h1>
                                    <h5 class="counter-head mb-1">Tanah HP</h5>
                                    <!-- <p class="text-muted mb-0">From Doctors</p> -->
                                </div><!--end counter box-->
                            </div><!--end col-->

                            <div class="col-md-6 col-sm-6">
                                <div class="counter-box text-center">
                                    <h1 class="mb-0 mt-3"><span class="counter-value" data-target="89">0</span></h1>
                                    <h5 class="counter-head mb-1">Tanah Proda</h5>
                                    <!-- <p class="text-muted mb-0">High Qualified</p> -->
                                </div><!--end counter box-->
                            </div><!--end col-->

                        </div><!--end row-->

                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>

    <section>
        <div class="container py-4">
            <iframe class="rounded" loading="lazy"
                src="https://ulas.surakarta.go.id/index.php?mod=complain&amp;sub=frameForm&amp;act=view&amp;typ=html&amp;layout=horizontal&amp;oid=78"
                style="border-style: none; padding: 0; margin: 0;" width="100%" height="600"></iframe>
        </div>
    </section>
@endsection

@push('scripts')
    <!-- amchart -->
    <script>
        var root = am5.Root.new("chartdiv");
        root._logo.dispose();

        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
            am5themes_Animated.new(root)
        ]);

        // Create chart
        // https://www.amcharts.com/docs/v5/charts/xy-chart/
        var chart = root.container.children.push(am5xy.XYChart.new(root, {
            panX: true,
            panY: true,
            wheelX: "panX",
            wheelY: "zoomX",
            pinchZoomX: true,
            paddingLeft: 0,
            paddingRight: 1
        }));

        // Add cursor
        // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
        var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
        cursor.lineY.set("visible", false);


        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var xRenderer = am5xy.AxisRendererX.new(root, {
            minGridDistance: 30,
            minorGridEnabled: true
        });

        xRenderer.labels.template.setAll({
            rotation: -90,
            centerY: am5.p50,
            centerX: am5.p100,
            paddingRight: 15
        });

        xRenderer.grid.template.setAll({
            location: 1
        })

        var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
            maxDeviation: 0.3,
            categoryField: "country",
            renderer: xRenderer,
            tooltip: am5.Tooltip.new(root, {})
        }));

        var yRenderer = am5xy.AxisRendererY.new(root, {
            strokeOpacity: 0.1
        })

        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
            maxDeviation: 0.3,
            renderer: yRenderer
        }));

        // Create series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
        var series = chart.series.push(am5xy.ColumnSeries.new(root, {
            name: "Series 1",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "value",
            sequencedInterpolation: true,
            categoryXField: "country",
            tooltip: am5.Tooltip.new(root, {
                labelText: "{valueY}"
            })
        }));

        series.columns.template.setAll({
            cornerRadiusTL: 5,
            cornerRadiusTR: 5,
            strokeOpacity: 0
        });
        series.columns.template.adapters.add("fill", function(fill, target) {
            return chart.get("colors").getIndex(series.columns.indexOf(target));
        });

        series.columns.template.adapters.add("stroke", function(stroke, target) {
            return chart.get("colors").getIndex(series.columns.indexOf(target));
        });


        // Set data
        var data = [{
            country: "Daerah 1",
            value: 2025
        }, {
            country: "Daerah 2",
            value: 1882
        }, {
            country: "Daerah 3",
            value: 1809
        }, {
            country: "Daerah 4",
            value: 1322
        }, {
            country: "Daerah 5",
            value: 1122
        }, {
            country: "Daerah 6",
            value: 1114
        }, {
            country: "Daerah 7",
            value: 984
        }, {
            country: "Daerah 8",
            value: 711
        }, {
            country: "Daerah 9",
            value: 665
        }, {
            country: "Daerah 10",
            value: 443
        }, {
            country: "Daerah 11",
            value: 441
        }];

        xAxis.data.setAll(data);
        series.data.setAll(data);


        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        series.appear(1000);
        chart.appear(1000, 100);

        // chart.children.unshift(am5.Label.new(root, {
        //     text: "Grafik jumlah tanah aset tiap kecamatan",
        //     fontWeight: "500",
        //     textAlign: "center",
        //     x: am5.percent(50),
        //     centerX: am5.percent(50),
        //     paddingTop: 0,
        //     fontSize: 16,
        //     paddingBottom: 0
        // }));
    </script>
@endpush
