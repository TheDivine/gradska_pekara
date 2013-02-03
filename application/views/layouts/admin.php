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
    <link rel="stylesheet" href="<?php echo base_url('css/admin.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('css/formalize.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('css/blue/style.css');?>">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script src="<?php echo base_url('js/vendor/jquery-1.8.0.min.js');?>"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.0.min.js"><\/script>')</script>

    <script src="<?php echo base_url('js/vendor/jquery.tablesorter.min.js');?>"></script>
    <script src="<?php echo base_url('js/vendor/modernizr-2.6.1.min.js');?>"></script>
    <script src="<?php echo base_url('js/vendor/jquery.formalize.min.js');?>"></script>
  
</head>
<body>
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
  <div id="wrapper">
  <?php if($this->session->userdata('logged_in')): ?>
    <header>
      <?php echo $this->load->view('includes/_admin_header'); ?>
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