<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($model); ?>

<?php $this->widget('CTabView',array(
	'id'=>'formTabs',
	'tabs'=>array(
		't1'=>array(
			'title'=>'Description',
			'view'=>'form/tabs/main'
		),
		't2'=>array(
			'title'=>'Image',
			'view'=>'form/tabs/image'
		),
	),
	'viewData'=>array('model'=>$model),
));?>

<div class="simple action">
<?php $this->renderPartial('form/savecancel');?>
</div>

<?php echo CHtml::endForm(); ?>
<!-- form -->