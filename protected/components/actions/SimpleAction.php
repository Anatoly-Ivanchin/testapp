<?php
abstract class SimpleAction extends CAction
{
	const  STATE_PREPAIR=0;
	const  STATE_SUCCESS=1;
	const  STATE_FAILURE=2;
	
	public $view='form/common';
	public $layout='application.views.forms.layout';
	public $pageTitle=null;
	public $successMsg='<p>Данные успешно сохранены.</p>';
	
	public $onLoad=null;
	public $beforeAction=null;
	
	protected $state=self::STATE_PREPAIR;
	
	public function run()
	{
		$data=$this->makeAction();
		$this->getController()->layout=$this->layout;
		$this->getController()->pageTitle=$this->pageTitle;
		switch ($this->state) 
		{
			case self::STATE_SUCCESS:
				$this->getController()->render('application.views.forms.success',array_merge($data,array('msg'=>$this->successMsg)));
				break;
			case self::STATE_FAILURE:
				$this->getController()->render('application.views.forms.failure');
				break;
				default:
				$this->getController()->render($this->view,$data);
		}
	}
	
	protected function makeAction()
	{
		return array();
	}
}