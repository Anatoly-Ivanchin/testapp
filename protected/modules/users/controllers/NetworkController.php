<?php

class NetworkController extends CController
{
	/**
	 * @var string specifies the default action to be 'list'.
	 */
	public $defaultAction='admin';
	public $layout='application.views.layouts.admin';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_nw;
	
	public function actions()
	{
		return array(
			'delete'=>array(
				'class'=>'application.components.actions.SimpleDelete',
				'pageTitle'=>'Удаление соцсети',
				'successMsg'=>'Соцсеть удалена',
				'deleteMsg'=>'Вы действительно хотите удалить соцсеть \"{$model->network}\"?',
		
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
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionCreate()
	{
		$uloginAuthUrl = 'http://ulogin.ru/token.php?token=';
		if (isset($_POST['token'])) {
			$data = json_decode(file_get_contents($uloginAuthUrl.$_POST['token'].'&host='.$_SERVER['HTTP_HOST']),true);
			$nw=new Network();
			$nw->userId=Yii::app()->user->id;
			$nw->setAttributes($data);
			if($nw->save())
				$this->renderPartial('application.views.forms.success',array('msg'=>'Соцсеть успешно добавлена!'));
			else
				echo CHtml::errorSummary($nw);
		} 
		else
			throw new CHttpException(403);
		
	}
	
	/**
	 * Manages all networks.
	 */
	public function actionAdmin()
	{
		$this->breadCrumbs=array('Управление сайтом'=>array('/users/default/siteManagment'));
		
		$criteria=new CDbCriteria;
		$criteria->addColumnCondition(array('userId'=>Yii::app()->user->id));

		$pages=new CPagination(User::model()->count());
		$pages->applyLimit($criteria);

		$sort=new CSort('Network');
		$sort->defaultOrder='network';
		$sort->applyOrder($criteria);

		$nw=Network::model()->findAll($criteria);
		
		$this->widget('FormWindow');

		$this->renderAjax('admin',array(
			'pages'=>$pages,
			'networks'=>$nw,
			'sort'=>$sort,
		));
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
	public function loadModel()
	{
		if($this->_nw===null)
		{
			if($id!==isset($_GET['id']))
			{
				$this->_nw=Network::model()->findByPk($_GET['id']);
			}
			if($this->_nw===null||$this->_nw->userId!=Yii::app()->user->id)
				throw new CHttpException(404,'The requested network does not exist.');
		}
		return $this->_nw;
	}

}
