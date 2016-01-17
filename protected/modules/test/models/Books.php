<?php

class Books extends CActiveRecord
{
	const IMAGE_PATH='/upload/image/test/';
	
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
		return 'books';
	}
	
	public function behaviors()
	{
		return array(
			'imgBehavior'=>array(
					'class'=>'application.components.behaviors.SinglePicture',
					'imgAttr'=>'preview',
				)
		);
	}
	
	public function rules()
	{
		return array(
		    array('name', 'length', 'max'=>255,'message'=>'Много букв'), 
		    array('name,author_id','required'),
			array('date','date','format'=>'yyyy-mm-dd','message'=>'Не верный формат даты'),
		);
	}

	
	public function attributeLabels()
	{
		return array(
		    'name'=>'Название',
			'author'=>'Автор',
			'date'=>'Дата выхода книги',
			'date_update'=>'Дата обновления',
			'date_create'=>'Дата создания',
			'preview'=>'Превью',
	    );
	}
	
	public function relations()
	{
		return array(
				'author'=>array(self::BELONGS_TO,'Authors','author_id'),
		);
	}

	protected function beforeValidate()
	{
		if($this->getIsNewRecord())
			$this->date_create=new CDbExpression('now()');
		$this->date_update=new CDbExpression('now()');
		return parent::beforeValidate();
	}
	
	public function formatDateUpdate() {
		return DateFormatter::format($this->date_update);
	}
	
}