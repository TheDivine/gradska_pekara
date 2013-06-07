<div class="page-header">
  <h4>New User</h4>
</div>
	<?php echo form_open('','class="form-horizontal"');?>			
		<?php echo uif::submitButton()?>
	<hr>
<div class="row-fluid">
	<div class="span4">
		<?php echo uif::load('_validation'); ?>
		<?php echo uif::controlGroup('text','Username', 'username'); ?>			
		<?php echo uif::controlGroup('text','E-Mail', 'email'); ?>
		<?php echo uif::controlGroup('password','Password', 'password'); ?>			
		<?php echo uif::controlGroup('password','Confirm Password', 'passconf'); ?>			
		<?php echo uif::controlGroup('checkbox','Admin', 'admin',[1]); ?>
		<?php echo form_close(); ?>
	</div>
</div>