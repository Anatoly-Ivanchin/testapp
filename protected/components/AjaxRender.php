<?php
class AjaxRender extends CBehavior
{

	public function renderAjax($view,$data=null,$process=true,$return=false)
	{
		$controller=$this->getOwner();
		$ajax=Yii::app()->getRequest()->getIsAjaxRequest();
		$output=$controller->renderPartial($view,$data,true);
		if(!$ajax && ($layoutFile=$controller->getLayoutFile($controller->layout))!==false)
			$output=$controller->renderFile($layoutFile,array('content'=>$output),true);
		if(!$ajax || $process)
			$output=$controller->processOutput($output);
		if($return)
			return $output;
		else
			echo $output;
	}
}