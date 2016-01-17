function showSubMenu(id,level) {
	offset=$('#'+id).offset();
	$('#'+id).addClass('hover').mouseleave(function(){hideSubMenu(id);});
	
	l=offset.left;
	t=offset.top;
	
	if(level==1)
		t=t+$('#'+id).outerHeight();
	else	
		l=l+$('#'+id).outerWidth();
	
	$('#'+id+'>ul').slideDown("fast").offset({top:t,left:l});
}
function hideSubMenu(id) {
	$('#'+id).removeClass('hover');
	$('#'+id+' ul').hide();
}

$('ul.level_1 ul').hide();