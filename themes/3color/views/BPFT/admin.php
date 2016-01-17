<?php $this->pageTitle='ФЗ для '.$bp->name;?>


<?php if($bp->getFTTotalWeight()<100): ?>
<div id="info"><p>Внимание: сумарный вес всех ФЗ составляет менее 100%!</p>
<p>Добавте новые ФЗ или измените веса существующих ФЗ так что бы их сумарный вес составил ровно 100%.</p></div>
<?php endif;?>
<?php if($bp->getFTTotalWeight()>100): ?>
<div class="errorSummary"><p>Внимание: сумарный вес всех ФЗ превышает 100%!</p>
<p>Как такое случилось - никто не знает, но такая ситуация может привести к проблемам в будущем! Во избежание неприятных инцидентов измените веса существующих ФЗ так что бы их сумарный вес составил ровно 100%.</p></div>
<?php endif;?>

<table class="dataGrid" cellpadding="0" cellspacing="0">
  <thead>
  <tr>
    <th><?php echo $sort->link('bpName'); ?></th>
    <th><?php echo $sort->link('name'); ?></th>
    <th><?php echo $sort->link('criteria'); ?></th>
    <th><?php echo $sort->link('percent'); ?></th>
    <th><?php echo $sort->link('planDate'); ?></th>
    <th><?php echo $sort->link('factDate'); ?></th>
	<th>Действия</th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::encode($model->businessprocess->name); ?></td>
    <td><?php echo CHtml::encode($model->name); ?></td>
    <td><?php echo CHtml::encode($model->criteria); ?></td>
    <td><?php echo $model->percent; ?>%</td>
    <td><?php echo Yii::app()->dateFormatter->format('dd.MM.yyyy', $model->planDate); ?></td>
    <td><?php echo $model->factDate?Yii::app()->dateFormatter->format('dd.MM.yyyy', $model->factDate):'?'; ?></td>
    <?php if($bp->getMode()==BP::MODE_EDIT): $this->widget('AdminActions',
		array(
			'urlParams'=>array(
				'bpid'=>$model->bpId,
				'id'=>$model->id,
			),
			'element'=>'td'
		)
	); else:?><td></td><?php endif;?>
  </tr>
<?php endforeach; ?>
<?php if(count($models)<=0):?>
	<tr><td colspan="6"><p>Функциональных задач нет</p></td><td></td></tr>
<?php endif;?>
  </tbody>
</table>

<div class="admin_actions">
	<?php echo CHtml::link('Добавить ФЗ',array('create','bpid'=>$bp->id), array('class'=>'create box_form')); ?>
</div>
<div class="clear"></div>