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
	

