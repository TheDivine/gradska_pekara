<div class="formCategory">
	<?php echo form_open(); ?>			
			<dl>
				<dt><?php echo form_label('Company'); ?></dt>
				<dd><?php echo form_input('company',set_value('company')); ?></dd>

			
				<dt><?php echo form_label('City'); ?></dt>
				<dd><?php echo form_input('city',set_value('city')); ?></dd>

				
				<dt><?php echo form_label('WWW'); ?></dt>
				<dd><?php echo form_input('web',set_value('web')); ?></dd>

				
				<dt><?php echo form_label('Phone'); ?></dt>
				<dd><?php echo form_input('phone',set_value('phone')); ?></dd>
			</dl>
		<?php echo form_submit('','Submit');?>
	<?php echo form_close(); ?>
	<?php echo validation_errors(); ?>
</div>