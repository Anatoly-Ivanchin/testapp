<?php echo CHtml::errorSummary($form); echo CHtml::hiddenField('backurl', $form->getBackUrl());?>
<div class="row">
	<div class="cell firstColumn">
		<?php echo CHtml::activeLabelEx($form,'email'); ?>
		<?php echo CHtml::activeTextField($form,'email',array('maxlength'=>128)) ?>
	</div>
	<div class="cell">
		<?php echo CHtml::activeCheckBox($form,'rememberMe',array('class'=>'check')); ?>
		<?php echo CHtml::activeLabelEx($form,'rememberMe',array('class'=>'long')); ?>
	</div>
</div>
<div class="row">
	<div class="cell firstColumn">
		<?php echo CHtml::activeLabelEx($form,'password'); ?>
		<?php echo CHtml::activePasswordField($form,'password') ?>
	</div>
	<div class="cell">
		<?php echo CHtml::button('Войти',array('id'=>'login_btn','class'=>'button','ajax'=>array(
				'url'=>'/users/default/login',
				'type'=>'post',
				'update'=>'#login_widget',
		))); ?>
	</div>
</div>