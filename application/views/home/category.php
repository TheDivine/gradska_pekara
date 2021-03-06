<?php $name = 'name_mk'; ?>
<sidebar>
	<ul>  
		<?php foreach($categories as $row): ?>
			<?php if($this->uri->segment(2) != $row->permalink): ?>
				<li><?php echo anchor('prod/'.$row->permalink,$row->$name); ?></li>
			<?php else: ?>
				<li class="active_cat"><?php echo $row->$name;?></li>
			<?php endif; ?>
		<?php endforeach; ?>
	</ul>
</sidebar>

<div id="category_details_img">
	<img src="<?php echo base_url($category->image); ?>"/>
</div>

<div id="category_details_desc">
	<div id="social">
		<div style="clear:none; float:left; margin-right:5px;"><fb:like send="false" layout="button_count" width="450" show_faces="false"></fb:like></div>
		<div style="clear:none; float:left; margin-right:5px;"><a href="http://pinterest.com/pin/create/button/?url=<?php echo current_url();?>&media=<?php echo base_url().$category->image;?>&description=<?php echo $subt .' &raquo; '. $G_title;?>" class="pin-it-button" count-layout="none"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a></div>
		<div style="clear:none; float:left; "><a href="https://twitter.com/share" class="twitter-share-button" data-count="none" data-via="gradskapekara" data-lang="en">Tweet</a></div>
	</div>
	<h3><?php echo $category->$name; ?></h3>
	<hr/>
	<p><?php echo $category->desc_mk; ?></p>
</div>
<?php if (count($products)): ?>
	<div id="product_details">
		<table id="tb_product_details">
		<thead>
			<tr>
				<?php foreach($attributes as $row):?>
					<th><?php echo $row->$name; ?></th>
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
	</div>
<?php endif ?>