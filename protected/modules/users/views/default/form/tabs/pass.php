<?php if($model->password):?>
<div class="simple">
<?php echo CHtml::activeLabelEx($form,'oldPass'); ?>
<?php echo CHtml::activePasswordField($form,'oldPass') ?>
</div>
<?php endif; ?>
<div class="simple">
<?php echo CHtml::activeLabelEx($form,'newPass'); ?>
<?php echo CHtml::activePasswordField($form,'newPass') ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($form,'newPassRepeat'); ?>
<?php echo CHtml::activePasswordField($form,'newPassRepeat') ?>
</div>