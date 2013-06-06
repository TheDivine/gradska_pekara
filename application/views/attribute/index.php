<div class="page-header">
  <h4>Attributes</h4>
</div>
<div class="row-fluid">
    <?php echo uif::linkInsertButton('attribute/create'); ?>
    <?php echo uif::load('_flash'); ?>
</div>
<hr>
<table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th>NameMK</th>
        <th>NameSR</th>
        <th>NameEN</th>
        <th>&nbsp;</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($attributes as $row):?>
    	  <tr>
    	    <td><?php echo $row->name_mk;?></td>
    	    <td><?php echo $row->name_sr;?></td>
    	    <td><?php echo $row->name_en;?></td>
          <td><?php echo uif::actionGroup('attribute',$row->id); ?></td>
    	  </tr>
      <?php endforeach; ?>
    </tbody>
</table>