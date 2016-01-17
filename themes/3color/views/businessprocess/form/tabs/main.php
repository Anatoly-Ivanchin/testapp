<div class="simple">
<?php echo CHtml::activeLabelEx($model,'code'); ?>
<?php echo CHtml::activeTextField($model,'code',array('maxlength'=>64)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'name'); ?>
<?php echo CHtml::activeTextField($model,'name',array('maxlength'=>512)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'parentId'); ?>
<?php echo CHtml::activeDropDownList($model, 'parentId', $model->getValidParents(),array('prompt'=>'нет')); ?>
</div>