<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>dblahangaram</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-ui/themes/base/minified/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
       <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/dist/css/skins/_all-skins.min.css">

       <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
       <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/gis/css/leaflet.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/gis/css/qgis2web.css"><link rel="stylesheet" href="<?php echo base_url(); ?>assets/gis/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/gis/css/leaflet-control-geocoder.Geocoder.css">
    <style>
        html, body, #map {
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
    <style>
        .wrap-email {
            width: 100px;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo base_url() ?>index.php/welcome" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>UTM</b>dbLahanGaram</span>
                <!-- logo for regular state and mobile devices 
                    <span class="logo-lg"><b>BROCODE</b>LTE2</span> -->
                    <img src="" class="brand-image img-circle elevation-3" style="opacity: .8"> LahanGaram
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">


                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php
                                    $img1 = $this->session->userdata('images');
                                    if ($img1 != '') {
                                        ?>
                                        <img src="<?php echo base_url() ?>assets/foto_profil/<?php echo $this->session->userdata('images'); ?>" class="user-image" alt="User Image">
                                        <?php
                                    }
                                    ?>
                                    <span class="hidden-xs"><?php echo $this->session->userdata('full_name'); ?> </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <?php
                                        if ($img1 != '') {
                                            ?>
                                            <img src="<?php echo base_url() ?>assets/foto_profil/<?php echo $this->session->userdata('images'); ?> " class="img-circle" alt="User Image">
                                            <?php
                                        } else {
                                            echo '-';
                                        }
                                        ?>
                                        <p>
                                            <?php echo $this->session->userdata('full_name'); ?>
                                            <!-- <small>Member since Nov. 2012</small> -->
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <?php echo anchor('User_profile', 'Profile', array('class' => 'btn btn-default btn-flat')); ?>
                                            <!--<a href="#" class="btn btn-default btn-flat">Profile</a>-->
                                        </div>
                                        <div class="pull-right">
                                            <?php echo anchor('auth/logout', 'Logout', array('class' => 'btn btn-default btn-flat')); ?>
                                            <!--<a href="#" class="btn btn-default btn-flat">Sign out</a>-->
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <?php $this->load->view('template/sidebar'); ?>
            </aside>

            <div id="map">
            </div>
            


            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 1.0.0
                </div>
                <strong>Copyright &copy; 2020 <a href="https://adminlte.io">ocal_sophan</a>.</strong> All rights
                reserved.
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">
                        <h3 class="control-sidebar-heading">Recent Activity</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                        <p>Will be 23 on April 24th</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-user bg-yellow"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                        <p>New phone +1(800)555-1234</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                        <p>nora@example.com</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-file-code-o bg-green"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                        <p>Execution time 5 seconds</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- /.control-sidebar-menu -->

                        <h3 class="control-sidebar-heading">Tasks Progress</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading">
                                        Custom Template Design
                                        <span class="label label-danger pull-right">70%</span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading">
                                        Update Resume
                                        <span class="label label-success pull-right">95%</span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading">
                                        Laravel Integration
                                        <span class="label label-warning pull-right">50%</span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading">
                                        Back End Framework
                                        <span class="label label-primary pull-right">68%</span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- /.control-sidebar-menu -->

                    </div>
                    <!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                    <!-- /.tab-pane -->
                    <!-- Settings tab content -->
                    <div class="tab-pane" id="control-sidebar-settings-tab">
                        <form method="post">
                            <h3 class="control-sidebar-heading">General Settings</h3>

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Report panel usage
                                    <input type="checkbox" class="pull-right" checked>
                                </label>

                                <p>
                                    Some information about this general settings option
                                </p>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Allow mail redirect
                                    <input type="checkbox" class="pull-right" checked>
                                </label>

                                <p>
                                    Other sets of options are available
                                </p>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Expose author name in posts
                                    <input type="checkbox" class="pull-right" checked>
                                </label>

                                <p>
                                    Allow the user to show his name in blog posts
                                </p>
                            </div>
                            <!-- /.form-group -->

                            <h3 class="control-sidebar-heading">Chat Settings</h3>

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Show me as online
                                    <input type="checkbox" class="pull-right" checked>
                                </label>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Turn off notifications
                                    <input type="checkbox" class="pull-right">
                                </label>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Delete chat history
                                    <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                                </label>
                            </div>
                            <!-- /.form-group -->
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
            </aside>
            <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
           <div class="control-sidebar-bg"></div>
       </div>
       <!-- ./wrapper -->
       <!-- <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-1.9.1.min.js"></script> -->
       <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery-ui/ui/minified/jquery-ui.min.js"></script>
    <!-- jQuery 3
        <script src="<?php echo base_url() ?>assets/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
    -->
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url() ?>assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url() ?>assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url() ?>assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url() ?>assets/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>assets/adminlte/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url() ?>assets/adminlte/dist/js/demo.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url() ?>assets/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- page script -->



    
    
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
        zoomControl:true, maxZoom:28, minZoom:1
    }).fitBounds([[-7.803921681492462,112.84473635528204],[-6.639098219624896,114.5734127929086]]);
      var hash = new L.Hash(map);
      map.attributionControl.setPrefix('<a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a> &middot; <a href="https://leafletjs.com" title="A JS library for interactive maps">Leaflet</a> &middot; <a href="https://qgis.org">QGIS</a>');
      var autolinker = new Autolinker({truncate: {length: 30, location: 'smart'}});
      var bounds_group = new L.featureGroup([]);
      function setBounds() {
      }
      function pop_sumenep_kelurahan_0(feature, layer) {
        layer.on({
            mouseout: function(e) {
                for (i in e.target._eventParents) {
                    e.target._eventParents[i].resetStyle(e.target);
                }
                if (typeof layer.closePopup == 'function') {
                    layer.closePopup();
                } else {
                    layer.eachLayer(function(feature){
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
        layer.bindPopup(popupContent, {maxHeight: 400});
    }

    function style_sumenep_kelurahan_0_0(feature) {
        switch(String(feature.properties['Garam'])) {
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
                    layer.eachLayer(function(feature){
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
        layer.bindPopup(popupContent, {maxHeight: 400});
    }

    function style_sampang_kelurahan_1_0(feature) {
        switch(String(feature.properties['Garam'])) {
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
                    layer.eachLayer(function(feature){
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
        layer.bindPopup(popupContent, {maxHeight: 400});
    }

    function style_pamakasan_kelurahan_2_0(feature) {
        switch(String(feature.properties['Garam'])) {
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
                    layer.eachLayer(function(feature){
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
        layer.bindPopup(popupContent, {maxHeight: 400});
    }

    function style_bangkalan_kelurahan_3_0(feature) {
        switch(String(feature.properties['KABUPATEN'])) {
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
    L.control.layers(baseMaps,{'bangkalan_kelurahan<br /><table><tr><td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/gis/legend/bangkalan_kelurahan_3_Bangkalan0.png" /></td><td>Bangkalan</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/gis/legend/bangkalan_kelurahan_3_1.png" /></td><td></td></tr></table>': layer_bangkalan_kelurahan_3,'pamakasan_kelurahan<br /><table><tr><td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/gis/legend/pamakasan_kelurahan_2_ada0.png" /></td><td>ada</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/gis/legend/pamakasan_kelurahan_2_1.png" /></td><td></td></tr></table>': layer_pamakasan_kelurahan_2,'sampang_kelurahan<br /><table><tr><td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/gis/legend/sampang_kelurahan_1_ada0.png" /></td><td>ada</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/gis/legend/sampang_kelurahan_1_1.png" /></td><td></td></tr></table>': layer_sampang_kelurahan_1,'sumenep_kelurahan<br /><table><tr><td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/gis/legend/sumenep_kelurahan_0_ada0.png" /></td><td>ada</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/gis/legend/sumenep_kelurahan_0_1.png" /></td><td></td></tr></table>': layer_sumenep_kelurahan_0,}).addTo(map);
    setBounds();
    var i = 0;
    layer_sumenep_kelurahan_0.eachLayer(function(layer) {
        var context = {
            feature: layer.feature,
            variables: {}
        };
        layer.bindTooltip((layer.feature.properties['DESA'] !== null?String('<div style="color: #323232; font-size: 7pt; font-family: \'Arial\', sans-serif;">' + layer.feature.properties['DESA']) + '</div>':''), {permanent: true, offset: [-0, -16], className: 'css_sumenep_kelurahan_0'});
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
        layer.bindTooltip((layer.feature.properties['DESA'] !== null?String('<div style="color: #323232; font-size: 7pt; font-family: \'Arial\', sans-serif;">' + layer.feature.properties['DESA']) + '</div>':''), {permanent: true, offset: [-0, -16], className: 'css_sampang_kelurahan_1'});
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
        layer.bindTooltip((layer.feature.properties['DESA'] !== null?String('<div style="color: #323232; font-size: 7pt; font-family: \'Arial\', sans-serif;">' + layer.feature.properties['DESA']) + '</div>':''), {permanent: true, offset: [-0, -16], className: 'css_pamakasan_kelurahan_2'});
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
        layer.bindTooltip((layer.feature.properties['DESA'] !== null?String('<div style="color: #323232; font-size: 7pt; font-family: \'Arial\', sans-serif;">' + layer.feature.properties['DESA']) + '</div>':''), {permanent: true, offset: [-0, -16], className: 'css_bangkalan_kelurahan_3'});
        labels.push(layer);
        totalMarkers += 1;
        layer.added = true;
        addLabel(layer, i);
        i++;
    });
    resetLabels([layer_sumenep_kelurahan_0,layer_sampang_kelurahan_1,layer_pamakasan_kelurahan_2,layer_bangkalan_kelurahan_3]);
    map.on("zoomend", function(){
        resetLabels([layer_sumenep_kelurahan_0,layer_sampang_kelurahan_1,layer_pamakasan_kelurahan_2,layer_bangkalan_kelurahan_3]);
    });
    map.on("layeradd", function(){
        resetLabels([layer_sumenep_kelurahan_0,layer_sampang_kelurahan_1,layer_pamakasan_kelurahan_2,layer_bangkalan_kelurahan_3]);
    });
    map.on("layerremove", function(){
        resetLabels([layer_sumenep_kelurahan_0,layer_sampang_kelurahan_1,layer_pamakasan_kelurahan_2,layer_bangkalan_kelurahan_3]);
    });
</script>
</body>
</html>