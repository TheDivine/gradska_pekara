<h3>КГП Билтен</h3>
<p>Запишете се во нашиот електронски билтен, за први да бидете известени за промоции, понуди и попусти!</p>
<form class="form-inline">
    <fieldset>
        <input id="email-newsletters" placeholder="И-Меил" type="text" class="input-xlarge">
        <button id="subscribe" class="btn btn-success">Запиши ме</button>
    </fieldset>
    <input name="yolo" id="">
</form>
<div id="newsletter-alert"></div>
<small class="muted"><i class="icon-info-sign"></i> Вашата приватност е наш приоритет. Вашите и-меил адреси не ги продаваме или споделуваме со надворешни трети лица.</small>
<script>
    $(function(){
        $("#subscribe").on('click',function(e){
            addToNewsletters();
            e.preventDefault();
        });
    });
</script>