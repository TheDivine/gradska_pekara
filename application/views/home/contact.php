<div class="page-header">
	<h1>Контакт</h1>
</div>
<div class="row-fluid">
	<div class="span6">
		<div class="text-center orders-phone">
			<p class="lead">информации и нарачки</p> <h2><i class="icon-phone-sign"></i> <strong><?php echo $glCompanyPhone; ?></strong></h2>
		</div>
		<hr>
		<address>
			<strong><?php echo $glTitle; ?></strong><br>
			<i class="icon-map-marker"></i> <?php echo $glCompanyAddress; ?><br>
			<i class="icon-phone-sign"></i> <?php echo $glCompanyPhone; ?><br>
			<i class="icon-envelope-alt"></i> <?php echo safe_mailto($glEmail); ?><br>
			<i class="icon-facebook-sign"> </i> <?php echo anchor($glFacebookUrl,$glFacebookDisplay); ?><br>
			<i class="icon-globe"></i> <?php echo anchor($glUrl); ?>
		</address>
		<hr>
		<h4>Администрација</h4>
		<address>
			<strong>Агро-Про ДОО</strong><br>
			<i class="icon-map-marker"></i> Индустриска Зона Доброшане 1300 Куманово, Македонија <br>
			<i class="icon-phone-sign"></i> 031 453 905 <br>
			<i class="icon-phone-sign"></i> 031 453 906 <br>
			<i class="icon-print"></i> 031 412 715 <br>
			<i class="icon-envelope-alt"></i> <?php echo safe_mailto('info@kumanovskikori.mk'); ?> <br>
			<i class="icon-facebook-sign"> </i> <?php echo anchor('http://www.facebook.com/KumanovskiKori','facebook/kumanovskikori'); ?><br>
			<i class="icon-globe"></i> <?php echo anchor('http://www.kumanovskikori.mk'); ?>
		</address>
	</div>
	<div class="span6">
		<div id="contact-alert"></div>
		<div class="well">
		<?php echo form_open('','id="contact-form"');?>
			<fieldset>
				<label>Име и Презиме</label>
				<?php echo form_input('name',set_value('name'),'class="input-xlarge"'); ?>
				<label>И-Mеил</label>
				<?php echo form_input('email',set_value('email'),'class="input-xlarge"'); ?>
				<label>Телефон</label>
				<?php echo form_input('phone',set_value('phone'),'class="input-xlarge"'); ?>
				<label>Порака</label>
				<?php echo form_textarea('message',set_value('message'),'class="input-block-level"'); ?>
				<hr>
				<button id="submit-form-btn" class="btn btn-primary span4 pull-right">Испрати</button>
			</fieldset>
			<?php echo form_input('yolo'); ?>
		<?php echo form_close(); ?>
		</div>
	</div>
</div>

<script>
	$(function(){
		$('#contact-alert').hide();
		$("#submit-form-btn").on('click',function(e){
			submitContactForm();
			e.preventDefault();
		});
	});
</script>