<?php
class BreadCrumbsBehavior extends CBehavior
{
	public $breadCrumbs=null;
	
	public function getBreadCrumbsPage()
	{
		if(is_array($this->breadCrumbs)) 
			return $this->breadCrumbs;
		
		return array();
	}
}