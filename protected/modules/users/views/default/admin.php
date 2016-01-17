<?php $this->pageTitle='Управление пользователями'; ?>

<table class="dataGrid" cellpadding="0" cellspacing="0">
  <tr>
  	<th>&nbsp;</th>
    <th>Имя</th>
    <th><?php echo $sort->link('email'); ?></th>
    <th><?php echo $sort->link('role'); ?></th>
    <th><?php echo $sort->link('activated'); ?></th>
    <th>&nbsp;</th>
  </tr>
<?php foreach($users as $n=>$user): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td class="user_img_small"><?php echo CHtml::image($user->avaUrl,$user->getUserName(),array('title'=>$user->getUserName()));?></td>
    <td><?php echo $user->getUserLink(); ?></td>
    <td><?php echo CHtml::link(CHtml::encode($user->email),'mailto:'.$user->email); ?></td>
    <td><?php $confirm=CJavaScript::quote("Изменить роль пользователя '{$user->getUserName()}'?");
	    $ajax='jQuery("#content").load(location.href,{"user":'.$user->id.',"role":this.value});';
	    echo chtml::activeDropDownList($user,'role',$user->getRolesOptions(),array(
      	  'onchange'=>'if(confirm(\''.$confirm.'\'))'.$ajax.' else return false;',
          'id'=>'user_'.$user->id.'_role'
          )); ?>
    </td>
    <td>
	    <?php $confirm=CJavaScript::quote(($user->activated?'Деа':'А')."ктивировать пользователя '{$user->username}'?");
		    $ajax='jQuery("#content").load(location.href,{"user":'.$user->id.',"activation":1});';
		    echo chtml::activeCheckBox($user,'activated',array(
	      	  'onclick'=>'if(confirm(\''.$confirm.'\'))'.$ajax.' else return false;',
	      	  'id'=>'user_'.$user->id.'_activation',
          )); ?>
    </td>
    <td class="admin_actions">
        <?php if($user->id!=Yii::app()->user->id) echo CHtml::link(CHtml::image('/images/admin/actions/delete.png','Удалить',array('title'=>'Удалить')),array('delete','id'=>$user->id),array('class'=>'action_delete')); ?>
        <?php if($user->id==Yii::app()->user->id) echo CHtml::link(CHtml::image('/images/admin/actions/edit.png','Редактировать',array('title'=>'Редактировать')),array('update'),array('class'=>'action_edit')); ?>
    </td>
  </tr>
<?php endforeach; ?>
</table>

<?php $this->widget('CLinkPager',array('pages'=>$pages,)); ?>