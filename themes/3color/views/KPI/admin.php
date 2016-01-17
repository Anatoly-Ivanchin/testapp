<h1 id='pageTitle'><?php echo $this->pageTitle='KPI'; ?></h1>

<table class="dataGrid" cellpadding="0" cellspacing="0">
  <thead>
  <tr>
    <th><?php echo $sort->link('name'); ?></th>
    <th><?php echo $sort->link('scale'); ?></th>
    <th><?php echo $sort->link('unit'); ?></th>
	<th>Действия</th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::encode($model->name); ?></td>
    <td><?php echo CHtml::encode($model->scale->name); ?></td>
    <td><?php echo CHtml::encode($model->unit); ?></td>
    <?php $this->widget('AdminActions',
		array(
			'urlParams'=>array('id'=>$model->id),
			'element'=>'td'
		)
	); ?>
  </tr>
<?php endforeach; ?>
<?php if(count($models)<=0):?>
	<tr><td colspan="2"><p>KPI нет</p></td><td></td></tr>
<?php endif;?>
  </tbody>
</table>

<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>

<div class="admin_actions">
	<?php echo CHtml::link('Добавить KPI',array('create'), array('class'=>'create box_form')); ?>
</div>