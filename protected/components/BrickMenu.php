<?php
YiiBase::import('application.extensions.treeMenu.TreeMenu');
class BrickMenu extends TreeMenu
{	
	protected function getItems()
	{
		$items=array(array('label'=>'Главная',
		                   'url'=>array('/site/index')));
		
		foreach(Yii::app()->getModules() as $id=>$m)
		{
			$moduleObj=Yii::app()->getModule($id);
			if ($moduleObj instanceof CBrick)
			    $items=array_merge($items,$moduleObj->getMenuItems());
		}
		return $items;
	}
}