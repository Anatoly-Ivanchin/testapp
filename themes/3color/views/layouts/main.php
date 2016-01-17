<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=9" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="language" content="ru" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/common.css" />
		<title><?php echo $this->pageTitle; ?></title>
	</head>
	
	<body>
		<?php  Yii::app()->getClientScript()->registerCoreScript('cookie');
		$this->widget('users.components.UserMenu'); ?>
		<div id="<?php echo (Yii::app()->getRequest()->getUrl()=='/')?'main_page':'common_page';?>" class="page">
			<div id="header" class="content" >
				<div id="logo">
					<a href="/" title="<?php echo Yii::app()->name; ?>">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo.png" />
					</a>
				</div>
	        	<?php $this->widget('MainMenu');?>
	        	<div class="clear"></div>
			</div>
			
			<div id="content" class="content"><?php echo $content?></div>
			<div id="footer"  class="content">
	       		<span id="development">Создание сайта &mdash; <a href="http://anatoliyivanchin.moikrug.ru/">Иванчин Анатолий</a>, <a href="http://marina-fateeva.moikrug.ru/">Фатеева Марина</a></span>
	       		<span id="copyright">&copy; 2015  Сделано в </span>
	       		<img id="gmcs_logo" title="GMCS" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/gmcs_logo.png" />
			</div>
		</div>
	</body>
</html>