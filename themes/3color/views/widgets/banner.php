<div id="htmlbanner">
    <?php foreach ($dataSet as $i=>$row): ?>
        <div id="slide_<?php echo $row->id; ?>" class="banner_slide" style="display:<?php echo ($i==0)?'block':'none';?>;">
	        <img class="slide_picture" src="<?php echo $row->getImageUrl('full'); ?>" alt="<?php echo $row->title; ?>" />
		        <div class="slide_right">        
	            <div class="slide_title"><?php echo $row->title; ?></div>
	            <div class="slide_content"><?php echo $row->description;?></div> 
            </div>
            <div class="clear"></div>      
        </div>
    <?php endforeach;?>
</div>
