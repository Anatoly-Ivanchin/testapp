<?php $this->pageTitle='Управление сотрудниками'; ?>

<div id="filter">
	<?php echo CHtml::beginForm('','get'); ?>
	<?php echo CHtml::dropDownList('department', $departmentId, $departments);?>
	<?php echo  CHtml::endForm();?>
</div>
<script type="text/javascript">
$("#department").change(function(e){
	var container=$(".ui-tabs-panel:visible");
	var url=container.data("src");
	if(url.match(/department/i))
		url=url.replace(/[\?\/]?department[=\/]-?\d+/i,'');
	url+='?department='+this.value;
	container.data("src",url);
	container.load(url);
});
</script>

<table class="dataGrid" cellpadding="0" cellspacing="0">
  <thead>
  <tr>
  	<th>&nbsp;</th>
    <th><?php echo $sort->link('fullName'); ?></th>
	<th>Действия</th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
	<td class="user_img_small"><?php echo CHtml::image($model->user->avaUrl,$model->getFullName(),array('title'=>$model->getFullName()));?></td>
    <td><?php echo CHtml::link(CHtml::encode($model->fullName),'#'); ?></td>
    <?php $this->widget('AdminActions',
		array(
			'urlParams'=>array('id'=>$model->user->id),
			'element'=>'td'
		)
	); ?>
  </tr>
<?php endforeach; ?>
<?php if(count($models)<=0):?>
	<tr><td colspan="2"><p>Сотрудников нет</p></td><td></td></tr>
<?php endif;?>
  </tbody>
</table>

<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>