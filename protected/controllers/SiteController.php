<?php

class SiteController extends CController
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array();
	}
	
	public function behaviors()
	{
		return array(
				'ar'=>'AjaxRender'
		);
	}
	
	public function filters()
	{
		return array(
				'accessControl',
				array('jQueryAjaxFilter')
		);
	}

	public function accessRules()
	{
		return array(
				array('allow',  // allow all users to perform 'list' and 'show' actions
						'actions'=>array('index','error','test'),
						'users'=>array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('BP'),
						'roles'=>array('manager'),
				),
				array('allow', 
						'roles'=>array('admin'),
				),
				array('deny',  // deny all users
						'users'=>array('*'),
				),
		);
	}
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->renderAjax('index', array('user'=>$user));
	}
	
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	        $this->renderAjax('error', $error);
	    else 	
	    throw new CHttpException(404,'Запрашиваемая страница не существует.');
	}
	
	protected  function regScripts() 
	{
		$cs= Yii::app()->clientScript;
		$cs->registerCoreScript('jquery');
		$cs->registerCoreScript('jquery.ui');
		$cs->registerScriptFile("/js/left_tabs.js");
		$this->widget('FormWindow',array(
				'selector'=>'.box_form',
				'afterClose'=>'$(".ui-tabs-panel:visible").load($(".ui-tabs-panel:visible").data("src"));',
		));
	}
	
	public function actionCatalog()
	{
		$this->pageTitle='Справочники';
		$models=array(
				0=>array(
						'title'=>'Департаменты',
						'url'=>'/departments/admin',
				),
				1=>array(
						'title'=>'KPI',
						'url'=>'/kpi/admin',
				),
				2=>array(
						'title'=>'Бизнес процессы',
						'url'=>'/businessProcess/admin',
				),
				3=>array(
						'title'=>'Шкалы',
						'url'=>'/scale/admin',
				),
			);
		$this->regScripts();
		$this->render('catalog',array('models'=>$models));
	}
	
	public function actionPersonal()
	{
		$this->pageTitle='Сотрудники';
		$models=array(
				0=>array(
						'title'=>'Новые пользователи',
						'url'=>'/personal/applications',
				),
				1=>array(
						'title'=>'Сотрудники',
						'url'=>'/personal/admin',
				),
		);
		$this->regScripts();
		$this->render('catalog',array('models'=>$models));
	}
	
	public function actionBP()
	{
		$this->pageTitle='Бонус-планы сотрудников';
		$models=array(
				0=>array(
						'title'=>'БП ожидающие утверждения',
						'url'=>'/BP/waitList',
				),
				1=>array(
						'title'=>'Поиск БП',
						'url'=>'/BP/list',
				),
		);
		$this->regScripts();
		$this->render('catalog',array('models'=>$models));
	}
	
	public function actionTest()
	{
		echo 'This is test action.';
	} 
}