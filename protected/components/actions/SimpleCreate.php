<?php
Yii::import('application.components.actions.SimpleEdit');
class SimpleCreate extends SimpleEdit
{	
	protected function loadModel()
	{
		return $this->getController()->loadModel(null,true);
	}
}