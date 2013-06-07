<?php echo $this->load->view('includes/_tiny_mce', base_url(), true); ?>
<div class="page-header">
  <h4>New Recipe</h4>
</div>
    <?php echo form_open_multipart('','class="form-horizontal"'); ?>            
        <?php echo uif::submitButton()?>
    <hr>
<div class="row-fluid">
    <div class="span4">
        <?php echo uif::load('_validation'); ?>
        <?php echo uif::controlGroup('text','Permalink','permalink')?>
        <?php echo uif::controlGroup('file','Image','userfile')?>
        <?php echo uif::controlGroup('dropdown','Type','type',[array('savory'=>'Savory','sweet'=>'Sweet','neutral'=>'Neutral')]); ?>
        <?php echo uif::controlGroup('dropdown','Category','r_category_id',[$r_categories]); ?>
        <?php echo uif::controlGroup('text','Name','name')?>
        <?php echo uif::controlGroup('checkbox','Vegeterian','vegeterian',[1])?>
        <?php echo uif::controlGroup('checkbox','Fasting','fasting',[1])?>
        <?php echo uif::controlGroup('text','Submitted By','submitted_by')?>
        <?php echo uif::controlGroup('text','Preparation Time','time_to_prepare')?>
        <?php echo uif::controlGroup('text','Servings','num_servings')?>
        <?php echo uif::controlGroup('textarea','Short Description','desc')?>
        <?php echo uif::controlGroup('textarea','Ingredients','ingredients')?>
        <?php echo uif::controlGroup('textarea','Instructions','instructions')?>
        <?php echo form_close(); ?>
    </div>
</div>