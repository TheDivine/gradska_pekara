<div id="contact">
	<h3>контакт инфомации</h3>
	<hr />
	<dl>
		<dt>
			<strong>Куамновска Градска Пекара</strong>
		</dt>
		<dt>Октомвриска Револуција 23</dt>
		<dd>1300 Куманово, Македонија</dd>
		<dt>Тел.:&nbsp;+389(0)31 550 580</dt>
		<dt>Моб.:&nbsp;+389(0)70 718 952</dt>
		<dd>И-меил: <?php echo safe_mailto('info@gradskapekara.mk'); ?> </dd>
	</dl>
	<h3>контакт форма</h3>
	<hr />
	<table id="table_cf">
		<?php echo form_open('home/post_contact_form',"id='contact_form'");?>
		<tr>
			<td><?php echo form_label('Име:','name');?></td>
			<td><?php echo form_input('name',set_value('name'),"id='name'"); ?>
			<span class="required">*</span></td>
		</tr>
		<tr>
			<td><?php echo form_label('И-меил:','email');?></td>
			<td><?php echo form_input('email',set_value('email'),"id='email'"); ?>
			<span class="required">*</span></td>
		</tr>
		<tr>
			<td><?php echo form_label('Телефон:','phone');?></td>
			<td><?php echo form_input('phone',set_value('phone'),"id='phone'"); ?>
			</td>
		</tr>
		<tr>
			<td><?php echo form_label('Порака:','message');?></td>
			<td><?php echo form_textarea('message',set_value('message'),"id='message'");?>
			</td>
		</tr>
		<tr>
			<?php echo form_input('yolo','',"id='yolo'");?>
			<td colspan="2">
				<?php echo form_submit('','Испрати',"id='submit_button'");?>
				<img src="<?php echo base_url();?>img/loader.gif" id="loader"/>
			</td>
		</tr>
		<?php echo form_close();?>
	</table>
	<?php echo validation_errors(); ?>
	<div id="div_cf">
	</div>
</div>

<script type="text/javascript">

	$(function(){ 

		var loader = $("#loader");
		var submit_button = $("#submit_button");


		$("#contact_form").submit(function(e){
			
	       	e.preventDefault();

	       	var name = $("input[name=name]").val();
	       	var email = $("input[name=email]").val();
	       	var message = $("textarea[name=message]").val();

	       	if(!name){
		       	alert('<?php echo $alert_name_req;?>');
		       	$("input[name=name]").focus();
		       	return false;
	       	}
	       	if(!email){
		       	alert('<?php echo $alert_email_req;?>');
		       	$("input[name=email]").focus();
		       	return false;
	       	}
	       	if(/(.+)@(.+){2,}\.(.+){2,}/.test(email) == false){
		       	 alert('<?php echo $alert_email_inv;?>');
		       	 $("input[name=email]").focus();
		       	 return false;
	       	}
	       	if(!message){
		       	alert('<?php echo $alert_msg_req;?>');
		       	$("textarea[name=message]").focus();
		       	return false;
	       	}

	       	submit_button.hide();
	       	loader.show();

	    	$.post("<?php echo site_url('home/post_contact_form');?>",$(this).serialize()+"&ajax=1",
	    	    	function(data) {
		    			if(data){
			    			$("#table_cf").hide();
			    			$("#div_cf").html('<?php echo $alert_succ; ?>').show();
			    			loader.hide();		
		    			}
		    			else{
			    			alert('<?php echo $alert_err; ?>');
			    			loader.hide();
			    			submit_button.show();
		    			}
	    	});
	        return false;
		});
	});
</script>