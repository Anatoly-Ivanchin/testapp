<?php

class MainMenu extends CWidget
{

	public function run()
	{
		$this->render('mainMenu',array('items'=>$this->getItems()));
	}
	
	protected function getItems()
	{
		return array(
		    array(
		        'title'=>'Мои БП',
		        'url'=>'/myBP',
		        'tooltip'=>'Управление моими бонусными планами',
		    	'access'=>'personal',    
		    ),
			array(
				'title'=>'БП сотрудников',
				'url'=>'/subordinatesBP',
				'tooltip'=>'Управление бонусными планами сотрудников',
				'access'=>'manager',
			),
		    array(
		        'title'=>'ШБП',
		        'url'=>'/templatesbp',
		        'tooltip'=>'Управление шаблонами бонусных планов',
		    	'access'=>'manager',
		    ),
		    array(
		        'title'=>'Справочники',
		        'url'=>'/catalog',
		        'tooltip'=>'Управление справочниками',
		    	'access'=>'admin',
		    ),
		    array(
		        'title'=>'Пользователи',
		        'url'=>'/personal',
		        'tooltip'=>'Управление пользователями',
		    	'access'=>'admin',
		    ),
		);
	}
	
	public function isActive($itemUrl)
	{
		$path = Yii::app()->getRequest()->getUrl();
		
		if ($path==$itemUrl)
		    return true;

		if ($itemUrl=='/')
		    return false;
		  
		if (strlen($path)<strlen($itemUrl))
		{
			return false;
		}
		else
		{
			if(substr($path,0,strlen($itemUrl))==$itemUrl)
			    return true;
			else
			    return false;
		}
	}
}