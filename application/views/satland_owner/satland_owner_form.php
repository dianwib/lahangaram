<div class="content-wrapper">

	<section class="content">
		<div class="box box-primary box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">INPUT DATA SATLAND OWNER</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">

				<table class='table table-bordered>'> <tr>
					<td width='200'>Id Saltland <?php echo form_error('id_saltland') ?></td>
					<td><select class="form-control" name="id_saltland" id="id_saltland">
								<option disabled selected>-Select Saltland-</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width='200'>Dibuat Tanggal <?php echo form_error('date1') ?></td>
						<td><input type="date" class="form-control" name="date1" id="date1" placeholder="Date1" value="<?php echo $date1; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Nama <?php echo form_error('name') ?></td>
						<td><input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Alamat <?php echo form_error('address') ?></td>
						<td><input type="text" class="form-control" name="address" id="address" placeholder="Address" value="<?php echo $address; ?>" /></td>
					</tr>

					<tr>
						<td width='200'>Provinsi</td>
						<td><select class="form-control" name="id_provinces" id="id_provinces">
								<option disabled selected>-Pilih Provinsi-</option>

							</select></td>

					</tr>
					<tr>
						<td width='200'>Kabupaten</td>
						<td><select class="form-control" name="id_regencies" id="id_regencies">
								<option disabled selected>-Pilih Kebupaten-</option>
							</select></td>
					</tr>
					<tr>
						<td width='200'>Kecamatan</td>
						<td><select class="form-control" name="id_districts" id="id_districts">
								<option disabled selected>-Pilih Kecamatan-</option>
							</select></td>

					</tr>

					<tr>
						<td width='200'>Desa</td>
						<td><select class="form-control" name="id_villages" id="id_villages">
								<option disabled selected>-Pilih Desa-</option>
							</select></td>
					</tr>
					<tr>
						<td width='200'>Kontak <?php echo form_error('contact') ?></td>
						<td><input type="text" class="form-control" name="contact" id="contact" placeholder="Contact" value="<?php echo $contact; ?>" /></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="hidden" name="id1" value="<?php echo $id1; ?>" />
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
							<a href="<?php echo site_url('satland_owner') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
				</table>
			</form>
		</div>
</div>
</div>
