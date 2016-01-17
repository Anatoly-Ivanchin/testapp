<h1 id="pageTitle"><?php echo $model->name;?></h1>

<div id="template_BP">
	<div id="employee_info">
		<div id="user_img" class="pictures">
        	<?php echo CHtml::image($model->getImageUrl('small'),$model->name);?>
    	</div>
	</div>
	<div id="template_info">
		<dl>
			<dt><?php echo $model->getAttributeLabel('author');?></dt>
			<dd><?php echo $model->author->fullname?></dd>
			
			<dt><?php echo $model->getAttributeLabel('date');?></dt>
			<dd><?php echo Yii::app()->dateFormatter->format(Yii::app()->params['dateFormats']['admin'], $model->date); ?></dd>
			
			<dt><?php echo $model->getAttributeLabel('date_create');?></dt><dd>
			<?php echo Yii::app()->dateFormatter->format(Yii::app()->params['dateFormats']['admin'], $model->date_create); ?></dd>
			
			<dt><?php echo $model->getAttributeLabel('date_update');?></dt>
			<dd><?php echo Yii::app()->dateFormatter->format(Yii::app()->params['dateFormats']['admin'], $model->date_update); ?></dd>
			
		</dl>
	</div>
	<div class="clear"></div>
</div>