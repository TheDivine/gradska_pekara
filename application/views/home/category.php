<div class="row-fluid">
	<div class="span4">
		<div class="thumbnail">
			<?php if (strpos($category->image, 'http') === 0) : ?>
    			<img src="<?php echo $category->image;?>" alt="">
			<?php else:?>
				<img src="<?php echo base_url($category->image);?>" alt="">
			<?php endif;?>
		</div>
		<hr>
		<ul id="cat-thumbs">
		<?php foreach ($categories as $cat): ?>
			<?php 
				$active = ''; 

				if($cat->permalink == $category->permalink)
				{
				 	$active = 'active'; 
				}
			?>
			<li class="span4 text-center <?php echo $active; ?>">
				<?php if (strpos($cat->img_thumb, 'http') === 0) : ?>
	    			<a class="thumbnail <?php echo $active; ?>" href="<?php echo $cat->permalink;?>"><img src="<?php echo $cat->img_thumb;?>" alt="">
				<?php else:?>
					<a class="thumbnail <?php echo $active; ?>" href="<?php echo $cat->permalink;?>"><img src="<?php echo base_url($cat->img_thumb);?>" alt=""></a>
				<?php endif;?>
				<small class="muted"><?php echo $cat->name_mk;?></small>
			</li>
		<?php endforeach ?>
		</ul>
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