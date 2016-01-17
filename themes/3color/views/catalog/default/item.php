<h1 id="pageTitle"><?php echo CHtml::encode($item->title); ?></h1>
<div id="si_<?php echo $item->id ?>" class="single_item">
	<div id="bigpicture" class="catalog_picture"><?php echo CHtml::link(CHtml::image($item->getSingleImageUrl('medium',false)),$item->getSingleImageUrl('full',false),array('target'=>'blank','class'=>'img_box'));?></div>
    <script type="text/javascript">
	    $("#bigpicture a").fancybox({
		    'type'			: 'image',
	        'scrolling'		: 'no',
	    	'titleShow'		: false
	    });
    </script>
    <?php $this->widget('AdminActions',
		array(
			'urlParams'=>array('id'=>$item->id),
			'urlPattern'=>'items/??',
			'actions'=>array('delete'=>false),
		)); ?>
    <div class="description">
    	<div class="catalog_item_category">
    		<?php echo CHtml::link($item->category->title,$item->category->getFullUrl()); ?>
    	</div>
		<?php if($item->hasParamValues()):?>
		<div class="catalog_params">
		<?php foreach ($item->category->getParams() as $param): ?>
			<div><span class="catalog_param_name"><?php echo $param->name; ?>:</span>
			<span class="catalog_param_value"><?php echo $item->getParamValue($param,true) ?></span></div>
		<?php endforeach; ?>
		</div>
		<?php endif;?>
		<div class="text"><?php echo ($item->getFullDescription());?></div>
    </div>
    <div id= "back_link" class="clear">
    	<?php echo CHtml::link('Вернуться к списку специалистов',$item->category->getFullUrl()) ?>
    </div>
</div>