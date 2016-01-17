<h3>Загруженные файлы</h3>
<?php foreach ($files as $file): ?>
	<div>
		<?php if($file->hasError):?>
		<div class="errorSummary"><?php echo $file->errorMsg; ?></div>
		<?php else:?>
		<?php echo CHtml::image($file->fileName,null,array('class'=>'uploaded_img'))?>
		<?php echo CHtml::link(CHtml::image('/images/admin/actions/delete.png','Удалить'),'#',array('onclick'=>
			Chtml::ajax(array(
				'update'=>'#uploaded_files',
				'url'=>$this->createUrl(''),
				'type'=>'post',
				'data'=>array('key'=>$file->key,'id'=>$file->id)))
			))?>
		<?php endif;?>
	</div>
<?php endforeach; if(count($files)<1):?>
<p>Не было загружено ни одного файла</p>
<?php endif;?>
