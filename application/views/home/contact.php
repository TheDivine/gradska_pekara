<!-- <div id="google_map">
   <iframe width="500" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps/ms?msa=0&amp;msid=202185547303679614355.0004d092eb8cac48d6f80&amp;ie=UTF8&amp;t=m&amp;ll=42.138523,21.720314&amp;spn=0.015911,0.021415&amp;z=15&amp;output=embed"></iframe>
</div> -->
<!-- <div id="google_map">
	
</div>
<div id="contact">
	<?php //$this->load->view('includes/_contact_'.$this->session->userdata('lng')); ?>
</div> -->
<div class="row-fluid">
	<div class="span6">
		<form>
			<fieldset>
				<legend>Контакт Форма</legend>
					<label>Име и Презиме</label>
					<?php echo form_input('name',set_value('name')); ?>
					<label>И-меил</label>
					<?php echo form_input('email',set_value('email')); ?>
					<label>Телефон</label>
					<?php echo form_input('phone',set_value('phone')); ?>
					<label>Порака</label>
					<?php echo form_textarea('message',set_value('message')); ?>
					<span clsas="help-block"></span>
				<button type="submit" class="btn">Submit</button>
			</fieldset>
		</form>
	</div>
	<div class="span6">
		<img src="img/mapa.jpg">
	</div>
</div>