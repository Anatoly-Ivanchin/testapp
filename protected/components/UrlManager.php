<?php

class UrlManager extends CUrlManager 
{
	public function init()
	{
		$this->initRules();
		parent::init();
	}
	
	protected function initRules()
	{
		$rules=array();
		
		foreach(Yii::app()->getModules() as $id=>$module)
		{
			$moduleObj=Yii::app()->getModule($id);
			if ($moduleObj instanceof CBrick)
			    $rules=array_merge($rules,$moduleObj->getRoutes());
		}
		$this->rules=array_merge($this->rules,$rules);
	}
}