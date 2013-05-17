<div class="formCategory">
	<?php echo form_open(''); ?>			
			<dl>
				<dt><?php echo form_label('Username'); ?></dt>
				<dd><?php echo form_input('username',set_value('username',$user->username)); ?></dd>
				
				<dt><?php echo form_label('Password'); ?></dt>
				<dd><?php echo form_password('password'); ?></dd>
				
				<dt><?php echo form_label('Email'); ?></dt>
				<dd><?php echo form_input('email',set_value('username',$user->email)); ?></dd>

				<dt><?php echo form_label('Admin'); ?></dt>
				<dd><?php echo form_checkbox('admin',1,($user->admin==1 ? true : false));?></dd>
			</dl>
			<?php echo form_hidden('id',$user->id); ?>
		<?php echo form_submit('','Submit');?>
	<?php echo form_close(); ?>
	<?php echo validation_errors(); ?>
</div>