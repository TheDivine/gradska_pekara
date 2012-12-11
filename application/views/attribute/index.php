<h2>Attributes</h2>
<div class="actions"><?php echo anchor('attribute/create','Add'); ?></div>
<hr/>
<table class="tablesorter" id="attributes">
<thead>
  <tr>
    <th>NameMK</th>
    <th>NameSR</th>
    <th>NameEN</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
  </tr>
</thead>
<tbody>
  <?php foreach($attributes as $row):?>
	  <tr>
	    <td><?php echo $row->name_mk;?></td>
	    <td><?php echo $row->name_sr;?></td>
	    <td><?php echo $row->name_en;?></td>
	    <td><?php echo anchor("attribute/edit/{$row->id}",'Edit'); ?></td>
	    <td><?php echo anchor("attribute/delete/{$row->id}",'Delete'); ?></td>
	  </tr>
  <?php endforeach; ?>
</tbody>
</table>

<script type="text/javascript">
$(function() 
    {
        $("#attributes").tablesorter();
    } 
); 
</script>