<style>
    .select2-selection__rendered {
        line-height: 31px !important;
    }

    .select2-container .select2-selection--single {
        height: 35px !important;
    }

    .select2-selection__arrow {
        height: 34px !important;
    }
</style>
<div class="modal-header">
    <h5 class="modal-title mt-0">{{ $title }}</h5>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-striped mb-0" style="width: 100%">
                    <thead>
                        <tr>
                            <th colspan="3">Detail Pemohon</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" style="width: 25%;">Nama Lengkap</th>
                            <td style="width: 5%;">:</td>
                            <td>{{ $edit->nama ?? '' }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 25%;">Pekerjaan</th>
                            <td style="width: 5%;">:</td>
                            <td>{{ $edit->pekerjaan ?? '' }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 25%;">Alamat</th>
                            <td style="width: 5%;">:</td>
                            <td>{{ $edit->alamat ?? '' }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 25%;">Tanggal Pengajuan</th>
                            <td style="width: 5%;">:</td>
                            <td>{{ $edit->tanggal_pengajuan ?? '' }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 25%;">Selaku</th>
                            <td style="width: 5%;">:</td>
                            <td>{{ $edit->selaku ?? '' }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 25%;">Bukti Kepemilikan Tanah</th>
                            <td style="width: 5%;">:</td>
                            @if ($edit->bukti_kepemilikan_tanah_file)
                                <td>
                                    <div class="btn-group">
                                        <a target="_blank"
                                            href="{{ asset('storage' . $edit->bukti_kepemilikan_tanah_path) }}"
                                            class="btn btn-success btn-sm"><i class="fa fa-file"></i> Dok</a>
                                    </div>
                                </td>
                            @else
                                <td>
                                    <div class="btn-group">
                                        <a href="javascript:void(0);" class="btn btn-danger btn-sm"><i
                                                class="fa fa-file"></i>
                                            Belum Ada</a>
                                    </div>
                                </td>
                            @endif
                        </tr>
                        <tr>
                            <th scope="row" style="width: 25%;">Status</th>
                            <td style="width: 5%;">:</td>
                            <td>{{ $edit->nama_status ?? '' }}</td>
                        </tr>
                        <tr>
                            <th scope="row" style="width: 25%;">Survey</th>
                            <td style="width: 5%;">:</td>
                            <td>
                                <h5>
                                    <span class="badge badge-secondary">{{ $edit->survey == '1' ? 'Ada' : 'Tidak Ada' }}
                                    </span>
                                </h5>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-sm-12">
            <form id="form-survey" action="{{ route('pengajuan.send_ajukan_survey') }}" method="post"
                enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="{{ encrypt($edit->id) }}"
                    class="form-control">
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="text" class="col-form-label">Mengukur</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" name="mengukur" id="mengukur" class="form-control"
                            placeholder="Masukkan ukuran">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-9">
                        <div id="error-mengukur"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="text" class="col-form-label">Surat Pernyataan <br><span
                                class="text-primary">Format
                                Dok : .pdf, .doc, .docx</span></label>
                    </div>
                    <div class="col-sm-6">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" accept=".pdf, .doc, .docx"
                                name="surat_pernyataan_gsb">
                            <label class="custom-file-label" for="customFile">Pilih Dokumen</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-6">
                        <div class="btn-group">
                            <a href="{{ asset('storage/dokumen_pendukung/surat-pernyataan-gsb.docx') }}"
                                class="btn btn-primary" target="_blank"><i class="fa fa-file"></i> Draft</a>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-9">
                        <div id="error-surat_pernyataan_gsb"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="text" class="col-form-label">Lokasi</label>
                    </div>
                    <div class="col-sm-8">
                        <div style="position: absolute; top: 10px ; right: 25px ;   z-index: 99999999999">
                            <div class="text-right" style="margin-bottom: 5px;">
                                <button type="button" id="btn-lokasi" class="btn btn-danger glow"
                                    style="width: 150px;">
                                    <i class="bx bx-map-pin"></i> Lokasi Anda </button>
                            </div>
                            <div class="text-right">
                                <button type="button" id="btn-reload" class="btn btn-success glow"
                                    style="width: 150px;">
                                    <i class="bx bx-sync"></i> Reload </button>
                            </div>
                        </div>
                        <div id="chart-map" style="height: 500px; width: 100%; border: solid grey 2px;"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="text" class="col-form-label">Latitude</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" name="latitude_lapangan" class="form-control" id="latitude" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-9">
                        <div id="error-latitude"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="text" class="col-form-label">Longitude</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" name="longitude_lapangan" class="form-control" id="longitude"
                            readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-9">
                        <div id="error-logitude"></div>
                    </div>
                </div>
            </form>
            {{-- <form id="form-tidak-survey" action="{{ route('pengajuan.send_ajukan_tidak_survey') }}" method="post"
                enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="text" class="col-form-label">Lokasi</label>
                    </div>
                    <div class="col-sm-8">
                        <div style="position: absolute; top: 10px ; right: 25px ;   z-index: 99999999999">
                            <div class="text-right" style="margin-bottom: 5px;">
                                <button type="button" id="btn-lokasi" class="btn btn-danger glow"
                                    style="width: 150px;">
                                    <i class="bx bx-map-pin"></i> Lokasi Anda </button>
                            </div>
                            <div class="text-right">
                                <button type="button" id="btn-reload" class="btn btn-success glow"
                                    style="width: 150px;">
                                    <i class="bx bx-sync"></i> Reload </button>
                            </div>
                        </div>
                        <div id="chart-map" style="height: 500px; width: 100%; border: solid grey 2px;"></div>
                    </div>
                </div>
            </form> --}}
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="submit" form="form-survey" class="btn btn-primary">Survey Telah Dilakukan</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

<script>
    $('.select2').select2({
        width: "100%"
    });

    $(".custom-file-input").on("change", function() {
        let fileName = $(this).val().split("\\").pop();
        $(this)
            .siblings(".custom-file-label")
            .addClass("selected")
            .html(fileName);
    });

    $('#form-survey').submit(function(e) {
        e.preventDefault();
        let data = new FormData(this);
        let url = $(this).attr('action');
        let post = $.ajax({
            url: url,
            type: 'POST',
            data: data,
            dataType: 'JSON',
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                Swal.fire({
                    title: 'Mohon Tunggu',
                    allowOutsideClick: false,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                    },
                    showConfirmButton: false,
                    showCancelButton: false,
                });
            },
        });
        post.done(function(respon) {
            if (respon.status == true) {
                swal.close();
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: 'Berhasil Menyimpan Data',
                    showConfirmButton: false,
                }, 2000);
                $('#modal_ajukanlapangan').modal('hide');
                location.reload();
            } else {
                swal.close();
                toastr.error('Periksa Inputan Anda', {
                    timeOut: 2000,
                    fadeOut: 2000
                });
            }
        });
        post.fail(function(respon) {
            swal.close();
            toastr.error('Ada inputan yang belum terisi', 'Gagal', {
                timeOut: 2000,
                fadeOut: 2000
            });
        });
    });
</script>

<script>
    var map, geoJson, marker;
    var active_basemap = 'osm';
    var polygonsWithCenters = L.layerGroup();

    map = L.map('chart-map', {
        zoomControl: true
    }).setView([-7.57110295267244, 110.82622065004949], 13);
    map.scrollWheelZoom.disable();

    var basemap = {
        osm: L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map),
        google_roadmap: L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }),
        google_satellite: L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }),
        google_hybrid: L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }),
        google_terrain: L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }),
        esri_world_imagery: L.tileLayer(
            'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                maxZoom: 17
            }),
        esri_world_street_map: L.tileLayer(
            'https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}'),
        esri_world_topo_map: L.tileLayer(
            'https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}'),
        peta_rbi_opensource: L.tileLayer.wms('http://palapa.big.go.id:8080/geoserver/gwc/service/wms', {
            maxZoom: 20,
            layers: "basemap_rbi:basemap",
            format: "image/png",
            attribution: 'Badan Informasi Geospasial'
        })
    }

    L.control.layers(basemap, null, {
        position: 'topleft'
    }).addTo(map);
    map.zoomControl.setPosition('topleft');

    L.Control.Scale.include({
        _originalUpdateScale: L.Control.Scale.prototype._updateScale,
        _updateScale: function(scale, text, ratio) {
            this._originalUpdateScale.call(this, scale, text, ratio);
            this._map.fire('scaleupdate', {
                pixels: scale.style.width,
                distance: text
            });
        }
    });

    var scale = L.control.scale({
        position: 'bottomright',
        imperial: false,
    });

    scale.addTo(map);

    setTimeout(() => {
        map.invalidateSize();
    }, 1000);

    var circles;
    var marker_top;

    function onLocationFound(e) {
        var radius = e.accuracy / 2;
        marker_top = L.marker(e.latlng);
        marker_top.addTo(map);
        circles = L.circle(e.latlng, radius);
        circles.addTo(map);
        //marker_top.bindPopup("You are within " + radius + " ==== " +e.latlng + " meters from this point").openPopup();
        $('#latitude').val(e.latlng.lat);
        $('#longitude').val(e.latlng.lng);
    }

    var theMarker = {};
    map.on('click', function(e) {
        if (marker_top != undefined) {
            kosongkanLokasi();
        }
        console.log(marker_top);
        if (theMarker != undefined) {
            map.removeLayer(theMarker);
            $('#latitude').val(e.latlng.lat);
            $('#longitude').val(e.latlng.lng);
        };
        //Add a marker to show where you clicked.
        theMarker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);
    });

    function onLocationError(e) {
        alert(e.message);
    }

    $('#btn-lokasi').on('click', function(e) {
        if (theMarker != undefined) {
            //kosongkanMarker();
        }
        if (marker_top != undefined) {
            kosongkanLokasi();
        }
        reloadLokasi();
    });

    $('#btn-reload').on('click', function(e) {
        if (marker_top != undefined) {
            kosongkanLokasi();
        }
        $('#latitude').val(null).trigger('change');
        $('#longitude').val(null).trigger('change');
    });

    function kosongkanLokasi() {
        map.removeLayer(marker_top);
        map.removeLayer(circles);
    }

    function reloadLokasi() {
        kosongkanMarker();
        map.on('locationfound', onLocationFound);
        map.on('locationerror', onLocationError);
        map.locate({
            setView: true,
            maxZoom: 18
        });
    }

    function kosongkanMarker() {
        map.removeLayer(theMarker);
    }
</script>
