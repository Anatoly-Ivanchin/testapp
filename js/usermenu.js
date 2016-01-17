jQuery(document).ready(function(){
	jQuery("#user_menu").css('top',10-jQuery("#user_menu").outerHeight());
	jQuery("#user_menu").mouseenter(function(){
		if(jQuery("#user_menu").data('show')==true)
			return;
		jQuery("#user_menu").data('show',true);
		setTimeout(function(){
			if(jQuery("#user_menu").data('show')==true){
				jQuery("#user_menu").animate({top:0},500);
			}
		}, 500);
	}).mouseleave(function(){
		jQuery("#user_menu").data('show',false);
		setTimeout(function(){
			if(jQuery("#user_menu").data('show')==false){
				jQuery("#user_menu").animate({top:10-jQuery("#user_menu").outerHeight()},500);
			}
		}, 2000);
	});
});
function login(token){
	jQuery.ajax({
		'url':'/login',
		'success':function(data){
			if(data.result===true) {
				if(document.location.pathname=='/login')
					document.location=document.location.origin;
				else
					document.location=document.location;
			}
			else
				alert('athentification error!');
		},
		'data':{'token':token},
		'dataType':'json',
		'type':'post',
	});
}