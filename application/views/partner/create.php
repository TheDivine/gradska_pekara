<div class="page-header">
  <h4>New Partner</h4>
</div>
	<?php echo form_open('','class="form-horizontal"'); ?>			
		<?php echo uif::submitButton()?>
	<hr>
<div class="row-fluid">
	<div class="span4">
			<?php echo uif::load('_validation'); ?>
			<?php echo uif::controlGroup('text','Company','company')?>
			<?php echo uif::controlGroup('text','City','city')?>
			<?php echo uif::controlGroup('text','WWW','web')?>
			<?php echo uif::controlGroup('text','Phone','phone')?>
		<?php echo form_close(); ?>
	</div>
</div>