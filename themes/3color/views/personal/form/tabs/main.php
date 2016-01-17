<div class="simple">
<?php echo CHtml::activeLabelEx($model,'userId'); ?>
<?php echo CHtml::activeTextField($model,'fullName',array('maxlength'=>128,'disabled'=>true)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'departmentId'); ?>
<?php echo CHtml::activeDropDownList($model, 'departmentId', $model->getAllDepartments()); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'position'); ?>
<?php echo CHtml::activeTextField($model,'position',array('maxlength'=>255)); ?>
</div>