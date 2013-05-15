<div class="page-header">
	<h1>Нешто Посебно во Куманово!</h1>
</div>	
<div id="myCarousel" class="carousel slide">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <!-- Carousel items -->
  <div class="carousel-inner">
    <div class="active item">
    	<img src="img/jumbo1.jpg" alt="">
    </div>
    <div class="item">
    	<img src="img/jumbo2.jpg" alt="">
    </div>
    <div class="item">
    	<img src="img/jumbo3.jpg" alt="">
    </div>
  </div>
</div>
<hr>
<div class="row-fluid">
	<div class="span4">
		<h4>За Нас</h4>
			<strong>Кумановска Градска Пекара</strong> е име на високо квалитетна професионална опрема наменета за пекарски и 
			месарски бизнис како и помошна опрема за сите гранки на прехрамбената индустрија.
	</div>
	<div class="span4">
		<div class="alert alert-success">
			<h4>Нашата Мисија</h4>
		<i class="icon-info-sign"></i> Да понудиме најквалитетна и најсовремена 
		професионална опрема за прехрамбената индустрија, по најпристапни цени во регионот!
		</div>
	</div>
	<div class="span4">
		<div class="alert alert-info">
			<h4>Нашата Визија</h4>
		<i class="icon-info-sign"></i> Да понудиме најквалитетна и најсовремена 
		професионална опрема за прехрамбената индустрија, по најпристапни цени во регионот!
		</div>
	</div>
</div>
<script>
	$(function(){

		 $('.carousel').carousel();

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
			
	       	$.post("<?php echo site_url('home/post_newsletter_email');?>",data+"&ajax=1",
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