<div class="simple">
<?php echo CHtml::activeLabelEx($model,'startDate'); ?>
<?php 
	$this->widget('zii.widgets.jui.CJuiDatePicker',array(
		'model'=>$model,
		'attribute'=>'startDate',
		'language'=>'ru',
		'options'=>array(
			'dateFormat'=>'yy-mm-dd',
			'changeMonth'=> true,
			'changeYear'=> true,
		)
	));
?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'endDate'); ?>
<?php 
	$this->widget('zii.widgets.jui.CJuiDatePicker',array(
		'model'=>$model,
		'attribute'=>'endDate',
		'language'=>'ru',
		'options'=>array(
			'dateFormat'=>'yy-mm-dd',
			'changeMonth'=> true,
			'changeYear'=> true,
		)
	));
?>
</div>