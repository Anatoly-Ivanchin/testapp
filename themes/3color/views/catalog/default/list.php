<?php if(!isset($_GET['ipage'])):?>
<?php $this->widget('AdminActions',
array(
	'urlParams'=>array('id'=>$model->id),
	'urlPattern'=>'categories/??',
	'actions'=>array('delete'=>false),
)); ?>
<h1 id="pageTitle"><?php echo $model->title;?></h1>
<?php if($model->description!=null): ?>
	<div class="catalog_description"><?php echo $model->description; ?></div>
<?php endif; ?>
<ul id="catalog_subcategories">
<?php foreach(Categories::model()->findAll() as $i=>$model): ?>
	<li id="cf_<?php echo $model->id; ?>" class="catalog_folder">
		<h2 class="catalog_folder_title"><?php echo CHtml::link(($model->url=='stuff')?'Все специалисты':$model->title,$model->fullUrl,array('class'=>(Yii::app()->request->url==$model->fullUrl)?'btn':''));?></h2>
		<?php $this->widget('AdminActions',
		array(
			'urlParams'=>array('id'=>$model->id),
			'urlPattern'=>'categories/??',
		)); ?>
	</li>
<?php endforeach;?>
</ul>
<?php endif; ?>  
<?php if(count($items['models'])>0): $this->renderPartial('itemsList',array('models'=>$items)); else: ?>
	<div><p>Не найдено ни одного специалиста!</p></div>
<?php endif;?>