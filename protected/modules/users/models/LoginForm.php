<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $email;
	public $password;
	public $rememberMe;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// password needs to be authenticated
			array('password, email', 'required'),
			array('password', 'authenticate'),
			array('rememberMe','boolean')
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
			'email'=>'e-mail',
			'password'=>'Пароль',
			'rememberMe'=>'Запомнить меня',
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
			$identity=new UserIdentity($this->email,$this->password);
			$identity->authenticate();
			switch($identity->errorCode)
			{
				case UserIdentity::ERROR_NONE:
					$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
					Yii::app()->user->login($identity,$duration);
					break;
				case UserIdentity::ERROR_USERNAME_INVALID:
					$this->addError('email','Пользователь с таким адресом электронной почты не зарегистрирован');
					break;
				case UserIdentity::ERROR_USER_IS_NOT_ACTIVATED:
					$this->addError('email','Учетная запись не активированна');
					break;
				default: // UserIdentity::ERROR_PASSWORD_INVALID
					$this->addError('password','Не верный пароль');
					break;
			}
		}
	}
	
	public function getBackUrl() 
	{
		$backurl=Yii::app()->getRequest()->getUrlReferrer();
		if($backurl==null ||
				$backurl==yii::app()->getRequest()->getHostInfo().'/login' ||
				$backurl==yii::app()->getRequest()->getHostInfo().'/registration'){
			if(isset($_POST['backurl']) && $_POST['backurl']!=null)
				$backurl=$_POST['backurl'];
			else
				$backurl=yii::app()->getRequest()->getBaseUrl(true);
		}
		return $backurl;
	}
}
