<?php

class AdminActions extends CWidget
{
	const ICON_PATH='/images/admin/actions/';
	private $defaultActions = array();
	
	public $urlPattern=null;
	public $urlParams = array();
	public $actions=array();
	public $element='div';
	
	public function init()
	{
		$this->defaultActions['edit']=array(
			'title'=>'Править',
			'url'=>array_merge(array($this->applyUrlPattern('update')),$this->urlParams),
			'icon'=>'edit.png'
		);
		$this->defaultActions['delete']=array(
			'title'=>'Удалить',
			'url'=>array_merge(array($this->applyUrlPattern('delete')),$this->urlParams),
			'icon'=>'delete.png'		
		);
	}

	public function run()
	{
		$this->proccessActions();
		$this->renderContent();		
	}
	
	private function applyUrlPattern($id)
	{
		if($this->urlPattern)
			return preg_replace('/\?\?/', $id, $this->urlPattern);
		else
			return $id;
	}
	
	private function proccessActions()
	{
		foreach ($this->defaultActions as $id=>$defaultAction)
		{
			if(isset($this->actions[$id]))
			{
				$action=$this->actions[$id];
				if (is_array($this->actions[$id]))
				{
					$this->actions[$id]=array_merge($defaultAction,$this->actions[$id]);
				}
				else
				{
					unset($this->actions[$id]);
				}
			}
			else 
			{
				$this->actions[$id]=$defaultAction;
			}
		}
	}
	
	private  function renderContent()
	{
		foreach ($this->actions as $id=>$action)
		{
			$content=isset($action['icon'])?CHtml::image(self::ICON_PATH.$action['icon'],$action['title'],array('title'=>$action['title'])):$action['title'];
			$htmlOptions=array('class'=>isset($action['class'])?$action['class']:'box_form action_'.$id);
			if(is_array($action['options']))
				$htmlOptions=array_merge($htmlOptions,$action['options']);
			$links .= CHtml::link($content,$action['url'], $htmlOptions); 
		}
		echo CHtml::tag($this->element, array('class'=>'admin_actions'),$links);
	}
}