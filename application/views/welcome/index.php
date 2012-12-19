<div id="staticPage">
<h1>Првата и Најдобра Артисан Пекара во Македонија!</h1>
	<div id="divInfoL">
		<img src="img/bakery.jpg" style="padding:2px; border:1px solid #ccc;">
		<!-- NEWSLETTERS -->
			<!-- <div class="newsletters">
			<p id="ml_nw">Внесете го Вашиот и-меил, за први да добивате информации, новости и промотивни понуди во врска со нашите производи</p>
				<?php echo form_open('welcome/post_newsletter_email',"id='nl_form'");?>
					<?php echo form_input('email');?><br/>
					<?php echo form_input('yolo','',"id='yolo'");?>
					<?php echo form_submit('','Запиши се!',"id='submit_button'");?>	
				<?php echo form_close();?>
				<p id="ml_privacy">Вашата приватност е наш приоритет. Вашите и-меил адреси не ги продаваме или споделуваме со надворешни трети лица</p>
			</div> -->
		<!-- END OF NEWSLETTERS -->
	</div>
	<div id="divInfoR">
		<h3>За Нас</h3>
		<hr/>
		<p>
			„Фортис“ е име на високо квалитетна професионална опрема наменета за пекарски и месарски бизнис како и помошна опрема за сите гранки на прехрамбената индустрија.
		</p>
		
		<p>
			Водени од сопственото искуство во пекарското производство, го создадовме брендот „Фортис“ кој директно ги рефлектира потребите на мали и средни производствени погони од квалитетна опрема која е по пристапни цени, задоволувајќи ги најсовремените светски стандарди за квалитет и хигиена.
		</p>
		<div class="missvis">
			<h4>Нашата Мисија</h4>
			<hr>
			<p>Да понудиме најквалитетна и најсовремена професионална опрема за прехрамбената индустрија, по најпристапни цени во регионот!</p>
		</div>
		<p>
			<br/>
			„Фортис“ е тука за да Ви овозможи успешен и ефикасен тек во Вашиот нов или стар бизнис.
		</p>
		<div id="fb_find">
			<div class="fb-like-box" data-href="http://www.facebook.com/pages/Кумановска-Градкса-Пекара/506626009371136" data-height="185" data-width="470" data-show-faces="true" data-border-color="ccc" data-stream="false" data-header="false"></div>
		</div>	
	</div>
</div>

<script type="text/javascript">
	$(function(){

		var submit_button = $("#submit_button");
		
		$("#nl_form").submit(function(e){
			
			e.preventDefault();
			
			var email = $("input[name=email]").val();
			
			if(!email){
		       	alert("И-меилот е задолжителен!");
		       	$("input[name=email]").focus();
		       	return false;
	       	}
	       	if(/(.+)@(.+){2,}\.(.+){2,}/.test(email) == false){
		       	 alert("И-меилот што го внесовте е невалиден!");
		       	 return false;
	       	}

	       	submit_button.hide();

	       var data = $("#nl_form").serialize();
			
	       	$.post("<?php echo site_url('welcome/post_newsletter_email');?>",data+"&ajax=1",
	    	    	function(data) {
		    			if(data){
			    			alert(data);
			    			$("input[name=email]").val('');
			    			submit_button.show();
		    			}
		    			else {
			    			
		    			}
	    	});
			return false;		
		});
	});

</script>