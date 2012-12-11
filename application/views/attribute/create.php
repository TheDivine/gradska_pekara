<div class="formCategory">
	<?php echo form_open(); ?>			
			<dl>
				<dt><?php echo form_label('Name MK'); ?></dt>
				<dd><?php echo form_input('name_mk'); ?></dd>
				
				<dt><?php echo form_label('Name SR'); ?></dt>
				<dd><?php echo form_input('name_sr'); ?></dd>
				
				<dt><?php echo form_label('Name EN'); ?></dt>
				<dd><?php echo form_input('name_en'); ?></dd>
			</dl>
		<?php echo form_submit('','Submit');?>
	<?php echo form_close(); ?>
	<?php echo validation_errors(); ?>
</div>