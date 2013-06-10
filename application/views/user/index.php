<div class="page-header">
  <h4>Users</h4>
</div>
<div class="row-fluid">
    <?php echo uif::linkInsertButton('user/create'); ?>
    <?php echo uif::load('_flash'); ?>
</div>
<hr>
<?php if(isset($users) AND count($users)): ?>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Admin</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $row):?>
            <tr>
                <td><?php echo $row->username;?></td>
                <td><?php echo $row->email;?></td>
                <td><?php echo ($row->admin) ? '<i class="icon-ok"></i>' : '-' ;?></td>
                <td><?php echo uif::actionGroup('user',$row->id); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
    <?php uif::load('_no_records'); ?>
<?php endif; ?>