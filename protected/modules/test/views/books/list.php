<?php $this->pageTitle='Книги!'; ?>

<div id="filter" class="search_form"><?php $this->renderPartial('form/search_form',array('model'=>$searchForm));?></div>

<table class="dataGrid" cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $sort->link('name'); ?></th>
		<th><?php echo $sort->link('preview'); ?></th>
		<th><?php echo $sort->link('author'); ?></th>
		<th><?php echo $sort->link('date'); ?></th>
		<th><?php echo $sort->link('date_update'); ?></th>
		<th>Действия</th>
	</tr>
<?php foreach($models as $n=>$model): ?>
	<tr class="<?php echo $n%2?'even':'odd';?>">
		<td><?php echo $model->name; ?></td>
		<td><?php echo CHtml::link(CHtml::image($model->getImageUrl('preview'),$model->name),$model->getImageUrl('full'),array('class'=>'preview')); ?></td>
		<td><?php echo $model->author->shortname; ?></td>
		<td><?php echo Yii::app()->dateFormatter->format(Yii::app()->params['dateFormats']['admin'], $model->date); ?></td>
		<td><?php echo $model->formatDateUpdate(); ?></td>
		<td class="admin_actions" >
			<?php 
				echo CHtml::link(CHtml::image('/images/admin/actions/list.png','show'),array('show','id'=>$model->id),array('class'=>'box_form'));
				if(!Yii::app()->user->isGuest){
					echo CHtml::link(CHtml::image('/images/admin/actions/edit.png','edit'),array('update','id'=>$model->id),array('class'=>'box_form'));
					echo CHtml::link(CHtml::image('/images/admin/actions/delete.png','delete'),array('delete','id'=>$model->id),array('class'=>'box_form'));
				} 
			?>
		</td>
	</tr>
<?php endforeach; ?>
<?php if(count($models)<=0):?>
	<tr><td colspan="5"><p>Книги не найдены</p></td><td></td></tr>
<?php endif;?>
</table>

<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>
<div class="admin_actions">
	<?php if(!Yii::app()->user->isGuest) echo CHtml::link('Добавить новую книгу',array('create'), array('class'=>'create')); ?>
</div>
<script type="text/javascript">
	    $(".preview").fancybox({
		    'type'			: 'image',
	        'scrolling'		: 'no',
	    	'titleShow'		: false
	    });
</script>