<?php $this->pageTitle='Смена пароля'; ?>

<div id="form">
<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($form); ?>

<?php if($form->success): ?>
<div id ="success">Пароль изменен.</div>
<?php endif; ?>

<?php $this->renderPartial('form/tabs/pass',array('form'=>$form,'model'=>$model));?>
<div class="simple action">
<?php echo CHtml::submitButton('Сменить'); ?>
</div>

<?php echo CHtml::endForm(); ?>
</div>
