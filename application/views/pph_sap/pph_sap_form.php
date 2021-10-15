<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA PPH_SAP</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Document Number <?php echo form_error('document_number') ?></td><td><input type="text" class="form-control" name="document_number" id="document_number" placeholder="Document Number" value="<?php echo $document_number; ?>" /></td></tr>
	    <tr><td width='200'>Year Month1 <?php echo form_error('year_month1') ?></td><td><input type="text" class="form-control" name="year_month1" id="year_month1" placeholder="Year Month1" value="<?php echo $year_month1; ?>" /></td></tr>
	    <tr><td width='200'>Posting Key <?php echo form_error('posting_key') ?></td><td><input type="text" class="form-control" name="posting_key" id="posting_key" placeholder="Posting Key" value="<?php echo $posting_key; ?>" /></td></tr>
	    <tr><td width='200'>Document Header Text <?php echo form_error('document_header_text') ?></td><td><input type="text" class="form-control" name="document_header_text" id="document_header_text" placeholder="Document Header Text" value="<?php echo $document_header_text; ?>" /></td></tr>
	    <tr><td width='200'>Account <?php echo form_error('account') ?></td><td><input type="text" class="form-control" name="account" id="account" placeholder="Account" value="<?php echo $account; ?>" /></td></tr>
	    <tr><td width='200'>Acct Name <?php echo form_error('acct_name') ?></td><td><input type="text" class="form-control" name="acct_name" id="acct_name" placeholder="Acct Name" value="<?php echo $acct_name; ?>" /></td></tr>
	    <tr><td width='200'>Profit Center <?php echo form_error('profit_center') ?></td><td><input type="text" class="form-control" name="profit_center" id="profit_center" placeholder="Profit Center" value="<?php echo $profit_center; ?>" /></td></tr>
	    <tr><td width='200'>Document Date <?php echo form_error('document_date') ?></td><td><input type="text" class="form-control" name="document_date" id="document_date" placeholder="Document Date" value="<?php echo $document_date; ?>" /></td></tr>
	    <tr><td width='200'>Posting Date <?php echo form_error('posting_date') ?></td><td><input type="text" class="form-control" name="posting_date" id="posting_date" placeholder="Posting Date" value="<?php echo $posting_date; ?>" /></td></tr>
	    <tr><td width='200'>Text <?php echo form_error('text') ?></td><td><input type="text" class="form-control" name="text" id="text" placeholder="Text" value="<?php echo $text; ?>" /></td></tr>
	    <tr><td width='200'>Reference <?php echo form_error('reference') ?></td><td><input type="text" class="form-control" name="reference" id="reference" placeholder="Reference" value="<?php echo $reference; ?>" /></td></tr>
	    <tr><td width='200'>Amount In Lc <?php echo form_error('amount_in_lc') ?></td><td><input type="text" class="form-control" name="amount_in_lc" id="amount_in_lc" placeholder="Amount In Lc" value="<?php echo $amount_in_lc; ?>" /></td></tr>
	    <tr><td width='200'>Vendor <?php echo form_error('vendor') ?></td><td><input type="text" class="form-control" name="vendor" id="vendor" placeholder="Vendor" value="<?php echo $vendor; ?>" /></td></tr>
	    <tr><td width='200'>Name Cust Ven <?php echo form_error('name_cust_ven') ?></td><td><input type="text" class="form-control" name="name_cust_ven" id="name_cust_ven" placeholder="Name Cust Ven" value="<?php echo $name_cust_ven; ?>" /></td></tr>
	    <tr><td width='200'>Reversed With <?php echo form_error('reversed_with') ?></td><td><input type="text" class="form-control" name="reversed_with" id="reversed_with" placeholder="Reversed With" value="<?php echo $reversed_with; ?>" /></td></tr>
	    <tr><td width='200'>Cost Center <?php echo form_error('cost_center') ?></td><td><input type="text" class="form-control" name="cost_center" id="cost_center" placeholder="Cost Center" value="<?php echo $cost_center; ?>" /></td></tr>
	    <tr><td width='200'>User Name <?php echo form_error('user_name') ?></td><td><input type="text" class="form-control" name="user_name" id="user_name" placeholder="User Name" value="<?php echo $user_name; ?>" /></td></tr>
	    <tr><td width='200'>Entry Date <?php echo form_error('entry_date') ?></td><td><input type="text" class="form-control" name="entry_date" id="entry_date" placeholder="Entry Date" value="<?php echo $entry_date; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id1" value="<?php echo $id1; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('pph_sap') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Back</a></td></tr>
	</table></form>        </div>
</div>
</div>