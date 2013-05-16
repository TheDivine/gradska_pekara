<style>
	body {background-color: #444;}
	#login {width: 410px; margin: 0 auto; margin-top: 30px; background-color: #fff; padding: 20px;}
	.shadow{-moz-box-shadow: 3px 3px 4px #222;-webkit-box-shadow: 3px 3px 4px #222;box-shadow: 3px 3px 4px #222;}
</style>
<div class="row-fluid shadow" id="login">
	<div class="span6">
	<?php echo form_open('admin/postLogin','class="form-horizontal"'); ?>
		<fieldset>
			<!-- Form Name -->
			<legend class="text-center">CarniaDesign PMS - GradskaPekara.mk</legend>
			<!-- Text input-->
			<div class="control-group">
				<label class="control-label">Username</label>
				<div class="controls">
					<input id="username" name="username" type="text">
				</div>
			</div>
			<!-- Password input-->
			<div class="control-group">
				<label class="control-label">Password</label>
				<div class="controls">
					<input id="password" name="password" type="password">
				</div>
			</div>
			<!-- Button -->
			<div class="control-group">
				<label class="control-label"></label>
				<div class="controls">
					<button id="submit" type="submit" class="btn btn-primary">Login</button>
				</div>
			</div>
		</fieldset>
	</form>
	</div>
</div>