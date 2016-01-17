<div class="simple">
<?php echo CHtml::activeLabelEx($model,'name'); ?>
<?php echo CHtml::activeTextField($model,'name',array('maxlength'=>255)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'scaleId'); ?>
<?php echo CHtml::activeDropDownList($model, 'scaleId', $model->getScalesOptions()); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'unit'); ?>
<?php echo CHtml::activeTextField($model,'unit',array('maxlength'=>255)); ?>
</div>