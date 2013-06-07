<div class="page-header">
    <h4>Recipes</h4>
</div>
<div class="row-fluid">
    <?php echo uif::linkInsertButton('recipe/create'); ?>
    <?php echo uif::load('_flash'); ?>
</div>
<hr>
<table class="table table-hover table-bordered">
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