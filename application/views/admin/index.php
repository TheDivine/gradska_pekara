<h2>Categories</h2>
<div class="actions"><?php echo anchor('category/create','Add'); ?></div>
<hr/>
<table class="tablesorter" id="categories">
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
	  	<td><?php echo anchor("category/view/{$row->id}",'View'); ?></td>
	    <td><?php echo $row->name_mk;?></td>
	    <td><?php echo $row->status; ?></td>
      <td><?php echo $row->order; ?></td>
	    <td><?php echo anchor("category/edit/{$row->id}",'Edit'); ?></td>
	    <?php if($row->status == 'active'):?>
	   		<td><?php echo anchor("category/deactivate/{$row->id}",'Deactivate'); ?></td>
	    <?php endif;?>
	     <?php if($row->status == 'inactive'):?>
	   		<td><?php echo anchor("category/activate/{$row->id}",'Activate'); ?></td>
	    <?php endif;?>
	    
	  </tr>
  <?php endforeach; ?>
</tbody>
</table>

<script type="text/javascript">
$(function() 
    { 
        $("#categories").tablesorter();
    } 
); 
</script>


