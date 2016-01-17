<?php echo CHtml::beginForm(Yii::app()->request->getRequestUri(),'get'); ?>

<div class="simple action">
<?php echo CHtml::submitButton('Искать');?>
</div>

<div class="simple">
<?php echo CHtml::activeDropDownList($model, 'author', Authors::model()->getOptions(),array('prompt'=>$model->getAttributeLabel('author'))); ?>
<?php echo CHtml::activeTextField($model,'name',array(
		'maxlength'=>255,
		'title'=>$model->getAttributeLabel('name'),
		'onkeyup'=>'if(this.value=="") {this.value=this.title;}',
		'onkeydown'=>'if(this.value==this.title){this.value=null}',
	)); ?>
</div>
<script type="text/javascript">
<!--
	jQuery(function($){
		var input = jQuery("#SearchForm_name");
		if(input.val()=='')
			input.val(input.attr('title'));
		input.parent().parent().submit(function(e){
			if(input.val()==input.attr('title'))
				input.val('');
		});
		
	});
//-->
</script>

<div class="simple">
<?php echo CHtml::activeLabelEx($model,'startDate'); ?>
<?php 
	$this->widget('zii.widgets.jui.CJuiDatePicker',array(
		'model'=>$model,
		'attribute'=>'startDate',
		'language'=>'ru',
		'cssFile'=>null,
		'options'=>array(
			'dateFormat'=>'yy-mm-dd',
			'changeMonth'=> true,
			'changeYear'=> true,
		)
	));
?>
<?php echo CHtml::activeLabelEx($model,'endDate'); ?>
<?php 
	$this->widget('zii.widgets.jui.CJuiDatePicker',array(
		'model'=>$model,
		'attribute'=>'endDate',
		'language'=>'ru',
		'cssFile'=>null,
		'options'=>array(
			'dateFormat'=>'yy-mm-dd',
			'changeMonth'=> true,
			'changeYear'=> true,
		)
	));
?>
</div>


<?php echo CHtml::endForm(); ?>