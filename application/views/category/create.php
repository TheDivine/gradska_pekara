<?php echo $this->load->view('includes/_tiny_mce', base_url(), true); ?>
<div class="page-header">
  <h4>New Category</h4>
</div>
	<?php echo form_open_multipart('','class="form-horizontal"'); ?>			
		<?php echo uif::submitButton()?>
	<hr>
<div class="row-fluid">
	<div class="span4">
			<?php echo uif::load('_validation'); ?>
			<?php echo uif::controlGroup('text','Permalink','permalink')?>
			<?php echo uif::controlGroup('file','Image','userfile')?>
			<?php echo uif::controlGroup('text','Name MK','name_mk')?>
			<?php echo uif::controlGroup('textarea','Description MK','desc_mk')?>
			<?php echo uif::controlGroup('text','Name SR','name_sr')?>
			<?php echo uif::controlGroup('textarea','Description SR','desc_sr')?>
			<?php echo uif::controlGroup('text','Name EN','name_en')?>
			<?php echo uif::controlGroup('textarea','Description EN','desc_en')?>
		<?php echo form_close(); ?>
	</div>
</div>