<div class="page-header">
	<h4>Edit Partner</h4>
</div>
	<?php echo form_open('','class="form-horizontal"'); ?>			
		<?php echo uif::submitButton()?>
	<hr>
<div class="row-fluid">
	<div class="span4">
			<?php echo uif::load('_validation'); ?>
			<?php echo uif::controlGroup('text','Company','company',$result)?>
			<?php echo uif::controlGroup('text','City','city',$result)?>
			<?php echo uif::controlGroup('text','WWW','web',$result)?>
			<?php echo uif::controlGroup('text','Phone','phone',$result)?>
			<?php echo form_hidden('id',$result->id); ?>
		<?php echo form_close(); ?>
	</div>
</div>
</div>