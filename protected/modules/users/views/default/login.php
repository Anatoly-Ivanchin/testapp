<h1 id="pageTitle">Вход</h1>

<div id="loginform">
<?php echo CHtml::beginForm(); ?>
<?php echo CHtml::errorSummary($user); echo CHtml::hiddenField('backurl', $user->getBackUrl());?>
<div class="row">
<?php echo CHtml::activeLabelEx($user,'email'); ?>
<?php echo CHtml::activeTextField($user,'email',array('maxlength'=>128)) ?>
</div>
<div class="row">
<?php echo CHtml::activeLabelEx($user,'password'); ?>
<?php echo CHtml::activePasswordField($user,'password') ?>
</div>
<div class="row">
<?php echo CHtml::activeLabelEx($user,'rememberMe'); ?>
<?php echo CHtml::activeCheckBox($user,'rememberMe',array('class'=>'check')); ?>
</div>
<div class="row action">
<?php echo CHtml::submitButton('Войти',array('class'=>'button')); ?>
</div>
<div class="row">
    <?php echo CHtml::link('Регистрация',array('register')); ?>
</div>
<?php echo CHtml::endForm(); ?>
<div class="row">
<?php  $this->widget('users.components.UloginWidget',array('callback'=>login)); ?>
</div>
</div>