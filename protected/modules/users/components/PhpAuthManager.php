<?php
class PhpAuthManager extends CPhpAuthManager
{
    public function init()
    {
        if($this->authFile===null)
        {
            $this->authFile=Yii::getPathOfAlias('application.modules.users.config.auth').'.php';
        }
 
        parent::init();
 
        if(!Yii::app()->user->isGuest && $user=User::model()->findByPk(Yii::app()->user->id))
        {
        	$role=$user->getRoleName();
            $this->assign($role, Yii::app()->user->id);
            $this->assign('owner', Yii::app()->user->id);
        }            
    }
}