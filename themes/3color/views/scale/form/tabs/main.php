<div class="simple">
<?php echo CHtml::activeLabelEx($model,'name'); ?>
<?php echo CHtml::activeTextField($model,'name',array('maxlength'=>255)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'unit'); ?>
<?php echo CHtml::activeTextField($model,'unit',array('maxlength'=>128)); ?>
</div>
<?php if($type=='continuous'):?>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'min'); ?>
<?php echo CHtml::activeTextField($model,'min',array('maxlength'=>128)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'max'); ?>
<?php echo CHtml::activeTextField($model,'max',array('maxlength'=>128)); ?>
</div>
<?php endif;?>