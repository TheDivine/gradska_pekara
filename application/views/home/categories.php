<div id="categories">
    <?php foreach($categories as $row): ?>
        <div class="category">
                <div class="cat_thumb">
                    <a href="<?php echo base_url('prod/'.$row->permalink); ?>">
                        <img src="<?php echo base_url($row->img_thumb); ?>" alt="<?php echo $row->permalink; ?>"/>
                    </a>
                </div>
                <div class="cat_link">
                    <?php echo anchor('prod/'.$row->permalink,$row->name_mk); ?>
                </div>
        </div>
    <?php endforeach; ?>
</div>