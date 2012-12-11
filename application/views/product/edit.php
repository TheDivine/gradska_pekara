<div class="formCategory">
	<?php echo form_open('product/post_update'); ?>			
			<dl>
				<dt><?php echo form_label('Stock'); ?></dt>
				<dd><?php echo form_checkbox('stock','1',($result->stock==1 ? true : false));?></dd>
				<dt><?php echo form_label('Order'); ?></dt>
				<dd><?php echo form_input('order',set_value('order',$result->order)); ?></dd>
				<dt><?php echo form_label('Val1'); ?></dt>
				<dd><?php echo form_input('val1',set_value('val1',$result->val1)); ?></dd>
				<dt><?php echo form_label('Val2'); ?></dt>
				<dd><?php echo form_input('val2',set_value('val2',$result->val2)); ?></dd>
				<dt><?php echo form_label('Val3'); ?></dt>
				<dd><?php echo form_input('val3',set_value('val3',$result->val3)); ?></dd>
				<dt><?php echo form_label('Val4'); ?></dt>
				<dd><?php echo form_input('val4',set_value('val4',$result->val4)); ?></dd>
				<dt><?php echo form_label('Val5'); ?></dt>
				<dd><?php echo form_input('val5',set_value('val5',$result->val5)); ?></dd>
				<dt><?php echo form_label('Val6'); ?></dt>
				<dd><?php echo form_input('val6',set_value('val6',$result->val6)); ?></dd>
				<dt><?php echo form_label('Val7'); ?></dt>
				<dd><?php echo form_input('val7',set_value('val7',$result->val7)); ?></dd>
				<dt><?php echo form_label('Val8'); ?></dt>
				<dd><?php echo form_input('val8',set_value('val8',$result->val8)); ?></dd>
			</dl>
			<?php echo form_hidden('id',$result->id); ?>
		<?php echo form_submit('','Save');?>
	<?php echo form_close(); ?>
	<?php echo validation_errors(); ?>
</div>