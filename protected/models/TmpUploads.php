<?php

class TmpUploads extends CActiveRecord
{
	/**
	 * 
	 * Enter description here ...
	 * @param $className
	 * @return CActiveRecord
	 */

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tmp_Uploads';
	}
	
	public function deleteUsersUploads($all)
	{
		$cri= new CDbCriteria();
		$cri->addCondition('userId=:uId');
		if(!$all)
		{
			$cri->addCondition('t.key<>:k');
			$cri->addCondition('t.hasError=TRUE','OR');
			$cri->params[':k']=$this->key;
		}
		$cri->params[':uId']=Yii::app()->user->id;
		
		$dataset=$this->findAll($cri);
		foreach ($dataset as $row)
			$row->delete();
	}
	
	public function findByKey($key)
	{
		return $this->findAllByAttributes(array('userId'=>Yii::app()->user->id,'key'=>$key));
	}
	
	public function afterDelete()
	{	
		if($this->fileName && is_file($this->getFilePath()))
			unlink($this->getFilePath());
		parent::afterDelete();
	}
	
	public  function beforeValidate()
	{
		$this->userId=Yii::app()->user->id;
		return parent::beforeValidate();
	}
	
	public function getFilePath()
	{
		return $_SERVER['DOCUMENT_ROOT'].$this->fileName;
	}
	
	public function error($msg)
	{
		$this->hasError=true;
		$this->errorMsg=$msg;
		$this->save();
	}
	
	public function add($file)
	{
		$this->fileName=$file;
		$this->save();
	}
}