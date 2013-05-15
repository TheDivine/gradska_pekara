<div class="page-header">
	<h1>Контакт</h1>
</div>
<div class="row-fluid">
	<div class="span6">
		<address>
			<strong>Кумановска Градска Пекара</strong><br>
			Октомвриска Револуција 32 - Пораншен Ресторант Табакана<br>
			1300 Куманово, Македонија <br>
			Телефон: 031 550 580 <br>
			<?php echo safe_mailto('info@gradskapekara.mk'); ?>
		</address>
		<hr>
		<h4>Администрација</h4>
		<address>
			<strong>Агро-Про ДОО</strong><br>
			Индустриска Зона Доброшане<br>
			1300 Куманово, Македонија <br>
			Телефон: 031 453 905 <br>
			Телефон: 031 453 906 <br>
			Факс: 031 412 715 <br>
			<?php echo safe_mailto('info@kumanovskikori.mk'); ?> <br>
			<?php echo anchor('http://www.kumanovskikori.mk'); ?>
		</address>
	</div>
	<div class="span6 well">
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
				<button id="submit-form" class="btn btn-primary span4 pull-right">Испрати</button>
			</fieldset>
			<?php echo form_hidden('yolo'); ?>
		<?php echo form_close(); ?>
	</div>
</div>

<script>
	$(function(){
		$("#submit-form").on('click',function(e){
			e.preventDefault();
			$.ajax({
				url: "<?=site_url('home/post_contact')?>",
				type: 'post',
				dataType: 'json',
				data: $('#contact-form').serialize(),
				success : function(data) {
					alert(data);
					//document.location.reload(true);
				},
				error : function(data) {
					alert('error');
				}
			});
			return false;
		});
		
	});
</script>