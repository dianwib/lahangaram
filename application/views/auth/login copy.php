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
<div class="container login-container">
    <div class="row">
        <div class="col-md-6 login-form-1">

        </div>
        <div class="col-md-6 login-form-1">
            <h3>UTM dbLahanGaram</h3>
            <?php
            $status_login = $this->session->userdata('status_login');
            if (empty($status_login)) {
                $message = "Please login to enter the application";
            } else {
                $message = $status_login;
            }
            ?>
            <?php echo form_open('auth/cheklogin'); ?>
            <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Your Email *" value="" />
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Your Password *" value="" />
                <small class="text-center text-danger" style="color:red;">*<?php echo $message; ?></small>

            </div>
            <div class="form-group">
                <input type="submit" class="btnSubmit" value="Login" />
            </div>
            <br>

            <div class="form-group">
                <?php echo anchor('auth/register', 'Registrasi Akun', array('class' => 'ForgetPwd')); ?> |
                <?php echo anchor('#', '<a href="#" class="ForgetPwd" value="Login">Forget Password?</a>'); ?>
            </div>
        </form>
    </div>
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

<script>
    // assumes you're using jQuery
    $(document).ready(function() {
        $('.confirm-div').hide();
        <?php if($this->session->userdata('message')){ ?>
            $('.confirm-div').html('<?php echo $this->session->userdata('message'); ?>').show();
        <?php } ?>
    });

</script>

<style type="text/css">
    .login-container{
        margin-top: 5%;
        margin-bottom: 5%;
    }
    .login-form-1{
        padding: 5%;
        box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
    }
    .login-form-1 h3{
        text-align: center;
        color: #333;
    }
    .login-form-2{
        padding: 5%;
        background: #0062cc;
        box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
    }
    .login-form-2 h3{
        text-align: center;
        color: #fff;
    }
    .login-container form{
        padding: 10%;
    }
    .btnSubmit
    {
        width: 50%;
        border-radius: 1rem;
        padding: 1.5%;
        border: none;
        cursor: pointer;
    }
    .login-form-1 .btnSubmit{
        font-weight: 600;
        color: #fff;
        background-color: #0062cc;
    }
    .login-form-2 .btnSubmit{
        font-weight: 600;
        color: #0062cc;
        background-color: #fff;
    }
    .login-form-2 .ForgetPwd{
        color: #fff;
        font-weight: 600;
        text-decoration: none;
    }
    .login-form-1 .ForgetPwd{
        color: #0062cc;
        font-weight: 600;
        text-decoration: none;
    }

</style>