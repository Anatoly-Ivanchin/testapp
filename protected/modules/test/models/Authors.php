<?php

class Authors extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
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
		return 'authors';
	}
	
	public function behaviors()
	{
		return array(
		);
	}
	
	public function rules()
	{
		return array();
	}

	
	public function attributeLabels()
	{
		return array();
	}
	
	public function relations()
	{
		return array(
				'books'=>array(self::HAS_MANY,'Books','author_id'),
		);
	}

	public function getShortName()
	{
		$name=mb_substr($this->firstname,0,1,'utf-8').'. ';
		if($this->middlename!=null)
			$name.=mb_substr($this->middlename,0,1,'utf-8').'. ';
		return $name.=$this->lastname;
	}
	
	public function getFullName()
	{
		$name=$this->firstname.' ';
		if($this->middlename!=null)
			$name.=$this->middlename.' ';
		return $name.=$this->lastname;
	}
	
	public static function getOptions()
	{
		$res=array();
		foreach (self::model()->findAll() as $model){
			$res[$model->id]=$model->getShortName();
		}
		return $res;
	}
}