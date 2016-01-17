<?php

class Network extends CActiveRecord
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
		return 'User_Network';
	}
	
	public function relations()
	{
		return array(
			'user'=>array(self::BELONGS_TO, 'User', 'userId'),
		);
	}
	
	public function rules()
	{
		return array(
		    array('identity, network', 'required'),
			array('identity, network', 'length', 'max'=>255),
			array('network','uniqueforuser')
		);
	}
	
	public function attributeLabels()
	{
		return array(
		    'network'=>'Соцсеть'
		);
	}
	
	public function uniqueForUser($attribute,$params)
	{
		if(!$this->hasErrors())  // we only want to authenticate when no input errors
		{
			$cri = new CDbCriteria();
			$cri->addColumnCondition(array(
					'userId'=>Yii::app()->user->id,
					'network'=>$this->$attribute));
			$r=$this->findAll($cri);
			if(count($r)>0)
			{
				$this->addError($attribute,'Социальная сеть '.$this->network.' уже привязана!');
			}
		}
	}
}