<?php $this->pageTitle=CHtml::encode($user->getUserName()); ?>
<div id="user_<?php echo $user->id ?>" class="single_item">
    <div id="user_img" class="pictures">
        <?php echo CHtml::image($user->avaFullUrl);?>
    </div>
    <dl class="user_data">
    	<?php if($user->city||$user->country):?><dt class="user_"><?php echo $user->getAttributeLabel('city'); ?></dt><dd class="user_"><?php echo $user->country; if($user->country && $user->city) {echo ', ';} echo $user->city;?></dd><?php endif;?>
    	<?php if($user->sex):?><dt class="user_sex"><?php echo $user->getAttributeLabel('sex'); ?></dt><dd class="user_sex"><?php echo CHtml::image('/images/admin/icons/'.($user->sex==User::SEX_MALE?'M':'F').'.gif');?></dd><?php endif;?>
    	<?php if($user->bDate):?><dt class="user_bdate"><?php echo $user->getAttributeLabel('bDate'); ?></dt><dd class="user_bdate"><?php echo Yii::app()->dateFormatter->format(Yii::app()->params['dateFormats']['admin'],$user->bDate);?></dd><?php endif;?>
    	<?php if($user->phone):?><dt class="user_phone"><?php echo $user->getAttributeLabel('phone'); ?></dt><dd class="user_phone"><?php echo $user->phone;?></dd><?php endif;?>
    	<dt class="user_email"><?php echo $user->getAttributeLabel('email'); ?></dt><dd class="user_email"><?php echo CHtml::link(CHtml::encode($user->email),'mailto:'.$user->email); ?></dd>
    	<dt class="user_regdate"><?php echo $user->getAttributeLabel('regDate'); ?></dt><dd class="user_regdate"><?php echo Yii::app()->dateFormatter->format(Yii::app()->params['dateFormats']['admin'], $user->regDate);?></dd>
    	<?php if($user->profile):?><dt class="user_profile"><?php echo $user->getAttributeLabel('profile'); ?></dt><dd class="user_profile"><?php echo $user->profile;?></dd><?php endif;?>
    </dl>
    <div class="admin_actions">
        <?php if($user->id!=Yii::app()->user->id) echo CHtml::link(CHtml::image('/images/admin/actions/delete.png','Удалить',array('title'=>'Удалить')),array('delete','id'=>$user->id),array('class'=>'action_delete')); ?>
        <?php if($user->id==Yii::app()->user->id) echo CHtml::link(CHtml::image('/images/admin/actions/edit.png','Редактировать',array('title'=>'Редактировать')),array('update'),array('class'=>'action_edit')); ?>
    </div>
</div>