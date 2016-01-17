<div class="row"><?php echo CHtml::image($model->getImageUrl('preview'))?></div>
<div id="uploaded_files" class="row"></div>
<div class="row">
	<?php 
	$key=time();
	echo CHtml::hiddenField('picturesKey',$key);	
	$this->widget('ext.EFineUploader.EFineUploader',array(
		'config'=>array(
		'request'=>array(
				'endpoint'=>$this->createUrl('upload'),
				'params'=>array('YII_CSRF_TOKEN'=>Yii::app()->request->csrfToken,'key'=>$key),
			),
		)
	));?>
</div>