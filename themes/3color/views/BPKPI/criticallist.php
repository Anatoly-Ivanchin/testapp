<?php $this->pageTitle='БП '.$bp->name;?>

<table class="dataGrid" cellpadding="0" cellspacing="0">
  <thead>
  <tr>
    <th><?php echo $sort->link('name'); ?></th>
    <th><?php echo $sort->link('unit'); ?></th>
    <th><?php echo $sort->link('factValue'); ?></th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::encode($model->kpi->name); ?></td>
    <td><?php echo $model->kpi->unit; ?></td>
    <td><?php echo $model->getFactValue(); ?></td>
  </tr>
<?php endforeach; ?>
<?php if(count($models)<=0):?>
	<tr><td colspan="2"><p>KPI нет</p></td><td></td></tr>
<?php endif;?>
  </tbody>
</table>