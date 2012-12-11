<?php $lng = $this->session->userdata('lng');?>
<sidebar>
   <?php $name = 'name_'.$lng; ?>
   <ul>  
       <?php foreach($categories as $row): ?>
            <?php if($this->uri->segment(2) != $row->permalink): ?>
                <li><?php echo anchor('product/'.$row->permalink,$row->$name); ?></li>
            <?php else: ?>
                 <li class="active_cat"><?php echo $row->$name;?></li>
            <?php endif; ?>
       <?php endforeach; ?>
   </ul>
</sidebar>

    <div id="category_details_img">
        <img src="<?php echo base_url().$category->image; ?>"/>
    </div>
    <div id="category_details_desc">
            <div class="fb_box">
              <div class="fb-like" data-href="<?php echo current_url(); ?>" data-send="false" data-layout="button_count" data-width="250" data-show-faces="false" data-font="verdana"></div>
            </div>
            <h3><?php echo $category->$name; ?></h3>
            <hr/>
            <p>
               <?php $desc = 'desc_'.$lng; echo $category->$desc; ?>
            </p>
    </div>

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