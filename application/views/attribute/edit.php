<div class="page-header">
  <h4>Edit Attribute</h4>
</div>
	<?php echo form_open('','class="form-horizontal"');?>			
		<?php echo uif::submitButton()?>
	<hr>
<div class="row-fluid">
	<div class="span4">
		<?php echo uif::load('_validation'); ?>
		<?php echo uif::controlGroup('text','Name MK', 'name_mk',$result); ?>			
		<?php echo uif::controlGroup('text','Name SR', 'name_sr',$result); ?>			
		<?php echo uif::controlGroup('text','Name EN', 'name_en',$result); ?>
		<?php echo form_hidden('id',$result->id); ?>
		<?php echo form_close(); ?>
	</div>
</div>