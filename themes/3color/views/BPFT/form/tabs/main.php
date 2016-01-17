<div class="simple">
<?php echo CHtml::activeLabelEx($model,'processId'); ?>
<?php echo CHtml::activeDropDownList($model, 'processId', $model->getValidProcess()); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'name'); ?>
<?php echo CHtml::activeTextField($model, 'name', array('maxlength'=>512)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'criteria'); ?>
<?php echo CHtml::activeTextField($model, 'criteria', array('maxlength'=>512)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'planDate'); ?>
<?php 
	$this->widget('zii.widgets.jui.CJuiDatePicker',array(
		'model'=>$model,
		'attribute'=>'planDate',
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
<?php echo CHtml::activeLabelEx($model,'percent'); ?>
<?php echo CHtml::activeTextField($model, 'percent'); ?>
</div>