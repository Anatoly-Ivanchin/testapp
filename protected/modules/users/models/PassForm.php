<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class PassForm extends CFormModel
{
	public $oldPass;
	public $newPass;
	public $newPassRepeat;
	public $success=false;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return  array(
			array('newPass', 'length','max'=>20,'min'=>6),
		    array('oldPass', 'required','on'=>'update'),
			array('oldPass', 'authenticate','on'=>'update'),
		    array('newPass', 'required'),
			array('newPassRepeat', 'compare','compareAttribute'=>'newPass','allowEmpty'=>false),
		);
	}

	/**
	 * Declares the attribute labels.
	 * If an attribute is not delcared here, it will use the default label
	 * generation algorithm to get its label.
	 */
	public function attributeLabels()
	{
		return array(
			'newPass'=>'Новый пароль',
			'newPassRepeat'=>'Подтвердить новый пароль',
			'oldPass'=>'Старый пароль',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())  // we only want to authenticate when no input errors
		{
			$identity=new UserIdentity(Yii::app()->user->name,$this->oldPass);
			$identity->authenticate();
			if($identity->errorCode)
			{
				$this->addError('oldPass','Введен не верный пароль!'.$identity->errorCode);
			}
		}
	}
	
}
