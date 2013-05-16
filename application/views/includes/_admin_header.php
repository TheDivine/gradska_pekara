<?php if($this->session->flashdata('message')):?>
<div class="flashMessages">
	<?php echo $this->session->flashdata('message'); ?>
</div>
<?php endif;?>

<li><?php echo anchor('/','Front Page'); ?></li>
<li><?php echo anchor('category','Categories'); ?></li>
<li><?php echo anchor('attribute','Attributes'); ?></li>
<li>
	<?php if($this->session->userdata('is_admin')): ?>
		<?php echo anchor('user','Users'); ?>
	<?php endif ?>
</li>
<li>
	<?php echo anchor('logout','Logout'); ?>
</li>