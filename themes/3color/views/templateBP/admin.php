<h1 id="pageTitle"><?php echo $this->pageTitle='Шаблоны бонусных планов';?></h1>
<div id="filter">
	<?php echo CHtml::beginForm('','get'); ?>
	<?php echo CHtml::label('Сотрудник:', 'eid');
		echo CHtml::dropDownList('eid', $_POST['eid'], $this->getEmployeeOptions(),array('prompt'=>'Все'));?>
	<?php echo CHtml::label('Состояние:', 'type');
		echo CHtml::dropDownList('type',  $_POST['type'], $this->getTypeOptions(),array('prompt'=>'Все'));?>
	<?php echo  CHtml::endForm();?>
</div>
<script type="text/javascript">
$("#filter select").change(function(e){
	var inputs=$("#filter input,select");
	var data={};
	for(var i=0;i<inputs.length;i++){
		var input=inputs.eq(i);
		if(input.val()!=''){
			data[input.attr('name')]=input.val();
		}
	}
	$('#content').load('',data);
});
</script>
<?php //$this->widget('HierarchyBreadCrumbs',array('model'=>$parent)); ?>
<table class="dataGrid" cellpadding="0" cellspacing="0">
  <thead>
  <tr>
    <th><?php echo $sort->link('fullName'); ?></th>
    <th><?php echo $sort->link('periodType'); ?></th>
    <th><?php echo $sort->link('validTerm'); ?></th>
    <th><?php echo $sort->link('updateDate'); ?></th>
	<th>Действия</th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::link(CHtml::encode($model->employee->fullName),array('templateBPKPI/admin','tmpid'=>$model->id)); ?></td>
    <td><?php echo $model->periodName; ?></td>
    <td><?php echo $model->getValidTerm(); ?></td>
    <td><?php echo Yii::app()->dateFormatter->format('yyyy.MM.dd hh:mm', $model->updateDate); ?></td>
    <?php $this->widget('AdminActions',
		array(
			'urlParams'=>array('id'=>$model->id),
			'element'=>'td'
		)
	); ?>
  </tr>
<?php endforeach; ?>
<?php if(count($models)<=0):?>
	<tr><td colspan="4"><p>Шаблонов нет</p></td><td></td></tr>
<?php endif;?>
  </tbody>
</table>

<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>

<div class="admin_actions">
	<?php echo CHtml::link('Добавить шаблон',array('create'), array('class'=>'create box_form')); ?>
</div>
<div class="clear"></div>