<?php echo CHtml::button('Сохранить', array('onclick'=>
	CHtml::ajax(array(
		'url'=> Yii::app()->getRequest()->getUrl(),
		'update'=>'.fancybox-inner',
		'type'=>'post',
		'beforeSend'=>'function(){
			if(typeof(ckeditor) !== "undefined" && ckeditor != null) {
				ckeditor.updateElement();
				this.data=jQuery(".fancybox-inner form").serialize();
			}
		}',
	))
)); ?>
<?php echo CHtml::button('Отмена', array('onclick'=>'$.fancybox.close()')); ?>