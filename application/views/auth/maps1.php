<!-- <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes"> -->

<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary box-solid">

                    <div class="box-header">
                        <h3 class="box-title">PROFIL ANDA</h3>
                    </div>
                    <div class="box-body">
                        <div id="map">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/gis/css/leaflet.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/gis/css/qgis2web.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/gis/css/fontawesome-all.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/gis/css/leaflet-control-geocoder.Geocoder.css">
<style>
    #map {
        width: 100%;
        height: 100%;
        padding: 0;
        margin: 0;

    }
</style>


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
        var popupContent = '<table>\
                    <tr>\
                        <th scope="row">DESA</th>\
                        <td>' + (feature.properties['DESA'] !== null ? autolinker.link(feature.properties['DESA'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">KODE</th>\
                        <td>' + (feature.properties['KODE'] !== null ? autolinker.link(feature.properties['KODE'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">KECAMATAN</th>\
                        <td>' + (feature.properties['KECAMATAN'] !== null ? autolinker.link(feature.properties['KECAMATAN'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">KABUPATEN</th>\
                        <td>' + (feature.properties['KABUPATEN'] !== null ? autolinker.link(feature.properties['KABUPATEN'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">PROPINSI</th>\
                        <td>' + (feature.properties['PROPINSI'] !== null ? autolinker.link(feature.properties['PROPINSI'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">IDT_94_95</th>\
                        <td>' + (feature.properties['IDT_94_95'] !== null ? autolinker.link(feature.properties['IDT_94_95'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">IDT_95_96</th>\
                        <td>' + (feature.properties['IDT_95_96'] !== null ? autolinker.link(feature.properties['IDT_95_96'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">LUAS_WILAY</th>\
                        <td>' + (feature.properties['LUAS_WILAY'] !== null ? autolinker.link(feature.properties['LUAS_WILAY'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Garam</th>\
                        <td>' + (feature.properties['Garam'] !== null ? autolinker.link(feature.properties['Garam'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
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
        var popupContent = '<table>\
                    <tr>\
                        <th scope="row">DESA</th>\
                        <td>' + (feature.properties['DESA'] !== null ? autolinker.link(feature.properties['DESA'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">KODE</th>\
                        <td>' + (feature.properties['KODE'] !== null ? autolinker.link(feature.properties['KODE'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">KECAMATAN</th>\
                        <td>' + (feature.properties['KECAMATAN'] !== null ? autolinker.link(feature.properties['KECAMATAN'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">KABUPATEN</th>\
                        <td>' + (feature.properties['KABUPATEN'] !== null ? autolinker.link(feature.properties['KABUPATEN'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">PROPINSI</th>\
                        <td>' + (feature.properties['PROPINSI'] !== null ? autolinker.link(feature.properties['PROPINSI'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">SUMBER_AIR</th>\
                        <td>' + (feature.properties['SUMBER_AIR'] !== null ? autolinker.link(feature.properties['SUMBER_AIR'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">IDT_94_95</th>\
                        <td>' + (feature.properties['IDT_94_95'] !== null ? autolinker.link(feature.properties['IDT_94_95'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">IDT_95_96</th>\
                        <td>' + (feature.properties['IDT_95_96'] !== null ? autolinker.link(feature.properties['IDT_95_96'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Garam</th>\
                        <td>' + (feature.properties['Garam'] !== null ? autolinker.link(feature.properties['Garam'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
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
        var popupContent = '<table>\
                    <tr>\
                        <th scope="row">DESA</th>\
                        <td>' + (feature.properties['DESA'] !== null ? autolinker.link(feature.properties['DESA'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">KODE</th>\
                        <td>' + (feature.properties['KODE'] !== null ? autolinker.link(feature.properties['KODE'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">KECAMATAN</th>\
                        <td>' + (feature.properties['KECAMATAN'] !== null ? autolinker.link(feature.properties['KECAMATAN'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">KABUPATEN</th>\
                        <td>' + (feature.properties['KABUPATEN'] !== null ? autolinker.link(feature.properties['KABUPATEN'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">PROPINSI</th>\
                        <td>' + (feature.properties['PROPINSI'] !== null ? autolinker.link(feature.properties['PROPINSI'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">SUMBER_AIR</th>\
                        <td>' + (feature.properties['SUMBER_AIR'] !== null ? autolinker.link(feature.properties['SUMBER_AIR'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">IDT_94_95</th>\
                        <td>' + (feature.properties['IDT_94_95'] !== null ? autolinker.link(feature.properties['IDT_94_95'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">IDT_95_96</th>\
                        <td>' + (feature.properties['IDT_95_96'] !== null ? autolinker.link(feature.properties['IDT_95_96'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Garam</th>\
                        <td>' + (feature.properties['Garam'] !== null ? autolinker.link(feature.properties['Garam'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
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
        var popupContent = '<table>\
                    <tr>\
                        <th scope="row">DESA</th>\
                        <td>' + (feature.properties['DESA'] !== null ? autolinker.link(feature.properties['DESA'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">KODE</th>\
                        <td>' + (feature.properties['KODE'] !== null ? autolinker.link(feature.properties['KODE'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">KECAMATAN</th>\
                        <td>' + (feature.properties['KECAMATAN'] !== null ? autolinker.link(feature.properties['KECAMATAN'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">KABUPATEN</th>\
                        <td>' + (feature.properties['KABUPATEN'] !== null ? autolinker.link(feature.properties['KABUPATEN'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">PROPINSI</th>\
                        <td>' + (feature.properties['PROPINSI'] !== null ? autolinker.link(feature.properties['PROPINSI'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">SUMBER_AIR</th>\
                        <td>' + (feature.properties['SUMBER_AIR'] !== null ? autolinker.link(feature.properties['SUMBER_AIR'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">IDT_94_95</th>\
                        <td>' + (feature.properties['IDT_94_95'] !== null ? autolinker.link(feature.properties['IDT_94_95'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">IDT_95_96</th>\
                        <td>' + (feature.properties['IDT_95_96'] !== null ? autolinker.link(feature.properties['IDT_95_96'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">LUAS_WILAY</th>\
                        <td>' + (feature.properties['LUAS_WILAY'] !== null ? autolinker.link(feature.properties['LUAS_WILAY'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">SUB_SEKTOR</th>\
                        <td>' + (feature.properties['SUB_SEKTOR'] !== null ? autolinker.link(feature.properties['SUB_SEKTOR'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
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



