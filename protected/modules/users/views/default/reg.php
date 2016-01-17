<h1 id="pageTitle">Регистрация</h1>

<?php if(!$success): ?>
<div id="regform">
<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($user); ?>

<div class="row">
<?php echo CHtml::activeLabelEx($user,'email'); ?>
<?php echo CHtml::activeTextField($user,'email') ?>
</div>
<div class="row">
<?php echo CHtml::activeLabelEx($user,'password'); ?>
<?php echo CHtml::activePasswordField($user,'password') ?>
</div>
<div class="row">
<?php echo CHtml::activeLabelEx($user,'reTypePassword'); ?>
<?php echo CHtml::activePasswordField($user,'reTypePassword') ?>
</div>
<div class="row action">
<?php echo CHtml::submitButton('Зарегистрироватся',array('class'=>'button')); ?>
</div>
<?php echo CHtml::endForm(); ?>
</div>
<?php else: ?>
<div class="success">
    <p>Заявка на регистрацию принята.</p>
    <p>На Ваш почтовый ящик была отправленна ссылка с кодом активации, чтобы активировать учетную запись перейдите по ней.</p>
    <p><?php echo CHtml::link('Вернутся на главную',array('/site/index')) ?></p>
</div>
<?php endif; ?>
