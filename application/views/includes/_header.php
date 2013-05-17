<header class="row-fluid">
    <ul class="nav nav-pills pull-right cd-navi">
        <li <?=($this->router->method == 'index')?'class="active"':'';?>>
        <?php echo anchor('about_us','За Нас');?></li>
        <li <?=(($this->router->method == 'categories') OR ($this->router->method=='category'))?'class="active"':'';?>>
        <?php echo anchor('categories','Производи');?></li>
        <li <?=($this->router->method == 'quality')?'class="active"':'';?>>
        <?php echo anchor('quality','Квалитет');?></li>
        <li <?=($this->router->method == 'caffe')?'class="active"':'';?>>
        <?php echo anchor('caffe','Lucaff&eacute');?></li>
        <li <?=($this->router->method == 'catering')?'class="active"':'';?>>
        <?php echo anchor('catering','Нарачки &amp; Кетеринг');?></li>
        <li <?=($this->router->method == 'contact')?'class="active"':'';?>>
        <?php echo anchor('contact','Контакт');?></li>
    </ul>
</header>