<div class="wrap">
	<h1>Bishan Plugin</h1>
	<?php settings_errors(); ?>

	<form method="post" action="options.php">
		<?php 
			settings_fields( 'bishan_options_group' );
			do_settings_sections( 'bishan_plugin' );
			submit_button();
		?>
	</form>
</div>