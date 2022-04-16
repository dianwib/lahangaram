<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/gis/css/leaflet.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/gis/css/qgis2web.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/gis/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/gis/css/leaflet-control-geocoder.Geocoder.css">
    <style>
        html,
        body,
        #map {
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;

        }
    </style>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>dblahangaram</title>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>

<body>
    <div class="container login-container">
        <div class="row">
            <div class="col-md-12 login-form-1" style="background-color: white">
                <div id="map" style="height:300px">
                </div>
            </div>
            <div class="col-md-12 login-form-2 pt-2">
                <table class="table table-bordered table-striped table-responsive" id="myTable">
                    <thead>
                        <tr>
                            <th width="30px">No</th>
                            <th>Id Map</th>
                            <th>Desa</th>
                            <th>Kecamatan</th>
                            <th>Propinsi</th>
                            <th>Nama Pemilik</th>
                            <th>Alamat Pemilik</th>
                            <th>Kontak Pemilik</th>
                            <th>Lokasi Lahan</th>
                            <th>Luas Lahan</th>
                            <th>Hasil Produksi</th>
                            <th>Tenaga Kerja</th>
                            <th>Kepemilikan</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                    </tbody>
                </table>
                <div class=" row d-flex justify-content-center align-content-center" style="margin-top: 50px;"> 
                    <a href="<?= base_url('welcome') ?>" class="btn btn-primary col-3">Kembali</a>
                </div>
            </div>
        </div>


    </div>
    <script src="<?php echo base_url(); ?>assets/gis/js/qgis2web_expressions.js"></script>
    <script src="<?php echo base_url(); ?>assets/gis/js/leaflet.js"></script>
    <script src="<?php echo base_url(); ?>assets/gis/js/leaflet.rotatedMarker.js"></script>
    <script src="<?php echo base_url(); ?>assets/gis/js/leaflet.pattern.js"></script>
    <script src="<?php echo base_url(); ?>assets/gis/js/leaflet-hash.js"></script>
    <script src="<?php echo base_url(); ?>assets/gis/js/Autolinker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/gis/js/rbush.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/gis/js/labelgun.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/gis/js/labels.js"></script>
    <script src="<?php echo base_url(); ?>assets/gis/js/leaflet-control-geocoder.Geocoder.js"></script>
    <script src="<?php echo base_url(); ?>assets/gis/data/sumenep_kelurahan_0.js"></script>
    <script src="<?php echo base_url(); ?>assets/gis/data/sampang_kelurahan_1.js"></script>
    <script src="<?php echo base_url(); ?>assets/gis/data/pamakasan_kelurahan_2.js"></script>
    <script src="<?php echo base_url(); ?>assets/gis/data/bangkalan_kelurahan_3.js"></script>
    <script>
        async function getDataSatland(desa, kec, kab) {
            // console.log(desa, kec, kab)

            try {
                const response = await fetch(`<?= site_url('saltland/getDataFromMap'); ?>`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        desa: desa,
                        kec: kec,
                        kab: kab
                    })
                });
                const resp = await response.json();
                if (resp.status != 200) {
                    throw resp.message;
                }

                $("#myTable > tbody").html("");
                if (resp.data != []) {
                    var no = 1
                    resp.data.forEach(function(obj) {
                        $('#myTable > tbody').append(`<tr>
                        <td>${no}</td>
                        <td>${obj.idmap ?? '-'}</td>
                        <td>${obj.desa}</td>
                        <td>${obj.kec}</td>
                        <td>${obj.kab}</td>
                        <td>${obj.pemilik_so ?? '-'}</td>
                        <td>${obj.alamat_pemilik ?? '-'}</td>
                        <td>${obj.contact ?? '-'}</td>
                        <td>${obj.lokasi ?? '-'}</td>
                        <td>${obj.luas ?? '-'}</td>
                        <td>${obj.hasil ?? '-'}</td>
                        <td>${obj.tenaga ?? '-'}</td>
                        <td>${obj.pemilik_sa ?? '-'}</td>
                        <td>${obj.lat ?? '-'}</td>
                        <td>${obj.lng ?? '-'}</td>
                        </tr>`);
                        // console.log(obj.desa);
                        no++;
                    });
                }
            } catch (error) {
                // alert(error);
                $("#myTable > tbody").html("");
            }
        }

        var highlightLayer;

        function highlightFeature(e) {
            highlightLayer = e.target;

            if (e.target.feature.geometry.type === 'LineString') {
                highlightLayer.setStyle({
                    color: '#ffff00',
                });
            } else {
                highlightLayer.setStyle({
                    fillColor: '#ffff00',
                    fillOpacity: 1
                });
            }
            highlightLayer.openPopup();
            var a = highlightLayer._popup._content;
            // console.log(a)
            var desa = a.split('DESA</th><td>').pop().split('</td>')[0];
            var kec = a.split('KECAMATAN</th><td>').pop().split('</td>')[0];
            var kab = a.split('KABUPATEN</th><td>').pop().split('</td>')[0];

            getDataSatland(desa, kec, kab);
        }
        var map = L.map('map', {
            zoomControl: true,
            maxZoom: 28,
            minZoom: 1
        }).fitBounds([
            [-7.803921681492462, 112.84473635528204],
            [-6.639098219624896, 114.5734127929086]
        ]);
        var hash = new L.Hash(map);
        map.attributionControl.setPrefix('<a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a> &middot; <a href="https://leafletjs.com" title="A JS library for interactive maps">Leaflet</a> &middot; <a href="https://qgis.org">QGIS</a>');
        var autolinker = new Autolinker({
            truncate: {
                length: 30,
                location: 'smart'
            }
        });
        var bounds_group = new L.featureGroup([]);

        function setBounds() {}

        function pop_sumenep_kelurahan_0(feature, layer) {
            layer.on({
                mouseout: function(e) {
                    for (i in e.target._eventParents) {
                        e.target._eventParents[i].resetStyle(e.target);
                    }
                    if (typeof layer.closePopup == 'function') {
                        layer.closePopup();
                    } else {
                        layer.eachLayer(function(feature) {
                            feature.closePopup()
                        });
                    }
                },
                mouseover: highlightFeature,
            });
            var popupContent = '<table><tr><th scope="row">DESA</th><td>' + (feature.properties['DESA'] !== null ? autolinker.link(feature.properties['DESA'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">KODE</th><td>' + (feature.properties['KODE'] !== null ? autolinker.link(feature.properties['KODE'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">KECAMATAN</th><td>' + (feature.properties['KECAMATAN'] !== null ? autolinker.link(feature.properties['KECAMATAN'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">KABUPATEN</th><td>' + (feature.properties['KABUPATEN'] !== null ? autolinker.link(feature.properties['KABUPATEN'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">PROPINSI</th><td>' + (feature.properties['PROPINSI'] !== null ? autolinker.link(feature.properties['PROPINSI'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">IDT_94_95</th><td>' + (feature.properties['IDT_94_95'] !== null ? autolinker.link(feature.properties['IDT_94_95'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">IDT_95_96</th><td>' + (feature.properties['IDT_95_96'] !== null ? autolinker.link(feature.properties['IDT_95_96'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">LUAS_WILAY</th><td>' + (feature.properties['LUAS_WILAY'] !== null ? autolinker.link(feature.properties['LUAS_WILAY'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">Garam</th><td>' + (feature.properties['Garam'] !== null ? autolinker.link(feature.properties['Garam'].toLocaleString()) : '') + '</td></tr></table>';
            layer.bindPopup(popupContent, {
                maxHeight: 400
            });
        }

        function style_sumenep_kelurahan_0_0(feature) {
            switch (String(feature.properties['Garam'])) {
                case 'ada':
                    return {
                        pane: 'pane_sumenep_kelurahan_0',
                            opacity: 1,
                            color: 'rgba(35,35,35,1.0)',
                            dashArray: '',
                            lineCap: 'butt',
                            lineJoin: 'miter',
                            weight: 1.0,
                            fill: true,
                            fillOpacity: 1,
                            fillColor: 'rgba(0,250,225,1.0)',
                            interactive: true,
                    }
                    break;
                default:
                    return {
                        pane: 'pane_sumenep_kelurahan_0',
                            opacity: 1,
                            color: 'rgba(35,35,35,1.0)',
                            dashArray: '',
                            lineCap: 'butt',
                            lineJoin: 'miter',
                            weight: 1.0,
                            fill: true,
                            fillOpacity: 1,
                            fillColor: 'rgba(131,61,211,1.0)',
                            interactive: true,
                    }
                    break;
            }
        }
        map.createPane('pane_sumenep_kelurahan_0');
        map.getPane('pane_sumenep_kelurahan_0').style.zIndex = 400;
        map.getPane('pane_sumenep_kelurahan_0').style['mix-blend-mode'] = 'normal';
        var layer_sumenep_kelurahan_0 = new L.geoJson(json_sumenep_kelurahan_0, {
            attribution: '',
            interactive: true,
            dataVar: 'json_sumenep_kelurahan_0',
            layerName: 'layer_sumenep_kelurahan_0',
            pane: 'pane_sumenep_kelurahan_0',
            onEachFeature: pop_sumenep_kelurahan_0,
            style: style_sumenep_kelurahan_0_0,
        });
        bounds_group.addLayer(layer_sumenep_kelurahan_0);
        map.addLayer(layer_sumenep_kelurahan_0);

        function pop_sampang_kelurahan_1(feature, layer) {
            layer.on({
                mouseout: function(e) {
                    for (i in e.target._eventParents) {
                        e.target._eventParents[i].resetStyle(e.target);
                    }
                    if (typeof layer.closePopup == 'function') {
                        layer.closePopup();
                    } else {
                        layer.eachLayer(function(feature) {
                            feature.closePopup()
                        });
                    }
                },
                mouseover: highlightFeature,
            });
            var popupContent = '<table><tr><th scope="row">DESA</th><td>' + (feature.properties['DESA'] !== null ? autolinker.link(feature.properties['DESA'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">KODE</th><td>' + (feature.properties['KODE'] !== null ? autolinker.link(feature.properties['KODE'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">KECAMATAN</th><td>' + (feature.properties['KECAMATAN'] !== null ? autolinker.link(feature.properties['KECAMATAN'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">KABUPATEN</th><td>' + (feature.properties['KABUPATEN'] !== null ? autolinker.link(feature.properties['KABUPATEN'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">PROPINSI</th><td>' + (feature.properties['PROPINSI'] !== null ? autolinker.link(feature.properties['PROPINSI'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">SUMBER_AIR</th><td>' + (feature.properties['SUMBER_AIR'] !== null ? autolinker.link(feature.properties['SUMBER_AIR'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">IDT_94_95</th><td>' + (feature.properties['IDT_94_95'] !== null ? autolinker.link(feature.properties['IDT_94_95'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">IDT_95_96</th><td>' + (feature.properties['IDT_95_96'] !== null ? autolinker.link(feature.properties['IDT_95_96'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">Garam</th><td>' + (feature.properties['Garam'] !== null ? autolinker.link(feature.properties['Garam'].toLocaleString()) : '') + '</td></tr></table>';
            layer.bindPopup(popupContent, {
                maxHeight: 400
            });
        }

        function style_sampang_kelurahan_1_0(feature) {
            switch (String(feature.properties['Garam'])) {
                case 'ada':
                    return {
                        pane: 'pane_sampang_kelurahan_1',
                            opacity: 1,
                            color: 'rgba(35,35,35,1.0)',
                            dashArray: '',
                            lineCap: 'butt',
                            lineJoin: 'miter',
                            weight: 1.0,
                            fill: true,
                            fillOpacity: 1,
                            fillColor: 'rgba(1,255,234,1.0)',
                            interactive: true,
                    }
                    break;
                default:
                    return {
                        pane: 'pane_sampang_kelurahan_1',
                            opacity: 1,
                            color: 'rgba(35,35,35,1.0)',
                            dashArray: '',
                            lineCap: 'butt',
                            lineJoin: 'miter',
                            weight: 1.0,
                            fill: true,
                            fillOpacity: 1,
                            fillColor: 'rgba(110,138,230,1.0)',
                            interactive: true,
                    }
                    break;
            }
        }
        map.createPane('pane_sampang_kelurahan_1');
        map.getPane('pane_sampang_kelurahan_1').style.zIndex = 401;
        map.getPane('pane_sampang_kelurahan_1').style['mix-blend-mode'] = 'normal';
        var layer_sampang_kelurahan_1 = new L.geoJson(json_sampang_kelurahan_1, {
            attribution: '',
            interactive: true,
            dataVar: 'json_sampang_kelurahan_1',
            layerName: 'layer_sampang_kelurahan_1',
            pane: 'pane_sampang_kelurahan_1',
            onEachFeature: pop_sampang_kelurahan_1,
            style: style_sampang_kelurahan_1_0,
        });
        bounds_group.addLayer(layer_sampang_kelurahan_1);
        map.addLayer(layer_sampang_kelurahan_1);

        function pop_pamakasan_kelurahan_2(feature, layer) {
            layer.on({
                mouseout: function(e) {
                    for (i in e.target._eventParents) {
                        e.target._eventParents[i].resetStyle(e.target);
                    }
                    if (typeof layer.closePopup == 'function') {
                        layer.closePopup();
                    } else {
                        layer.eachLayer(function(feature) {
                            feature.closePopup()
                        });
                    }
                },
                mouseover: highlightFeature,
            });
            var popupContent = '<table><tr><th scope="row">DESA</th><td>' + (feature.properties['DESA'] !== null ? autolinker.link(feature.properties['DESA'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">KODE</th><td>' + (feature.properties['KODE'] !== null ? autolinker.link(feature.properties['KODE'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">KECAMATAN</th><td>' + (feature.properties['KECAMATAN'] !== null ? autolinker.link(feature.properties['KECAMATAN'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">KABUPATEN</th><td>' + (feature.properties['KABUPATEN'] !== null ? autolinker.link(feature.properties['KABUPATEN'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">PROPINSI</th><td>' + (feature.properties['PROPINSI'] !== null ? autolinker.link(feature.properties['PROPINSI'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">SUMBER_AIR</th><td>' + (feature.properties['SUMBER_AIR'] !== null ? autolinker.link(feature.properties['SUMBER_AIR'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">IDT_94_95</th><td>' + (feature.properties['IDT_94_95'] !== null ? autolinker.link(feature.properties['IDT_94_95'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">IDT_95_96</th><td>' + (feature.properties['IDT_95_96'] !== null ? autolinker.link(feature.properties['IDT_95_96'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">Garam</th><td>' + (feature.properties['Garam'] !== null ? autolinker.link(feature.properties['Garam'].toLocaleString()) : '') + '</td></tr></table>';
            layer.bindPopup(popupContent, {
                maxHeight: 400
            });
        }

        function style_pamakasan_kelurahan_2_0(feature) {
            switch (String(feature.properties['Garam'])) {
                case 'ada':
                    return {
                        pane: 'pane_pamakasan_kelurahan_2',
                            opacity: 1,
                            color: 'rgba(35,35,35,1.0)',
                            dashArray: '',
                            lineCap: 'butt',
                            lineJoin: 'miter',
                            weight: 1.0,
                            fill: true,
                            fillOpacity: 1,
                            fillColor: 'rgba(0,254,237,1.0)',
                            interactive: true,
                    }
                    break;
                default:
                    return {
                        pane: 'pane_pamakasan_kelurahan_2',
                            opacity: 1,
                            color: 'rgba(35,35,35,1.0)',
                            dashArray: '',
                            lineCap: 'butt',
                            lineJoin: 'miter',
                            weight: 1.0,
                            fill: true,
                            fillOpacity: 1,
                            fillColor: 'rgba(66,224,22,1.0)',
                            interactive: true,
                    }
                    break;
            }
        }
        map.createPane('pane_pamakasan_kelurahan_2');
        map.getPane('pane_pamakasan_kelurahan_2').style.zIndex = 402;
        map.getPane('pane_pamakasan_kelurahan_2').style['mix-blend-mode'] = 'normal';
        var layer_pamakasan_kelurahan_2 = new L.geoJson(json_pamakasan_kelurahan_2, {
            attribution: '',
            interactive: true,
            dataVar: 'json_pamakasan_kelurahan_2',
            layerName: 'layer_pamakasan_kelurahan_2',
            pane: 'pane_pamakasan_kelurahan_2',
            onEachFeature: pop_pamakasan_kelurahan_2,
            style: style_pamakasan_kelurahan_2_0,
        });
        bounds_group.addLayer(layer_pamakasan_kelurahan_2);
        map.addLayer(layer_pamakasan_kelurahan_2);

        function pop_bangkalan_kelurahan_3(feature, layer) {
            layer.on({
                mouseout: function(e) {
                    for (i in e.target._eventParents) {
                        e.target._eventParents[i].resetStyle(e.target);
                    }
                    if (typeof layer.closePopup == 'function') {
                        layer.closePopup();
                    } else {
                        layer.eachLayer(function(feature) {
                            feature.closePopup()
                        });
                    }
                },
                mouseover: highlightFeature,
            });
            var popupContent = '<table><tr><th scope="row">DESA</th><td>' + (feature.properties['DESA'] !== null ? autolinker.link(feature.properties['DESA'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">KODE</th><td>' + (feature.properties['KODE'] !== null ? autolinker.link(feature.properties['KODE'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">KECAMATAN</th><td>' + (feature.properties['KECAMATAN'] !== null ? autolinker.link(feature.properties['KECAMATAN'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">KABUPATEN</th><td>' + (feature.properties['KABUPATEN'] !== null ? autolinker.link(feature.properties['KABUPATEN'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">PROPINSI</th><td>' + (feature.properties['PROPINSI'] !== null ? autolinker.link(feature.properties['PROPINSI'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">SUMBER_AIR</th><td>' + (feature.properties['SUMBER_AIR'] !== null ? autolinker.link(feature.properties['SUMBER_AIR'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">IDT_94_95</th><td>' + (feature.properties['IDT_94_95'] !== null ? autolinker.link(feature.properties['IDT_94_95'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">IDT_95_96</th><td>' + (feature.properties['IDT_95_96'] !== null ? autolinker.link(feature.properties['IDT_95_96'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">LUAS_WILAY</th><td>' + (feature.properties['LUAS_WILAY'] !== null ? autolinker.link(feature.properties['LUAS_WILAY'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">SUB_SEKTOR</th><td>' + (feature.properties['SUB_SEKTOR'] !== null ? autolinker.link(feature.properties['SUB_SEKTOR'].toLocaleString()) : '') + '</td></tr></table>';
            layer.bindPopup(popupContent, {
                maxHeight: 400
            });
        }

        function style_bangkalan_kelurahan_3_0(feature) {
            switch (String(feature.properties['KABUPATEN'])) {
                case 'Bangkalan':
                    return {
                        pane: 'pane_bangkalan_kelurahan_3',
                            opacity: 1,
                            color: 'rgba(56,128,54,1.0)',
                            dashArray: '',
                            lineCap: 'butt',
                            lineJoin: 'miter',
                            weight: 1.0,
                            fill: true,
                            fillOpacity: 1,
                            fillColor: 'rgba(255,196,1,1.0)',
                            interactive: true,
                    }
                    break;
                default:
                    return {
                        pane: 'pane_bangkalan_kelurahan_3',
                            opacity: 1,
                            color: 'rgba(56,128,54,1.0)',
                            dashArray: '',
                            lineCap: 'butt',
                            lineJoin: 'miter',
                            weight: 1.0,
                            fill: true,
                            fillOpacity: 1,
                            fillColor: 'rgba(128,152,233,1.0)',
                            interactive: true,
                    }
                    break;
            }
        }
        map.createPane('pane_bangkalan_kelurahan_3');
        map.getPane('pane_bangkalan_kelurahan_3').style.zIndex = 403;
        map.getPane('pane_bangkalan_kelurahan_3').style['mix-blend-mode'] = 'normal';
        var layer_bangkalan_kelurahan_3 = new L.geoJson(json_bangkalan_kelurahan_3, {
            attribution: '',
            interactive: true,
            dataVar: 'json_bangkalan_kelurahan_3',
            layerName: 'layer_bangkalan_kelurahan_3',
            pane: 'pane_bangkalan_kelurahan_3',
            onEachFeature: pop_bangkalan_kelurahan_3,
            style: style_bangkalan_kelurahan_3_0,
        });
        bounds_group.addLayer(layer_bangkalan_kelurahan_3);
        map.addLayer(layer_bangkalan_kelurahan_3);
        var osmGeocoder = new L.Control.Geocoder({
            collapsed: true,
            position: 'topleft',
            text: 'Search',
            title: 'Testing'
        }).addTo(map);
        document.getElementsByClassName('leaflet-control-geocoder-icon')[0]
            .className += ' fa fa-search';
        document.getElementsByClassName('leaflet-control-geocoder-icon')[0]
            .title += 'Search for a place';
        var baseMaps = {};
        L.control.layers(baseMaps, {
            'bangkalan_kelurahan<br /><table><tr><td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/gis/legend/bangkalan_kelurahan_3_Bangkalan0.png" /></td><td>Bangkalan</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/gis/legend/bangkalan_kelurahan_3_1.png" /></td><td></td></tr></table>': layer_bangkalan_kelurahan_3,
            'pamakasan_kelurahan<br /><table><tr><td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/gis/legend/pamakasan_kelurahan_2_ada0.png" /></td><td>ada</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/gis/legend/pamakasan_kelurahan_2_1.png" /></td><td></td></tr></table>': layer_pamakasan_kelurahan_2,
            'sampang_kelurahan<br /><table><tr><td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/gis/legend/sampang_kelurahan_1_ada0.png" /></td><td>ada</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/gis/legend/sampang_kelurahan_1_1.png" /></td><td></td></tr></table>': layer_sampang_kelurahan_1,
            'sumenep_kelurahan<br /><table><tr><td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/gis/legend/sumenep_kelurahan_0_ada0.png" /></td><td>ada</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/gis/legend/sumenep_kelurahan_0_1.png" /></td><td></td></tr></table>': layer_sumenep_kelurahan_0,
        }).addTo(map);
        setBounds();
        var i = 0;
        layer_sumenep_kelurahan_0.eachLayer(function(layer) {
            var context = {
                feature: layer.feature,
                variables: {}
            };
            layer.bindTooltip((layer.feature.properties['DESA'] !== null ? String('<div style="color: #323232; font-size: 7pt; font-family: \'Arial\', sans-serif;">' + layer.feature.properties['DESA']) + '</div>' : ''), {
                permanent: true,
                offset: [-0, -16],
                className: 'css_sumenep_kelurahan_0'
            });
            labels.push(layer);
            totalMarkers += 1;
            layer.added = true;
            addLabel(layer, i);
            i++;
        });
        var i = 0;
        layer_sampang_kelurahan_1.eachLayer(function(layer) {
            var context = {
                feature: layer.feature,
                variables: {}
            };
            layer.bindTooltip((layer.feature.properties['DESA'] !== null ? String('<div style="color: #323232; font-size: 7pt; font-family: \'Arial\', sans-serif;">' + layer.feature.properties['DESA']) + '</div>' : ''), {
                permanent: true,
                offset: [-0, -16],
                className: 'css_sampang_kelurahan_1'
            });
            labels.push(layer);
            totalMarkers += 1;
            layer.added = true;
            addLabel(layer, i);
            i++;
        });
        var i = 0;
        layer_pamakasan_kelurahan_2.eachLayer(function(layer) {
            var context = {
                feature: layer.feature,
                variables: {}
            };
            layer.bindTooltip((layer.feature.properties['DESA'] !== null ? String('<div style="color: #323232; font-size: 7pt; font-family: \'Arial\', sans-serif;">' + layer.feature.properties['DESA']) + '</div>' : ''), {
                permanent: true,
                offset: [-0, -16],
                className: 'css_pamakasan_kelurahan_2'
            });
            labels.push(layer);
            totalMarkers += 1;
            layer.added = true;
            addLabel(layer, i);
            i++;
        });
        var i = 0;
        layer_bangkalan_kelurahan_3.eachLayer(function(layer) {
            var context = {
                feature: layer.feature,
                variables: {}
            };
            layer.bindTooltip((layer.feature.properties['DESA'] !== null ? String('<div style="color: #323232; font-size: 7pt; font-family: \'Arial\', sans-serif;">' + layer.feature.properties['DESA']) + '</div>' : ''), {
                permanent: true,
                offset: [-0, -16],
                className: 'css_bangkalan_kelurahan_3'
            });
            labels.push(layer);
            totalMarkers += 1;
            layer.added = true;
            addLabel(layer, i);
            i++;
        });
        resetLabels([layer_sumenep_kelurahan_0, layer_sampang_kelurahan_1, layer_pamakasan_kelurahan_2, layer_bangkalan_kelurahan_3]);
        map.on("zoomend", function() {
            resetLabels([layer_sumenep_kelurahan_0, layer_sampang_kelurahan_1, layer_pamakasan_kelurahan_2, layer_bangkalan_kelurahan_3]);
        });
        map.on("layeradd", function() {
            resetLabels([layer_sumenep_kelurahan_0, layer_sampang_kelurahan_1, layer_pamakasan_kelurahan_2, layer_bangkalan_kelurahan_3]);
        });
        map.on("layerremove", function() {
            resetLabels([layer_sumenep_kelurahan_0, layer_sampang_kelurahan_1, layer_pamakasan_kelurahan_2, layer_bangkalan_kelurahan_3]);
        });
    </script>
</body>

<style type="text/css">
    body {
        background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
        background-size: 400% 400%;
        animation: gradient 15s ease infinite;
        height: 100vh;
    }

    @keyframes gradient {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }



    .login-container {
        margin-top: 5%;
        margin-bottom: 5%;
    }

    .login-form-1 {
        padding: 5%;
        box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
    }

    .login-form-1 h3 {
        text-align: center;
        color: #333;
    }

    .login-form-2 {
        background-color: #fff;
        padding: 5%;
        box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
    }

    .login-form-2 h3 {
        text-align: center;
        color: #fff;
    }

    .login-container form {
        padding: 10%;
    }

    .btnSubmit {
        width: 50%;
        border-radius: 1rem;
        padding: 1.5%;
        border: none;
        cursor: pointer;
    }

    .login-form-1 .btnSubmit {
        font-weight: 600;
        color: #fff;
        background-color: #0062cc;
    }

    .login-form-2 .btnSubmit {
        font-weight: 600;
        color: #0062cc;
        background-color: #fff;
    }

    .login-form-2 .ForgetPwd {
        color: #fff;
        font-weight: 600;
        text-decoration: none;
    }

    .login-form-1 .ForgetPwd {
        color: #0062cc;
        font-weight: 600;
        text-decoration: none;
    }
</style>

</html>