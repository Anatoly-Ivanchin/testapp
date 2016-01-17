function initGallery()
{
    var frame = $('#catalog_selected_items');
    var container = $('#cat_selected_container');
    
    var itemsLenght = 0;
    
    container.children().each(
        function()
        {
            itemsLenght = itemsLenght + $(this).outerWidth();
        }
    );
    if(itemsLenght<frame.innerWidth())
        return;
    
    frame.css('overflow','hidden').css('position','relative').height('180px');
    
    container.width(itemsLenght*1.2).css('position','absolute');
    
    appendGradients(frame);
    
    
    var items = $('#cat_selected_container>.catalog_selected_item').clone();
    var separator = $('#cat_selected_container>.separator').first().clone();
    
    container.empty();
    
    
    items.css('display','inline');
    items.each(
        function(index,element){
            var wrapper = $('<div class="gallery_item"></div>')
            wrapper.css('position','relative').css('display','inline');
            wrapper.append($(this).width(180));
            wrapper.append(separator.clone());
            container.append(wrapper);
        }
    );
    
    
    makespin();
    
}

function appendGradients(parent)
{
    var gradient = $('<div></div>');
    gradient.css('position','absolute').css('top',10);
    gradient.height('180px');
    gradient.width('75px');
    
    var left_grad = gradient.clone();
    left_grad.css('left',0).css('background','url(/images/bg/left_grad.png) repeat-y').addClass('left_grad');
    
    var right_grad = gradient.clone();
    right_grad.css('right',0).css('background','url(/images/bg/right_grad.png) repeat-y').addClass('right_grad');
    
    parent.append(left_grad).append(right_grad);
}

function makespin()
{ 
     var container = $('#cat_selected_container');
     
     container.animate({'left':-197},6000,'linear', function(){
        container.append(container.children().first()).css('left',0);
        makespin();
    });
}

$(document).ready(initGallery);