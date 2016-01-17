<?php
abstract class CBrick extends CWebModule
{
	protected $title;
	
	public function getTitle()
	{
		if (isset($this->title))
		    return $this->title;
		else
		    return 'abstract module';
	}
	
	private function getCachedData($id)
	{
		$caheId = $this->getId().'_'.$id;
		$cache = Yii::app()->getCache();
		$data = $cache->get($caheId);
		
		if($data == false)
		{
			$generateDataMethod = 'generate'.ucfirst($id);
			$data = call_user_func(array($this,$generateDataMethod));
			$cache->set($caheId, $data,$this->getCacheDependency());
		}
		return $data;
	}
	
	/* Routing */
	
	public function getRoutes()
	{
		return $this->getCachedData('routes');
	}
	
	protected function generateRoutes()
	{
		return array();
	}
	
	protected function getCacheDependency()
	{
		return null;
	}
	
	/* menu */
	
	public function getMenuItems()
	{
		return $this->getCachedData('menu');
	}
	
	protected function generateMenu()
	{
		return array();
	}
	
	/* admin menu */
	
	public function getAdminLinks()
	{
		return $this->getCachedData('adminlinks');
	}
	
	protected function generateAdminlinks()
	{
		return array();
	}
}