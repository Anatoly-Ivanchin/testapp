<table class="dataGrid" cellpadding="0" cellspacing="0">
<?php $bpft=BPFT::model(); ?>
  <thead>
  <tr>
    <th><?php echo $bpft->getAttributeLabel('processId'); ?></th>
    <th><?php echo $bpft->getAttributeLabel('name'); ?></th>
    <th><?php echo $bpft->getAttributeLabel('criteria'); ?></th>
	<th><?php echo $bpft->getAttributeLabel('percent'); ?></th>
	<th><?php echo $bpft->getAttributeLabel('planDate'); ?></th>
	<th><?php echo $bpft->getAttributeLabel('factDate'); ?></th>  
  </tr>
  </thead>
  <tbody>
<?php foreach($fts as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
  <?php if($model->hasErrors()):?><td></td><td colspan="5"><?php echo CHtml::errorSummary($model); ?>
  </td></tr><tr class="<?php echo $n%2?'even':'odd';?>">
  <?php endif;?>
    <td><?php echo CHtml::encode($model->businessprocess->name); ?></td>
    <td><?php echo CHtml::encode($model->name); ?></td>
    <td><?php echo CHtml::encode($model->criteria); ?></td>
    <td><?php echo $model->percent; ?>%</td>
    <td><?php echo Yii::app()->dateFormatter->format('dd.MM.yyyy', $model->planDate); ?></td>
    <td><?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
		'model'=>$model,
		'attribute'=>"[{$model->id}]factDate",
		'language'=>'ru',
		'cssFile'=>null,
		'options'=>array(
			'dateFormat'=>'yy-mm-dd',
			'changeMonth'=> true,
			'changeYear'=> true,
		)
	)); ?></td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>