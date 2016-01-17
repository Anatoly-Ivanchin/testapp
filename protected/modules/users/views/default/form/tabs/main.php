<div class="simple">
<?php echo CHtml::activeLabelEx($model,'firstName'); ?>
<?php echo CHtml::activeTextField($model,'firstName',array('maxlength'=>128)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'lastName'); ?>
<?php echo CHtml::activeTextField($model,'lastName',array('maxlength'=>128)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'sex'); ?>
<?php echo CHtml::activeDropDownList($model,'sex',$model->getSexOptions(),array()); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'bDate'); ?>
<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
		'model'=>$model,
		'attribute'=>'bDate',
		'language'=>'ru',
		'options'=>array(
			'dateFormat'=>'yy-mm-dd',
			'changeMonth'=>true,
			'changeYear'=>true,
		),
		'htmlOptions'=>array(
			'readonly'=>'readonly',
		)
)); ?>
</div>