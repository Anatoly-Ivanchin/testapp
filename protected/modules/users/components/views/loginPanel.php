<?php echo CHtml::beginForm(); ?>
<div id="login_widget">
	<?php $this->getController()->renderPartial('users.views.default.form.login',array('form'=>$form));?>
</div>
<div class="row">
	<div class="cell firstColumn">
		<?php  $this->widget('users.components.UloginWidget',array(
			'showButtunsAlways'=>true,
			'action'=>array('create'),
			'callback'=>login,
		));?>
	</div>
	<div class="cell"><?php echo CHtml::link('Регистрация',array('/users/default/register'),array('id'=>'reg_link')); ?></div>
</div>
<?php echo CHtml::endForm(); ?>