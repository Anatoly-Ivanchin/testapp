jQuery(document).ready(function(){
	jQuery('#modelstabs').tabs({load:function(e,ui){
			ui.panel.undelegate('a:not(.box_form,.static)','click');
			ui.panel.delegate('a:not(.box_form,.static)','click', {'panel':ui.panel},function(e){
				e.preventDefault();
				e.data.panel.data('src',this.href);
				e.data.panel.load(this.href);
			});
			ui.panel.data('src',ui.tab.find('a').attr('href'));
		}
	});
});