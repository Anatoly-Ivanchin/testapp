<div class="simple">
<?php echo CHtml::activeLabelEx($model,'kpiId'); ?>
<?php echo CHtml::activeDropDownList($model, 'kpiId', $model->getValidKPI()); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'isCritical'); ?>
<?php echo CHtml::activeCheckBox($model, 'isCritical',array('onchange'=>'if(this.value){document.getElementById("TemplateBPKPI_percent").value=0;}')); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'percent'); ?>
<?php echo CHtml::activeTextField($model, 'percent'); ?>
</div>