<div class="page-header">
  <h4>Edit User</h4>
</div>
	<?php echo form_open('','class="form-horizontal"');?>			
		<?php echo uif::submitButton()?>
	<hr>
<div class="row-fluid">
	<div class="span4">
		<?php echo uif::load('_validation'); ?>
		<?php echo uif::controlGroup('text','Username', 'username',$user); ?>			
		<?php echo uif::controlGroup('text','E-Mail', 'email',$user); ?>
		<?php echo uif::controlGroup('password','New Password', 'password'); ?>	
		<?php echo uif::controlGroup('password','Confirm New Password', 'passconf'); ?>					
		<?php echo uif::controlGroup('checkbox','Admin', 'admin',[1,$user]); ?>
		<?php echo form_hidden('id',$user->id); ?>
		<?php echo form_close(); ?>
	</div>
</div>