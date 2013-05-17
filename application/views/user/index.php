<div class="page-header">
  <h4>Users</h4>
</div>
<?php echo uif::linkInsertButton('user/create'); ?>
<hr>
<table class="table table-hover table-bordered">
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
                    <td><?php echo $row->admin;?></td>
                    <td><?php echo uif::actionGroup('user',$row->id); ?></td>
                </tr>
            <?php endforeach; ?>
    </tbody>
</table>