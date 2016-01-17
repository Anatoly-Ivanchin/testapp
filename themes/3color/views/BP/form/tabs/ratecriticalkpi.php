<table class="dataGrid" cellpadding="0" cellspacing="0">
  <thead>
  <tr>
  <?php $kpi=BPKPI::model(); ?>
    <th><?php echo $kpi->getAttributeLabel('kpi.name'); ?></th>
    <th><?php echo $kpi->getAttributeLabel('kpi.unit'); ?></th>
	<th><?php echo $kpi->getAttributeLabel('factValue'); ?></th>  
  </tr>
  </thead>
  <tbody>
<?php foreach($kpicritical as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
  <?php if($model->hasErrors()):?><td></td><td colspan="2"><?php echo CHtml::errorSummary($model); ?>
  </td></tr><tr class="<?php echo $n%2?'even':'odd';?>">
  <?php endif;?>
    <td><?php echo CHtml::encode($model->kpi->name); ?></td>
    <td><?php echo CHtml::encode($model->kpi->unit); ?></td>
    <td><?php echo $model->kpi->scale->createInput($model,"[{$model->kpi->id}]factValue"); ?></td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>