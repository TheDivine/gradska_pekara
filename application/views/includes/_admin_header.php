<?php if($this->session->flashdata('message')):?>
<div class="flashMessages">
	<?php echo $this->session->flashdata('message'); ?>
</div>
<?php endif;?>

<div class="headerActions">
	<?php echo anchor('/','Front Page'); ?> |
	<?php echo anchor('dashboard','Dashboard'); ?> |
	<?php echo anchor('partner','Partners'); ?> |
	<?php echo anchor('attribute','Attributes'); ?> |
	<?php echo anchor('logout','Logout'); ?>
</div>