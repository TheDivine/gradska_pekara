<h2>Partners</h2>
<div class="actions"><?php echo anchor('partner/create','Add'); ?></div>
<hr/>
<table class="tablesorter" id="partners">
<thead>
  <tr>
    <th>Company</th>
    <th>City</th>
    <th>WWW</th>
    <th>Phone</th>
    <th>&nbsp;</th>
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
      <td><?php echo anchor("partner/edit/{$row->id}",'Edit'); ?></td>
      <td><?php echo anchor("partner/delete/{$row->id}",'Delete'); ?></td>
    </tr>
  <?php endforeach; ?>
</tbody>
</table>

<script type="text/javascript">
$(function() 
    { 
        $("#partners").tablesorter();
    } 
); 
</script>