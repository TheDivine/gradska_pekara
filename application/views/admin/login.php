<!-- <div id="adminLogin">
	<h4><?php echo $G_login;?></h4>
	<hr/>
	<?php echo form_open('admin/login'); ?>
		<p><?php echo form_label('Username','username');?></p>
		<p><?php echo form_input('username','',"id='username'"); ?></p>
		<p><?php echo form_label('Password','password');?></p>
		<p><?php echo form_password('password','',"id='password'"); ?></p>
		<p><?php echo form_submit('','Login'); ?>
	<?php echo form_close(); ?>
</div> -->
<div id="login" class="well">
	<?php echo form_open('admin/login','class="form-horizontal"'); ?>
		<fieldset>
			<!-- Form Name -->
			<legend class="text-center">CarniaDesign PMS - GradskaPekara.mk</legend>
			<!-- Text input-->
			<div class="control-group">
				<label class="control-label">Username</label>
				<div class="controls">
					<input id="username" name="username" type="text" placeholder="Username">
				</div>
			</div>
			<!-- Password input-->
			<div class="control-group">
				<label class="control-label">Passowrd</label>
				<div class="controls">
					<input id="password" name="password" type="password" placeholder="Password">
				</div>
			</div>
			<!-- Button -->
			<div class="control-group">
				<label class="control-label"></label>
				<div class="controls">
					<button id="submit" name="submit" class="btn btn-primary">Login</button>
				</div>
			</div>
		</fieldset>
	</form>
</div>