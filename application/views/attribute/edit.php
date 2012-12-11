<div class="formCategory">
	<?php echo form_open('attribute/post_update'); ?>			
			<dl>
				<dt><?php echo form_label('Name MK'); ?></dt>
				<dd><?php echo form_input('name_mk',set_value('name_mk',$result->name_mk)); ?></dd>
				
				<dt><?php echo form_label('Name SR'); ?></dt>
				<dd><?php echo form_input('name_sr',set_value('name_sr',$result->name_sr)); ?></dd>
				
				<dt><?php echo form_label('Name EN'); ?></dt>
				<dd><?php echo form_input('name_en',set_value('name_en',$result->name_en)); ?></dd>
			</dl>
			<?php echo form_hidden('id',$result->id); ?>
		<?php echo form_submit('','Save');?>
	<?php echo form_close(); ?>
	<?php echo validation_errors(); ?>
</div>