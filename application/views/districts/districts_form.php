<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA DISTRICTS</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Regency Id <?php echo form_error('regency_id') ?></td><td><input type="text" class="form-control" name="regency_id" id="regency_id" placeholder="Regency Id" value="<?php echo $regency_id; ?>" /></td></tr>
	    <tr><td width='200'>Name <?php echo form_error('name') ?></td><td><input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('districts') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Back</a></td></tr>
	</table></form>        </div>
</div>
</div>