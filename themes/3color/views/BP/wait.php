<h1 id="pageTitle"><?php echo $this->pageTitle='Бонусные планы ожидающие утверждения';?></h1>
<?php if($this->hasMessages()):?>
	<div id="info">
	<?php foreach ($this->getMessages() as $msg) echo "<p>{$msg}</p>"?>
	</div>
<?php endif;?>

<table class="dataGrid" cellpadding="0" cellspacing="0">
  <thead>
  <tr>
    <th><?php echo $sort->link('fio'); ?></th>
    <th><?php echo $sort->link('period'); ?></th>
    <th><?php echo $sort->link('periodType'); ?></th>
    <th><?php echo $sort->link('state'); ?></th>
    <th><?php echo $sort->link('result'); ?></th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::link($model->employee->fullName,array('BP/show','id'=>$model->id),array('class'=>'static')); ?></td>
    <td><?php echo $model->periodObj->name; ?></td>
    <td><?php echo $model->periodName; ?></td>
    <td><?php echo $model->getStatusName(); ?></td>
    <?php if($model->state>=BP::STATUS_RATED):?>
    <td class="<?php echo $model->resultClass?>"><?php echo $model->result; ?>%</td>
    <?php else:?>
    <td>?</td>
    <?php endif;?>
  </tr>
<?php endforeach; ?>
<?php if(count($models)<=0):?>
	<tr><td colspan="4"><p>Бонусных планов нет</p></td><td></td></tr>
<?php endif;?>
  </tbody>
</table>

<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>
<div class="clear"></div>