<div class="content-wrapper">
	<h2 style="margin-top:0px">Public_user Read</h2>
	<table class="table">
		<tr>
			<td>NIK</td>
			<td><?php echo $NIK; ?></td>
		</tr>
		<tr>
			<td>Name</td>
			<td><?php echo $name; ?></td>
		</tr>
		<tr>
			<td>Address</td>
			<td><?php echo $address; ?></td>
		</tr>
		<tr>
			<td>Phone</td>
			<td><?php echo $phone; ?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><?php echo $email; ?></td>
		</tr>
		<tr>
			<td>Createdate</td>
			<td><?php echo $createdate; ?></td>
		</tr>
		<tr>
			<td>Aprove</td>
			<td><?php echo $aprove; ?></td>
		</tr>
		<tr>
			<td>Id Villages</td>
			<td><?php echo $id_villages; ?></td>
		</tr>
		<tr>
			<td></td>
			<td><a href="<?php echo site_url('public_user') ?>" class="btn btn-default">Cancel</a></td>
		</tr>
	</table>
</div>