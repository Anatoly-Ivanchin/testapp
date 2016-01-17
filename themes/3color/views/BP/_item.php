<div id="template_BP">
	<div id="employee_info">
		<h2>Сотрудник</h2>
		<div id="user_img" class="pictures">
        	<?php echo CHtml::image($model->user->avaFullUrl);?>
    	</div>
		<dl id="employee_params">
			<dt>ФИО</dt><dd><?php echo CHtml::encode($model->employee->fullName);?></dd>
			<dt>Отдел</dt><dd><?php echo CHtml::encode($model->employee->department->name);?></dd>
			<dt>Должность</dt><dd><?php echo CHtml::encode($model->employee->position);?></dd>
		</dl>
	</div>
	<div id="template_info">
		<h2>Параметры шаблона</h2>
		<dl>
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

<div class="clear"></div>