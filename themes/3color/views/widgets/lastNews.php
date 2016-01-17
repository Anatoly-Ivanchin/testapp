<div id="last_news_<?php echo $block->url?>" class="last_news">
        <h1 class="main_page_title"><?php echo $block->title; ?></h1>
    <div class="last_news_content">
	    <?php foreach ($dataSet as $row): ?>
	        <div id="n_<?php echo $row->id; ?>" class="news">
	            <h2 class="news_title"><?php echo CHtml::link($row->title,array('/news/item/show','url'=>$block->url,'id'=>$row->id));?></h2>
				<div class="news_date" title="<?php echo Yii::app()->dateFormatter->format('d MMMM yyyy в HH часов mm минут', $row->createTime); ?>">
					<div class="news_day"><?php echo Yii::app()->dateFormatter->format('d', $row->createTime); ?></div>
					<div class="news_month"><?php echo Yii::app()->dateFormatter->format('MMMM', $row->createTime); ?></div>
				</div>
				<div class="news_main">
					<?php if($row->hasImage('preview')):?>
					<div class="news_image">
					<?php echo CHtml::image($row->getImageUrl('preview'))?>
					</div><div class="news_right">
					<?php endif;?>
					<div class="news_content"><?php echo $row->getAnotation(255);?></div>
					<?php if($row->hasImage('preview')):?>
					</div><div class="clear"></div>
					<?php endif;?>
					<?php $this->widget('NewsTags',array('news'=>$row));?>
					<div class="news_info">
						<?php echo CHtml::link('Читать полностью',array('/news/item/show','url'=>$block->url,'id'=>$row->id));?>
						<?php if($block->allowComments)
						echo chtml::link("Комментарии (".count($row->comments).")",array('/news/item/show','url'=>$block->url,'id'=>$row->id,'#'=>'news_comments'),array('class'=>'news_comments'))?>
					</div>
				</div>    
	        </div>
	    <?php endforeach;?>
	</div>
</div>
