<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($model); ?>
<?php echo CHtml::errorSummary($form); ?>

<?php $this->widget('CTabView',array(
	'id'=>'formTabs',
	'tabs'=>array(
		't1'=>array(
			'title'=>'Основное',
			'view'=>'form/tabs/main'
		),
		't2'=>array(
			'title'=>'Контактная информация',
			'view'=>'form/tabs/contacts'
		),
		't3'=>array(
			'title'=>'Сменить пароль',
			'view'=>'form/tabs/pass'
		),
		't4'=>array(
			'title'=>'Дополнительно',
			'view'=>'form/tabs/add'
		),
	),
	'viewData'=>array('model'=>$model,'form'=>$form),
));?>

<div class="simple action">
<?php $this->renderPartial('application.views.forms.buttonsets.savecancel');?>
</div>

<?php echo CHtml::endForm(); ?>

<!-- form -->