<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid">
		  <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		  </button>
		  <a class="brand" href="#">Carnia PMS</a>
			<div class="nav-collapse collapse">
			<p class="navbar-text pull-right sign-out-btn"><?php echo uif::linkButton('logout','icon-signout','info'); ?></p>
			<p class="navbar-text pull-right sign-out-btn"><?php echo uif::linkButton('/','icon-globe','success'); ?></p>
			<ul class="nav">
				<li><?php echo anchor('category','Categories'); ?></li>
				<li><?php echo anchor('attribute','Attributes'); ?></li>
				<li><?php echo anchor('recipe','Recipes'); ?></li>
				<li><?php echo anchor('partner','Partners'); ?></li>
				<?php if($this->session->userdata('is_admin')): ?>
					<li><?php echo anchor('user','Users'); ?></li>
				<?php endif ?>
			</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
</div>