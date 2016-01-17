<?php $this->pageTitle='Управление соцсетями'; ?>

<table class="dataGrid" cellpadding="0" cellspacing="0">
  <tr>
    <th><?php echo $sort->link('network'); ?></th>
    <th>&nbsp;</th>
  </tr>
<?php
	$nws=array(); 
	foreach($networks as $n=>$nw): $nws[]=$nw->network;?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::link(CHtml::encode($nw->network),$nw->identity,array('target'=>'_blank')); ?></td>
    <?php $this->widget('AdminActions',
		array(
			'actions'=>array('edit'=>''),
			'urlParams'=>array('id'=>$nw->id),
			'element'=>'td',
		)
	); ?>
  </tr>
<?php endforeach; ?>
</table>
<?php $this->widget('CLinkPager',array('pages'=>$pages,)); ?>
	
<div class="admin_actions">
	<span class="create">Добавить</span>
	<?php  $btns=$this->createWidget('users.components.UloginWidget',array(
		'showButtunsAlways'=>true,
		'fields'=>array('first_name'),
		'action'=>array('create'),
		'callback'=>addnetwork,
	)); 
	$btns->providers=array_diff($btns->providers, $nws);
	$btns->hidden=array_diff($btns->hidden, $nws);
	$btns->run();
	Yii::app()->clientScript->registerScript($this->getId(),"function addnetwork(token){
  		jQuery('#create_result').load('".$this->createUrl('create')."',{'token':token},function(){
			setTimeout(function(){jQuery('#content').load('".$this->createUrl('admin')."')},3000);
		});
	}", CClientScript::POS_BEGIN);
	?>
	<div id="create_result"></div>
</div>