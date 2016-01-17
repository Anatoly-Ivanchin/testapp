<?php

class RegForm extends User
{
	public $reTypePassword;
	
	public function rules()
	{
		$rules = array(
			
			array('email', 'required'),
			array('email', 'email', 'allowEmpty'=>false),
			array('email', 'unique'),
			
			array('reTypePassword,password', 'required'),
			array('reTypePassword', 'reType'),
		);
		return array_merge(parent::rules(),$rules);
	}

	/**
	 * Declares the attribute labels.
	 * If an attribute is not delcared here, it will use the default label
	 * generation algorithm to get its label.
	 */
	public function attributeLabels()
	{
		$labels=array(
			'reTypePassword'=>'Подтвердите пароль',
		);
		return array_merge(parent::attributeLabels(),$labels);
	}
	
	public function safeAttributes()
	{
		return array('password', 'reTypePassword','email');
	}
	
	public function beforeSave()
	{
		$this->password=md5($this->password);
		$this->activated=false;
		$this->activationKey=$this->createActivationKey();
		return parent::beforeSave();
	}
	
	protected function afterSave()
	{
		$theme='Добро пожаловать на "'.Yii::app()->getRequest()->getServerName().'"!';
		$link = CHtml::link('Активировать учетную запись',Yii::app()->getRequest()->getBaseUrl(true).'/user/'.$this->id.'/activate?key='.$this->activationKey);
		$msg='Вы зарегистрировались на сайте "'.Yii::app()->name.'". '.$link;
		mail($this->email, $theme,$msg);
		return parent::afterSave();
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function reType($attribute,$params)
	{
		if(!$this->hasErrors())  // we only want to authenticate when no input errors
		{
			if($this->reTypePassword!=$this->password)
			    $this->addError('reTypePassword','Введеные пароли не совпадают');
		}
	}
	
	private function createActivationKey()
	{
		$key = md5($key.$this->email);
		$key = md5($key.time());
		return $key;
	}
}
