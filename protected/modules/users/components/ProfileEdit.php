<?php
Yii::import('application.components.actions.SimpleEdit');
class ProfileEdit extends SimpleEdit
{
	public function makeAction()
	{
		$controller=$this->getController();
		$model=$this->loadModel();
		$form=$controller->loadPassForm();
	
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$form->attributes=$_POST['PassForm'];
			if($model->validate() && (!$form->newPass||$form->validate()))
			{
				if($form->newPass)
					$model->setPassword($form->newPass);
				if($model->save(false))
					$this->state=self::STATE_SUCCESS;
				else
					$this->state=self::STATE_FAILURE;
			}
		}
		return array('model'=>$model,'form'=>$form);
	}
}