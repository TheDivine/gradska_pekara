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
        <h3>КГП Билтен</h3>
        <div id="newsletter-alert"></div>
        <p>Запишете се во нашиот електронски билтен, за први да бидете известени за промоции, понуди и попусти!</p>
        <form class="form-inline">
        <fieldset>
            <input id="email-newsletters" placeholder="И-Меил" type="text" class="input-xlarge">
            <button id="subscribe" class="btn btn-success">Запиши ме</button>
        </fieldset>
        <?php echo form_input('yolo'); ?>
        </form>
        <small><i class="icon-info-sign"></i> Вашата приватност е наш приоритет. Вашите и-меил адреси не ги продаваме или споделуваме со надворешни трети лица</small>
    </div>
    <div class="span6">
        <div class="alert alert-success">
            <h4>Нашата Мисија</h4>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, est, accusantium, earum magni adipisci sunt magnam cupiditate impedit suscipit ut ratione quae tempore nisi blanditiis ducimus maiores nulla incidunt dicta.
        </div>
        <div class="alert alert-info">
            <h4>Нашата Визија</h4> 
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, dicta, enim, accusamus quisquam facere necessitatibus aut inventore assumenda facilis ut ratione eaque dolor nihil sed repudiandae voluptate perferendis cumque sit!
        </div>
    </div>
</div>
<script>
    $(function(){
        $('.carousel').carousel(); 
        $("#subscribe").on('click',function(e){
            addToNewsletters();
            e.preventDefault();
        });
    });
</script>