<?php
class ModelMetaBehavior extends CActiveRecordBehavior
{
	protected $model=null;
	
	public function beforeSave($event)
	{
		if($_POST['Meta'])
		{
			$model=$this->getModel();
			$model->attributes=$_POST['Meta'];
			if(!$model->save())
			{
				$event->isValid=false;
				return; 
			}
			$this->getOwner()->metaId=$model->id;
		}
	}
	
	public function beforeDelete($event)
	{
		$model=$this->loadExistModel();
		if($model)
			$model->delete();
	}
	
	public function getMeta()
	{
		return $this->getModel();
	}
	
	protected function getModel()
	{
		if($this->model==null)
		{
			$model=$this->loadExistModel();
			if($model==null)
				$model=new Meta();
			$this->model=$model;
		}
		return $this->model;
	}
	
	protected function loadExistModel()
	{
		return Meta::model()->findByPk($this->getOwner()->metaId);
	}
}