<?php if($this->session->flashdata('message')):?>
<div class="flashMessages">
	<?php echo $this->session->flashdata('message'); ?>
</div>
<?php endif;?>

<div class="headerActions">
	<strong><?php echo anchor('/','Front Page'); ?></strong> |
	<?php echo anchor('dashboard','Dashboard'); ?> |
	<?php echo anchor('partner','Partners'); ?> |
	<?php echo anchor('attribute','Attributes'); ?> |
	<?php if($this->session->userdata('is_admin')): ?>
		<?php echo anchor('user','Users'); ?> |	
	<?php endif ?>
	<?php echo anchor('logout','Logout'); ?>
</div>