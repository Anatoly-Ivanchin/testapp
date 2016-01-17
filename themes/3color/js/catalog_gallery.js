function galleryButton(){
	
	this.locked=false,
	this.direction='Up',
	
	this.img=null,
	this.imgDisable=null,
	
	this.onclick=function(){},
	
	this.link=null,
	
	this.create=function(){
		this.link=$('<a>',{
			'href':'#',
			'id':'cgButton'+this.direction,
			'class':'cgButton'
		});
		this.link.click(this.onclick);

		img=this.getImg();
		if(img)
			content=img;
		else
			content=this.getTitle();
		return this.link.html(content);
	},
	this.getImg=function(){
		if (this.locked)
			img=this.imgDisabled;
		else
			img=this.img;
		if (img)
		{
			title=this.getTitle;
			return $('<img>',{'src':img,'title':title,'alt':title});
		}
		else
			return false;
	},
	this.getTitle=function() {
		return direction=='Up'?'Вверх':'Вниз';
	},
	this.lock=function(){
		this.locked=true;
		this.link.addClass('disabled');
		img=this.link.children('img');
		if(img)
			img.replaceWith(this.getImg());
	},
	this.unlock=function(){
		this.locked=false;
		this.link.removeClass('disabled');
		img=this.link.children('img');
		if(img)
			img.replaceWith(this.getImg());
	};
};

(function($){
	
	effect='sliding',
	speed='slow',
	easing='swing',
	
	imgUp=null,
	imgDown=null,
	imgUpDisabled=null,
	imgDowndisabled=null,
	
	displayCount=3,
	
	gallery=null,
	items=null,
	itemCount=null,
	currIndex=0,
	
	buttonUp=null,
	buttonDown=null,
	
	bigPicture=null,
	
	
	
	init=function(wrapper){
		gallery=wrapper.children('ul');
		items=gallery.children();
		itemCount=items.length;
		
		items.children('a').click(showBigPicture);
		
		if(itemCount>displayCount){
			
			wrapper.append(createButtonDown).prepend(createButtonUp);
			
			height=0;
			for ( var i = 0; i < displayCount; i++) {
				curr=items.eq(i);
				height+=curr.outerHeight(true);				
			}
			
			gWindow=$('<div>').css({
				'position':'relative',
				'width':gallery.outerWidth(),
				'height':height,
				'overflow':'hidden'
			});
			gallery.wrap(gWindow).css({
				'position':'absolute',
				'left':0,
				'top':0
			});
		}
	},
	
	createButtonUp=function() {
		buttonUp=new galleryButton();
		buttonUp.img=imgUp;
		buttonUp.imgDisabled=imgUpDisabled;
		buttonUp.onclick=prev;
		buttonUp.locked=true;
		return buttonUp.create();
	},
	createButtonDown=function() {
		buttonDown=new galleryButton();
		buttonDown.direction='Down';
		buttonDown.img=imgDown;
		buttonDown.imgDisabled=imgDownDisabled;
		buttonDown.onclick=next;
		return buttonDown.create();
	},
	
	next=function(event){
		if(itemCount-currIndex>displayCount) {
			height=items.eq(currIndex).outerHeight(true);
			currIndex++;
			gallery.animate({'top':'-='+height},speed,easing,checkButtons);
		}
		event.preventDefault();
	},
	prev=function(event){
		if(currIndex>0) {
			currIndex--;
			height=items.eq(currIndex).outerHeight(true);
			gallery.animate({'top':'+='+height},speed,easing,checkButtons);
		}
		event.preventDefault();
	},
	
	checkButtons=function(){
		if(currIndex<1)
			buttonUp.lock();
		else if(buttonUp.locked)
			buttonUp.unlock();
		
		if(currIndex+displayCount==itemCount) 
			buttonDown.lock();
		else if(buttonDown.locked)
			buttonDown.unlock();
	},
	
	showBigPicture=function(event){
		FullPictureUrl=$(this).attr('href');
		pictureUrl=$(this).children().eq(1).attr('src');
		
		bigPicture.find('img').attr('src',pictureUrl);
		bigPicture.find('a').attr('href',FullPictureUrl);
		event.preventDefault();
	},
	
	
	$.fn.catalogGallery=function(opts){
		if(opts) {
			if(opts['effect'])
				effect=opts['effect'];
			if(opts['speed'])
				speed=opts['speed'];
			if(opts['easing'])
				easing=opts['easing'];
			if(opts['imgUpDisabled'])
				imgUpDisabled=opts['imgUpDisabled'];
			if(opts['imgUp'])
				imgUp=opts['imgUp'];
			if(opts['imgDown'])
				imgDown=opts['imgDown'];
			if(opts['imgDownDisabled'])
				imgDownDisabled=opts['imgDownDisabled'];
			if(opts['count'])
				displayCount=opts['count'];
			bigPicture=opts['bigPicture'];
		}
		init($(this));
	};
	
})(jQuery);