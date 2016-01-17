<?php

class BooksController extends CController
{
	/**
	 * @var string specifies the default action to be 'list'.
	 */
	public $defaultAction='list';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_book;
	
	public function actions()
	{
		return array(
			'delete'=>array(
				'class'=>'application.components.actions.SimpleDelete',
				'pageTitle'=>'Удаление информации о книге',
				'successMsg'=>'Информация о книге удалена',
				'deleteMsg'=>'Вы действительно хотите удалить информацию о книге \"{$model->name}\"?',
		
			),
			'update'=>array(
				'class'=>'application.components.actions.SimpleEdit',
				'pageTitle'=>'Редактирование информации о книге',	
			),
			'create'=>array(
				'class'=>'application.components.actions.SimpleCreate',
				'pageTitle'=>'Добавление информации о книге',		
			),
			'upload'=>array(
				'class'=>'application.components.actions.AjaxUploadAction'
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
			'ajaxOnly-show,list',
			array('jQueryAjaxFilter')
		);
	}
	
	public function behaviors()
	{
		return array(
			'ar'=>'AjaxRender'
		);
	}

	public function accessRules()
	{
		return array(
			array('allow', 
			    'actions'=>array('list', 'show'),
				'users'=>array('*'),
			),
			array('allow',
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Shows book.
	 */
	public function actionShow()
	{
		$book=$this->loadModel();
		$this->renderAjax('show',array('model'=>$book));
	}
	
	
	/**
	 * Show all books.
	 */
	public function actionList()
	{		
		$criteria=new CDbCriteria;
		$criteria->with='author';
		
		$searchForm=new SearchForm();
		if(isset($_POST['SearchForm'])) 
		{
			$searchForm->setAttributes($_POST['SearchForm']);
			$criteria=$searchForm->apllyFilter($criteria);
		}
			
		$pages=new CPagination(Books::model()->count());
		$pages->applyLimit($criteria);

		$sort=new CSort('Books');
		$sort->attributes=array(
				'name',
				'date',
				'date_update',
				'author'=>array(
					'asc'=>'author.lastname, author.firstname',
					'desc'=>'author.lastname DESC, author.firstname DESC',
					'label'=>'Автор',
		));
		$sort->defaultOrder='name';
		$sort->applyOrder($criteria);

		$books=Books::model()->findAll($criteria);
		
		$formWidget=$this->createWidget('FormWindow');
		$formWidget->afterClose='$("#ui-datepicker-div").remove();$("#content").load("#");';
		$formWidget->run();

		$this->renderAjax('list',array(
				'pages'=>$pages,
				'models'=>$books,
				'sort'=>$sort,
				'searchForm'=>$searchForm,
		));
	}

	// load book model
	
	public function loadModel($id=null,$new=false)
	{
		if($this->_book===null)
		{
			if($new)
				return $this->_book=new Books();
			$this->_book=Books::model()->findByPk($_GET['id']);
			if($this->_book===null)
				throw new CHttpException(404,'Sorry! There is no such book.');
		}
		return $this->_book;
	}
	
}