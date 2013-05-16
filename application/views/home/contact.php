<div class="page-header">
	<h1>Контакт</h1>
</div>
<div class="row-fluid">
	<div class="span6">
		<div class="text-center orders-phone">
			<p class="lead">информации и нарачки</p> <h2><i class="icon-phone"></i> <strong>031 550 580</strong></h2>
		</div>
		<hr>
		<address>
			<strong>Кумановска Градска Пекара</strong><br>
			<i class="icon-map-marker"></i> Октомвриска Револуција 32 - Пораншен Ресторант Табакана<br>
			1300 Куманово, Македонија <br>
			<i class="icon-phone"></i> 031 550 580 <br>
			<i class="icon-envelope"></i> <?php echo safe_mailto('info@gradskapekara.mk'); ?> <br>
			<i class="icon-globe"></i> <?php echo anchor('http://www.gradskapekara.mk'); ?> <br>
			<i class="icon-facebook-sign"> </i> <?php echo anchor('http://www.facebook.com/Kumanovska.Gradska.Pekara','facebook/Kumanovska.Gradska.Pekara'); ?>
		</address>
		<hr>
		<h4>Администрација</h4>
		<address>
			<strong>Агро-Про ДОО</strong><br>
			<i class="icon-map-marker"></i> Индустриска Зона Доброшане<br>
			1300 Куманово, Македонија <br>
			<i class="icon-phone"></i> 031 453 905 <br>
			<i class="icon-phone"></i> 031 453 906 <br>
			<i class="icon-print"></i> 031 412 715 <br>
			<i class="icon-envelope"></i> <?php echo safe_mailto('info@kumanovskikori.mk'); ?> <br>
			<i class="icon-globe"></i> <?php echo anchor('http://www.kumanovskikori.mk'); ?>
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
			$(this).prop('disabled',true).html('<i></i>');
			$("#submit-form i").attr('class','icon-spinner icon-spin');
			e.preventDefault();
			$.ajax({
				url: "<?=site_url('home/post_contact')?>",
				type: 'post',
				dataType: 'json',
				data: $('#contact-form').serialize(),
				success : function(data) {
					alert('Контакт формата е успешно испратена. Благодариме!');
					document.location.reload(true);
				},
				error : function() {
					alert('Грешка при испраќање на контакт формата. Обидете се повторно!');
					$("#submit-form").prop('disabled',false).html('Испрати');
					return false;
				}
			});
			return false;
		});
	});
</script>