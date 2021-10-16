<div class="content-wrapper">

	<section class="content">
		<div class="box box-primary box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">INPUT DATA SATLAND_OWNER</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">

				<table class='table table-bordered>'> <tr>
					<td width='200'>Id Saltland <?php echo form_error('id_saltland') ?></td>
					<td><input type="text" class="form-control" name="id_saltland" id="id_saltland" placeholder="Id Saltland" value="<?php echo $id_saltland; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Date1 <?php echo form_error('date1') ?></td>
						<td><input type="date" class="form-control" name="date1" id="date1" placeholder="Date1" value="<?php echo $date1; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Name <?php echo form_error('name') ?></td>
						<td><input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Address <?php echo form_error('address') ?></td>
						<td><input type="text" class="form-control" name="address" id="address" placeholder="Address" value="<?php echo $address; ?>" /></td>
					</tr>

					<tr>
						<td width='200'>Provinces</td>
						<td><select class="form-control" name="id_provinces" id="id_provinces">
								<option disabled selected>-Select Provinces-</option>

							</select></td>

					</tr>
					<tr>
						<td width='200'>Regencies</td>
						<td><select class="form-control" name="id_regencies" id="id_regencies">
								<option disabled selected>-Select Regencies-</option>
							</select></td>
					</tr>
					<tr>
						<td width='200'>Districts</td>
						<td><select class="form-control" name="id_districts" id="id_districts">
								<option disabled selected>-Select districts-</option>
							</select></td>

					</tr>

					<tr>
						<td width='200'>Vilages</td>
						<td><select class="form-control" name="id_villages" id="id_villages">
								<option disabled selected>-Select Vilages-</option>
							</select></td>
					</tr>
					<tr>
						<td width='200'>Contact <?php echo form_error('contact') ?></td>
						<td><input type="text" class="form-control" name="contact" id="contact" placeholder="Contact" value="<?php echo $contact; ?>" /></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="hidden" name="id1" value="<?php echo $id1; ?>" />
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
							<a href="<?php echo site_url('satland_owner') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Back</a>
						</td>
					</tr>
				</table>
			</form>
		</div>
</div>
</div>
