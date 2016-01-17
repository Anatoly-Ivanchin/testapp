<?php

class TreeMenu extends CWidget
{
	public $items=array();

	public function run()
	{
		$this->regScripts();
		
		if ($this->items==null)
		    $this->items=$this->getItems();
		
		$items=$this->proccessItems($this->items);
		
		$this->render('application.extensions.treeMenu.view',array('items'=>$items,'level'=>1));
	}
	
	protected function regScripts()
	{
		$baseDir = dirname(__FILE__);
        $assets = Yii::app()->getAssetManager()->publish($baseDir.DIRECTORY_SEPARATOR.'assets');

        $cs = Yii::app()->getClientScript();
        $cs->registerCoreScript('jquery');
        $cs->registerScriptFile($assets.'/functions.js',CClientScript::POS_END);
        $cs->registerCssFile($assets.'/styles.css');
	}
	
	protected function proccessItems($items)
	{
		$result=array();
		$controller=$this->controller;
		$action=$controller->action;
		foreach($items as $item)
		{
			if(isset($item['visible']) && !$item['visible'])
				continue;
			$pattern=isset($item['pattern'])?$item['pattern']:$item['url'];
			
			$item2=array();
			$item2['label']=$item['label'];
			if(is_array($item['url']))
				$item2['url']=$controller->createUrl($item['url'][0],array_splice($item['url'],1));
			else
				$item2['url']=$item['url'];
			
			$item2['active']=$this->isActive($pattern,$controller->uniqueID,$action->id);
			if(is_array($item['children']))
			{
			    $item2['children']=$this->proccessItems($item['children']);
			}
			
			$result[]=$item2;
		}
		return $result;
	} 
	
	protected function getItems()
	{
		return array();
	}

	protected function isActive($pattern,$controllerID,$actionID)
	{
		if(!is_array($pattern) || !isset($pattern[0]))
			return false;

		$pattern[0]=trim($pattern[0],'/');
	
		if(strpos($pattern[0],'/')!==false)
			$matched=$pattern[0]===$controllerID.'/'.$actionID;
		else
			$matched=$pattern[0]===$controllerID;

		if($matched && count($pattern)>1)
		{
			foreach(array_splice($pattern,1) as $name=>$value)
			{
				if(!isset($_GET[$name]) || $_GET[$name]!=$value)
					return false;
			}
			return true;
		}
		else
			return $matched;
	}
}