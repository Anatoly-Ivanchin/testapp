<?php

class BreadCrumbs extends CWidget
{
	public $pages = array();
	public $splitter = '/';
	
	public $mainPage=array('Главная'=>'/');
	public $includeCurrentPage=true;
	
	protected $currPageTitle;
	
	public function init()
	{
		$controller=$this->getController();
		$this->currPageTitle=$controller->getPageTitle();
		if($controller->asa('breadCrumbs'))
			$this->pages=array_merge($this->pages,$controller->getBreadCrumbsPage());
		if(is_array($this->mainPage))
		{
		    $mainPageTitle = array_keys($this->mainPage);
		    $mainPageTitle=$mainPageTitle[0];
		}
		if($mainPageTitle!=$this->currPageTitle)
		{
			$this->pages=array_merge($this->mainPage,$this->pages);
		}
	}

	public function run()
	{
		$this->render('breadCrumbs',
		    array(
		        'pages'=>$this->pages,
		        'splitter'=>$this->splitter,
		        'curentPageTitle'=>$this->currPageTitle,
		    )
		);
	}
}