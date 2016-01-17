<?php echo CHtml::button('Ok', array('onclick'=>
	CHtml::ajax(array(
		'url'=> Yii::app()->getRequest()->getUrl(),
		'update'=>'.fancybox-inner',
		'type'=>'post',
		'data'=>array('ok'=>true),
	))
)); ?>
<?php echo CHtml::button('Отмена', array('onclick'=>'$.fancybox.close()')); ?>