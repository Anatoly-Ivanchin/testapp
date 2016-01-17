<?php

class DefaultController extends CController
{
	/**
	 * @var string specifies the default action to be 'list'.
	 */
	public $defaultAction='admin';
	public $layout='application.views.layouts.admin';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_user;
	
	public function actions()
	{
		return array(
			'delete'=>array(
				'class'=>'application.components.actions.SimpleDelete',
				'pageTitle'=>'Удаление пользователя',
				'successMsg'=>'Учетная запись пользователя удалена',
				'deleteMsg'=>'Вы действительно хотите удалить учетную запись пользователя \"{$model->username}\"?',
		
			),
			'update'=>array(
				'class'=>'ProfileEdit',
				'pageTitle'=>'Редактирование учетной записи пользователя',
			),
		);
	}

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl',
			'ajaxOnly+delete,delete',
			array('jQueryAjaxFilter-login,logout,activate,changepass')
		);
	}
	
	public function behaviors()
	{
		return array(
			'breadCrumbs'=>'BreadCrumbsBehavior',
			'ar'=>'AjaxRender'
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('login','register','activate'),
				'users'=>array('?'),
			),
			array('deny',
				'actions'=>array('delete'),
				'expression'=>'$user->id==$_GET["id"]',
			),
			array('allow',  
				'actions'=>array('logout','update','changepass','update'),
				'users'=>array('@'),
			),
			array('deny',  
				'actions'=>array('login','register'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated users to perform any action
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionLogin()
	{
		if (isset($_POST['token'])) {
			$this->networkLogin();
		}
		
		$this->layout=null;
		$this->breadCrumbs=array('Управление сайтом'=>array('/users/default/siteManagment'));
				
		$form=new LoginForm;
		if(isset($_POST['LoginForm']))
		{
			$form->attributes=$_POST['LoginForm'];
			if($form->validate())
			{
				$backUrl=$form->getBackUrl();
				if(Yii::app()->getRequest()->getIsAjaxRequest())
				{
					echo CHtml::script("document.location='".$backUrl."'");
					return;
				} else
				{
					$this->redirect($backUrl);
				}
			}
		}
		if(Yii::app()->getRequest()->getIsAjaxRequest())
			$this->renderPartial('form/login',array('form'=>$form,'backUrl'=>$backurl));
		else
			$this->render('login',array('user'=>$form,'backUrl'=>$backurl));
	}
	
	protected function networkLogin()
	{
		$result=false;
		$ulogin = new UloginModel();
		$ulogin->setAttributes($_POST);
		$authData=$ulogin->getAuthData();
		if ($ulogin->validate() && $ulogin->login()) {
			$result=true;
		}
		echo CJSON::encode(array('result'=>$result,'authdata'=>$authData));
		Yii::app()->end();
	} 
	
	public function actionLogout()
	{
		Yii::app()->user->logout();
		if($url=Yii::app()->getRequest()->getUrlReferrer())
			$this->redirect($url);
		$this->redirect(array('/site/index'));
	}
	
	public function actionRegister()
	{
		$success=false;
		$this->layout=null;
		$this->breadCrumbs=array('Управление сайтом'=>array('/users/default/siteManagment'));
		
		$form=new RegForm;
		if(isset($_POST['RegForm']))
		{
			$form->attributes=$_POST['RegForm'];
			if($form->save())
			    $success=true;
		}
		$this->render('reg',array('user'=>$form,'success'=>$success));
	}
	
	public function actionChangepass()
	{
		$this->breadCrumbs=array('Управление сайтом'=>array('/users/default/siteManagment'));
		$user = $this->loadModel();
		$form=new PassForm($user->password?'update':'insert');
		if(isset($_POST['PassForm']))
		{
			$form->attributes=$_POST['PassForm'];
			if($form->validate())
			{
				$user->setPassword($form->newPass);
				if($user->save())
				{
					$form->success=true;
					$form->oldPass=null;
					$form->newPass=null;
					$form->newPassRepeat=null;
				}
			}
		}
		$this->render('changepass',array('form'=>$form,'success'=>$success,'model'=>$user));
	}
	
	public function loadPassForm()
	{
		return new PassForm($this->loadModel()->password?'update':'insert');
	}

	public function actionActivate()
	{
		$this->layout=null;
		$this->breadCrumbs=array('Управление сайтом'=>array('/users/default/siteManagment'));
		
		$user=$this->loadModel();
		
		if (isset($_GET['key']) && $_GET['key']==$user->activationKey)
		{
			$user->activated=true;
			$user->activationKey='';
			$user->save();
			if (Yii::app()->user->checkAccess('admin'))
				$this->redirect(array('admin'));
			else
			    $this->render('activation',array('result'=>true));
		}
		else
		    $this->render('activation', array('result'=>false));		
	}
	
	
	/**
	 * Manages all posts.
	 */
	public function actionAdmin()
	{
		$this->breadCrumbs=array('Управление сайтом'=>array('/users/default/siteManagment'));
		
		$this->changeUserData();
		
		$criteria=new CDbCriteria;

		$pages=new CPagination(User::model()->count());
		$pages->applyLimit($criteria);

		$sort=new CSort('User');
		$sort->defaultOrder='email';
		$sort->applyOrder($criteria);

		$users=User::model()->findAll($criteria);
		
		$this->widget('FormWindow');

		$this->renderAjax('admin',array(
			'pages'=>$pages,
			'users'=>$users,
			'sort'=>$sort,
		));
	}
	
	public function actionSiteManagment()
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
		$this->render('site_managment',array(
		    'modules'=>$modules,
		));
	}
	
	public function actionShow()
	{
		$user=$this->loadModel();
		
		$this->breadCrumbs=array('Управление сайтом'=>array('/users/default/siteManagment'),
				'Управление пользователями'=>array('/users/default/admin'));
	
		$this->widget('FormWindow');
	
		$this->renderAjax('show',array('user'=>$user));
	}
	
	protected function changeUserData()
	{
		if(isset($_POST['user']))
		{
			$user=$this->loadModel($_POST['user']);
			if(isset($_POST['role']))
				$user->role=$_POST['role'];
			if(isset($_POST['activation']))
			{
				$x=$user->activated;
				$user->activated=!$x;
			}
			$user->save();
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
	public function loadModel($id=null)
	{
		if($this->_user===null)
		{
			if($id!==null || isset($_GET['id']))
			{
				$this->_user=User::model()->findByPk($id!==null ? $id : $_GET['id']);
			} else { 
				$this->_user=User::model()->findByPk(Yii::app()->user->id);
			}
			if($this->_user===null)
				throw new CHttpException(404,'The requested user does not exist.');
		}
		return $this->_user;
	}

}
