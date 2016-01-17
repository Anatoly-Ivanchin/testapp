<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="language" content="en" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/common.css" />
		
		<!--[if lte IE 6]>
			<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/ie_png_fix.js"></script>	
			<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie6.css" rel="stylesheet" type="text/css" />
		<![endif]-->
		<!--[if lte IE 7]>	
			<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie7.css" rel="stylesheet" type="text/css" />
		<![endif]-->
		
		<title><?php echo $this->pageTitle; ?></title>
	</head>
	
	<body>
		<div class="page">	
			<?php  $this->widget('users.components.UserMenu'); ?>
			<div id="header">
		            <a id="logo" href="/" title="<?php echo CHtml::encode(Yii::app()->name); ?>">
			            <?php echo CHtml::encode(Yii::app()->name); ?>
		            </a>
		        <?php $this->widget('CatalogMenu');?>
		        <div class="clear"></div>
			</div>
		</div>
		
		<div id="content" class="page"><?php echo $content?></div>
			
		<div id="footer" class="page">
	            <?php $this->widget('blocks.components.DisplayBlock',array('ident'=>'contacts')); ?>
	        <div class="clear"></div>
		</div>
	</body>
</html>