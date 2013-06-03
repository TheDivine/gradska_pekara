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
	<div class="span6">
		<h3>За Нас</h3>
			<strong>Кумановска Градска Пекара</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, quia, ducimus, labore obcaecati officiis ratione tenetur provident nemo nisi aspernatur suscipit exercitationem veniam ipsa modi perferendis est delectus earum architecto!
	</div>
	<div class="span6">
		<h3>Нашите Вредности</h3>
		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, numquam excepturi temporibus repudiandae aliquid iure incidunt vitae fuga amet tenetur mollitia laborum non error unde labore! Vitae, culpa sit consequatur.
		<a href="#">zapoznaj se...</a>
	</div>
</div>
<hr>
<div class="row-fluid">
	<div class="span6">
		<div class="alert alert-success">
			<h4>Нашата Мисија</h4>
		<i class="icon-info-sign"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, est, accusantium, earum magni adipisci sunt magnam cupiditate impedit suscipit ut ratione quae tempore nisi blanditiis ducimus maiores nulla incidunt dicta.
		</div>
	</div>
	<div class="span6">
		<div class="alert alert-info">
			<h4>Нашата Визија</h4> 
			<i class="icon-info-sign"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, dicta, enim, accusamus quisquam facere necessitatibus aut inventore assumenda facilis ut ratione eaque dolor nihil sed repudiandae voluptate perferendis cumque sit!
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