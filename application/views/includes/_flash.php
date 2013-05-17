<?php if($this->session->flashdata('message')):?>
	<div class="alert">
		<?php echo $this->session->flashdata('message'); ?>
	</div>
<?php endif;?>