<?php

class UsersModule extends CBrick
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
				'users.models.*',
				'users.components.*',
		));

		$this->setParams(array(
				'nickAuthentification' => true,
				'accountActivation' => true,
				'useOtherIdent'=>'optional')
		);

		$this->title='Пользователи';

		Yii::app()->setComponent('authManager',new PhpAuthManager());
		Yii::app()->getComponent('authManager',false)->defaultRoles=array('guest');
		Yii::app()->user->loginUrl=array('users/default/login');
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}

	public function getRoutes()
	{
		return array(
				'login'=>'users/default/login',
				'logout'=>'users/default/logout',
				'user/managment'=>'users/default/admin',
				'registration'=>'users/default/register',
				'user/<id:\d+>'=>'users/default/show',
				'user/<id:\d+>/activate'=>'users/default/activate',
				'user/<id:\d+>/delete'=>'users/default/delete',
				'profile'=>'users/default/update',
				'networks'=>'users/network/admin',
				'networks/<id:\d+>/delete'=>'users/network/delete',
				'changepass'=>'users/default/changepass',
				'managment'=>'users/default/siteManagment',
		);
	}

	public function getMenuItems()
	{
		return array();
	}

	public function getAdminLinks()
	{
		return array(
				'Управление пользователями'=>array('/users/default/admin'),
				'Управление соцсетями'=>array('/users/network/admin'),
				'Сменить пароль'=>array('/users/default/changepass'),
		);
	}
}
