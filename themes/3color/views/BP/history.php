<table class="dataGrid" cellpadding="0" cellspacing="0">
  <thead>
  <tr>
    <th><?php echo $models[0]->getAttributeLabel('date'); ?></th>
    <th><?php echo $models[0]->getAttributeLabel('state'); ?></th>
    <th><?php echo $models[0]->getAttributeLabel('authorId'); ?></th>
	<th><?php echo $models[0]->getAttributeLabel('comment'); ?></th>  
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo Yii::app()->dateFormatter->format('dd.MM.yyyy HH:ss', $model->date);?></td>
    <td><?php echo $model->stateName; ?></td>
    <td><?php echo $model->user->getUserName(1); ?></td>
    <td><?php echo CHtml::encode($model->comment); ?></td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>