<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA SALTLAND_ATRIBUTE</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Id Saltland <?php echo form_error('id_saltland') ?></td><td><input type="text" class="form-control" name="id_saltland" id="id_saltland" placeholder="Id Saltland" value="<?php echo $id_saltland; ?>" /></td></tr>
	    <tr><td width='200'>Id Atribut <?php echo form_error('id_atribut') ?></td><td><input type="text" class="form-control" name="id_atribut" id="id_atribut" placeholder="Id Atribut" value="<?php echo $id_atribut; ?>" /></td></tr>
	    <tr><td width='200'>Value1 <?php echo form_error('value1') ?></td><td><input type="text" class="form-control" name="value1" id="value1" placeholder="Value1" value="<?php echo $value1; ?>" /></td></tr>
	    <tr><td width='200'>Createdate <?php echo form_error('createdate') ?></td><td><input type="date" class="form-control" name="createdate" id="createdate" placeholder="Createdate" value="<?php echo $createdate; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id1" value="<?php echo $id1; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('saltland_atribute') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Back</a></td></tr>
	</table></form>        </div>
</div>
</div>