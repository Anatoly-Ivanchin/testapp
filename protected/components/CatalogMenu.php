<?php

class CatalogMenu extends MainMenu
{

	public function run()
	{
		$this->render('catalogMenu',array('items'=>$this->getItems()));
	}
	
	protected function getItems()
	{
		$res=array();
		$cat = Categories::model()->find('isnull(parentId)');
		if($cat==null)
			return $res;
		$url='/'.$cat->url;
		foreach($cat->children as $child)
		{
			$item=array(
					'title'=>$child->title,
					'url'=>$url.'/'.$child->url,
			);
			$res['cat_f'.$child->id]=$item;
		}
	    $item=array(
	        'title'=>$cat->title,
	        'url'=>$url,
	    );
	    $res['cat_f'.$cat->id] =$item;
		return $res;
	}
	
	public function isActive($itemUrl)
	{
		$path = Yii::app()->getRequest()->getUrl();
		
		if ($path==$itemUrl)
		    return true;
	}
}