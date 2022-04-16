<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">Import PPH_SAP</h3>
                    </div>
        
					<div class="box-body">
						<div style="padding-bottom: 10px;">
			
							<?php echo $this->session->flashdata('notif') ?>
							<form method="POST" action="<?php echo base_url()?>index.php/pph_sap/importxls_post" enctype="multipart/form-data">
							  <div class="form-group">
								<label for="exampleInputEmail1">UPLOAD THE EXCEL FILE</label>
								<input type="file" name="userfile" class="form-control">
							  </div>

							  <button type="submit" class="btn btn-success">UPLOAD</button>
							</form>
						
						</div>        
					</div>
        
					<div class="box-header">
                        <h3 class="box-title"></h3>
                    </div>
					<div class="box-body">
						<div style="padding-bottom: 10px;">			
							<a href="<?php echo base_url().'template/SAP_pph.xlsx'; ?>">File template (from SAP)</a>
			
						</div>        
					</div>
        
                </div>
            </div>
        </div>
    </section>
</div>
        
