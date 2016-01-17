<?php

class AdminMenu extends CWidget
{
	public function init()
	{
		$cs = Yii::app()->getClientScript();
		$js =<<<EOP
$("#module_list>li .slider").click(function(){
$(this).next().slideToggle();
	});
	$("#module_list>li.active .slider").trigger("click");
	
EOP;
		$cs->registerScript('Yii.'.get_class($this).'#1', $js, CClientScript::POS_READY);
		
	}
	
	public function run()
	{
		$modules=array();
		foreach(Yii::app()->getModules() as $id=>$module)
		{
			$moduleObj=Yii::app()->getModule($id);
			if ($moduleObj instanceof CBrick)
			{
				$modules[$id]['title']=$moduleObj->getTitle();
				$modules[$id]['links']=$moduleObj->getAdminLinks();
			}
		}
		
		$moduleId=$this->getController()->getModule()->getId();
		$this->render('adminMenu', array('modules'=>$modules,'activeModuleId'=>$moduleId));
	}
}