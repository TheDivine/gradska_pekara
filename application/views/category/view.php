<div class="row-fluid">
	<div class="span4">
		<dl class="dl-horizontal well well-small">
			<dt>Live View</dt>
			<dd><?php echo anchor("categories/{$result->permalink}",'Link'); ?></dd>
			<dt>Permalink</dt>
			<dd><?php echo $result->permalink; ?></dd>
			<dt>Name EN</dt>
			<dd><?php echo $result->name_mk; ?></dd>
			<dt>Status</dt>
			<dd><?php echo $result->status; ?></dd>
			<dt>Edit</dt>
			<dd><?php echo anchor("category/edit/{$result->id}",'Edit'); ?></dd>
		</dl>
		<div>
			<?php echo form_open('category/post_bind_attribute'); ?>
    			<?php echo form_dropdown('attribute_id',$dd_attr); ?></td>
    			<?php echo form_submit('','Insert'); ?></td>
    			<?php echo form_hidden('category_id',$result->id); ?>
			<?php echo form_close(); ?>
		</div>
	<table class="table table-bordered table-hover">
		<thead>
		<tr>
			<th>Name</th>
			<th>Order</th>
			<th>Move</th>
			<th>&nbsp;</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach($attributes as $row):?>
		<tr>
    		<td><?php echo $row->name_mk; ?></td>
    		<td><?php echo ($row->order) ? $row->order : '-' ; ?></td>
    		<td>
    			<?php $link = base_url().'category/ajx_moveUp'; ?>
    			<?php echo form_button('','Up',"onClick=moveUp({$row->acid},'{$link}')"); ?>
    			<?php $link = base_url().'category/ajx_moveDown'; ?>
    			<?php echo form_button('','Down',"onClick=moveDown({$row->acid},'{$link}')"); ?>
    		</td>
    		<td>
    			<?php echo anchor("category/delete_attribute/{$row->acid}",'Delete')?>
    		</td>
    	</tr>
    	<?php endforeach;?>
    	</tbody>
	</table>
	</div>
	<div class="span8">
		<table class="table">
	<thead>
    		<tr>
    		<?php foreach($attributes as $row):?>
    			<th><?php echo $row->name_mk; ?></th>
    		<?php endforeach;?>
    			<th>&nbsp;</th>
    		</tr>
    </thead>
    <tbody>	
    	<tr>
    		<?php echo form_open('product/post_create'); ?>
    		<?php for($i = 1; $i <= $attr_count; $i++):?>
		    	<?php $value = 'val'.$i;?>	  
		    	<td><?php echo form_input($value); ?></td>
			<?php endfor;?>
				<td><?php echo uif::submitButton();?></td>
				<?php echo form_hidden('category_id',$result->id); ?>
			<?php echo form_close(); ?>
		</tr>
    </tbody>
	</table>
		    		
	<table class="table table-bordered table-hover">
    	<thead>
    		<tr>
    		<?php foreach($attributes as $row):?>
    			<th><?php echo $row->name_mk; ?></th>
    		<?php endforeach;?>
    			<th>Stock</th>
    			<th>Order</th>
    			<th>&nbsp;</th>
    			<th>&nbsp;</th>
    		</tr>
    	</thead>
    	<tbody>	
    		<?php foreach($products as $row):?>
    			<tr>
		    		<?php for($i = 1; $i <= $attr_count; $i++):?>
		    			<?php $value = 'val'.$i;?>	    			
	    				<td><?php echo $row->$value; ?></td>
		    		<?php endfor;?>
		    		<td><?php echo $row->stock; ?></td>
		    		<td><?php echo $row->order; ?></td>
		    		<td><?php echo anchor("product/edit/{$row->id}",'Edit')?></td>
		    		<td><?php echo anchor("product/post_delete/{$row->id}",'Delete')?></td>
		    	</tr>
    		<?php endforeach;?>	
    	</tbody>
    </table>
	</div>
</div>
<div class="left_pane">
	
	
</div>

<div id="categoryProducts" class="right_pane">
	
</div>