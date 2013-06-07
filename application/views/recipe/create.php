<?php echo $this->load->view('includes/_tiny_mce', base_url(), true); ?>
<div class="formCategory">
	<?php echo form_open_multipart(); ?>			
			<dl>
				<dt><?php echo form_label('Permalink'); ?></dt>
				<dd><?php echo form_input('permalink',set_value('permalink')); ?></dd>
				<dt><?php echo form_label('Image'); ?></dt>
				<dd><?php echo form_upload('userfile'); ?></dd>

				<dt><?php echo form_label('Type'); ?></dt>
				<dd><?php echo form_dropdown('type',array('savory'=>'Savory','sweet'=>'Sweet','neutral'=>'Neutral'),set_value('type')); ?></dd>

				<dt><?php echo form_label('Category'); ?></dt>
				<dd><?php echo form_dropdown('r_category_id',$r_categories,set_value('r_category_id')); ?></dd>
			
				<dt><?php echo form_label('Name'); ?></dt>
				<dd><?php echo form_input('name',set_value('name')); ?></dd>
				<dt><?php echo form_label('Description'); ?></dt>
				<dd><?php echo form_textarea('desc',set_value('desc')); ?></dd>

				<dt><?php echo form_label('Time to prepare'); ?></dt>
				<dd><?php echo form_input('time_to_prepare',set_value('time_to_prepare')); ?></dd>
				<dt><?php echo form_label('Servings'); ?></dt>
				<dd><?php echo form_input('num_servings',set_value('num_servings')); ?></dd>

				<dt><?php echo form_label('Ingredients'); ?></dt>
				<dd><?php echo form_textarea('ingredients',set_value('ingredients')); ?></dd>

				<dt><?php echo form_label('Instructions'); ?></dt>
				<dd><?php echo form_textarea('instructions',set_value('instructions')); ?></dd>

				<dt><?php echo form_label('Vegeterian'); ?></dt>
				<dd><?php echo form_checkbox('vegeterian','1');?></dd>
				<dt><?php echo form_label('Fasting'); ?></dt>
				<dd><?php echo form_checkbox('fasting','1');?></dd>

				<dt><?php echo form_label('Submitted by'); ?></dt>
				<dd><?php echo form_input('submitted_by',set_value('submitted_by')); ?></dd>
			</dl>
		<?php echo form_submit('','Submit');?>
	<?php echo form_close(); ?>
	<?php echo validation_errors(); ?>
</div>