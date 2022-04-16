<div class="content-wrapper">

	<section class="content">
		<div class="box box-primary box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">INPUT DATA USER_DINAS</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">

				<table class='table table-bordered>'>
					<tr>
						<td width='200'>NIK <?php echo form_error('NIK') ?></td>
						<td><input type="text" class="form-control" name="NIK" id="NIK" placeholder="NIK" value="<?php echo $NIK; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Nama <?php echo form_error('name') ?></td>
						<td><input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Alamat <?php echo form_error('adress') ?></td>
						<td><input type="text" class="form-control" name="adress" id="adress" placeholder="Adress" value="<?php echo $adress; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Nomor HP <?php echo form_error('phone') ?></td>
						<td><input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Email <?php echo form_error('email') ?></td>
						<td><input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Dibuat Tanggal <?php echo form_error('create_date') ?></td>
						<td><input type="date" class="form-control" name="create_date" id="create_date" placeholder="Create Date" value="<?php echo $create_date; ?>" /></td>
					</tr>
					<tr>
						<td width='200'>Disetujui <?php echo form_error('Disetujui') ?></td>
						<td><input type="text" class="form-control" name="aprove" id="aprove" placeholder="Aprove" value="<?php echo $aprove; ?>" /></td>
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
								<option disabled selected>-Pilih Kabupaten-</option>
							</select></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="hidden" name="id1" value="<?php echo $id1; ?>" />
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
							<a href="<?php echo site_url('user_dinas') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i>Kembali</a>
						</td>
					</tr>
				</table>
			</form>
		</div>
</div>
</div>