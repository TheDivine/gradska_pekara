<div class="grid_8" id="recipe_view">
	<div id="rcname"><?php echo $rcname->name; ?></div>
	<div id="social">
		<div style="clear:none; float:left; margin-right:5px;"><fb:like send="false" layout="button_count" width="250" show_faces="false"></fb:like></div>
		<div style="clear:none; float:left; margin-right:5px;"><a href="http://pinterest.com/pin/create/button/?url=<?php echo current_url();?>&media=<?php echo base_url().$recipe->img_thumb;?>&description=<?php echo $subt .' &raquo; '. $G_title;?>" class="pin-it-button" count-layout="none"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a></div>
		<div style="clear:none; float:left; "><a href="https://twitter.com/share" class="twitter-share-button" data-count="none" data-via="kumanovskikori" data-lang="en">Tweet</a></div>
	</div>
	<h1><?php echo $recipe->name;?></h1>
	<hr>
	<div id="date_added"><?php echo ($recipe->submitted_by) ? $recipe->submitted_by.' | '. $recipe->created : $recipe->created; ?></div>
	<hr>
	<div id="recipe_prep">
		<span class="prep_title">приготвуавње</span><br/><span class="prep"><?php echo $recipe->time_to_prepare; ?></span><br/>
		<span class="prep_title">порции</span><br/><span class="prep"><?php echo $recipe->num_servings;?></span>
	</div>
	<h3>Состојки</h3>
	<?php echo $recipe->ingredients; ?>
	<h3>Приготваувње</h3>
	<?php echo $recipe->instructions; ?>
	<br>
	<hr>
	<fb:comments href="<?php echo current_url(); ?>" width="620" num_posts="2"></fb:comments>
</div>

<div class="grid_4" id="recipe_info">
	
	<img src="<?php echo base_url($recipe->img_thumb);?>" alt="<?php echo $recipe->name; ?>">
	<?php echo $recipe->desc;?>

	<div id="recipe_icons">
		<?php if($recipe->vegeterian): ?>
			<p>Вегетаријански Рецепт</p>
		<?php endif; ?>
		<?php if($recipe->fasting): ?>
			<p>Посен Рецепт</p>
		<?php endif; ?>
	</div>

</div>