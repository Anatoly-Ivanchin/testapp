<?php
Yii::import('application.components.actions.SimpleAction');
class SimpleEdit extends SimpleAction
{
	protected function loadModel()
	{
		return $this->getController()->loadModel();
	}

	public function makeAction()
	{
		$controller=$this->getController();
		$model=$this->loadModel();
		$data=array('model'=>$model);
		
		if($this->onLoad!=null)
			$data=call_user_func(array($controller,$this->onLoad),$data);
		
		$modelClass=get_class($model);

		if(isset($_POST[$modelClass]))
		{
			$model->attributes=$_POST[$modelClass];
			if($model->validate())
			{
				if($this->beforeAction!=null)
					$data=call_user_func(array($controller,$this->beforeAction),$data);
				if($model->save(false))
					$this->state=self::STATE_SUCCESS;
				else
					$this->state=self::STATE_FAILURE;
			}
		}
		return $data;
	}
}