<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo  'Administration'. ' &raquo; ' .$G_title;?></title>

    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/admin.css');?>">

    <script src="<?php echo base_url('js/modernizr.min.js'); ?>"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url('js/jquery.min.js'); ?>"><\/script>')</script>
    <script src="<?php echo base_url('js/bootstrap.min.js'); ?>" type="text/javascript"></script> 
    <script src="<?php echo base_url('js/plugins.js'); ?>"></script>
    <script src="<?php echo base_url('js/main.js'); ?>"></script> 

  
</head>
<body>
    <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
    <div class="container-fluid" role="wrapper">
        <?php if($this->session->userdata('logged_in')): ?>
        <header class="row-fluid">
            <div class="masthead">
            <ul class="nav nav-pills pull-right cd-navi">
                <?php echo $this->load->view('includes/_admin_header'); ?>
            </ul>
            <h2>CarniaDesign PMS</h2>
            </div>
        </header>
        <?php endif; ?>
        <div id="content">
            <?php echo $content; ?>
        </div>
    </div>  
    <script src="<?php echo base_url('js/plugins.js');?>"></script>
    <script src="<?php echo base_url('js/main.js');?>"></script>
</body>
</html>