<div class="simple">
<?php echo CHtml::activeLabelEx($model,'name'); ?>
<?php echo CHtml::activeTextField($model,'name',array('maxlength'=>255)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'parentId'); ?>
<?php echo CHtml::activeDropDownList($model, 'parentId', $model->getValidParents(),array('prompt'=>'нет')); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'managerId'); ?>
<?php echo CHtml::activeDropDownList($model, 'managerId', $model->getAllPersonal(),array('prompt'=>'нет')); ?>
</div>