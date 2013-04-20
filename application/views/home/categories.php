<ul class="thumbnails">
<?php foreach($categories as $row): ?>
    <li class="span4">
        <a href=<?php echo base_url("kategorija/{$row->permalink}")?>>
        <div class="thumbnail">
            <img src=<?php echo base_url($row->image);?> alt="<?php echo $row->permalink;?>"/>
            <div class="caption">
                <h5><?php echo $row->name_mk; ?></h5>
                <p>Lorem ipsum dolor sit amet, quod architectre laboriosam consequuntur laudantium!</p>
            </div>
        </div>
        </a>
    </li>
<?php endforeach; ?>
</ul>