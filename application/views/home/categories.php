<div class="page-header">
    <h1>Производи</h1>
</div>
<ul class="thumbnails">
<?php foreach($categories as $row): ?>
    <li class="span4">
        <div class="thumbnail">
        <a href=<?php echo base_url("kategorija/{$row->permalink}")?>>
            <img src=<?php echo base_url($row->image);?> alt="<?php echo $row->permalink;?>"/>
            <div class="caption">
                <h5><?php echo $row->name_mk; ?></h5>
        </a>
                <p>Lorem ipsum dolor sit amet, quod architectre laboriosam consequuntur laudantium!</p>
            </div>
        </div>
    </li>
<?php endforeach; ?>
</ul>