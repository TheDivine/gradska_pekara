<div class="page-header">
    <h4>Categories</h4>
</div>
<div class="row-fluid">
    <?php echo uif::linkInsertButton('category/create'); ?>
    <?php echo uif::load('_flash'); ?>
</div>
<hr>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>&nbsp;</th>
            <th>Name</th>
            <th>Status</th>
            <th>Order</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($categories as $row):?>
            <tr>
                <td><?php echo uif::viewIcon('category',$row->id); ?></td>
                <td><?php echo $row->name_mk;?></td>
                <td><?php echo ucfirst($row->status); ?></td>
                <td><?php echo $row->order; ?></td>
                <td><?php echo uif::actionGroup('category',$row->id); ?></td>
                <?php if($row->status == 'active'):?>
                    <td><?php echo uif::linkButton("category/deactivate/{$row->id}",'icon-remove','danger');?></td>
                <?php endif;?>
                <?php if($row->status == 'inactive'):?>
                    <td><?php echo uif::linkButton("category/activate/{$row->id}",'icon-ok','success');?>
                <?php endif;?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>