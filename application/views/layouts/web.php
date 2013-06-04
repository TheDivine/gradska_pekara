<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" xmlns:fb="http://ogp.me/ns/fb#"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" xmlns:fb="http://ogp.me/ns/fb#"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" xmlns:fb="http://ogp.me/ns/fb#"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" xmlns:fb="http://ogp.me/ns/fb#"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
         <title><?php echo  $subt. ' &raquo; ' .$G_title;?></title>
        <meta name="keywords" content="<?php echo $G_keywords; ?>">
        <meta name="description" content="<?php echo $G_description; ?>">
        <meta name="viewport" content="width=device-width">

        <link rel="icon" type="image/png" href="<?php echo base_url('img/favicon.ico');?>">

        <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('css/font-awesome.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('css/main.css'); ?>">
          
    </head>
    <body>
        <script src="<?php echo base_url('js/modernizr.min.js'); ?>"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url('js/jquery.min.js'); ?>"><\/script>')</script>
    	<div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->
        <!-- start of container -->
        <header class="container">
        	<?php echo uif::load('_header');?>
        </header>
        <div class="container shadow" role="main">
    		<?php echo $yield; ?>
    	</div>
        <footer class="container">
            <hr>  
            <?php echo uif::load('_footer');?>
        </footer>
        <!-- end of container -->
        <script src="<?php echo base_url('js/bootstrap.min.js'); ?>" type="text/javascript"></script> 
        <script src="<?php echo base_url('js/plugins.js'); ?>"></script>
        <script src="<?php echo base_url('js/main.js'); ?>"></script>
        <script> var _gaq=[['_setAccount','XXXXX'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));</script>
        <script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </body>
</html>