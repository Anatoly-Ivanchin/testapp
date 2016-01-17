<div class="simple">
<?php echo CHtml::activeLabel($meta,'title'); ?>
<?php echo CHtml::activeTextField($meta,'title',array('maxlength'=>512)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabel($meta,'description'); ?>
<?php echo CHtml::activeTextArea($meta,'description',array('maxlength'=>512)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabel($meta,'tags'); ?>
<?php echo CHtml::activeTextField($meta,'tags',array('maxlength'=>512)); ?>
</div>