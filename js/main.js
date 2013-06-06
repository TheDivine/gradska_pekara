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