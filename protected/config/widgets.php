<?php return array(
	'widgets'=>array(
		'CLinkPager'=>array(
			'cssFile'=>false,
			'header'=>'',
			'nextPageLabel'=>'',
			'prevPageLabel'=>'',
		),
	'EFineUploader'=>array(
			'id'=>'FineUploader',
			'config'=>array(
				'autoUpload'=>true,
				'retry'=>array('enableAuto'=>true,'preventRetryResponseProperty'=>true),
				'chunking'=>array('enable'=>true,'partSize'=>100),//bytes
				'callbacks'=>array(
					//'onComplete'=>"js:function(id, name, response){ alert(id); }",
					'onError'=>"js:function(id, name, errorReason){alert(id+' '+name+' '+errorReason);}",
				),
				'validation'=>array(
					'allowedExtensions'=>array('jpg','jpeg','png','gif'),
					'sizeLimit'=>7 * 1024 * 1024,//maximum file size in bytes
					//'minSizeLimit'=>2*1024*1024,// minimum file size in bytes
				),
				/*'messages'=>array(
				 'tooManyItemsError'=>'Too many items error',
					'typeError'=>"Файл {file} имеет неверное расширение. Разрешены файлы только с расширениями: {extensions}.",
					'sizeError'=>"Размер файла {file} велик, максимальный размер {sizeLimit}.",
					'minSizeError'=>"Размер файла {file} мал, минимальный размер {minSizeLimit}.",
					'emptyError'=>"{file} is empty, please select files again without it.",
					'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
				),*/
			)
		)
	)
)?>