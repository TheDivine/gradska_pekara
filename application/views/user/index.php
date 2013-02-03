<h2>Users</h2>
<div class="actions"><?php echo anchor('user/create','Add'); ?></div>
<hr/>
<table class="tablesorter" id="users">
<thead>
  <tr>
    <th>Username</th>
    <th>Email</th>
    <th>Admin</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
  </tr>
</thead>
<tbody>
  <?php foreach($users as $row):?>
	  <tr>
	    <td><?php echo $row->username;?></td>
	    <td><?php echo $row->email;?></td>
	    <td><?php echo $row->admin;?></td>
	    <td><?php echo anchor("user/edit/{$row->id}",'Edit'); ?></td>
	    <td><?php echo anchor("user/delete/{$row->id}",'Delete'); ?></td>
	  </tr>
  <?php endforeach; ?>
</tbody>
</table>

<script type="text/javascript">
$(function() 
    {
        $("#users").tablesorter();
    } 
); 
</script>