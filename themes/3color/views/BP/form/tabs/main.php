<div class="simple">
<?php echo CHtml::activeLabelEx($model->periodObj,$model->periodObj->key); ?>
<?php echo CHtml::activeDropDownList($model->periodObj, $model->periodObj->key, $model->periodObj->getKeyOptions()); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model->periodObj,'year'); ?>
<?php echo CHtml::activeDropDownList($model->periodObj, 'year', $model->periodObj->getYearsOptions()); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'periodType'); ?>
<?php echo CHtml::activeDropDownList($model, 'periodType', $model->getPeriodOptions(),array('disabled'=>true)); ?>
</div>
<input type="hidden" name="BP" />