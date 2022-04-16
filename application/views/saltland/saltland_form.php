<div class="content-wrapper">

	<section class="content">
		<div class="box box-primary box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">INPUT DATA SALTLAND</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">

				<table class='table table-bordered>'>
					<tr>
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
							<td width='200'>Lat <?php echo form_error('lat') ?></td>
							<td><input type="text" class="form-control" name="lat" id="lat" placeholder="Lat" value="<?php echo $lat; ?>" /></td>
						</tr>
						<tr>
							<td width='200'>Lng <?php echo form_error('lng') ?></td>
							<td><input type="text" class="form-control" name="lng" id="lng" placeholder="Lng" value="<?php echo $lng; ?>" /></td>
						</tr>
						<tr>
							<td width='200'>Idmap <?php echo form_error('idmap') ?></td>
							<td><input type="text" class="form-control" name="idmap" id="idmap" placeholder="Idmap" value="<?php echo $idmap; ?>" /></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="hidden" name="id1" value="<?php echo $id1; ?>" />
								<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
								<a href="<?php echo site_url('saltland') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>