<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA MASTER ATRIBUT</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Atribut <?php echo form_error('atribut') ?></td><td><input type="text" class="form-control" name="atribut" id="atribut" placeholder="Atribut" value="<?php echo $atribut; ?>" /></td></tr>
	    <tr><td width='200'>Unit <?php echo form_error('unit') ?></td><td><input type="text" class="form-control" name="unit" id="unit" placeholder="Unit" value="<?php echo $unit; ?>" /></td></tr>
	    <tr><td width='200'>Note <?php echo form_error('note') ?></td><td><input type="text" class="form-control" name="note" id="note" placeholder="Note" value="<?php echo $note; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id1" value="<?php echo $id1; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('matribut') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Back</a></td></tr>
	</table></form>        </div>
</div>
</div>