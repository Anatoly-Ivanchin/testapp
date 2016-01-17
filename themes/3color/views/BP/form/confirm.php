<div class="status_form">
<?php echo CHtml::beginForm(); ?>
<div id="info"><p><?php eval('echo "'.$msg.'";'); ?></p></div>
<div class="simple">
<label for="change_status_comment">Комментарий</label>
<input type="hidden" name="ok" value="1">
<textarea id="change_status_comment" name="comment" maxlength="512" style="width: 589px;"></textarea>
</div>
<div class="simple action">
	<?php echo CHtml::button('Ok', array('name'=>'ok', 'onclick'=>
		CHtml::ajax(array(
			'url'=> Yii::app()->getRequest()->getUrl(),
			'update'=>'.fancybox-inner',
			'type'=>'post',
			'data'=>array('ok'=>true),
			'beforeSend'=>'function(){
			if(typeof(ckeditor) !== "undefined" && ckeditor != null) {
				ckeditor.updateElement();
			}
			this.data=jQuery(".fancybox-inner form").serialize();
		}',
		))

	)); ?>
	<?php echo CHtml::button('Отмена', array('onclick'=>'$.fancybox.close()')); ?>
</div>
<?php echo CHtml::endForm(); ?>
</div>