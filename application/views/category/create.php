<div class="formCategory">
	<?php echo form_open_multipart(); ?>			
			<dl>
				<dt><?php echo form_label('Permalink'); ?></dt>
				<dd><?php echo form_input('permalink',set_value('permalink')); ?></dd>
				<dt><?php echo form_label('Image'); ?></dt>
				<dd><?php echo form_upload('userfile'); ?></dd>
			
				<dt><?php echo form_label('Name MK'); ?></dt>
				<dd><?php echo form_input('name_mk',set_value('name_mk')); ?></dd>
				<dt><?php echo form_label('Description MK'); ?></dt>
				<dd><?php echo form_textarea('desc_mk',set_value('desc_mk')); ?></dd>
				
				<dt><?php echo form_label('Name SR'); ?></dt>
				<dd><?php echo form_input('name_sr',set_value('name_sr')); ?></dd>
				<dt><?php echo form_label('Description SR'); ?></dt>
				<dd><?php echo form_textarea('desc_sr',set_value('desc_sr')); ?></dd>
				
				<dt><?php echo form_label('Name EN'); ?></dt>
				<dd><?php echo form_input('name_en',set_value('name_en')); ?></dd>
				<dt><?php echo form_label('Description EN'); ?></dt>
				<dd><?php echo form_textarea('desc_en',set_value('desc_en')); ?></dd>
			</dl>
		<?php echo form_submit('','Submit');?>
	<?php echo form_close(); ?>
	<?php echo validation_errors(); ?>
</div>