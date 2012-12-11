<div class="formCategory">
	<?php echo form_open('partner/post_update'); ?>			
			<dl>
				<dt><?php echo form_label('Company'); ?></dt>
				<dd><?php echo form_input('company',set_value('company',$result->company)); ?></dd>

			
				<dt><?php echo form_label('City'); ?></dt>
				<dd><?php echo form_input('city',set_value('city',$result->city)); ?></dd>

				
				<dt><?php echo form_label('WWW'); ?></dt>
				<dd><?php echo form_input('web',set_value('web',$result->web)); ?></dd>

				
				<dt><?php echo form_label('Phone'); ?></dt>
				<dd><?php echo form_input('phone',set_value('phone',$result->phone)); ?></dd>
			</dl>
		<?php echo form_hidden('id',set_value('id',$result->id)); ?>
		<?php echo form_submit('','Submit');?>
	<?php echo form_close(); ?>
	<?php echo validation_errors(); ?>
</div>