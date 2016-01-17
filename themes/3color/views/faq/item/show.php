<h1 id="pageTitle"><?php echo CHtml::encode($model->title);?></h1>
<div id="faq_<?php echo $model->id;?>" class="faq_item">
	<div class="faq_info">
		<div class="faq_user"><a href="<?php echo ($model->author->networks[0])?$model->author->networks[0]->identity:'#';?>" target="_blank" ><?php echo $model->displayUserName();?></a></div>
		<div class="faq_time"><?php echo Yii::app()->dateFormatter->format(Yii::app()->params['dateFormats']['faq'], $model->qTime); ?></div>
	</div>
	<div class="faq_msg_container faq_right">
		<div class="faq_msg">
			<div class="faq_question"><?php echo CHtml::encode($model->question);?></div>
		</div>
		<?php if($model->answer): ?>
			<div class="faq_answer_container">
				<div class="faq_answer_info">
					Ответ&nbsp;от&nbsp;<a href="<?php echo ($model->answerAuthor->networks[0])?$model->answerAuthor->networks[0]->identity:'#';?>" class="answer_author" target="_blank"><?php echo $model->answerAuthor->userName;?></a>
					:&nbsp;<span class="comment_time"><?php echo Yii::app()->dateFormatter->format(Yii::app()->params['dateFormats']['faq'], $model->aTime); ?></span>
				</div>
				<div class="faq_answer"><?php echo $model->answer; ?></div>
			</div>
		<?php endif; ?>
	</div>
	<?php $this->widget('AdminActions',
	array(
		'urlParams'=>array('id'=>$model->id),
		'actions'=>array('edit'=>array('title'=>'Ответить'),'delete'=>false)
	)
); ?>
</div>
<div id="back_link"><?php echo CHtml::link('Назад', array('block/show','url'=>$model->block->url));?></div>

