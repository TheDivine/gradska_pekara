<div class="page-header">
  <h4>Edit Product</h4>
</div>
	<?php echo form_open('','class="form-horizontal"'); ?>			
		<?php echo uif::submitButton()?>
	<hr>
<div class="row-fluid">
	<div class="span4">
		<?php echo uif::load('_validation'); ?>
		<?php echo uif::controlGroup('checkbox','Stock','stock',[1,$result]); ?>
		<?php echo uif::controlGroup('text','Order','order',$result); ?>
		<?php echo uif::controlGroup('text','Val1','val1',$result); ?>
		<?php echo uif::controlGroup('text','Val2','val2',$result); ?>
		<?php echo uif::controlGroup('text','Val3','val3',$result); ?>
		<?php echo uif::controlGroup('text','Val4','val4',$result); ?>
		<?php echo uif::controlGroup('text','Val5','val5',$result); ?>
		<?php echo uif::controlGroup('text','Val6','val6',$result); ?>
		<?php echo uif::controlGroup('text','Val7','val7',$result); ?>
		<?php echo uif::controlGroup('text','Val8','val8',$result); ?>
		<?php echo form_hidden('id',$result->id); ?>
	<?php echo form_close(); ?>
	</div>
</div>