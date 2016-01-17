<div class="simple">
<?php echo CHtml::activeLabelEx($model,'name'); ?>
<?php echo CHtml::activeTextField($model,'name',array('maxlength'=>255)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'date'); ?>
<?php 
	$this->widget('zii.widgets.jui.CJuiDatePicker',array(
		'model'=>$model,
		'attribute'=>'date',
		'language'=>'ru',
		'cssFile'=>null,
		'options'=>array(
			'dateFormat'=>'yy-mm-dd',
			'changeMonth'=> true,
			'changeYear'=> true,
		)
	));
?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'author'); ?>
<?php echo CHtml::activeDropDownList($model, 'author_id', Authors::model()->getOptions()); ?>
</div>