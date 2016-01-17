<?php echo CHtml::beginForm(); ?>
<div id="info"><p><?php eval('echo "'.$msg.'";'); ?></p></div>
<div class="simple action">
	<?php echo CHtml::button('Ok', array('onclick'=>
		CHtml::ajax(array(
			'url'=> Yii::app()->getRequest()->getUrl(),
			'update'=>'.fancybox-inner',
			'type'=>'post',
			'data'=>array('ok'=>true),
		))
	)); ?>
	<?php echo CHtml::button('Отмена', array('onclick'=>'$.fancybox.close()')); ?>
</div>
<?php echo CHtml::endForm(); ?>