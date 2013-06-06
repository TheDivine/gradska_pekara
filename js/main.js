$(function(){
    $(document).on("click",".confirm-delete", function(e) {
        var okBtn = "OK";
        var cnlBtn = "Cancel";
        var text = "\
                <h4 class='text-error'>Warning!</h4>\
                <hr>\
            <div class='alert alert-error'>\
                <i class='icon-warning-sign'></i>\
                The entry you are about to delete <strong>CANNOT</strong> be restored!\
            </div>";
        bootbox.animate(false); 
        bootbox.confirm(text, cnlBtn, okBtn, function(result) {
            targetLink = e.target.href;
            if(targetLink === undefined){
                targetLink = $(e.target).data('link');
            }
            if(result){window.location.href = targetLink;}
        });
        return false;
    });
});

function submitContactForm()
{
    var contactAlert = $('#contact-alert');

    var contactForm = $('#contact-form');
    var submitFormBtn = $("#submit-form");

    var name = $('input[name=name]');
    var email = $('input[name=email]');
    var message = $('textarea[name=message]');

     contactAlert.removeClass();

    if(!name.val()){
        contactAlert.addClass('alert alert-error').show().html('<i class="icon-info-sign"></i> Полето Име и Презиме е задолжително!');
        name.focus();
        return false;
    }
    if(!email.val()){
        contactAlert.addClass('alert alert-error').show().html('<i class="icon-info-sign"></i> Полето И-Меил е задолжително!');
        email.focus();
        return false;
    }
    if(!isEmail(email.val())){
        contactAlert.addClass('alert alert-error').show().html('<i class="icon-info-sign"></i> Невалиден И-Меил!');
        email.focus();
        return false;
    }
    if(!message.val()){
        contactAlert.addClass('alert alert-error').show().html('<i class="icon-info-sign"></i> Полето Порака е задолжително!');
        message.focus();
        return false;
    }

    contactAlert.removeClass();

    $(this).prop('disabled',true).html('<i></i>');

    $("#submit-form i").attr('class','icon-spinner icon-spin');

    $.ajax({
        url: 'home/post_contact',
        type: 'post',
        dataType: 'json',
        data: $('#contact-form').serialize(),
        success : function() {
            contactAlert.addClass('alert alert-success').show().html('<i class="icon-info-sign"></i> Вашата порака е успешно испратена. Благодариме!');
            contactForm[0].reset();
            submitFormBtn.prop('disabled',false).html('Испрати');
        },
        error : function() {
            $('#contact-alert').addClass('alert alert-error').show().html('<i class="icon-info-sign"></i> Грешка при испраќањe. Обидете се повторно!');
            submitFormBtn.prop('disabled',false).html('Испрати');
            return false;
        }
    });
    return false;
}

function moveUp(id,url){
	
	$.post(url,{id:id},function(data) {
		location.reload(true);
	});
	return false;
}

function moveDown(id,url){
	
	$.post(url,{id:id},function(data) {
    	location.reload(true);
	});
	
	return false;
}

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}