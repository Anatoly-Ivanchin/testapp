<h1 id="pageTitle"><?php echo $this->pageTitle='ШБП '.$template->name;?></h1>
<div class="back_link">
<?php echo CHtml::link('Вернуться к списку ШБП',array('templateBP/admin')) ?>
</div>
<div id="template_BP">
	<div id="employee_info">
		<h2>Сотрудник</h2>
		<div id="user_img" class="pictures">
        	<?php echo CHtml::image($template->user->avaFullUrl);?>
    	</div>
		<dl id="employee_params">
			<dt>ФИО</dt><dd><?php echo CHtml::encode($template->employee->fullName);?></dd>
			<dt>Отдел</dt><dd><?php echo CHtml::encode($template->employee->department->name);?></dd>
			<dt>Должность</dt><dd><?php echo CHtml::encode($template->employee->position);?></dd>
		</dl>
	</div>
	<div id="template_info">
		<h2>Параметры шаблона</h2>
		<dl>
			<dt>Тип периода</dt><dd><?php echo $template->periodName?></dd>
			<dt>Начало действия</dt><dd><?php echo Yii::app()->dateFormatter->format('MMMM yyyy', $template->startDate);?></dd>
			<dt>Окончание действия</dt><dd><?php echo Yii::app()->dateFormatter->format('MMMM yyyy', $template->endDate);?></dd>
			<dt>Вес отведенный для ФЗ</dt><dd><?php echo $template->ftWeight;?>%</dd>
			<dt>Состояние</dt><dd><?php echo $template->getStatus();?></dd>
		</dl>
		<h2>Дополнительные параметры</h2>
		<dl>
			<dt>Создал</dt><dd><?php echo $template->author->fullName?></dd>
			<dt>Дата создания</dt><dd><?php echo Yii::app()->dateFormatter->format('dd MMMM yyyy HH:ss', $template->createDate);?></dd>
			<dt>Дата изменения</dt><dd><?php echo Yii::app()->dateFormatter->format('dd MMMM yyyy HH:ss', $template->updateDate);?></dd>
		</dl>
	</div>
	<div class="clear"></div>
</div>
<h2> Список KPI</h2>

<?php if($template->getKPITotalWeight()<100): ?>
<div id="info"><p>Внимание: сумарный вес всех KPI составляет менее 100%!</p>
<p>Добавте новые KPI или измените веса существующих KPI так что бы их сумарный вес составил ровно 100%.</p></div>
<?php endif;?>
<?php if($template->getKPITotalWeight()>100): ?>
<div class="errorSummary"><p>Внимание: сумарный вес всех KPI превышает 100%!</p>
<p>Как такое случилось - никто не знает, но такая ситуация может привести к проблемам в будущем! Во избежание неприятных инцидентов измените веса существующих KPI так что бы их сумарный вес составил ровно 100%.</p></div>
<?php endif;?>

<table class="dataGrid" cellpadding="0" cellspacing="0">
  <thead>
  <tr>
    <th><?php echo $sort->link('name'); ?></th>
    <th><?php echo $sort->link('percent'); ?></th>
    <th><?php echo $sort->link('isCritical'); ?></th>
	<th>Действия</th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::encode($model->kpi->name); ?></td>
    <td><?php echo $model->percent; ?>%</td>
    <td><?php echo $model->isCriticalCaption; ?></td>
    <?php $this->widget('AdminActions',
		array(
			'urlParams'=>array(
				'tmpid'=>$model->templateId,
				'kpiid'=>$model->kpiId,
			),
			'element'=>'td'
		)
	); ?>
  </tr>
<?php endforeach; ?>
<?php if(count($models)<=0):?>
	<tr><td colspan="3"><p>KPI нет</p></td><td></td></tr>
<?php endif;?>
  </tbody>
</table>

<div class="admin_actions">
	<?php echo CHtml::link('Добавить KPI',array('create','tmpid'=>$template->id), array('class'=>'create box_form')); ?>
</div>
<div class="clear"></div>
<div class="back_link">
<?php echo CHtml::link('Вернуться к списку ШБП',array('templateBP/admin')) ?>
</div>