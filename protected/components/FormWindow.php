<?php

class FormWindow extends CWidget
{
	public $selector=".admin_actions a";
	public $afterClose='$("#content").load("#");';
	
	public function run()
	{
		$cs = Yii::app()->getClientScript();
			
			$js =<<<EOP
$("$this->selector").fancybox({
	'type':'ajax',
    'scrolling'		: 'no',
	'titleShow'		: false,
	'afterShow' : function(){ $('.tabs a').bind("click.fb", $.fancybox.reposition);},
	'beforeClose' : function(){ $this->afterClose $('.fancybox-inner').undelegate('input','click');}
});
EOP;
			
		if(!Yii::app()->getRequest()->getIsAjaxRequest())
		{
			$cs->registerScript('Yii.'.get_class($this).$this->selector, $js, CClientScript::POS_READY);
			$cs->registerCssFile('/js/fancybox/jquery.fancybox.css');
			$cs->registerScriptFile('/js/fancybox/jquery.fancybox.pack.js');
		}
	}
}