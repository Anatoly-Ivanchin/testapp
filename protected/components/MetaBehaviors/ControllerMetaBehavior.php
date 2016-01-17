<?php
class ControllerMetaBehavior extends CBehavior
{
	protected function registerMeta($model, $defaultTitle=null)
	{
		$controller=$this->getOwner();
		$cs=Yii::app()->getClientScript();
		
		$controller->pageTitle=($model->title!=null)?$model->title:$defaultTitle;
		
		$cs->registerMetaTag($model->description, 'description');
		$cs->registerMetaTag($model->tags, 'keywords');
	}
}