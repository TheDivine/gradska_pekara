<?php echo $this->load->view('includes/_tiny_mce', base_url(), true); ?>
<div class="page-header">
  <h4>Edit Recipe</h4>
</div>
    <?php echo form_open_multipart('','class="form-horizontal"'); ?>            
        <?php echo uif::submitButton()?>
    <hr>
<div class="row-fluid">
    <div class="span6">
        <?php echo uif::load('_validation'); ?>
        <?php echo uif::controlGroup('text','Permalink','permalink',$result)?>
        <?php echo uif::controlGroup('file','Image','userfile')?>
        <?php echo uif::controlGroup('dropdown','Type','type',[array('savory'=>'Savory','sweet'=>'Sweet','neutral'=>'Neutral'),$result]); ?>
        <?php echo uif::controlGroup('dropdown','Category','r_category_id',[$r_categories,$result]); ?>
        <?php echo uif::controlGroup('text','Name','name',$result)?>
        <?php echo uif::controlGroup('checkbox','Vegeterian','vegeterian',[1,$result])?>
        <?php echo uif::controlGroup('checkbox','Fasting','fasting',[1,$result])?>
        <?php echo uif::controlGroup('text','Submitted By','submitted_by',$result)?>
        <?php echo uif::controlGroup('text','Preparation Time','time_to_prepare',$result)?>
        <?php echo uif::controlGroup('text','Servings','num_servings',$result)?>
        <?php echo uif::controlGroup('checkbox','Published','published',[1,$result])?>
        <?php echo uif::controlGroup('textarea','Short Description','desc',$result)?>
        <?php echo uif::controlGroup('textarea','Ingredients','ingredients',$result)?>
        <?php echo uif::controlGroup('textarea','Instructions','instructions',$result)?>
        <?php echo form_hidden('id',$result->id); ?>
        <?php echo form_close(); ?>
    </div>
</div>