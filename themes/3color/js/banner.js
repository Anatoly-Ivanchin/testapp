function htmlBanner(){
	
	this.currentIndex=0,
	this.animationType=0;
	this.slides=null,
	this.currSlide=null,
	this.container=null,
	this.stop=false,
	this.imgH=750,
	this.imgW=1536,
	
	this.init=function(){
		this.container=$("#htmlbanner");
		this.container.css({position:'relative'});
		this.slides=this.container.children(".banner_slide").css({'position':'absolute'});
		
		var s1=this.slides.eq(this.currentIndex);
		this.currSlide=s1.clone().appendTo(this.container);
		this.showSlide(this.currSlide);
		s1.hide();
	},
	
	this.showSlide=function(slide){
		switch (this.animationType) {
			case 0:
				slide.css({
					'left':this.container.innerWidth()-this.imgW,
					'top': (this.container.innerHeight()-this.imgH)/2,
					'display':'block',
				});
				break;
			case 1:
				slide.css({
					'left': 0,
					'top': this.container.innerHeight()-this.imgH,
					'display':'block',
				});
				break;
			case 2:
				slide.css({
					'left':this.container.innerWidth()-this.imgW,
					'top': 0,
					'display':'block',
				});
				break;
			case 3:
				slide.css({
					'left':this.container.innerWidth()-this.imgW,
					'top': this.container.innerHeight()-this.imgH,
					'display':'block',
				});
				break;
			case 4:
				slide.css({
					'left':0,
					'top': (this.container.innerHeight()-this.imgH)/2,
					'display':'block',
				});
				break;
			case 5:
				slide.css({
					'left':this.container.innerWidth()-this.imgW,
					'top': 0,
					'display':'block',
				});
				break;
			case 6:
				slide.css({
					'left':0,
					'top': this.container.innerHeight()-this.imgH,
					'display':'block',
				});
				break;
			case 7:
				slide.css({
					'left':0,
					'top': 0,
					'display':'block',
				});
				break;
		} 
	},
	
	this.switchSlide=function(index) {
		if(index==this.currentIndex)
			return;
		if(index+1>this.slides.size())
			index=0;
		nextSlide=this.slides.eq(index).clone();
		nextSlide.insertBefore(obj.currSlide);
		obj.showSlide(nextSlide);
		this.currentIndex=index;
		obj.currSlide.fadeOut(2000,function() {$(this).remove();obj.float();});
		obj.currSlide=nextSlide;
	},
	
	this.run=function(){
		obj=this;
		this.float();
		//obj.bannerLoop(obj);
	},
	
	this.bannerLoop=function(obj) {
		if(obj.stop) {
			obj.stop=false;
		}
		setTimeout(function(){obj.bannerLoop(obj);}, 5000);
	};
	
	this.float=function() {
		obj=this;
		var coords={};
		switch(this.animationType){
		case 0:
			coords={
				'left':0
			};
			break;
		case 1:
			coords={
				'left':this.container.innerWidth()-this.imgW,
				'top':0
			};
			break;
		case 2:
			coords={
				'left':this.container.innerWidth()-this.imgW,
				'top':this.container.innerHeight()-this.imgH
			};
			break;
		case 3:
			coords={
				'left':0,
				'top':0
			};
			break;
		case 4:
			coords={
				'left':this.container.innerWidth()-this.imgW,
			};
			break;
		case 5:
			coords={
				'left':0,
				'top':this.container.innerHeight()-this.imgH
			};
			break;
		case 6:
			coords={
				'top':0
			};
			break;
		case 7:
			coords={
				'left':this.container.innerWidth()-this.imgW,
				'top':this.container.innerHeight()-this.imgH
			};
			break;
		}
		this.currSlide.animate(coords,5000,'linear',function(){obj.switchSlide(obj.currentIndex+1);});
		if(this.animationType==7)
			this.animationType=0;
		else
			this.animationType++;
	};
}

// Player 

function MusicPlayer() {
	this.btn=null;
	this.player=null;
	this.state='stop';
	this.init=function(player_selector,btn_selector){
		this.player=jQuery(player_selector)[0];
		this.player.volume=+0.8;
		this.btn=jQuery(btn_selector).bind('click',{'obj':this},this.btnClick);
		var lastState=jQuery.cookie('play_music');
		if(lastState=='stop')
			this.state='play';
		this.changeState();
	},
	this.btnClick=function(e){
		e.preventDefault();
		var player=e.data.obj;
		player.changeState();
	},
	this.changeState=function(){
		if(this.state=='play')
			this.pause();
		else
			this.play();
		jQuery.cookie('play_music',this.state);
	}
	this.play=function(){
		this.player.play();
		this.state='play';
		this.btn.addClass('pause').removeClass('play');
	},
	this.pause=function(){
		this.player.pause();
		this.state='stop';
		this.btn.addClass('play').removeClass('pause');
	};
}

$(document).ready(function() {
	var banner=new htmlBanner();
	banner.init();
	banner.run();
	jQuery('body').delegate('.yiiPager .next a','click',function(e){
		e.preventDefault();
		jQuery.get(this.href,{},function(res,status,req){
			jQuery(".yiiPager").replaceWith(res);
		});
	});
	jQuery('body').delegate('.btn','mouseover',function(e){jQuery(this).addClass("btn_hover");});
	jQuery('body').delegate('.btn','mouseout',function(e){jQuery(this).removeClass("btn_hover");});
	
	// Player
	
	var p=new MusicPlayer();
	p.init('#player', '#player_btn');
});