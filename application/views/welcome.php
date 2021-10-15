<div class="content-wrapper">
	<section class="content">
		<?php echo alert('alert-info', 'Welcome', 
			'Welcome at main page');
		echo '<p>Level:'.
		$this->session->userdata('nama_level').
		'<br>Divisi:'.
		$this->session->userdata('kodedivisi').'</p>';
		?>

	</section>
</div>
