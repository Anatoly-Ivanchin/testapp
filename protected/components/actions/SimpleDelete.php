<?php
Yii::import('application.components.actions.SimpleAction');
class SimpleDelete extends SimpleAction
{
	public $view='application.views.forms.delete';
	public $deleteMsg='Вы действительно хотите удалить этот объект?';
	
	public function makeAction()
	{
		$controller=$this->getController();
		$model=$controller->loadModel();
		
		if(isset($_POST['ok']))
		     if($model->delete())
			     $this->state=self::STATE_SUCCESS;
			 else
				 $this->state=self::STATE_FAILURE;
		return array('model'=>$model,'msg'=>$this->deleteMsg);
	}
}