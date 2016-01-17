<div class="simple">
<?php echo CHtml::activeLabelEx($model,'email'); ?>
<?php echo CHtml::activeTextField($model,'email',array('maxlength'=>128)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'phone'); ?>
<?php echo CHtml::activeTextField($model,'phone',array('maxlength'=>11)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'country'); ?>
<?php echo CHtml::activeTextField($model,'country',array('maxlength'=>128)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'city'); ?>
<?php echo CHtml::activeTextField($model,'city',array('maxlength'=>128)); ?>
</div>