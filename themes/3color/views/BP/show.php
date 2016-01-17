<h1 id="pageTitle"><?php echo $model->name;?></h1>

<div id="template_BP">
	<div id="employee_info">
		<div id="user_img" class="pictures">
        	<?php echo CHtml::image($model->getImageUrl('full'),$model->name);?>
    	</div>
		<dl id="employee_params">
			<dt><?php $model->getAttributeName('date_update');?></dt><dd><?php echo CHtml::encode($model->employee->fullName);?></dd>
		</dl>
	</div>
	<div id="template_info">
		<h2>Параметры шаблона</h2>
		<dl>
			<?php if($model->state>=BP::STATUS_RATED):?>
			<dt class='result_title'>% премии</dt><dd class='result_value <?php echo $model->resultClass?>'><?php echo $model->result; ?>%</dd>
			<?php endif;?>
			<dt>За период</dt><dd><?php echo $model->periodObj->Name?></dd>
			<dt>Тип периода</dt><dd><?php echo $model->periodName?></dd>
			<dt>Вес отведенный для ФЗ</dt><dd><?php echo $model->ftWeight;?>%</dd>
			<dt>Состояние</dt><dd><?php echo $model->getStatusName();?></dd>
		</dl>
		<h2>Дополнительные параметры</h2>
		<dl>
			<dt>Дата создания</dt><dd><?php echo Yii::app()->dateFormatter->format('dd MMMM yyyy HH:ss', $model->createDate);?></dd>
			<dt>Дата изменения</dt><dd><?php echo Yii::app()->dateFormatter->format('dd MMMM yyyy HH:ss', $model->updateDate);?></dd>
		</dl>
	</div>
	<div class="clear"></div>
</div>

<?php if($model->getMode()!=BP::MODE_RATE):?>

<div id="bptabs">
	<ul class = "tabs">
	    <?php foreach($tabs as $id=>$tab):  ?>
	    <li id="item_<?php echo $id ?>" class="item">
	        <?php echo CHtml::link($tab['title'],$tab['url']) ?>
	    </li>
	    <?php endforeach; ?>
	</ul>
	<div class="clear"></div>
</div>

<script type="text/javascript">
<!--
jQuery(document).ready(function(){
	jQuery('#bptabs').tabs({load:function(e,ui){
			ui.panel.undelegate('a:not(.box_form)','click');
			ui.panel.delegate('a:not(.box_form)','click', {'panel':ui.panel},function(e){
				e.preventDefault();
				e.data.panel.data('src',this.href);
				e.data.panel.load(this.href);
			});
			ui.panel.data('src',ui.tab.find('a').attr('href'));
		}
	});
});
//-->
</script>

<?php else:?>
	<div id="rate_form" class="rate_form">
	<?php echo CHtml::beginForm('','post',array('enctype'=>'application/x-www-form-urlencoded'));
	echo CHtml::errorSummary($model); 
	$this->widget('CTabView',array(
		'id'=>'bptabs',
		'tabs'=>array(
			't1'=>array(
				'title'=>'KPI',
				'view'=>'form/tabs/ratekpi'
			),
			't2'=>array(
				'title'=>'Критичные KPI',
				'view'=>'form/tabs/ratecriticalkpi'
			),
			't3'=>array(
				'title'=>'Функциональные задачи',
				'view'=>'form/tabs/rateft'
			),
		),
		'viewData'=>array('kpis'=>$kpi,'fts'=>$ft,'kpicritical'=>$kpicritical),
	));?>
	<div class="simple action">
	<input type="submit" value="Сохранить" name="sbmt_btn" />
	</div>

	<?php echo CHtml::endForm(); ?>
	</div>
<!-- form -->
<?php endif;?>

<?php if($model->getMode()==BP::MODE_CONFIRM):?>
<div id="confirm_form">
<a id="action_confirm" class="confirm" href="confirm?id=<?php echo $model->id;?>">Утвердить</a>
<a id="action_deny" class="deny" href="deny?id=<?php echo $model->id;?>">Отклонить</a>
</div>
<?php endif; 
	if($model->getMode()==BP::MODE_CONFIRMRATE):?>
<div id="confirm_form">
<a id="action_confirm" class="confirm" href="confirmrate?id=<?php echo $model->id;?>">Утвердить оценку</a>
<a id="action_deny" class="deny" href="denyrate?id=<?php echo $model->id;?>">Отклонить оценку</a>
</div>
<?php endif; ?>

<script type="text/javascript">
<!--
jQuery(document).ready(function(){
	jQuery('#bptabs').tabs({load:function(e,ui){
			ui.panel.undelegate('a:not(.box_form)','click');
			ui.panel.delegate('a:not(.box_form)','click', {'panel':ui.panel},function(e){
				e.preventDefault();
				e.data.panel.data('src',this.href);
				e.data.panel.load(this.href);
			});
			ui.panel.data('src',ui.tab.find('a').attr('href'));
		}
	});
});
//-->
</script>

<div class="clear"></div>
<div class="back_link">
<?php echo CHtml::link('Вернуться к списку БП',Yii::app()->getRequest()->getUrlReferrer()) ?>
</div>