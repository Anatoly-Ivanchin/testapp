<h1 id='pageTitle'><?php echo $this->pageTitle='Департаменты';?></h1>
<?php $this->widget('HierarchyBreadCrumbs',array('model'=>$parent,'rootElement'=>
		array(
				'label'=>'Департаменты',
				'url'=>'admin',
				))); ?>
<table class="dataGrid" cellpadding="0" cellspacing="0">
  <thead>
  <tr>
    <th><?php echo $sort->link('name'); ?></th>
	<th>Действия</th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::link(CHtml::encode($model->name),array('admin','id'=>$model->id)); ?></td>
    <?php $this->widget('AdminActions',
		array(
			'urlParams'=>array('id'=>$model->id),
			'element'=>'td'
		)
	); ?>
  </tr>
<?php endforeach; ?>
<?php if(count($models)<=0):?>
	<tr><td colspan="1"><p>Отделов нет</p></td><td></td></tr>
<?php endif;?>
  </tbody>
</table>

<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>

<div class="admin_actions">
	<?php echo CHtml::link('Добавить отдел',array('create','pid'=>$parent->id), array('class'=>'create box_form')); ?>
</div>