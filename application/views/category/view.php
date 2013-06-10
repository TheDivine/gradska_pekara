<div class="row-fluid">
    <div class="span4">
        <div class="row-fluid">
            <div class="span4">
                <div class="thumbnail">
                    <img src="<?php echo base_url($result->image); ?>" alt="">
                </div>
            </div>
            <div class="span8 well well-small">
                <dl class="dl-horizontal ">
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
            </div>
        </div>
        <h3>Attributes</h3>
        <hr>
        <?php echo form_open('category/post_bind_attribute'); ?>
            <dl class="dl-horizontal">
                <dt>Attribute</dt>
                <dd><?php echo uif::formElement('dropdown','','attribute_id',[$dd_attr],'class="input-xlarge"') ?></dd>
                <dt>&nbsp;</dt>
                <dd><?php echo uif::submitButton(); ?></dd>
            </dl>
            <?php echo form_hidden('category_id',$result->id); ?>
        <?php echo form_close(); ?> 
            
        <table class="table table-striped table-hover">
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
                        <button class="btn btn-info" onClick=moveUp(<?php echo $row->acid; ?>)><i class="icon-chevron-sign-up"></i></button>
                        <button class="btn btn-info" onClick=moveDown(<?php echo $row->acid; ?>)><i class="icon-chevron-sign-down"></i></button>
                    </td>
                    <td>
                        <?php echo uif::linkButton("category/delete_attribute/{$row->acid}",'icon-trash','danger confirm-delete'); ?>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>

    <div class="span8">
        <h3>New Products</h3>
        <hr>
        <?php echo form_open('product/post_create'); ?>
        <dl class="dl-horizontal">
            <?php $i = 1; ?>
             <?php foreach($attributes as $row):?>
                <dt><?php echo $row->name_mk; ?></dt>
                <dd><?php echo form_input('val'.$i); ?></dd>
                <?php $i++; ?>
            <?php endforeach;?>
            <dt>&nbsp;</dt>
            <dd><?php echo uif::submitButton();?></dd>
        </dl>
            <?php echo form_hidden('category_id',$result->id); ?>
        <?php echo form_close(); ?>
        <h3>Products</h3>
        <hr>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                <?php foreach($attributes as $row):?>
                    <th><?php echo $row->name_mk; ?></th>
                <?php endforeach;?>
                    <th>Stock</th>
                    <th>Order</th>
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
                        <td>
                            <?php echo uif::linkButton("product/edit/{$row->id}",'icon-pencil','warning'); ?>
                            <?php echo uif::linkButton("product/post_delete/{$row->id}",'icon-trash','danger confirm-delete'); ?>
                        </td>
                    </tr>
                <?php endforeach;?> 
            </tbody>
        </table>
    </div>
</div>