<!-- JAVASCRIPT -->
<script src="{{ asset('front/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- SLIDER -->
<script src="{{ asset('front/libs/tiny-slider/min/tiny-slider.js') }}"></script>
<!-- Main Js -->
<script src="{{ asset('front/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('front/assets/js/plugins.init.js') }}"></script>
<!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
<script src="{{ asset('front/assets/js/app.js') }}"></script>
<!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->

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
<script>
    function myFunction(id) {
        var x = document.getElementById(id);
        var eye = document.getElementById('eye')
        var eyeSlash = document.getElementById('eye-slash')

        if (x.type === "password") {
            x.type = "text";
            eye.style.display = 'block';
            eyeSlash.style.display = 'none';
        } else {
            x.type = "password";
            eye.style.display = 'none';
            eyeSlash.style.display = 'block';
        }
    }
</script>

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
