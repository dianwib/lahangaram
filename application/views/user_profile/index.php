<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary box-solid">

                    <div class="box-header">
                        <h3 class="box-title">PROFIL ANDA</h3>
                    </div>
                    <div class="box-body">
                        <form action="User_profile/update_action/<?= $user->id_users ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id_user_dinas" value="<?= @$user_dinas->id1?>">
                            <div class="row-fluid user-infos cyruxx">
                                <div class="span10 offset1">
                                    <div class="panel-body">
                                        <div class="row-fluid">
                                            <div class="span3">
                                                <img class="img-circle"
                                                src="<?= @$user_dinas->images ?? 'https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100"' ?>
                                                alt="User Pic" style="float: right;">
                                            </div>
                                            <div class="span6">
                                                <table class="table table-condensed table-responsive table-user-information">
                                                    <tbody>
                                                        <tr>
                                                            <td>NIK</td>
                                                            <td><input type="number" class="form-control" name="nik" id="nik" placeholder="NIK" value="<?= @$user_dinas->NIK ?>" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>NAMA</td>
                                                            <td><input type="text" class="form-control" name="name" id="name" placeholder="Nama" value="<?= @$user->full_name ?>" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>ALAMAT</td>
                                                            <td><input type="text" class="form-control" name="adress" id="adress" placeholder="Alamat" value="<?= @$user_dinas->adress ?>" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>NO HP</td>
                                                            <td><input type="number" class="form-control" name="phone" id="phone" placeholder="NO HP" value="<?= @$user_dinas->phone ?>" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>EMAIL</td>
                                                            <td><input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?= @$user->email ?>" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>DIBUAT</td>
                                                            <td><input type="text" class="form-control" value="<?= @$user_dinas->create_date ?>" readonly /></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">

                                        <span class="pull-right">
                                            <button class="btn btn-danger" type="submit"
                                            data-toggle="tooltip"
                                            data-original-title="Remove this user"><i class="icon-remove icon-white"></i> UPDATE DATA</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style type="text/css">
    //Reusing bootstrap 3 panel CSS
    .panel {
        background-color: #FFFFFF;
        border: 1px solid rgba(0, 0, 0, 0);
        border-radius: 4px 4px 4px 4px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
        margin-bottom: 20px;
    }   

    .panel-primary {
        border-color: #428BCA;
    }   

    .panel-primary > .panel-heading {
        background-color: #428BCA;
        border-color: #428BCA;
        color: #FFFFFF;
    }   

    .panel-heading {
        border-bottom: 1px solid rgba(0, 0, 0, 0);
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
        padding: 10px 15px;
    }   

    .panel-title {
        font-size: 16px;
        margin-bottom: 0;
        margin-top: 0;
    }   

    .panel-body:before, .panel-body:after {
        content: " ";
        display: table;
    }   

    .panel-body:before, .panel-body:after {
        content: " ";
        display: table;
    }   

    .panel-body:after {
        clear: both;
    }   

    .panel-body {
        padding: 15px;
    }   

    .panel-footer {
        background-color: #F5F5F5;
        border-bottom-left-radius: 3px;
        border-bottom-right-radius: 3px;
        border-top: 1px solid #DDDDDD;
        padding: 10px 15px;
    }

    //CSS from v3 snipp
    .user-row {
        margin-bottom: 14px;
    }

    .user-row:last-child {
        margin-bottom: 0;
    }

    .dropdown-user {
        margin: 13px 0;
        padding: 5px;
        height: 100%;
    }

    .dropdown-user:hover {
        cursor: pointer;
    }

    .table-user-information > tbody > tr {
        border-top: 1px solid rgb(221, 221, 221);
    }

    .table-user-information > tbody > tr:first-child {
        border-top: 0;
    }


    .table-user-information > tbody > tr > td {
        border-top: 0;
    }

</style>

<script type="text/javascript">
    var msg = `<?= $this->session->userdata('message') ?? '' ?>`;
    if (msg)
    {
        alert(msg)
    }
</script>