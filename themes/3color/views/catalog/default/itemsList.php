<div id="catalog_items">
<?php foreach($models['models'] as $n=>$model): ?>
	<div id="ci_<?php echo $model->id ?>" class="catalog_item">
		<div class="catalog_picture">
			<?php echo CHtml::link(CHtml::image($model->getSingleImageUrl('small')),$model->fullUrl);?>
		</div>
		<?php $this->widget('AdminActions',
		array(
			'urlParams'=>array('id'=>$model->id),
			'urlPattern'=>'items/??',
		)); ?>
		<div class="description">
			<h2 class="catalog_item_title"><?php echo CHtml::link(CHtml::encode($model->title),$model->fullUrl); ?></h2>
			<?php if($model->hasParamValues()):?>
			<div class="catalog_item_folder"><?php echo $model->category->title; ?></div>
			<div class="catalog_params">
			<?php foreach ($model->category->getParams() as $param): ?>
				<div><span class="catalog_param_name"><?php echo $param->name; ?>:</span>
				<span class="catalog_param_value"><?php echo $model->getParamValue($param,true) ?></span></div>
			<?php endforeach; ?>
			</div>
			<?php endif;?>
		</div>
	</div>
<?php if(($n+1)%2==0 || ($n+1)==count($models['models'])):?>
<div class="clear"></div>
<?php endif; endforeach; ?>
<?php $this->widget('CLinkPager',array('pages'=>$models['pages'],'nextPageLabel'=>'Еще специалисты')); ?>
</div>