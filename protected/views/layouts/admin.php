<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="language" content="en" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/common.css" />
		
		<title><?php echo Yii::app()->name.' :: '.$this->pageTitle; ?></title>
		
		<script>
			function resizeRC(){$('#right_column').width($('#body').width()-$('#left_column').outerWidth(true)-20);}
			$(window).load(resizeRC).resize(resizeRC);
		</script>		
	</head>
	
	<body>
		<div id="admin_page">
			
			<div id="header">
	            <a id="logo" href="<?php echo $this->createUrl('/users/default/siteManagment');?>" title="<?php echo CHtml::encode(Yii::app()->name); ?>">
	                <img src="/images/admin/logo.gif" alt="<?php echo CHtml::encode(Yii::app()->name); ?>" />
	            </a>
	            <div id="header_links">
		            <?php echo CHtml::link('Вернуться на сайт','/');?>
		            <?php if(!Yii::app()->user->getIsGuest())echo CHtml::link('Выход',array('/users/default/logout'),array('id'=>'logout'));?>
	            </div>
	            <div class="clear"></div>
			</div>
			
			<div id="body">	
				<div id="left_column"><?php  $this->widget('application.components.AdminMenu'); ?></div>
				<div id="right_column">
					<div id="content_header">
						<h1 id="pageTitle"><?php echo $this->pageTitle; ?></h1>
						<?php $this->widget('BreadCrumbs',array('splitter'=>'<img src="/images/admin/breadcrumbs_splitter.gif" />')); ?>
					</div>
					<div id="content"><?php echo $content?></div>
				</div>
				<div class="clear"></div>
			</div>
			
			<div id="footer">
		        <div class="copyright"> &copy; нарисовала <a href="http://marina-fateeva.moikrug.ru/">Фатеева Марина</a> разработал <a href="http://anatoliyivanchin.moikrug.ru/">Анатолий Иванчин</a>, 2011</div>
		        <?php echo Yii::powered();?>
			</div>
		</div>
	</body>
</html>