<?php $this->pageTitle='Новые пользователи'; ?>


<table class="dataGrid" cellpadding="0" cellspacing="0">
  <thead>
  <tr>
  	<th>&nbsp;</th>
    <th><?php echo $sort->link('userName'); ?></th>
	<th>Действия</th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
	<td class="user_img_small"><?php echo CHtml::image($model->avaUrl,$model->getUserName(),array('title'=>$model->getUserName()));?></td>
    <td><?php echo CHtml::link(CHtml::encode($model->userName),'#'); ?></td>
    <td class="admin_actions">
		<?php echo CHtml::link('Добавить сотрудника',array('create','id'=>$model->id), array('class'=>'create box_form')); ?>
	</td>
  </tr>
<?php endforeach; ?>
<?php if(count($models)<=0):?>
	<tr><td colspan="2"><p>Новых пользователей нет</p></td><td></td></tr>
<?php endif;?>
  </tbody>
</table>

<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>