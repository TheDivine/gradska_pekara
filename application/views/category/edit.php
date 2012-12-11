<div class="formCategory">
	<?php echo form_open_multipart('category/post_update'); ?>			
			<dl>
				<dt><?php echo form_label('Permalink'); ?></dt>
				<dd><?php echo form_input('permalink',set_value('permalink',$result->permalink)); ?></dd>
				<dt><?php echo form_label('Order'); ?></dt>
				<dd><?php echo form_input('order',set_value('order',$result->order)); ?></dd>
				<dt><?php echo form_label('Image'); ?></dt>
				<dd><?php echo form_upload('userfile'); ?></dd>
			
				<dt><?php echo form_label('Name MK'); ?></dt>
				<dd><?php echo form_input('name_mk',set_value('name_mk',$result->name_mk)); ?></dd>
				<dt><?php echo form_label('Description MK'); ?></dt>
				<dd><?php echo form_textarea('desc_mk',set_value('desc_mk',$result->desc_mk)); ?></dd>
				
				<dt><?php echo form_label('Name SR'); ?></dt>
				<dd><?php echo form_input('name_sr',set_value('name_sr',$result->name_sr)); ?></dd>
				<dt><?php echo form_label('Description SR'); ?></dt>
				<dd><?php echo form_textarea('desc_sr',set_value('desc_sr',$result->desc_sr)); ?></dd>
				
				<dt><?php echo form_label('Name EN'); ?></dt>
				<dd><?php echo form_input('name_en',set_value('name_en',$result->name_en)); ?></dd>
				<dt><?php echo form_label('Description EN'); ?></dt>
				<dd><?php echo form_textarea('desc_en',set_value('desc_en',$result->desc_en)); ?></dd>
			</dl>
		<?php echo form_hidden('id',set_value('id',$result->id)); ?>
		<?php echo form_submit('','Submit');?>
	<?php echo form_close(); ?>
	<?php echo validation_errors(); ?>
</div>