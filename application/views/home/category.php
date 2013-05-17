<div class="row-fluid">
	<div class="span4">
		<div class="thumbnail">
			<img src="<?php echo base_url($category->image);?>" alt="">
		</div>
	</div>
	<div class="span8">
		<h3><?php echo $category->name_mk; ?></h3>
		<hr/>
		<p><?php echo $category->desc_mk; ?></p>
		<?php if (count($products)): ?>
			<table class="table">
			<thead>
				<tr>
					<?php foreach($attributes as $row):?>
						<th><?php echo $row->name_mk; ?></th>
					<?php endforeach;?>
				</tr>
			</thead>
			<tbody> 
				<?php foreach($products as $row):?>
				<tr>
					<?php for($i = 1; $i <= $attr_count; $i++):?>
						<?php $value = 'val'.$i;?>            
						<td><?php echo $row->$value; ?></td>
					<?php endfor;?>
				</tr>
				<?php endforeach;?> 
			</tbody>
			</table>
		<?php endif ?>
		</div>
</div>