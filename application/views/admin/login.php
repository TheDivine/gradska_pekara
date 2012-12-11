<div id="adminLogin">
	<h4>Enter your credentials to access FortisPMS</h4>
	<hr/>
	<?php echo form_open('admin/login'); ?>
		<p><?php echo form_label('Username','username');?></p>
		<p><?php echo form_input('username','',"id='username'"); ?></p>
		<p><?php echo form_label('Password','password');?></p>
		<p><?php echo form_password('password','',"id='password'"); ?></p>
		<p><?php echo form_submit('','Login'); ?>
	<?php echo form_close(); ?>
</div>
