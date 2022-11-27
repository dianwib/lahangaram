<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/gis/css/leaflet.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/gis/css/qgis2web.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/gis/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/gis/css/leaflet-control-geocoder.Geocoder.css"> -->

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/newAssets/css/leaflet.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/newAssets/css/qgis2web.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/newAssets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/newAssets/css/leaflet-search.css">
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
    <!-- <script src="<?php echo base_url(); ?>assets/gis/js/qgis2web_expressions.js"></script>
    <script src="<?php echo base_url(); ?>assets/gis/js/leaflet.js"></script>
    <script src="<?php echo base_url(); ?>assets/gis/js/leaflet.rotatedMarker.js"></script>
    <script src="<?php echo base_url(); ?>assets/gis/js/leaflet.pattern.js"></script>
    <script src="<?php echo base_url(); ?>assets/gis/js/leaflet-hash.js"></script>
    <script src="<?php echo base_url(); ?>assets/gis/js/Autolinker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/gis/js/rbush.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/gis/js/labelgun.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/gis/js/labels.js"></script>
    <script src="<?php echo base_url(); ?>assets/gis/js/leaflet-control-geocoder.Geocoder.js"></script>
    <script src="<?php echo base_url(); ?>assets/gis/data/sumenep_kelurahan_0.js"></script> -->

    <!-- <script src="<?php echo base_url(); ?>assets/gis/data/sampang_kelurahan_1.js"></script>
    <script src="<?php echo base_url(); ?>assets/gis/data/pamakasan_kelurahan_2.js"></script>
    <script src="<?php echo base_url(); ?>assets/gis/data/bangkalan_kelurahan_3.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/newAssets/js/qgis2web_expressions.js"></script>
    <script src="<?php echo base_url(); ?>assets/newAssets/js/leaflet.js"></script>
    <script src="<?php echo base_url(); ?>assets/newAssets/js/leaflet.rotatedMarker.js"></script>
    <script src="<?php echo base_url(); ?>assets/newAssets/js/leaflet.pattern.js"></script>
    <script src="<?php echo base_url(); ?>assets/newAssets/js/leaflet-hash.js"></script>
    <script src="<?php echo base_url(); ?>assets/newAssets/js/Autolinker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/newAssets/js/rbush.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/newAssets/js/labelgun.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/newAssets/js/labels.js"></script>
    <script src="<?php echo base_url(); ?>assets/newAssets/js/leaflet-search.js"></script>
    <script src="<?php echo base_url(); ?>assets/newAssets/data/sumenep_fix_0.js"></script>
    <script src="<?php echo base_url(); ?>assets/newAssets/data/JALAN_LN_25K_1.js"></script>

    <script>
        var listIdVilageSaltland = [];

        const allDes = async () => {
            const response = await fetch(`<?= site_url('saltland/getAllDesaDataFromMap'); ?>`, {
                method: 'GET',
            });
            const resp = await response.json();

            for (const element of resp.data) {
                listIdVilageSaltland.push(element['id_village'])
            }

        }

        const show = async () => {
            await allDes();
            //console.log(listIdVilageSaltland);
            await drawMap();
        }
        show();


        async function getDataSatland(kode) {
//console.log(kode)
            try {
                const response = await fetch(`<?= site_url('saltland/getDataFromMap'); ?>`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        // desa: desa,
                        // kec: kec,
                        // kab: kab
                        kode:kode
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

        async function drawMap() {
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
                var kode = a.split('KODE</th><td>').pop().split('</td>')[0];
                var newCode =(kode.toString().split('.').join(""));
                console.log(kode,newCode)

                getDataSatland(newCode);
            }

            var map = L.map('map', {
                zoomControl: true,
                maxZoom: 28,
                minZoom: 1
            }).fitBounds([
                [-7.386890853964692, 113.64414469650964],
                [-6.613836579236725, 115.05516936750965]
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

            function pop_sumenep_fix_0(feature, layer) {
                layer.on({
                    mouseout: function(e) {
                        for (i in e.target._eventParents) {
                            e.target._eventParents[i].resetStyle(e.target);
                        }
                    },
                    mouseover: highlightFeature,
                });
                var popupContent = '<table><tr><th scope="row">DESA</th><td>' + (feature.properties['desa'] !== null ? autolinker.link(feature.properties['desa'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">KODE</th><td>' + (feature.properties['id_village'] !== null ? autolinker.link(feature.properties['id_village'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">KECAMATAN</th><td>' + (feature.properties['kecamatan'] !== null ? autolinker.link(feature.properties['kecamatan'].toLocaleString()) : '') + '</td></tr><tr><th scope="row">KABUPATEN</th><td>' + (feature.properties['kabupaten'] !== null ? autolinker.link(feature.properties['kabupaten'].toLocaleString()) : '') + '</td></tr></table>';

               
                layer.bindPopup(popupContent, {
                    maxHeight: 400
                });
            }

            function style_sumenep_fix_0_0(feature) {
                // console.log(listIdVilageSaltland.includes(feature.properties['id_village'].toString()),feature.properties['id_village'])
                switch (listIdVilageSaltland.includes(feature.properties['id_village'].toString())) { //String(feature.properties['satland_idmap'])) {
                    
                    case true:
                        //biru
                        return {
                            pane: 'pane_sumenep_fix_0',
                                opacity: 1,
                                color: 'rgba(35,35,35,1.0)',
                                dashArray: '',
                                lineCap: 'butt',
                                lineJoin: 'miter',
                                weight: 1.0,
                                fill: true,
                                fillOpacity: 1,
                                fillColor: 'rgba(45,197,235,1.0)',
                                interactive: true,
                        }
                        break;
                    default:
                        //ijo
                        return {
                            pane: 'pane_sumenep_fix_0',
                                opacity: 1,
                                color: 'rgba(35,35,35,1.0)',
                                dashArray: '',
                                lineCap: 'butt',
                                lineJoin: 'miter',
                                weight: 1.0,
                                fill: true,
                                fillOpacity: 1,
                                fillColor: 'rgba(0,174,0,1.0)',
                                interactive: true,
                        }
                        break;
                }
            }
            map.createPane('pane_sumenep_fix_0');
            map.getPane('pane_sumenep_fix_0').style.zIndex = 400;
            map.getPane('pane_sumenep_fix_0').style['mix-blend-mode'] = 'normal';
            var layer_sumenep_fix_0 = new L.geoJson(json_sumenep_fix_0, {
                attribution: '',
                interactive: true,
                dataVar: 'json_sumenep_fix_0',
                layerName: 'layer_sumenep_fix_0',
                pane: 'pane_sumenep_fix_0',
                onEachFeature: pop_sumenep_fix_0,
                style: style_sumenep_fix_0_0,
            });
            bounds_group.addLayer(layer_sumenep_fix_0);
            map.addLayer(layer_sumenep_fix_0);

            function pop_JALAN_LN_25K_1(feature, layer) {
                layer.on({
                    mouseout: function(e) {
                        for (i in e.target._eventParents) {
                            e.target._eventParents[i].resetStyle(e.target);
                        }
                    },
                    mouseover: highlightFeature,
                });
                var popupContent = '<table>\
            <tr>\
                <td colspan="2">' + (feature.properties['REMARK'] !== null ? autolinker.link(feature.properties['REMARK'].toLocaleString()) : '') + '</td>\
            </tr>\
            <tr>\
                <td colspan="2">' + (feature.properties['SRS_ID'] !== null ? autolinker.link(feature.properties['SRS_ID'].toLocaleString()) : '') + '</td>\
            </tr>\
            <tr>\
                <td colspan="2">' + (feature.properties['LCODE'] !== null ? autolinker.link(feature.properties['LCODE'].toLocaleString()) : '') + '</td>\
            </tr>\
            <tr>\
                <td colspan="2">' + (feature.properties['METADATA'] !== null ? autolinker.link(feature.properties['METADATA'].toLocaleString()) : '') + '</td>\
            </tr>\
            <tr>\
                <td colspan="2">' + (feature.properties['SHAPE_Leng'] !== null ? autolinker.link(feature.properties['SHAPE_Leng'].toLocaleString()) : '') + '</td>\
            </tr>\
        </table>';
                layer.bindPopup(popupContent, {
                    maxHeight: 400
                });
            }

            function style_JALAN_LN_25K_1_0(feature) {
                switch (String(feature.properties['REMARK'])) {
                    case 'Jalan Kolektor':
                        return {
                            pane: 'pane_JALAN_LN_25K_1',
                                opacity: 1,
                                color: 'rgba(255,255,255,1.0)',
                                dashArray: '',
                                lineCap: 'square',
                                lineJoin: 'bevel',
                                weight: 2.0,
                                fillOpacity: 0,
                                interactive: true,
                        }
                        break;
                    case 'Jalan Lain':
                        return {
                            pane: 'pane_JALAN_LN_25K_1',
                                opacity: 1,
                                color: 'rgba(230,0,58,1.0)',
                                dashArray: '',
                                lineCap: 'square',
                                lineJoin: 'bevel',
                                weight: 1,
                                fillOpacity: 0,
                                interactive: true,
                        }
                        break;
                    case 'Jalan Lokal':
                        return {
                            pane: 'pane_JALAN_LN_25K_1',
                                opacity: 1,
                                color: 'rgba(255,225,1,1.0)',
                                dashArray: '',
                                lineCap: 'square',
                                lineJoin: 'bevel',
                                weight: 1.0,
                                fillOpacity: 0,
                                interactive: true,
                        }
                        break;
                    case 'Jalan Setapak':
                        return {
                            pane: 'pane_JALAN_LN_25K_1',
                                opacity: 1,
                                color: 'rgba(207,83,159,0.0)',
                                dashArray: '',
                                lineCap: 'square',
                                lineJoin: 'bevel',
                                weight: 1.0,
                                fillOpacity: 0,
                                interactive: true,
                        }
                        break;
                    default:
                        return {
                            pane: 'pane_JALAN_LN_25K_1',
                                opacity: 1,
                                color: 'rgba(61,219,216,1.0)',
                                dashArray: '',
                                lineCap: 'square',
                                lineJoin: 'bevel',
                                weight: 1.0,
                                fillOpacity: 0,
                                interactive: true,
                        }
                        break;
                }
            }
            map.createPane('pane_JALAN_LN_25K_1');
            map.getPane('pane_JALAN_LN_25K_1').style.zIndex = 401;
            map.getPane('pane_JALAN_LN_25K_1').style['mix-blend-mode'] = 'normal';
            var layer_JALAN_LN_25K_1 = new L.geoJson(json_JALAN_LN_25K_1, {
                attribution: '',
                interactive: true,
                dataVar: 'json_JALAN_LN_25K_1',
                layerName: 'layer_JALAN_LN_25K_1',
                pane: 'pane_JALAN_LN_25K_1',
                onEachFeature: pop_JALAN_LN_25K_1,
                style: style_JALAN_LN_25K_1_0,
            });
            bounds_group.addLayer(layer_JALAN_LN_25K_1);
            map.addLayer(layer_JALAN_LN_25K_1);
            var site = `<?php echo base_url() ?>` + 'assets/newAssets/';
            //console.log(site)
            var a = `JALAN_LN_25K<br /><table><tr><td style="text-align: center;"><img src="${site}legend/JALAN_LN_25K_1_JalanKolektor0.png" /></td><td>Jalan Kolektor</td></tr><tr><td style="text-align: center;"><img src="legend/JALAN_LN_25K_1_JalanLain1.png" /></td><td>Jalan Lain</td></tr><tr><td style="text-align: center;"><img src="legend/JALAN_LN_25K_1_JalanLokal2.png" /></td><td>Jalan Lokal</td></tr><tr><td style="text-align: center;"><img src="legend/JALAN_LN_25K_1_JalanSetapak3.png" /></td><td>Jalan Setapak</td></tr><tr><td style="text-align: center;"><img src="legend/JALAN_LN_25K_1_4.png" /></td><td></td></tr></table>`;
            var b = `sumenep_fix<br /><table><tr><td style="text-align: center;"><img src="${site}legend/sumenep_fix_0_00.png" /></td><td>0</td></tr><tr><td style="text-align: center;"><img src="${site}legend/sumenep_fix_0_1.png" /></td><td></td></tr></table>`;
            var baseMaps = {};
            L.control.layers(baseMaps, {
                a: layer_JALAN_LN_25K_1,
                b: layer_sumenep_fix_0,
            }).addTo(map);
            setBounds();
            var i = 0;
            layer_sumenep_fix_0.eachLayer(function(layer) {
                var context = {
                    feature: layer.feature,
                    variables: {}
                };
                layer.bindTooltip((layer.feature.properties['desa'] !== null ? String('<div style="color: #323232; font-size: 10pt; font-family: \'Arial\', sans-serif;">' + layer.feature.properties['desa']) + '</div>' : ''), {
                    permanent: true,
                    offset: [-0, -16],
                    className: 'css_sumenep_fix_0'
                });
                labels.push(layer);
                totalMarkers += 1;
                layer.added = true;
                addLabel(layer, i);
                i++;
            });
            map.addControl(new L.Control.Search({
                layer: layer_sumenep_fix_0,
                initial: false,
                hideMarkerOnCollapse: true,
                propertyName: 'desa'
            }));
            document.getElementsByClassName('search-button')[0].className +=
                ' fa fa-binoculars';
            resetLabels([layer_sumenep_fix_0]);
            map.on("zoomend", function() {
                resetLabels([layer_sumenep_fix_0]);
            });
            map.on("layeradd", function() {
                resetLabels([layer_sumenep_fix_0]);
            });
            map.on("layerremove", function() {
                resetLabels([layer_sumenep_fix_0]);
            });
        }
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