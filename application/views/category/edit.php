<?php echo $this->load->view('includes/_tiny_mce', base_url(), true); ?>
<div class="page-header">
  <h4>Edit Category</h4>
</div>
	<?php echo form_open_multipart('','class="form-horizontal"'); ?>			
		<?php echo uif::submitButton()?>
	<hr>
<div class="row-fluid">
	<div class="span4">
			<?php echo uif::load('_validation'); ?>
			<?php echo uif::controlGroup('text','Permalink','permalink',$result)?>
			<?php echo uif::controlGroup('file','Image','userfile')?>
			<?php echo uif::controlGroup('text','Name MK','name_mk',$result)?>
			<?php echo uif::controlGroup('textarea','Description MK','desc_mk',$result)?>
			<?php echo uif::controlGroup('text','Name SR','name_sr',$result)?>
			<?php echo uif::controlGroup('textarea','Description SR','desc_sr',$result)?>
			<?php echo uif::controlGroup('text','Name EN','name_en',$result)?>
			<?php echo uif::controlGroup('textarea','Description EN','desc_en',$result)?>
			<?php echo form_hidden('id',$result->id); ?>
		<?php echo form_close(); ?>
	</div>
</div>