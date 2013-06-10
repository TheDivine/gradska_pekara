<div class="page-header">
  <h4>Partners</h4>
</div>
<div class="row-fluid">
    <?php echo uif::linkInsertButton('partner/create'); ?>
    <?php echo uif::load('_flash'); ?>
</div>
<hr>
<?php if(isset($partners) AND count($partners)): ?>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Company</th>
            <th>City</th>
            <th>Web Site</th>
            <th>Phone</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($partners as $row):?>
            <tr>
                <td><?php echo $row->company;?></td>
                <td><?php echo $row->city;?></td>
                <td><?php echo $row->web;?></td>
                <td><?php echo $row->phone;?></td>
                <td><?php echo uif::actionGroup('partner',$row->id); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
    <?php uif::load('_no_records'); ?>
<?php endif; ?>