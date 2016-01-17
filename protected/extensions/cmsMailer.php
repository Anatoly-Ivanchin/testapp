<?php
class cmsMailer extends CComponent
{
	public $theme;
	public $fromName;
	public $fromMail;
	public $to;
	public $content;
	
	public $contentType='text/html';
	public $encoding;
	
	public $layout='application.views.layouts.mail';
	public $view='mail';
	
	public function __construct()
	{
		$this->theme=Yii::app()->name;
		$this->fromMail=isset(Yii::app()->params['adminemail'])?Yii::app()->params['adminemail']:null;
		$this->fromName=Yii::app()->name;
		$this->encoding=Yii::app()->charset;
	}
	
	public function send($to=null)
	{
		if($to!=null)
			$this->to=$to;
		$msg=$this->makeContent();
		$headers=$this->makeHeaders();
		mail($this->to, $this->theme, $msg,$headers);
	}

	protected function makeContent()
	{
		if( is_string($this->content))
			return $this->content;
		
		$controller=Yii::app()->getController();
		$controller->layout=$this->layout;
		return $controller->render($this->view,$this->content,true);		
	}
	
	protected function makeHeaders()
	{
		if($this->fromMail!=null)
		{
			$from='<'.$this->fromMail.'>';
			if($this->fromName!=null)
				$from=$this->fromName.' '.$from;
			else
				$from=$this->fromMail.' '.$from; 
			$from='From: '.$from;
		}
		$contentType='Content-type: '.$this->contentType.'; charset='.$this->encoding.' ';
		return $contentType."\r\n".$from."\r\n";
	}
}