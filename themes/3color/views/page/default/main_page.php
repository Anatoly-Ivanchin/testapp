<?php if($this->beginCache('contentPage_'.$page->url, array('duration'=>3600,
                                             'dependency'=>array(
                                                   'class'=>'system.caching.dependencies.CDbCacheDependency',
                                                   'sql'=>'select updateTime from Page where id='.$page->id)
                                              ))):?>
<div id="main_page_content"><?php echo $page->content; ?></div>
<?php $this->endCache(); endif; ?>
<?php $this->widget('AdminActions',
	array(
		'urlParams'=>array('url'=>$page->url),
	)
); ?>