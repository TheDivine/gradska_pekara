<?php if($this->session->flashdata('message')):?>
	<div class="alert alert-info" id="cpms-alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<i class="icon-info-sign"></i>	<?php echo $this->session->flashdata('message'); ?>
	</div>
<?php endif;?>