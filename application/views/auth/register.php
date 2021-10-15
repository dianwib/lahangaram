<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>dblahangaram</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
    <div class="content-wrapper">

        <section class="content">
            <div class="box box-warning box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">REGISTRASI AKUN</h3>
                </div>
                <form action="<?php #echo $action; 
                                ?>" method="post" enctype="multipart/form-data">

                    <table class='table table-bordered>'>
                        <tr>
                            <td width='200'>Nama Lengkap <?php echo form_error('full_name') ?></td>
                            <td><input type="text" class="form-control" name="full_name" id="full_name" placeholder="Full Name" value="<?php echo $full_name; ?>" /></td>
                        </tr>
                        <tr>
                            <td width='200'>Email <?php echo form_error('email') ?></td>
                            <td>

                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                            </td>
                        </tr>



                        <tr>
                            <td width='200'>Password <?php echo form_error('password') ?></td>
                            <td><input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" /></td>
                        </tr>
                        <tr>
                            <td width='200'>Foto Profile <?php echo form_error('images') ?></td>
                            <td> <input type="file" name="images"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="hidden" name="id_users" value="<?php echo $id_users; ?>" />
                                <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
                                <a href="<?php echo site_url('user') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
    </div>
    <!-- jQuery 3 -->
    <script src="<?php echo base_url(); ?>assets/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url(); ?>/assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>/assets/adminlte/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

</html>