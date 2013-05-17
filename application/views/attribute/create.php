<div class="page-header">
  <h4>New Attribute</h4>
</div>
	<?php echo form_open('','class="form-horizontal"');?>			
		<?php echo uif::submitButton()?>
	<hr>
<div class="row-fluid">
	<div class="span4">
		<?php echo uif::load('_validation'); ?>
		<?php echo uif::controlGroup('text','Name MK', 'name_mk'); ?>			
		<?php echo uif::controlGroup('text','Name SR', 'name_sr'); ?>			
		<?php echo uif::controlGroup('text','Name EN', 'name_en'); ?>
		<?php echo form_close(); ?>
	</div>
</div>