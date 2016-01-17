<div class="simple">
<?php echo CHtml::activeLabelEx($model,'personalId'); ?>
<?php echo CHtml::activeDropDownList($model, 'personalId', $model->getValidPersonal()); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'periodType'); ?>
<?php echo CHtml::activeDropDownList($model, 'periodType', $model->getPeriodOptions()); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'ftWeight'); ?>
<?php echo CHtml::activeTextField($model, 'ftWeight'); ?>
</div>