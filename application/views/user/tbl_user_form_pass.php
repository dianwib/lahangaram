<div class="content-wrapper">

    <section class="content">
        <div class="box box-danger box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Change Password</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">

                <table class='table table-bordered>' <tr>
                    <td width='200'>Nama Lengkap <?php echo form_error('full_name') ?></td>
                    <td><input disabled type="text" class="form-control" name="full_name" id="full_name" placeholder="Full Name" value="<?php echo $full_name; ?>" /></td>
                    </tr>
                    <tr>
                        <td width='200'>Email <?php echo form_error('email') ?></td>
                        <td>

                            <input disabled type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                        </td>
                    </tr>


                    <tr>
                        <td width='200'>Password <?php echo form_error('password') ?></td>
                        <td><input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" /></td>
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
</div>