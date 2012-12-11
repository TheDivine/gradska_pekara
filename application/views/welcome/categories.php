<?php $lng = $this->session->userdata('lng');?>
<div id="categories">
    <?php foreach($categories as $row): ?>
        <div class="category">
                <div class="cat_thumb">
                    <a href="<?php echo base_url().'product/'.$row->permalink; ?>">
                        <img src="<?php echo base_url().$row->img_thumb; ?>" alt="<?php echo $row->permalink; ?>"/>
                    </a>
                </div>
                <div class="cat_link">
                    <?php 
                        $attribute = 'name_'.$lng;
                        echo anchor('product/'.$row->permalink,$row->$attribute); 
                    ?>
                </div>
        </div>
    <?php endforeach; ?>
</div>