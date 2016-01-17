<h1 id='pageTitle'><?php echo $this->pageTitle='Бизнес процессы';?></h1>
<?php $this->widget('HierarchyBreadCrumbs',array('model'=>$parent,'rootElement'=>array(
		'label'=>'Бизнес процесы',
		'url'=>array('admin'),
))); ?>
<table class="dataGrid" cellpadding="0" cellspacing="0">
  <thead>
  <tr>
    <th><?php echo $sort->link('code'); ?></th>
    <th><?php echo $sort->link('name'); ?></th>
	<th>Действия</th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::link(CHtml::encode($model->code),array('admin','id'=>$model->id)); ?></td>
    <td><?php echo CHtml::encode($model->name); ?></td>
    <?php $this->widget('AdminActions',
		array(
			'urlParams'=>array('id'=>$model->id),
			'element'=>'td'
		)
	); ?>
  </tr>
<?php endforeach; ?>
<?php if(count($models)<=0):?>
	<tr><td colspan="2"><p>Бизнесс процессов нет</p></td><td></td></tr>
<?php endif;?>
  </tbody>
</table>

<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>

<div class="admin_actions">
	<?php echo CHtml::link('Добавить Бизнесс процесс',array('create','pid'=>$parent->id), array('class'=>'create box_form')); ?>
</div>