<div id="user_ava"><?php echo CHtml::image($user->avaUrl,$user->getUserName(),array('title'=>$user->getUserName()));?></div>
<div id="user_data">
	<div id="user_name">
		<?php echo CHtml::encode($user->getUserName()); ?>
		<div class="user_profile">
			<?php echo CHtml::link(CHtml::image('/images/admin/actions/edit.png','Профиль',array('title'=>'Профиль')),array('/users/default/update'),array('class'=>'action_edit')); ?>
		</div>
	</div>
	<div>
	<?php if(Yii::app()->user->checkAccess('admin')):?>
		<?php echo CHtml::link('Управление сайтом',array('/users/default/siteManagment')); ?>
	<?php endif;?>
	</div>
	<div id="logout_link"><?php echo CHtml::link('Выход',array('/users/default/logout'));?></div>
</div>