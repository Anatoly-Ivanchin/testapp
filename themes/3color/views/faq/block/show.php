<?php if(!isset($_GET['page'])):?>
	<h1 id="pageTitle"><?php echo $block->title;?></h1>
	<div class="faq_block_description">
		<?php echo $block->description?>
	</div>
	<?php $this->widget('AdminActions',
		array(
			'urlParams'=>array('id'=>$block->id)
		)
	); ?>
	<div id="faq_new_question" class="form">
		<h2>Лечились у нас? Оставьте, пожалуйста, свой отзыв!</h2>
		<?php if(Yii::app()->user->getIsGuest())
			$this->widget('users.components.UloginWidget',array(
				'showButtunsAlways'=>true,
				'action'=>array('create'),
				'callback'=>login,
			));
		else
			$this->renderPartial('newQuestion',array('model'=>$newQ));
	?>
	</div>
	<div class="faq_list">
<?php endif;?>
	<?php foreach ($questions as $item):?>
		<div id="faq_<?php echo $item->id;?>" class="faq_item">
			<div class="faq_info">
				<div class="faq_user"><a href="<?php echo ($item->author->networks[0])?$item->author->networks[0]->identity:'#';?>" target="_blank" ><?php echo $item->displayUserName();?></a></div>
				<div class="faq_time"><?php echo Yii::app()->dateFormatter->format(Yii::app()->params['dateFormats']['faq'], $item->qTime); ?></div>
			</div>
			<div class="faq_msg_container faq_right">
				<div class="faq_msg">
					<h2><?php echo CHtml::link(CHtml::encode($item->title),array('item/show','url'=>$block->url,'id'=>$item->id));?></h2>
					<div class="faq_question"><?php echo CHtml::encode($item->getShortQuestion());?></div>
					<div class="back_link"><?php echo CHtml::link('читать весь отзыв', array('item/show','url'=>$block->url,'id'=>$item->id));?></div>
				</div>
				<?php if($item->answer): ?>
					<div class="faq_answer_container">
						<div class="faq_answer_info">
							Ответ&nbsp;от&nbsp;<a href="<?php echo ($item->answerAuthor->networks[0])?$item->answerAuthor->networks[0]->identity:'#';?>" class="answer_author" target="_blank"><?php echo $item->answerAuthor->userName;?></a>
							:&nbsp;<span class="comment_time"><?php echo Yii::app()->dateFormatter->format(Yii::app()->params['dateFormats']['faq'], $item->aTime); ?></span>
						</div>
						<div class="faq_answer"><?php echo $item->answer; ?></div>
					</div>
				<?php endif; ?>
			</div>
			<?php $this->widget('AdminActions',
				array(
					'urlParams'=>array('id'=>$item->id),
					'urlPattern'=>'item/??',
					'actions'=>array('edit'=>array('title'=>'Ответить'))
				)
			); ?>
		</div>
	<?php endforeach;?>
	<?php $this->widget('CLinkPager',array('pages'=>$pages,'nextPageLabel'=>'Еще отзывы')); ?>
</div>