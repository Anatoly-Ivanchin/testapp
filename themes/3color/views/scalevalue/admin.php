<h1 id='pageTitle'><?php echo $this->pageTitle='Значения шкалы "'.$scale->name.'"'; ?></h1><div class="back_link">
<?php echo CHtml::link('Вернуться к списку шкал',array('scale/admin')) ?>
</div>

<table class="dataGrid" cellpadding="0" cellspacing="0">
  <thead>
  <tr>
    <th><?php echo $sort->link('name'); ?></th>
    <th><?php echo $sort->link('value'); ?></th>
	<th>Действия</th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::encode($model->name); ?></td>
    <td><?php echo $model->value; ?>% </td>
    <?php $this->widget('AdminActions',
		array(
			'urlParams'=>array('id'=>$model->id),
			'element'=>'td',
		)
	); ?>
  </tr>
<?php endforeach; ?>
<?php if(count($models)<=0):?>
	<tr><td colspan="2"><p>Значений нет</p></td><td></td></tr>
<?php endif;?>
  </tbody>
</table>

<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>

<div class="admin_actions">
	<?php echo CHtml::link('Добавить значение',array('create','sid'=>$scale->id), array('class'=>'create box_form')); ?>
</div>
