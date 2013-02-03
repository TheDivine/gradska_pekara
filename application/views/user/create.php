<div class="formCategory">
	<?php echo form_open(); ?>			
			<dl>
				<dt><?php echo form_label('Username'); ?></dt>
				<dd><?php echo form_input('username'); ?></dd>
				
				<dt><?php echo form_label('Password'); ?></dt>
				<dd><?php echo form_password('password'); ?></dd>
				
				<dt><?php echo form_label('Email'); ?></dt>
				<dd><?php echo form_input('email'); ?></dd>

				<dt><?php echo form_label('Admin'); ?></dt>
				<dd><?php echo form_checkbox('admin','1'); ?></dd>
			</dl>
		<?php echo form_submit('','Submit');?>
	<?php echo form_close(); ?>
	<?php echo validation_errors(); ?>
</div>