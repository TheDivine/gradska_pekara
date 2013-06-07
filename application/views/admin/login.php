<style>
	body {background-color: #444;}
	#login {width: 360px; margin: 0 auto; margin-top: 30px; background-color: #fff; padding: 20px;}
	.shadow{-moz-box-shadow: 3px 3px 4px #222;-webkit-box-shadow: 3px 3px 4px #222;box-shadow: 3px 3px 4px #222;}
</style>
<div class="row-fluid shadow" id="login">
	<div class="span12">
		<?php echo form_open('admin/postLogin'); ?>
			<legend class="text-center"><strong>Carnia PMS</strong></legend>
			<div class="alert alert-error" id="alert-box">
				<i class="icon-warning-sign"></i> Login failed. Wrong username or password!
			</div>
			<input class="username input-block-level" name="username" type="text" placeholder="Username" required>
			<input class="password input-block-level" name="password" type="password" placeholder="Password"  required>
			<hr>
			<button type="submit" class="btn btn-primary pull-right span4" id="login-btn">Sign In</button>
		<?php form_close(); ?>
	</div>
</div>
<script>
	$(function(){
		$('#alert-box').hide();
		$('button#login-btn').on('click',function(e){
			e.preventDefault();
			var username = $('input[name=username]');
			var password = $('input[name=password]');
			$.ajax({
				url: 'admin/postLogin',
				type: 'post',
				data: {username:username.val(),password:password.val()},
				success : function(data) {
					document.location.href = data;
				},
				error : function() {
					$('#alert-box').show();
					username.val("");
					password.val("");
				}
			});
			return false;
		});
	});
</script>