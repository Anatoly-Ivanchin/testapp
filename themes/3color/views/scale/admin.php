<h1 id='pageTitle'><?php echo $this->pageTitle='Шкалы'; ?></h1>

<table class="dataGrid" cellpadding="0" cellspacing="0">
  <thead>
  <tr>
    <th><?php echo $sort->link('name'); ?></th>
    <th><?php echo $sort->link('unit'); ?></th>
    <th><?php echo $sort->link('type'); ?></th>
	<th>Действия</th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::encode($model->name); ?></td>
    <td><?php echo CHtml::encode($model->unit); ?></td>
    <td><?php echo $model->typeName; ?></td>
    <?php if($model->type==Scale::TYPE_DISCRETE)
    	$actions=array(
				'values'=>array(
					'title'=>'Значения',
					'url'=>array('scalevalue/admin','sid'=>$model->id),
					'icon'=>'list.png',
					'class'=>'action_values',
				),
			);
     $this->widget('AdminActions',
		array(
			'urlParams'=>array('id'=>$model->id),
			'element'=>'td',
			'actions'=>$actions
		)
	); ?>
  </tr>
<?php endforeach; ?>
<?php if(count($models)<=0):?>
	<tr><td colspan="3"><p>Шкал нет</p></td><td></td></tr>
<?php endif;?>
  </tbody>
</table>

<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>

<div class="admin_actions">
	<?php echo CHtml::link('Добавить непрерывную шкалу',array('createcontinuous'), array('class'=>'create box_form')); ?>
	<?php echo CHtml::link('Добавить дискретную шкалу',array('createdescrete'), array('class'=>'create box_form')); ?>
</div>