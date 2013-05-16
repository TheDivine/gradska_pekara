<style>
	body {background-color: #444;}
	#login {width: 360px; margin: 0 auto; margin-top: 30px; background-color: #fff; padding: 20px;}
	.shadow{-moz-box-shadow: 3px 3px 4px #222;-webkit-box-shadow: 3px 3px 4px #222;box-shadow: 3px 3px 4px #222;}
</style>
<div class="row-fluid shadow" id="login">
	<div class="span12">
		<?php echo form_open('admin/postLogin'); ?>
			<legend class="text-center"><strong>CarniaDesign PMS</strong></legend>
			<input class="username input-block-level" name="username" type="text" placeholder="Username" required>
			<input class="password input-block-level" name="password" type="password" placeholder="Password"  required>
			<hr>
			<button type="submit" class="btn btn-primary pull-right span4">Sign In</button>
		</form>
	</div>
</div>