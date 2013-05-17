<div class="page-header">
  <h4>Partners</h4>
</div>
<?php echo uif::linkInsertButton('partner/create'); ?>
<hr/>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>Company</th>
            <th>City</th>
            <th>WWW</th>
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