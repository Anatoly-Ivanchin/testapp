<?php $cs = Yii::app()->getClientScript();
    $cs->registerCoreScript('jquery');
    $cs->registerScriptFile('/js/compactlabels.js',CClientScript::POS_END);
    $cs->registerScript('faq_new_question','var f=new compactLabels();f.init(\'#faq_new_question>form\');');
    echo CHtml::beginForm();
	echo CHtml::hiddenField('block',$model->blockId);
	echo CHtml::errorSummary($model); 
	if($model->answer=='new'):$model->answer=null;?>
	<div id="success">Спасибо за отзыв!</div>
	<?php endif;?>
	<div class="faq_info">
		<div class="faq_user"><?php echo User::current()->userName;?></div>
	</div>
	<div class="faq_right">
		<div id="faq_title">
			<?php echo CHtml::activeLabelEx($model,'title'); ?>
			<?php echo CHtml::activeTextField($model,'title'); ?>
		</div>
		<div class="faq_msg_container">
			<?php echo CHtml::activeLabelEx($model,'question'); ?>
			<?php echo CHtml::activeTextArea($model,'question',array()); ?>
		</div>
		<div id="faq_btn" class="button">
			<?php echo CHtml::button('Отправить', array(
				'class'=>'btn',
				'onclick'=>CHtml::ajax(array(
					'url'=> Yii::app()->getRequest()->getUrl(),
					'update'=>'#content',
					'type'=>'post'
				))
			));?>
		</div>
	</div>
<?php echo CHtml::endForm();?>