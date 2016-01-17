<h1 id="pageTitle"><?php echo $this->pageTitle='Мои Бонусные планы';?></h1>
<?php if($this->hasMessages()):?>
	<div id="info">
	<?php foreach ($this->getMessages() as $msg) echo "<p>{$msg}</p>"?>
	</div>
<?php endif;?>

<?php if($this->getCurrTemplate ()!=null):?><div class="admin_actions">
	<?php echo CHtml::link('Добавить бонусный план',array('create'), array('class'=>'create box_form')); ?>
</div><?php endif;?>

<table class="dataGrid" cellpadding="0" cellspacing="0">
  <thead>
  <tr>
    <th><?php echo $sort->link('period'); ?></th>
    <th><?php echo $sort->link('periodType'); ?></th>
    <th><?php echo $sort->link('updateDate'); ?></th>
    <th><?php echo $sort->link('state'); ?></th>
    <th><?php echo $sort->link('result'); ?></th>
	<th>Действия</th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::link($model->periodObj->name,array('BP/show','id'=>$model->id)); ?></td>
    <td><?php echo $model->periodName; ?></td>
    <td><?php echo Yii::app()->dateFormatter->format('yyyy.MM.dd hh:mm', $model->updateDate); ?></td>
    <td class="<?php echo $this->getStatusClass($model); ?>"><?php echo $model->getStatusName(); ?></td>
    <?php if($model->state>=BP::STATUS_RATED):?>
    <td class="<?php echo $model->resultClass?>"><?php echo $model->result; ?>%</td>
    <?php else:?>
    <td>?</td>
    <?php endif;?>
    <?php if($model->state<bp::STATUS_RATED)
    	$this->widget('AdminActions',
			array(
				'urlParams'=>array('id'=>$model->id),
				'element'=>'td',
				'actions'=>array('edit'=>false),
			));
   else echo'<td></td>';?>
  </tr>
<?php endforeach; ?>
<?php if(count($models)<=0):?>
	<tr><td colspan="5"><p>Бонусных планов нет</p></td><td></td></tr>
<?php endif;?>
  </tbody>
</table>

<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>
<div class="clear"></div>