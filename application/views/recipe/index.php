<div class="page-header">
    <h4>Recipes</h4>
</div>
<div class="row-fluid">
    <?php echo uif::linkInsertButton('recipe/create'); ?>
    <?php echo uif::load('_flash'); ?>
</div>
<hr>
<?php if(isset($recipes) AND count($recipes)): ?>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Title</th>
            <th>Short Description</th>
            <th>Type</th>
            <th>Published</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($recipes as $row):?>
        <tr>
            <td><?php echo $row->name;?></td>
            <td><?php echo $row->desc;?></td>
            <td><?php echo ucfirst($row->type);?></td>
            <td><?php echo ($row->published) ? '<i class="icon-ok"></i>' : '-' ;?></td>
            <td><?php echo uif::actionGroup('recipe',$row->id); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
    <?php uif::load('_no_records'); ?>
<?php endif; ?>